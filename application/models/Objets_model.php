<?php 
    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Objets_model extends CI_Model { 
        
        public function insertNewObjet ($idCategorie,$idUser,$nom,$description,$prix)
        {
            $sql="insert into Objet values(null,%d,%d,'%s','%s',%d)";
            $sql=sprintf($sql,$idCategorie,$idUser,$nom,$description,$prix);
            try {
                $this->db->query($sql);
            } catch (Exception $e) {
               throw new Exception($e->getMessage());
            }
        }
        public function getUserObjet($idUser){
            $sql = "SELECT * FROM objet  where idUser='$idUser'";
            $query = $this->db->query($sql);
            //echo $query;
            //$row = $query->row_object();
            $listes=array();
            $listes= $query->result_array();
            echo $sql;
            return $listes;       
        } 
        public function updateObjet ($idObjet,$idCategorie,$idUser,$nom,$description,$prix)
        {
            $sql="update Objet set idCategorie=%d , idUser=%d ,nom='%s',description='%s',prix=%d where idObjet=%d";
            $sql=sprintf($sql,$idCategorie,$idUser,$nom,$description,$prix,$idObjet);
            try {
               $this->db->query($sql);
            } catch (Exception $th) {
                throw new Exception($th->getMessage());
            }
        }
        public function getUserOb($idObjet)
        { //dpcklc,
           $sql="select u.idUser,u.nom,u.prenom,u.mail,u.tel from objet o join User u on o.idUser=u.idUser where  o.idObjet=%d";
           $sql=sprintf($sql,$idObjet);  
           $query=$this->db->query($sql);
           $liste=$query->row_array();
           return $liste;                                                                                       
        }
        public function supprimerObjet($idObjet)
        {
            try {
                $this->db->query("DELETE FROM objet where idObjet='$idObjet'");
    
                } catch (\Throwable $th) {
                    throw $th;
                }
        }
    }
?>