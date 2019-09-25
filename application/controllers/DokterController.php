<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 7:19
 */

class DokterController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_Dokter');
        $this->load->model('Model_Pengguna');
        $this->load->helper('form');
        $this->load->library('upload');

        /*chek_session();*/
    }
    function index(){
        $data ['record'] = $this->Model_Dokter->get_all();
        $this->template->load('template','dokter/index.php',$data);
    }

    function post()
    {
        if(isset($_POST['submit'])) {
            $dokter_nama = $this->input->post('dokter_nama');
            $dokter_nomor = $this->input->post('dokter_nomor');
            $dokter_jk = $this->input->post('dokter_jk');
            $dokter_bidang = $this->input->post('dokter_bidang');
            $dokter_tgl_lahir = $this->input->post('dokter_tgl_lahir');
            $dokter_alamat = $this->input->post('dokter_alamat');
            $pengguna_username = $this->input->post('pengguna_username');
            $pengguna_email = $this->input->post('pengguna_email');
            $pengguna_hak_akses = 'dokter';
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
                $dokter_id_pengguna = $pengguna['pengguna_id'];
                $data           = array('dokter_nama'=>$dokter_nama,
                    'dokter_foto'=>$foto,
                    'dokter_id_pengguna'=>$dokter_id_pengguna,
                    'dokter_nomor'=>$dokter_nomor,
                    'dokter_jk'=>$dokter_jk,
                    'dokter_bidang'=>$dokter_bidang,
                    'dokter_tgl_lahir'=>$dokter_tgl_lahir,
                    'dokter_alamat'=>$dokter_alamat,
                );
                $this->Model_Dokter->set($data);
                redirect('daftar_dokter');
            }
            else{
                $this->session->set_flashdata('alert','gagal');
                $this->template->load('template','dokter/form_input.php');
            }
        }
        else{
            $this->template->load('template','dokter/form_input.php');
        }
    }
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->Model_Dokter->delete($id);
        redirect('daftar_dokter');
    }
//    function hapus($id){
//        $where = array('id_Dokter' => $id);
//        $this->Model_Dokter->hapus_data($where,'Dokter');
//        redirect('Dokter');
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
            $this->Model_Dokter->edit($data,$id);
            redirect('daftar_dokter');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('Model_Dokter');
            $data['record']     =  $this->Model_Dokter->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','dokter/form_edit',$data);
        }
    }
    function rincian(){
        $id = $this->uri->segment(2);
        $data['record'] =  $this->Model_Dokter->get_one($id)->row_array();
        $this->template->load('template','dokter/rincian',$data);
    }
}