<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MahasiswaModel', 'mahasiswa');
    }

    public function index_get() {
        $mahasiswa = $this->mahasiswa->getMahasiswa();
        $this->response($mahasiswa, REST_Controller::HTTP_OK);
    }

    public function index_post() {
        $codeMahasiswa = $this->input->get('codeMahasiswa');
        $namaMahasiswa = $this->input->get('namaMahasiswa');
        $jurusanId = $this->input->get('jurusanId');

        $result = $this->mahasiswa->insertMahasiswa($codeMahasiswa, $namaMahasiswa, $jurusanId);

        $message = [
            'result' => $result,
            'message' => 'Added a new resource'
        ];

        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }
}