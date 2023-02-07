<?php 
    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class BackOffice_model extends CI_Model {  
        public function supprimerCategorie($idCategorie){
            try {
            $this->db->query("DELETE FROM categorie where idCategorie='$idCategorie'");

            } catch (\Throwable $th) {
                throw $th;
            }
        } 
    }
?>