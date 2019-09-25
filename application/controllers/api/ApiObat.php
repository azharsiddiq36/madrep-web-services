<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 11/05/19
 * Time: 11:48
 */

class ApiObat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Obat');
        $this->load->model('Model_Kategori');
        $this->load->helper('form');
        $this->load->library('upload');
    }
    function index(){
        $respon = null;
        $data = $this->Model_Obat->get_all()->result();
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
        $data = $this->Model_Obat->get_all()->num_rows();
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
        $config['upload_path'] = './assets/images';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 204800;
        $this->upload->initialize($config);
        if ( !$this->upload->do_upload('foto_obat')){
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
            $obat_nama      = $this->input->post('obat_nama');
            $obat_kategori = $this->input->post('obat_kategori');
            $obat = $this->Model_Kategori->getByName($obat_kategori)->row_array();
            $obat_id_kategori    = $obat['kategori_id'];
            $obat_rincian = $this->input->post('obat_rincian');
            $data           = array('obat_nama'=>$obat_nama,
                'obat_rincian'=>$obat_rincian,
                'obat_id_kategori'=>$obat_id_kategori,
                'obat_foto'=>$foto
            );
            $this->Model_Obat->set($data);
            $response['status'] = 200;
            $response['message'] = "Berhasil Mengupload Foto";
        }
        echo json_encode($response);
    }
    function edit()
    {
        $response = null;
        $id = $this->input->post('obat_id');
        $obat_nama      = $this->input->post('obat_nama');
        $obat_id_kategori    = $this->input->post('obat_id_kategori');

        $data           = array('obat_nama'=>$obat_nama,
            'obat_id_kategori'=>$obat_id_kategori,
        );
        $this->Model_Obat->edit($data,$id);
        $response['status'] = 200;
        $response['message'] = "Berhasil Merubah Data";
        echo json_encode($response);
    }
}