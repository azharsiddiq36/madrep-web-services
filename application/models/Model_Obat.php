<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 7:07
 */

class Model_Obat extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function get_all(){
        $this->db->select('*');
        $this->db->from('tbl_obat');
        $this->db->join('tbl_kategori', 'tbl_kategori.kategori_id = tbl_obat.obat_id_kategori');
        $this->db->order_by('obat_nama', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    function set($data){
        $this->db->insert('tbl_obat',$data);
    }

    function get_one($id)
    {
        $param  =   array('obat_id'=>$id);
        return $this->db->get_where('tbl_obat',$param);
    }

    function edit($data,$id)
    {
        $this->db->where('obat_id',$id);
        $this->db->update('tbl_obat',$data);
    }
    function delete($id)
    {
        $this->db->where('obat_id',$id);
        $this->db->delete('tbl_obat');
    }
}
