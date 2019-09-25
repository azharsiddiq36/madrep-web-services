<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 7:19
 */

class PenggunaController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_Pengguna');
        $this->load->helper('form');

        /*chek_session();*/
    }
    function index(){
        $data ['record'] = $this->Model_Pengguna->get_all();
        $this->template->load('template','pengguna/index.php',$data);
    }
    function add_pengguna(){
        $this->template->load('template','pengguna/form_input.php');
    }

    function post()
    {
        if(isset($_POST['submit'])){
            $username      = $this->input->post('username');
            $email    = $this->input->post('email');
            $password    = $this->input->post('password');
            $hak_akses = $this->input->post('hak_akses');
            $data           = array('username'=>$username,
                'email'=>$email,
                'password'=>md5($password),
                'hak_akses' => $hak_akses
            );
            $this->Model_pengguna->add_pengguna($data);
            redirect('daftar_pengguna');
        }
        else{
            echo "Data Gagal";
        }
    }
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->Model_pengguna->delete($id);
        redirect('daftar_pengguna');
    }
//    function hapus($id){
//        $where = array('id_pengguna' => $id);
//        $this->Model_pengguna->hapus_data($where,'pengguna');
//        redirect('pengguna');
//    }
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
            $this->Model_pengguna->edit($data,$id);
            redirect('daftar_pengguna');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('Model_pengguna');
            $data['record']     =  $this->Model_pengguna->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','pengguna/form_edit',$data);
        }
    }
}