<?php 
    if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Login_model extends CI_Model {
        public function checkLoginUser($mail, $mdp)
        {
            $sql = "SELECT * FROM User WHERE mail = '%s' and mdp = '%s'";
            $sql = sprintf($sql, $mail, $mdp);

            $query = $this->db->query($sql);

            $row = $query->row_object();

            return $row;
        }   

        public function checkLoginAdmin($nom, $mdp)
        {
            $sql = "SELECT * FROM Admin WHERE nom = '%s' and mdp = '%s'";
            $sql = sprintf($sql, $nom, $mdp);

            $query = $this->db->query($sql);

            $row = $query->row_object();

            return $row;
        }  
        
        public function insertNewUser($nom,$prenom,$mdp,$mail,$tel)
        {
           $sql="insert into User values(null,'%s','%s','%s','%s','%s')";
           $sql=sprintf($sql,$nom,$prenom,$mdp,$mail,$tel);
           try {
           $this->db->query($sql);
           } catch (Exception $e) {
            throw new Exception($e->getMessage());
           }
        }
        
    }
?>