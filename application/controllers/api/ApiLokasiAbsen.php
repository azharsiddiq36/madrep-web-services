<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 11/05/19
 * Time: 11:48
 */

class ApiLokasiAbsen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Lokasi_Absen');
    }

    function index(){
        $respon = null;
        $data = $this->Model_Lokasi_Absen->get_all()->result();
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
    function post()
    {
        $response = null;
        $Lokasi_Absen_nama = $this->input->post('Lokasi_Absen_nama');
        $data           = array('Lokasi_Absen_nama'=>$Lokasi_Absen_nama);
            $this->Model_Lokasi_Absen->set($data);
            $response['status'] = 200;
            $response['message'] = "Berhasil Menambahkan Data";
            echo json_encode($response);
    }
    function edit()
    {
        $response = null;
        $id = $this->input->post('Lokasi_Absen_id');
        $Lokasi_Absen_nama      = $this->input->post('Lokasi_Absen_nama');
        $data           = array('Lokasi_Absen_nama'=>$Lokasi_Absen_nama);
        $this->Model_Lokasi_Absen->edit($data,$id);
        $response['status'] = 200;
        $response['message'] = "Berhasil Merubah Data";
        echo json_encode($response);
    }

}