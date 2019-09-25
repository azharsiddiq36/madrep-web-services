<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	    $this->load->view('login.php');
		//$this->template->load('template','login.php');
	}
    public function test(){
	    $this->load->view('coba2.php');
    }
    public function logout(){
	    $this->session->sess_destroy();
        redirect('welcome');
    }
    public function suratpengantar(){
        if($this->session->userdata('username')===null){
            redirect('iseng');
        }
        else{
        $this->load->model('Model_Bimbingan');
        $data ['record'] = $this->Model_Bimbingan->tampilkan_data();

	    $this->template->load('template','bimbingan/suratlapas',$data);
        }
    }
    public function dashboard_admin(){
        $this->load->model('Model_Madrep');
        $this->load->model('Model_Obat');
        $this->load->model('Model_Dokter');
        $this->load->model('Model_Pengguna');
        $this->load->model('Model_Kunjungan');
        $this->load->model('Model_Absensi');
        $this->load->model('Model_Lokasi_Absen');
        $this->load->model('Model_Kategori');
        $this->template->load('template','dashboard_admin');
    }
    public function dashboard(){
        $this->load->model('Model_Penjamin');
        $this->load->model('Model_Bimbingan');
        $this->load->model('Model_Pegawai');
        $this->load->model('Model_pengguna');
        $this->load->model('Model_Napi');
		$data ['record'] = $this->Model_Penjamin->getByPembimbing($this->session->userdata('id_pegawai'));        
        $this->template->load('template','dashboard',$data);
    }
}
