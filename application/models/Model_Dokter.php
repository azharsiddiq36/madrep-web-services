<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 7:07
 */

class Model_Dokter extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function get_all(){
        $this->db->select('*');
        $this->db->from('tbl_dokter');
        $this->db->order_by('dokter_nama', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    function set($data){
        $this->db->insert('tbl_dokter',$data);
    }

    function get_one($id)
    {
        $param  =   array('dokter_id'=>$id);
        return $this->db->get_where('tbl_dokter',$param);
    }
    function getByName($id)
    {
        $param  =   array('dokter_nama'=>$id);
        return $this->db->get_where('tbl_dokter',$param);
    }
    function getByDokter($id)
    {
        $param  =   array('dokter_id_pengguna'=>$id);
        return $this->db->get_where('tbl_dokter',$param);
    }

    function edit($data,$id)
    {
        $this->db->where('dokter_id',$id);
        $this->db->update('tbl_dokter',$data);
    }
    function delete($id)
    {
        $this->db->where('dokter_id',$id);
        $this->db->delete('tbl_dokter');
    }
}
