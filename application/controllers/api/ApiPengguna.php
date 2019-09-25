<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 11/05/19
 * Time: 11:48
 */

class ApiPengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Pengguna');
        $this->load->model('Model_Dokter');
        $this->load->model('Model_Madrep');
        $this->load->library('upload');
    }

    function index(){
        $respon = null;
        $data = $this->Model_Pengguna->get_all()->result();

        if ($data){
            $respon['status'] = 200;
            $respon ['message'] = "Berhasil Memuat Data";
            $respon['data'] = $data;
        }
        else{
            $respon['status'] = 500;
            $respon ['message'] = "Gagal Memuat Data";
        }
        echo json_encode($respon);

    }
    function post()
    {
        $response = null;
        $username      = $this->input->post('pengguna_username');
        $email    = $this->input->post('pengguna_email');
        $password    = $this->input->post('pengguna_password');
        $hak_akses = $this->input->post('pengguna_hak_akses');
        $token = $this->input->post('pengguna_token');
        if ($token === null){
            $token = "belum";
        }
        $jenis = $this->input->post('jenis');
        $data           = array('pengguna_username'=>$username,
            'pengguna_email'=>$email,
            'pengguna_password'=>md5($password),
            'pengguna_hak_akses' => $hak_akses,
            'pengguna_token' => $token
        );
        $foto = null;
        if($this->Model_Pengguna->get_username($username)->num_rows() != 1){
            $this->Model_Pengguna->set($data);
            $response['status'] = 200;
            $response['message'] = "Berhasil Menambahkan Data";
            $config['upload_path']          = './assets/images';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1028;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            //$this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('foto')){
                $error = array('error' => $this->upload->display_errors());
            }
            else {
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/'.$this->upload->data('file_name');
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['width']= 600;
                $config['height']= 400;
                $config['new_image']= './assets/images/'.$this->upload->data('file_name');
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $foto = 'assets/images/' . $this->upload->data('file_name');
            }
            $pengguna = $this->Model_Pengguna->get_username($username)->row_array();
            if ($jenis === 'dokter'){
                $dokter_id_pengguna = $pengguna['pengguna_id'];
                $dokter_nama      = $this->input->post('dokter_nama');
                $dokter_nomor      = $this->input->post('dokter_nomor');
                $dokter_jk      = $this->input->post('dokter_jk');
                $dokter_bidang      = $this->input->post('dokter_bidang');
                $dokter_tgl_lahir      = $this->input->post('dokter_tgl_lahir');
                $dokter_alamat    = $this->input->post('dokter_alamat');
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
            }else{
                $madrep_id_pengguna = $pengguna['pengguna_id'];
                $madrep_nama      = $this->input->post('madrep_nama');
                $madrep_nomor      = $this->input->post('madrep_nomor');
                $madrep_jk      = $this->input->post('madrep_jk');
                $madrep_tgl_lahir      = $this->input->post('madrep_tgl_lahir');
                $madrep_alamat    = $this->input->post('madrep_alamat');
                $data           = array('madrep_nama'=>$madrep_nama,
                    'madrep_id_pengguna' => $madrep_id_pengguna,
                    'madrep_nomor'=>$madrep_nomor,
                    'madrep_foto'=>$foto,
                    'madrep_jk'=>$madrep_jk,
                    'madrep_tgl_lahir'=>$madrep_tgl_lahir,
                    'madrep_alamat'=>$madrep_alamat,
                );

                $this->Model_Madrep->set($data);
            }
        }
        else{
            $response['status'] = 400;
            $response['message'] = "Username telah tersedia";
        }

        echo json_encode($response);
    }
    function edit()
    {
        $response = null;
        $id = $this->input->post('pengguna_id');
//        $email    = $this->input->post('pengguna_email');
        $password    = $this->input->post('pengguna_password');
//        $hak_akses = $this->input->post('pengguna_hak_akses');
        $data           = array(
            'pengguna_password'=>md5($password)
        );
            $this->Model_Pengguna->edit($data,$id);
            $response['status'] = 200;
            $response['message'] = "Berhasil Merubah Data";
        echo json_encode($response);
    }
    function login(){
        $response = null;
        $username      = $this->input->post('pengguna_username');
        $password    = $this->input->post('pengguna_password');
        $data           = array('pengguna_username'=>$username,
            'pengguna_password'=>md5($password)
        );
        if ($this->Model_Pengguna->login($data)->num_rows() == 1){
            $data = $this->Model_Pengguna->get_username($username)->row_array();
            $foto = null;
            if ($data['pengguna_hak_akses'] == "dokter"){
                $dokter = $this->Model_Dokter->getByDokter($data['pengguna_id'])->row_array();
                $foto = $dokter['dokter_foto'];
            }
            else{
                $madrep = $this->Model_Madrep->getByIdPengguna($data['pengguna_id'])->row_array();
                $foto = $madrep['madrep_foto'];
            }
            $response['status'] = 200;
            $response['message'] = "Login Berhasil";
            $response['foto'] =$foto;
            $response['data'] = $data;
        }
        else{
            $response['status'] = 400;
            $response['message'] = "Username atau Password Salah";
        }
        echo json_encode($response);

    }
    function changeFoto(){
        $response = null;
        $id = $this->input->post('pengguna_id');
        $data = $this->Model_Pengguna->get_one($id)->row_array();
        $config['upload_path'] = './assets/images';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 204800;
        $this->upload->initialize($config);
        if ( !$this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
            $response['status'] = 400;
            $response['message'] = $error['error'];
        }
        else {
            $config['image_library']='gd2';
            $config['source_image']='./assets/images/'.$this->upload->data('file_name');
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '50%';
            $config['width']= 1024;
            $config['height']= 768;
            $config['new_image']= './assets/images/'.$this->upload->data('file_name');
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $foto = 'assets/images/' . $this->upload->data('file_name');
            if ($data['pengguna_hak_akses'] == "dokter"){
                $dokter = $this->Model_Dokter->getByDokter($data['pengguna_id'])->row_array();
                $data           = array(
                    'dokter_foto'=>$foto
                );
                $this->Model_Dokter->edit($data,$dokter['dokter_id']);
            }
            else{
                $madrep = $this->Model_Madrep->getByIdPengguna($data['pengguna_id'])->row_array();
                $data           = array(
                    'madrep_foto'=>$foto
                );
                $this->Model_Madrep->edit($data,$madrep['madrep_id']);
            }
            $response['status'] = 200;
            $response['message'] = "Berhasil Mengupload Foto";
        }
        echo json_encode($response);
    }


}