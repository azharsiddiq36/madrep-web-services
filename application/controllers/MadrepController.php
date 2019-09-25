<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 7:19
 */

class MadrepController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_Madrep');
        $this->load->model('Model_Pengguna');
        $this->load->helper('form');
        $this->load->library('upload');

        /*chek_session();*/
    }
    function index(){
        $data ['record'] = $this->Model_Madrep->get_all();
        $this->template->load('template','madrep/index.php',$data);
    }

    function post()
    {
        if(isset($_POST['submit'])) {
            $madrep_nama = $this->input->post('madrep_nama');
            $madrep_nomor = $this->input->post('madrep_nomor');
            $madrep_jk = $this->input->post('madrep_jk');
            $madrep_tgl_lahir = $this->input->post('madrep_tgl_lahir');
            $madrep_alamat = $this->input->post('madrep_alamat');
            $pengguna_username = $this->input->post('pengguna_username');
            $pengguna_email = $this->input->post('pengguna_email');
            $pengguna_hak_akses = 'madrep';
            $pengguna_password = md5($pengguna_username);
            $data = array('pengguna_username' => $pengguna_username,
                'pengguna_email' => $pengguna_email,
                'pengguna_hak_akses' => $pengguna_hak_akses,
                'pengguna_password' => $pengguna_password
            );
            $foto = null;
            if ($this->Model_Pengguna->get_username($pengguna_username)->num_rows() != 1) {
                $this->Model_Pengguna->set($data);
                $foto = 'assets/images/user.png';
                $pengguna = $this->Model_Pengguna->get_username($pengguna_username)->row_array();
                $madrep_id_pengguna = $pengguna['pengguna_id'];
                $data           = array('madrep_nama'=>$madrep_nama,
                    'madrep_foto'=>$foto,
                    'madrep_id_pengguna'=>$madrep_id_pengguna,
                    'madrep_nomor'=>$madrep_nomor,
                    'madrep_jk'=>$madrep_jk,
                    'madrep_tgl_lahir'=>$madrep_tgl_lahir,
                    'madrep_alamat'=>$madrep_alamat,
                );
                $this->Model_Madrep->set($data);
                redirect('daftar_madrep');
            }
            else{
                $this->session->set_flashdata('alert','gagal');
                $this->template->load('template','madrep/form_input.php');
            }
        }
        else{
            $this->template->load('template','madrep/form_input.php');
        }
    }
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->Model_Madrep->delete($id);
        redirect('daftar_madrep');
    }
//    function hapus($id){
//        $where = array('id_Madrep' => $id);
//        $this->Model_Madrep->hapus_data($where,'Madrep');
//        redirect('Madrep');
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
            $this->Model_Madrep->edit($data,$id);
            redirect('daftar_madrep');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('Model_Madrep');
            $data['record']     =  $this->Model_Madrep->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','madrep/form_edit',$data);
        }
    }
    function rincian(){
        $id = $this->uri->segment(2);
        $data['record'] =  $this->Model_Madrep->get_one($id)->row_array();
        $this->template->load('template','madrep/rincian',$data);
    }
}