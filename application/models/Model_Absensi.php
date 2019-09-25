<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 7:07
 */

class Model_Absensi extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function get_all(){
        $this->db->select('*');
        $this->db->from('tbl_absensi');
        $this->db->order_by('absensi_id', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    function set($data){
        $this->db->insert('tbl_absensi',$data);
    }

    function get_one($id)
    {
        $param  =   array('absensi_id'=>$id);
        return $this->db->get_where('tbl_absensi',$param);
    }
    function checkAbsenToday($id,$tanggal){
        $this->db->select('*');
        $this->db->from('tbl_absensi');
        $this->db->where('absensi_id_pengguna',$id);
        $this->db->where('absensi_tanggal',$tanggal);
        $query = $this->db->get();
        return $query;
    }

    function edit($data,$id)
    {
        $this->db->where('absensi_id',$id);
        $this->db->update('tbl_absensi',$data);
    }
    function delete($id)
    {
        $this->db->where('absensi_id',$id);
        $this->db->delete('tbl_absensi');
    }
}
