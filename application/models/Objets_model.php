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