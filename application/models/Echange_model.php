<?php 
    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Echange_model extends CI_Model {  
        public function getUserObjet($idUser){
            $sql = "SELECT * FROM objet  where idUser='$idUser'";
            $query = $this->db->query($sql);
            //echo $query;
            //$row = $query->row_object();
            $listes=array();
            $listes[]= $query->result_array();
            echo $sql;
            return $listes;       
        } 

        public function getAllObjet(){
            $sql = "SELECT * FROM objet";
            $query=$this->db->query($sql);
            $liste=array();
           foreach($query->result_array() as $row){
             $liste[]=$row;
           }
            return $liste;       
        } 
        public function getObjet($idObjet)
        {
            $sql = "SELECT * FROM Objet where idObjet=%d";
            $sql=sprintf($sql,$idObjet);
            $query = $this->db->query($sql);
            $liste=array();
            foreach($query->result_array() as $row){
                $liste[]=$row;
              }
            return $liste;
        }
        public function demanderEchange($idObjetDemande,$idObjetEchange,$idRecepteur,$idReceveur)
        {
           $sql="insert into Echange values (null,%d,%d,0,now(),null,%d,%d)";
           $sql=sprintf($sql,$idObjetDemande,$idObjetEchange,$idRecepteur,$idReceveur);
           try {
            $this->db->query($sql);
           } catch (Exception $th) {
            throw new Exception($th->getMessage());
           }
        }

        public function getPropositionRecu($idRecepteur)
        {
           $sql="select idObjetDemande,idObjetEchange,idEnvoyeur from Echange where idRecepteur=%d";
           $sql=sprintf($sql,$idRecepteur);
           $query = $this->db->query($sql);
           $liste=array();
           foreach($query->result_array() as $row){
            $liste[]=$row;
          }
          return $liste;
        }
        public function accepterProposition($idProposition)
        {
            try {
                $sql="UPDATE echange SET EtatEchange=1  WHERE idEchange= %d";
                $sql=sprintf($sql,$this->db->escape($idProposition));
                $this->db->query($sql);
                echo $this->db->affected_rows();
                echo $sql;
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());
                   }
        }

        
        public function refuserProposition($idProposition)
        {
            try {
                $sql="UPDATE echange SET EtatEchange=-1  WHERE idEchange= %d";
                $sql=sprintf($sql,$this->db->escape($idProposition));
                $this->db->query($sql);
                echo $this->db->affected_rows();
                echo $sql;
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());
                   }
        }
    }
?>
