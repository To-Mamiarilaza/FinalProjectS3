<?php 
    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Objets_model extends CI_Model { 
        
        public function insertNewObjet ($idCategorie,$idUser,$nom,$description)
        {
            $sql="insert into Objet values(null,%d,%d,'%s','%s')";
            $sql=sprintf($sql,$idCategorie,$idUser,$nom,$description);
            try {
                $this->db->query($sql);
            } catch (Exception $e) {
               throw new Exception($e->getMessage());
            }
        }
        
        public function getUserObjet($idUser){
            $sql = "SELECT * FROM Objet  where idUser='$idUser'";
            $query = $this->db->query($sql);
            
            $listes=array();

            if($query !== FALSE && $query->num_rows() > 0){
                foreach ($query->result_array() as $row) {
                    $listes[] = $row;
                }
            }

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