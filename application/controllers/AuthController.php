<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 13/02/19
 * Time: 11:09
 */

class AuthController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_Pengguna');
        $this->load->helper('form');
    }
    public function loginAction(){
        if (isset($_POST['submit'])){
            $username = $this->input->post('username');
            $password = $this->input->post('pass');
            $params = array('pengguna_username'=>$username,
                            'pengguna_password'=>md5($password));
            $cek_login = $this->Model_Pengguna->login($params)->num_rows();
            if ($cek_login >0){
                    $datauser = $this->Model_Pengguna->get_username($username)->row_array();
                    $this->session->set_userdata('username',$datauser['pengguna_username']);
                    $this->session->set_userdata('pengguna_id',$datauser['pengguna_id']);
                    $this->session->set_userdata('hak_akses',$datauser['pengguna_hak_akses']);
                    $this->session->set_userdata('email',$datauser['pengguna_email']);
                    $this->session->set_userdata('foto',$datauser['pengguna_foto']);
                        redirect('dashboard_admin');

            }
            else{
                $this->session->set_flashdata('alert','gagal');
                redirect('welcome');


            }
//            if ($params)
        }
    }
    function coba(){
        $data = $this->Model_pengguna->tampilkan_data()->result_array();
        $response = null;
        foreach ($data as $hasil){
            $response = array(array(
                "username"=>$hasil['username'],
                "password"=>$hasil['password'],
            ));
        }
//        $params = array('username'=>"admin",
//            'password'=>md5("aaaa1234"));
//        $data = $this->Model_pengguna->dataUser($params);
        echo json_encode($response);
    }
    function profile(){
       $this->template->load('template','pengguna/profile');
    }
    function ubah_password(){
        if ($this->input->post('username') !=null){
            $id = $this->session->userdata('id_pengguna');
            $password = $this->input->post('password');
            $repassword = $this->input->post('repassword');
            if ($password === $repassword){
                $params = array('password'=>md5($password));
                $this->Model_pengguna->edit($params,$id);
                $this->session->set_flashdata('alert','berhasil');

                redirect('profile');
            }
            else{
                $this->session->set_flashdata('alert','gagal');
                redirect('ubah_password');
            }
        }
        else{
            $this->template->load('template','pengguna/ubah_password');
        }
    }
}