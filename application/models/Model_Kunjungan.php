<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 7:07
 */

class Model_Kunjungan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function get_all(){
        return $this->db->get('tbl_kunjungan');
    }
    function get_Join(){
        $this->db->select('*');
        $this->db->from('tbl_kunjungan');
        $this->db->join('tbl_madrep', 'tbl_madrep.madrep_id_pengguna = tbl_kunjungan.kunjungan_id_madrep');
        $this->db->join('tbl_dokter', 'tbl_dokter.dokter_id = tbl_kunjungan.kunjungan_id_dokter');
        $query = $this->db->get();
        return $query;
    }

    function set($data){
        $this->db->insert('tbl_kunjungan',$data);
    }
    function getByMadrep($id){
        $this->db->select('*');
        $this->db->from('tbl_kunjungan');
        $this->db->join('tbl_dokter', 'tbl_kunjungan.kunjungan_id_dokter = tbl_dokter.dokter_id');
        $this->db->where('kunjungan_id_madrep',$id);
        $this->db->order_by('kunjungan_id', 'DESC');
        $query = $this->db->get();
        return $query;
    }
    function getByDokter($id){
        $this->db->select('*');
        $this->db->from('tbl_kunjungan');
        $this->db->join('tbl_dokter', 'tbl_kunjungan.kunjungan_id_dokter = tbl_dokter.dokter_id');
        $this->db->where('kunjungan_id_dokter',$id);
        $this->db->order_by('kunjungan_id', 'DESC');
        $query = $this->db->get();
        return $query;
    }
    function get_one($id)
    {
        $param  =   array('kunjungan_id'=>$id);
        return $this->db->get_where('tbl_kunjungan',$param);
    }

    function edit($data,$id)
    {
        $this->db->where('kunjungan_id',$id);
        $this->db->update('tbl_kunjungan',$data);
    }
    function delete($id)
    {
        $this->db->where('kunjungan_id',$id);
        $this->db->delete('tbl_kunjungan');
    }
}
