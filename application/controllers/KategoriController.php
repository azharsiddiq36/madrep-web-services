<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 7:19
 */

class KategoriController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_Kategori');
        $this->load->model('Model_Pengguna');
        $this->load->helper('form');
        $this->load->library('upload');

        /*chek_session();*/
    }
    function index(){
        $data ['record'] = $this->Model_Kategori->get_all();
        $this->template->load('template','kategori/index.php',$data);
    }

    function post()
    {
        if(isset($_POST['submit'])) {
            $kategori_nama = $this->input->post('kategori_nama');
            $data = array('kategori_nama' => $kategori_nama);
                $this->Model_Kategori->set($data);
                redirect('daftar_kategori');
            }
        else{
            $this->template->load('template','kategori/form_input.php');
        }
    }
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->Model_Kategori->delete($id);
        redirect('daftar_kategori');
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
            $this->Model_Kategori->edit($data,$id);
            redirect('daftar_kategori');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('Model_Kategori');
            $data['record']     =  $this->Model_Kategori->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','kategori/form_edit',$data);
        }
    }
    function rincian(){
        $id = $this->uri->segment(2);
        $data['record'] =  $this->Model_Kategori->get_one($id)->row_array();
        $this->template->load('template','kategori/rincian',$data);
    }
}