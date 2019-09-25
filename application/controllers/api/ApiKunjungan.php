<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 11/05/19
 * Time: 11:48
 */

class ApiKunjungan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Kunjungan');
        $this->load->model('Model_Dokter');
    }

    function index(){
        $respon = null;
        $data = $this->Model_Kunjungan->getByMadrep($this->input->post('kunjungan_id_madrep'))->result();
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
    function getByDokter(){
        $respon = null;
        $dokter = $this->input->post('kunjungan_id_dokter');
        $idDokter = $this->Model_Dokter->getByDokter($dokter)->row_array();
        $data = $this->Model_Kunjungan->getByDokter($idDokter['dokter_id'])->result();
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
        $kunjungan_id_madrep    = $this->input->post('kunjungan_id_madrep');
        $kunjungan_id_dokter    = $this->input->post('kunjungan_id_dokter');
        $kunjungan_obat = $this->input->post('kunjungan_obat');
        if($this->Model_Dokter->getByName($kunjungan_id_dokter)->num_rows()>0){
            $kunjungan_id_dokter = $this->Model_Dokter->getByName($kunjungan_id_dokter)->row_array();
            $kunjungan_cabang    = $this->input->post('kunjungan_cabang');
            $kunjungan_bulan    = date("m");
            $kunjungan_minggu    = date("d");
            if($kunjungan_minggu<=7){
                $kunjungan_minggu = 1;
            }
            else if($kunjungan_minggu >7 && $kunjungan_minggu<=14){
                $kunjungan_minggu = 2;
            }
            else if($kunjungan_minggu >14 && $kunjungan_minggu<=21){
                $kunjungan_minggu = 3;
            }
            else{
                $kunjungan_minggu = 4;
            }
            $kunjungan_latitude    = $this->input->post('kunjungan_latitude');
            $kunjungan_longitude    = $this->input->post('kunjungan_longitude');
            $kunjungan_keterangan    = $this->input->post('kunjungan_keterangan');

            $data           = array(
                'kunjungan_id_madrep'=>$kunjungan_id_madrep,
                'kunjungan_id_dokter'=>$kunjungan_id_dokter['dokter_id'],
                'kunjungan_cabang'=>$kunjungan_cabang,
                'kunjungan_bulan'=>$kunjungan_bulan,
                'kunjungan_minggu'=>$kunjungan_minggu,
                'kunjungan_latitude'=>$kunjungan_latitude,
                'kunjungan_longitude'=>$kunjungan_longitude,
                'kunjungan_keterangan'=>$kunjungan_keterangan,
                'kunjungan_obat'=>$kunjungan_obat
            );
            $this->Model_Kunjungan->set($data);
            $response['status'] = 200;
            $response['message'] = "Berhasil Menambahkan Data";
            echo json_encode($response);
        }
        else{
            $response['status'] = 400;
            $response['message'] = "Dokter Tidak Terdaftar";
            echo json_encode($response);
        }

    }
    function getTotal(){
        $respon = null;
        if($this->input->post('kunjungan_hak_akses') == 'dokter'){
            $dokter = $this->input->post('kunjungan_id_madrep');
            $idDokter = $this->Model_Dokter->getByDokter($dokter)->row_array();
            $data = $this->Model_Kunjungan->getByDokter($idDokter['dokter_id'])->num_rows();
            if ($data){
                $respon ['message'] = $data;
                $respon['status'] = 200;
            }
            else{
                $respon ['message'] = "Gagal Memuat Data";
                $respon['status'] = 500;
            }
        }
        else{
            $data = $this->Model_Kunjungan->getByMadrep($this->input->post('kunjungan_id_madrep'))->num_rows();
            if ($data){
                $respon ['message'] = $data;
                $respon['status'] = 200;
            }
            else{
                $respon ['message'] = "Gagal Memuat Data";
                $respon['status'] = 500;
            }
        }

        echo json_encode($respon);
    }
    function edit()
    {
        $response = null;
        $id = $this->input->post('kunjungan_id');
        $kunjungan_nama      = $this->input->post('kunjungan_nama');
        $kunjungan_id_madrep    = $this->input->post('kunjungan_id_madrep');
        $kunjungan_id_dokter    = $this->input->post('kunjungan_id_dokter');
        $kunjungan_cabang    = $this->input->post('kunjungan_cabang');
        $kunjungan_bulan    = $this->input->post('kunjungan_bulan');
        $kunjungan_minggu    = $this->input->post('kunjungan_minggu');
        $kunjungan_latitude    = $this->input->post('kunjungan_latitude');
        $kunjungan_longitude    = $this->input->post('kunjungan_longitude');
        $kunjungan_keterangan    = $this->input->post('kunjungan_keterangan');

        $data           = array('kunjungan_nama'=>$kunjungan_nama,
            'kunjungan_id_madrep'=>$kunjungan_id_madrep,
            'kunjungan_id_dokter'=>$kunjungan_id_dokter,
            'kunjungan_cabang'=>$kunjungan_cabang,
            'kunjungan_bulan'=>$kunjungan_bulan,
            'kunjungan_minggu'=>$kunjungan_minggu,
            'kunjungan_latitude'=>$kunjungan_latitude,
            'kunjungan_longitude'=>$kunjungan_longitude,
            'kunjungan_keterangan'=>$kunjungan_keterangan,
        );
        $this->Model_Kunjungan->edit($data,$id);
        $response['status'] = 200;
        $response['message'] = "Berhasil Merubah Data";
        echo json_encode($response);
    }

}