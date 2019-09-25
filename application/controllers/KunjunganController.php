<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 7:19
 */

class KunjunganController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_Kunjungan');
        $this->load->model('Model_Pengguna');
        $this->load->helper('form');
        $this->load->library('upload');

        /*chek_session();*/
    }
    function index(){
        $data ['record'] = $this->Model_Kunjungan->get_Join();

        $this->template->load('template','kunjungan/index.php',$data);

    }

    function post()
    {
        if(isset($_POST['submit'])) {
            $kunjungan_nama = $this->input->post('kunjungan_nama');
            $data = array('kunjungan_nama' => $kunjungan_nama);
                $this->Model_Kunjungan->set($data);
                redirect('daftar_kunjungan');
            }
        else{
            $this->template->load('template','kunjungan/form_input.php');
        }
    }
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->Model_Kunjungan->delete($id);
        redirect('daftar_kunjungan');
    }

    function edit()
    {
        if(isset($_POST['submit'])){
            // proses siswa
            $id=$this->uri->segment(3);
            $username    = $this->input->post('username');
            $hak_akses    = $this->input->post('hak_akses');
            $email  = $this->input->post('email');



            $data           = array('username'=>$username,
                'email'=>$email,
                'hak_akses'=>$hak_akses
            );
            $this->Model_Kunjungan->edit($data,$id);
            redirect('daftar_kunjungan');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('Model_Kunjungan');
            $data['record']     =  $this->Model_Kunjungan->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','kunjungan/form_edit',$data);
        }
    }
    function rincian(){
        $id = $this->uri->segment(2);
        $data['record'] =  $this->Model_Kunjungan->get_one($id)->row_array();
        $this->template->load('template','kunjungan/rincian',$data);
    }
}