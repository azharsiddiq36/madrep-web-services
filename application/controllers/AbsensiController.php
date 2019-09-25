<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 7:19
 */

class AbsensiController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_Absensi');
        $this->load->model('Model_Lokasi_Absen');
        $this->load->model('Model_Madrep');
        $this->load->model('Model_Dokter');
        $this->load->model('Model_Pengguna');
        $this->load->helper('form');
        $this->load->library('upload');

        /*chek_session();*/
    }
    function index(){
        $data ['record'] = $this->Model_Absensi->get_all();
        $this->template->load('template','absen/index.php',$data);
    }

    function post()
    {
        if(isset($_POST['submit'])) {
            $absen_nama = $this->input->post('absen_nama');
            $data = array('lokasi_nama' => $absen_nama);
                $this->Model_Absensi->set($data);
                redirect('daftar_absen');
            }
        else{
            $this->template->load('template','absen/form_input.php');
        }
    }
    function delete()
    {
        $id=  $this->uri->segment(2);
        $this->Model_Absensi->delete($id);
        redirect('daftar_absen');
    }

    function edit()
    {
        if(isset($_POST['submit'])){
            // proses siswa
            $id=$this->uri->segment(2);
            $lokasi    = $this->input->post('absen_nama');
            $data           = array('lokasi_nama'=>$lokasi
            );
            $this->Model_Absensi->edit($data,$id);
            redirect('daftar_absen');
        }
        else{
            $id=  $this->uri->segment(2);
            $this->load->model('Model_Absensi');
            $data['record']     =  $this->Model_Absensi->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','absen/form_edit',$data);
        }
    }
    function rincian(){
        $id = $this->uri->segment(2);
        $data['record'] =  $this->Model_Absensi->get_one($id)->row_array();
        $this->template->load('template','absen/rincian',$data);
    }
}