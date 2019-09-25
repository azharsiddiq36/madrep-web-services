<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 7:19
 */

class LokasiAbsenController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_Lokasi_Absen');
        $this->load->model('Model_Pengguna');
        $this->load->helper('form');
        $this->load->library('upload');

        /*chek_session();*/
    }
    function index(){
        $data ['record'] = $this->Model_Lokasi_Absen->get_all();
        $this->template->load('template','lokasi_absen/index.php',$data);
    }

    function post()
    {
        if(isset($_POST['submit'])) {
            $lokasi_absen_nama = $this->input->post('lokasi_absen_nama');
            $data = array('lokasi_nama' => $lokasi_absen_nama);
                $this->Model_Lokasi_Absen->set($data);
                redirect('daftar_lokasi_absen');
            }
        else{
            $this->template->load('template','lokasi_absen/form_input.php');
        }
    }
    function delete()
    {
        $id=  $this->uri->segment(2);
        $this->Model_Lokasi_Absen->delete($id);
        redirect('daftar_lokasi_absen');
    }

    function edit()
    {
        if(isset($_POST['submit'])){
            // proses siswa
            $id=$this->uri->segment(2);
            $lokasi    = $this->input->post('lokasi_absen_nama');
            $data           = array('lokasi_nama'=>$lokasi
            );
            $this->Model_Lokasi_Absen->edit($data,$id);
            redirect('daftar_lokasi_absen');
        }
        else{
            $id=  $this->uri->segment(2);
            $this->load->model('Model_Lokasi_Absen');
            $data['record']     =  $this->Model_Lokasi_Absen->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','lokasi_absen/form_edit',$data);
        }
    }
    function rincian(){
        $id = $this->uri->segment(2);
        $data['record'] =  $this->Model_Lokasi_Absen->get_one($id)->row_array();
        $this->template->load('template','lokasi_absen/rincian',$data);
    }
}