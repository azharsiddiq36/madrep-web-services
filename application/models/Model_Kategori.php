<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 7:07
 */

class Model_Kategori extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function get_all(){
        return $this->db->get('tbl_kategori');
    }

    function set($data){
        $this->db->insert('tbl_kategori',$data);
    }

    function get_one($id)
    {
        $param  =   array('kategori_id'=>$id);
        return $this->db->get_where('tbl_kategori',$param);
    }
    function getByName($id)
    {
        $param  =   array('kategori_nama'=>$id);
        return $this->db->get_where('tbl_kategori',$param);
    }

    function edit($data,$id)
    {
        $this->db->where('kategori_id',$id);
        $this->db->update('tbl_kategori',$data);
    }
    function delete($id)
    {
        $this->db->where('kategori_id',$id);
        $this->db->delete('tbl_kategori');
    }
}
