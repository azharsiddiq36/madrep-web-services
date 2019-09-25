<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 7:07
 */

class Model_Lokasi_Absen extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function get_all(){
        $this->db->select('*');
        $this->db->from('tbl_lokasi_absen');
        $query = $this->db->get();
        return $query;
    }

    function set($data){
        $this->db->insert('tbl_lokasi_absen',$data);
    }

    function get_one($id)
    {
        $param  =   array('lokasi_id'=>$id);
        return $this->db->get_where('tbl_lokasi_absen',$param);
    }
    function getByStreet($id)
    {
        $param  =   array('lokasi_nama'=>$id);
        return $this->db->get_where('tbl_lokasi_absen',$param);
    }

    function edit($data,$id)
    {
        $this->db->where('lokasi_id',$id);
        $this->db->update('tbl_lokasi_absen',$data);
    }
    function delete($id)
    {
        $this->db->where('lokasi_id',$id);
        $this->db->delete('tbl_lokasi_absen');
    }
}
