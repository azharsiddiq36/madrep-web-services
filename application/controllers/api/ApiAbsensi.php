<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 11/05/19
 * Time: 11:48
 */

class ApiAbsensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Absensi');
        $this->load->model('Model_Dokter');
        $this->load->model('Model_Lokasi_Absen');
    }

    function index(){
        $respon = null;
        $data = $this->Model_Absensi->get_all()->result();
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
        $absensi_id_pengguna    = $this->input->post('absensi_id_pengguna');
        $absensi_kota = $this->input->post('absensi_kota');
        $absensi_latitude    = $this->input->post('absensi_latitude');
        $absensi_longitude    = $this->input->post('absensi_longitude');
        $absensi_tanggal = date("Y-m-d");
        $absensi_jam = date("h:i:sa");
        //$absensi_status    = $this->input->post('absensi_status');
        $absensi_kecamtan    = $this->input->post('absensi_kecamatan');
        $absensi_kelurahan    = $this->input->post('absensi_kelurahan');
        $absensi_jalan    = $this->input->post('absensi_jalan');
        if ($this->Model_Lokasi_Absen->getByStreet($absensi_kelurahan)->num_rows() > 0){
            $data           = array(
                'absensi_id_pengguna'=>$absensi_id_pengguna,
                'absensi_kota'=>$absensi_kota,
                'absensi_latitude'=>$absensi_latitude,
                'absensi_longitude'=>$absensi_longitude,
                'absensi_status'=>"berhasil",
                'absensi_kecamatan'=>$absensi_kecamtan,
                'absensi_kelurahan'=>$absensi_kelurahan,
                'absensi_jam' =>$absensi_jam,
                'absensi_tanggal'=>$absensi_tanggal,
                'absensi_jalan'=>$absensi_jalan
            );
            $this->Model_Absensi->set($data);
            $response['status'] = 200;
            $response['message'] = "Berhasil Melakukan Absen";
        }
        else{
            $response['status'] = 400;
            $response['message'] = "Anda Melakukan Absen Tidak Pada Tempatnya";
        }
        echo json_encode($response);
    }
    function edit()
    {
        $response = null;
        $id = $this->input->post('Absensi_id');
        $Absensi_nama      = $this->input->post('Absensi_nama');
        $Absensi_id_madrep    = $this->input->post('Absensi_id_madrep');
        $Absensi_id_dokter    = $this->input->post('Absensi_id_dokter');
        $Absensi_cabang    = $this->input->post('Absensi_cabang');
        $Absensi_bulan    = $this->input->post('Absensi_bulan');
        $Absensi_minggu    = $this->input->post('Absensi_minggu');
        $Absensi_latitude    = $this->input->post('Absensi_latitude');
        $Absensi_longitude    = $this->input->post('Absensi_longitude');
        $Absensi_keterangan    = $this->input->post('Absensi_keterangan');

        $data           = array('Absensi_nama'=>$Absensi_nama,
            'Absensi_id_madrep'=>$Absensi_id_madrep,
            'Absensi_id_dokter'=>$Absensi_id_dokter,
            'Absensi_cabang'=>$Absensi_cabang,
            'Absensi_bulan'=>$Absensi_bulan,
            'Absensi_minggu'=>$Absensi_minggu,
            'Absensi_latitude'=>$Absensi_latitude,
            'Absensi_longitude'=>$Absensi_longitude,
            'Absensi_keterangan'=>$Absensi_keterangan,
        );
        $this->Model_Absensi->edit($data,$id);
        $response['status'] = 200;
        $response['message'] = "Berhasil Merubah Data";
        echo json_encode($response);
    }
    function getAbsen(){
        $response = null;
        $absensi_id_pengguna    = $this->input->post('absensi_id_pengguna');
        $tanggal = date('Y-m-d');
        if ($this->Model_Absensi->checkAbsenToday($absensi_id_pengguna,$tanggal)->num_rows()>0){
            $response['status'] = 200;
            $response['message'] = "Anda Sudah Melakukan Absen Hari ini";
        }
        else{
            $response['status'] = 400;
            $response['message'] = "Belum Melakukan Absen Hari Ini";
        }
        echo json_encode($response);
    }

}