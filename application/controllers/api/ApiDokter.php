<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 11/05/19
 * Time: 11:48
 */

class ApiDokter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Dokter');
    }

    function index(){
        $respon = null;
        $data = $this->Model_Dokter->get_all()->result();
        if ($data){
            $respon ['message'] = "Berhasil Memuat Data";
            $respon['status'] = 200;
            $respon['data'] = $data;
        }
        else{
            $respon ['message'] = "Gagal Memuat Data";
            $respon['status'] = 500;
        }
        echo json_encode($respon);
    }
    function getTotal(){
        $respon = null;
        $data = $this->Model_Dokter->get_all()->num_rows();
        if ($data){
            $respon ['message'] = $data;
            $respon['status'] = 200;
        }
        else{
            $respon ['message'] = "Gagal Memuat Data";
            $respon['status'] = 500;
        }
        echo json_encode($respon);
    }

    function post()
    {
        $response = null;
        $dokter_nama      = $this->input->post('dokter_nama');
        $dokter_id_kategori  = $this->input->post('dokter_id_kategori');

        $data           = array('dokter_nama'=>$dokter_nama,
            'dokter_id_kategori'=>$dokter_id_kategori,
        );
            $this->Model_Dokter->set($data);
            $response['status'] = 200;
            $response['message'] = "Berhasil Menambahkan Data";
            echo json_encode($response);
    }
    function edit()
    {
        $response = null;
        $id = $this->input->post('dokter_id');
        $dokter_nama      = $this->input->post('dokter_nama');
        $dokter_nomor      = $this->input->post('dokter_nomor');
        $dokter_jk      = $this->input->post('dokter_jk');
        $dokter_bidang      = $this->input->post('dokter_bidang');
        $dokter_tgl_lahir      = $this->input->post('dokter_tgl_lahir');
        $dokter_alamat    = $this->input->post('dokter_alamat');
        $data           = array('dokter_nama'=>$dokter_nama,
            'dokter_nomor'=>$dokter_nomor,
            'dokter_jk'=>$dokter_jk,
            'dokter_bidang'=>$dokter_bidang,
            'dokter_tgl_lahir'=>$dokter_tgl_lahir,
            'dokter_alamat'=>$dokter_alamat,
        );
        $this->Model_Dokter->edit($data,$id);
        $response['status'] = 200;
        $response['message'] = "Berhasil Merubah Data";
        echo json_encode($response);
    }


}