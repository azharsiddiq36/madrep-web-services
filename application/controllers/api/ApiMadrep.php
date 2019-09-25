<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 11/05/19
 * Time: 11:48
 */

class ApiMadrep extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Madrep');
    }

    function index(){
        $respon = null;
        $data = $this->Model_Madrep->get_all()->result();
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
        $madrep_nama      = $this->input->post('madrep_nama');
        $madrep_id_kategori  = $this->input->post('madrep_id_kategori');

        $data           = array('madrep_nama'=>$madrep_nama,
            'madrep_id_kategori'=>$madrep_id_kategori,
        );
            $this->Model_Madrep->set($data);
            $response['status'] = 200;
            $response['message'] = "Berhasil Menambahkan Data";
            echo json_encode($response);
    }
    function edit()
    {
        $response = null;
        $id = $this->input->post('madrep_id');
        $madrep_nama      = $this->input->post('madrep_nama');
        $madrep_nomor      = $this->input->post('madrep_nomor');
        $madrep_jk      = $this->input->post('madrep_jk');
        $madrep_tgl_lahir      = $this->input->post('madrep_tgl_lahir');
        $madrep_alamat    = $this->input->post('madrep_alamat');
        $data           = array('madrep_nama'=>$madrep_nama,
            'madrep_nomor'=>$madrep_nomor,
            'madrep_jk'=>$madrep_jk,
            'madrep_tgl_lahir'=>$madrep_tgl_lahir,
            'madrep_alamat'=>$madrep_alamat,
        );
        $this->Model_Madrep->edit($data,$id);
        $response['status'] = 200;
        $response['message'] = "Berhasil Merubah Data";
        echo json_encode($response);
    }

}