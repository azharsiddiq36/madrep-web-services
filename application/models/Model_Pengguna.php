<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 7:07
 */

class Model_Pengguna extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function get_all(){
        return $this->db->get('tbl_pengguna');
    }

    function set($data){
        $this->db->insert('tbl_pengguna',$data);
    }
    function get_one($id)
    {
        $param  =   array('pengguna_id'=>$id);
        return $this->db->get_where('tbl_pengguna',$param);
    }
    function get_username($id)
    {
        $param  =   array('pengguna_username'=>$id);
        return $this->db->get_where('tbl_pengguna',$param);
    }

    function edit($data,$id)
    {
        $this->db->where('pengguna_id',$id);
        $this->db->update('tbl_pengguna',$data);
    }
    function delete($id)
    {
        $this->db->where('pengguna_id',$id);
        $this->db->delete('tbl_pengguna');
    }

    function login($params){
        $this->db->where($params);
        $this->db->from('tbl_pengguna');
        return  $this->db->get();
    }
}
