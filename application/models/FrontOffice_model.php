<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
class FrontOffice_model extends CI_Model
{
    public function getSpecifiqueObjet($nom,$idCategorie)
    {
        $sql="select * from Objet where nom like '%".$nom."%' and idCategorie="."$idCategorie";
        $query=$this->db->query($sql);
        $liste=array();
        foreach($query->result_array() as $row){
         $liste[]=$row;
        }
        return $liste;
        
    }
}

?>