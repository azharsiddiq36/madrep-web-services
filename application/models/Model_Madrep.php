<?php
/**
 * Created by PhpStorm.
 * User: azhar
 * Date: 14/02/19
 * Time: 7:07
 */

class Model_Madrep extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function get_all(){
        return $this->db->get('tbl_madrep');
    }


    function set($data){
        $this->db->insert('tbl_madrep',$data);
    }

    function get_one($id)
    {
        $param  =   array('madrep_id'=>$id);
        return $this->db->get_where('tbl_madrep',$param);
    }
    function getByIdPengguna($id)
    {
        $param  =   array('madrep_id_pengguna'=>$id);
        return $this->db->get_where('tbl_madrep',$param);
    }

    function edit($data,$id)
    {
        $this->db->where('madrep_id',$id);
        $this->db->update('tbl_madrep',$data);
    }
    function delete($id)
    {
        $this->db->where('madrep_id',$id);
        $this->db->delete('tbl_madrep');
    }
}
