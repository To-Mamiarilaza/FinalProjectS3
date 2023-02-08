<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
class FrontOffice_model extends CI_Model
{
    public function getSpecifiqueObjet($nom,$idCategorie,$idUser)
    {
        $sql="select * from Objet where nom like '%".$nom."%' and idCategorie=".$idCategorie." and idUser !=".$idUser;
        $query=$this->db->query($sql);
        $liste=array();
        foreach($query->result_array() as $row){
         $liste[]=$row;
        }
        return $liste;
        //return $sql;
    }

    

    public function getNomUser($idUser)
    { 
        
        $sql="select prenom from user where  idUser=%d";
        $sql=sprintf($sql,$idUser);  
       $query=$this->db->query($sql);
       $liste=$query->row_array();
        //var_dump($liste);
       return $liste['prenom'];                                                                                       
    }


    public function historique($idObjet)
    {
       $sql="select * from Echange where idObjetDemande=%d or idObjetEchange=%d and EtatEchange=1 and dateHeureAccepte is not null ";
       $sql=sprintf($sql,$idObjet,$idObjet);
      // echo $sql;
       $query=$this->db->query($sql);
       $liste=array();
       foreach($query->result_array() as $row){
        $liste[]=$row;
       }
       return $liste;
    }
}

?>