<?php 
    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Login_model extends CI_Model {
        public function checkLogin($nom, $mdp)
        {
            $sql = "SELECT * FROM utilisateur WHERE nom = '%s' and mdp = '%s'";
            $sql = sprintf($sql, $nom, $mdp);

            $query = $this->db->query($sql);

            $row = $query->row_object();

            return $row;
        }  
        
        public function insertNewUser($nom,$prenom,$mdp,$mail,$tel)
        {
           $sql="insert into User values(null)";
        }
        
    }
?>