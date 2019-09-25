<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 11/05/19
 * Time: 11:48
 */

class ApiKategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Kategori');
    }

    function index(){
        $respon = null;
        $data = $this->Model_Kategori->get_all()->result();
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
        $kategori_nama      = $this->input->post('kategori_nama');
        $data           = array('kategori_nama'=>$kategori_nama);
            $this->Model_Kategori->set($data);
            $response['status'] = 200;
            $response['message'] = "Berhasil Menambahkan Data";
            echo json_encode($response);
    }
    function edit()
    {
        $response = null;
        $id = $this->input->post('kategori_id');
        $kategori_nama      = $this->input->post('kategori_nama');
        $data           = array('kategori_nama'=>$kategori_nama);
        $this->Model_Kategori->edit($data,$id);
        $response['status'] = 200;
        $response['message'] = "Berhasil Merubah Data";
        echo json_encode($response);
    }

}