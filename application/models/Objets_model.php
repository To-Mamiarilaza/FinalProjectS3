<?php 
    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Objets_model extends CI_Model { 
        
        public function insertNewObjet ($idCategorie,$idUser,$nom,$description,$prix)
        {
            $sql="insert into Objet values(null,%d,%d,'%s','%s',%d)";
            $sql=sprintf($sql,$idCategorie,$idUser,$nom, $this->db->escape_str($description),$prix);
            try {
                $this->db->query($sql);
            } catch (Exception $e) {
               throw new Exception($e->getMessage());
            }
        }

        public function getObjet($idObjet)
        {
            $sql = "SELECT * FROM Objet  where idObjet=%d";
            $sql = sprintf($sql, $idObjet);

            $query = $this->db->query($sql);

            $objet = $query->row_array();

            return $objet;
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
            $sql=sprintf($sql,$idCategorie,$idUser,$nom,$this->db->escape_str($description),$prix,$idObjet);
            try {
               $this->db->query($sql);
            } catch (Exception $th) {
                throw new Exception($th->getMessage());
            }
        }

        public function getUserOb($idObjet)
        { //dpcklc,
           $sql="select u.idUser,u.nom,u.prenom,u.mail,u.tel from Objet o join User u on o.idUser=u.idUser where  o.idObjet=%d";
           $sql=sprintf($sql,$idObjet);  
           $query=$this->db->query($sql);
           $liste=$query->row_array();
           return $liste;                                                                                       
        }

        public function supprimerObjet($idObjet)
        {
            try {
                $this->db->query("DELETE FROM Photo where idObjet='$idObjet'");
                $this->db->query("DELETE FROM Echange where idObjetDemande='$idObjet' or idObjetEchange='$idObjet'");
                $this->db->query("DELETE FROM Objet where idObjet='$idObjet'");
                } catch (\Throwable $th) {
                    throw $th;
                }
        }      

    // Traitement Photo
    function getAllPhoto() {
        $sql = "select * from Photo order by idPhoto desc";
        $query = $this->db->query($sql);
        $photo = array();
        foreach ($query->result_array() as $row) {
            $photo[] = $row;
        }
        return $photo;
    }

    function getPhoto($idObjet) {
        $sql = "select * from Photo where idObjet = %d";
        $sql = sprintf($sql, $idObjet);
        $query = $this->db->query($sql);
        $photo = array();
        foreach ($query->result_array() as $row) {
            $photo[] = $row;
        }
        return $photo;
    }

    function insertNewPhoto($photoName, $idObjet) {
        // Inserer la nouvelle photo dans la base de donnees
        $sql = "insert into Photo values (null, %d, '%s')";
        $sql = sprintf($sql, $idObjet, $photoName);
        $this->db->query($sql);
    }
}
?>