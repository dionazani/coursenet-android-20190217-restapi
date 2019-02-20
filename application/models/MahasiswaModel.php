<?php

class MahasiswaModel extends CI_Model {

    public function getMahasiswa() {
        $query = $this->db->query("SELECT mahasiswa.code_mhs, 
                                            mahasiswa.nama_mhs, 
                                            jurusan.nama_jur 
                                    FROM mahasiswa INNER JOIN jurusan ON mahasiswa.jurusan_id = jurusan.id");
        return $query->result_array();
    }

    public function insertMahasiswa($codeMahasiswa, $namaMahasiswa, $jurusanId) {
        $result = false;

        $this->db->set('code_mhs', $codeMahasiswa);
        $this->db->set('nama_mhs', $namaMahasiswa);
        $this->db->set('jurusan_id', $jurusanId);
        $this->db->insert('mahasiswa');

        $result = true;

        return $result;
    }
}