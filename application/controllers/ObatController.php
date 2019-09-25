<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 7:19
 */

class ObatController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_Obat');
        $this->load->model('Model_Kategori');
        $this->load->model('Model_Pengguna');
        $this->load->helper('form');
        $this->load->library('upload');

        /*chek_session();*/
    }
    function index(){
        $data ['record'] = $this->Model_Obat->get_all();
        $this->template->load('template','obat/index.php',$data);
    }

    function post()
    {

        if(isset($_POST['submit'])) {
            $config['upload_path'] = './assets/images';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 204800;
            $this->upload->initialize($config);
            if ( !$this->upload->do_upload('obat_foto')){
                $error = array('error' => $this->upload->display_errors());
                echo $error;
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
                $obat_id_kategori = $this->input->post('obat_id_kategori');
                $obat_rincian = $this->input->post('obat_rincian');
                $data           = array('obat_nama'=>$obat_nama,
                    'obat_rincian'=>$obat_rincian,
                    'obat_id_kategori'=>$obat_id_kategori,
                    'obat_foto'=>$foto
                );
                $this->Model_Obat->set($data);
                redirect('daftar_obat');
            }
        }
        else{
            $data['record'] = $this->Model_Kategori->get_all();
            $this->template->load('template','obat/form_input.php',$data);
        }
    }
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->Model_Obat->delete($id);
        redirect('daftar_obat');
    }
//    function hapus($id){
//        $where = array('id_Obat' => $id);
//        $this->Model_Obat->hapus_data($where,'Obat');
//        redirect('Obat');
//    }
    function edit()
    {
        if(isset($_POST['submit'])) {
            $id = $this->uri->segment(2);
            $obat_nama = $this->input->post('obat_nama');
            $obat_id_kategori = $this->input->post('obat_id_kategori');
            $obat_rincian = $this->input->post('obat_rincian');
            $config['upload_path'] = './assets/images';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 204800;
            $this->upload->initialize($config);
            $data = null;
            if (!$this->upload->do_upload('obat_foto')) {
                $data = array('obat_nama' => $obat_nama,
                    'obat_rincian' => $obat_rincian,
                    'obat_id_kategori' => $obat_id_kategori,
                );
            } else {
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/' . $this->upload->data('file_name');
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['width'] = 1024;
                $config['height'] = 768;
                $config['new_image'] = './assets/images/' . $this->upload->data('file_name');
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $foto = 'assets/images/' . $this->upload->data('file_name');
                $data = array('obat_nama' => $obat_nama,
                    'obat_rincian' => $obat_rincian,
                    'obat_id_kategori' => $obat_id_kategori,
                    'obat_foto' => $foto
                );
            }
            $this->Model_Obat->edit($data, $id);
            redirect('daftar_obat');
        }
        else{
            $id=  $this->uri->segment(2);
            $data['record']     =  $this->Model_Obat->get_one($id)->row_array();
            $data['kategori'] = $this->Model_Kategori->get_all();
            $this->template->load('template','obat/form_edit',$data);
        }
    }
    function rincian(){
        $id = $this->uri->segment(2);
        $data['record'] =  $this->Model_Obat->get_one($id)->row_array();
        $this->template->load('template','obat/rincian',$data);
    }
}