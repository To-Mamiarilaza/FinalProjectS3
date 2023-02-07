<?php
    if (! defined('BASEPATH')) exit('No direct script access allowed');
    class BackOffice_model extends CI_Model 
    {

        public function getAllCategories(){
            $sql = "SELECT * FROM Categorie";
            $query=$this->db->query($sql);
            $liste=array();
           foreach($query->result_array() as $row){
             $liste[]=$row;
           }
            return $liste;
        } 

        public function getCategorie($idCategorie){
            $sql = "SELECT * FROM Categorie WHERE idCategorie = %d";
            $sql = sprintf($sql, $idCategorie);
            $query= $this->db->query($sql);
            $liste= $query->row_array();
            return $liste;
        } 

        public function insertNewCategorie ($new)
        {
           $sql="insert into Categorie values (null,%s)";
           $sql=sprintf($sql,$this->db->escape($new));
           try {
            $this->db->query($sql);
           } catch (Exception $e) {
            throw $e;
           }
        }   
        
        public function supprimerCategorie($idCategorie){
            $this->db->query("DELETE FROM Categorie where idCategorie='$idCategorie'");
        }  
        
        public function modifierCategorie($idCategorie,$newCategorie)
        {
           $sql="update Categorie set nom= '%s' where idCategorie=%d";
           $sql=sprintf($sql,$newCategorie,$idCategorie);
           try {
           $this->db->query($sql);
           } catch (Exception $e) {
            throw $e;
           }
        }
        
        public function getNumberUser()
        {
           $sql="select count(*) from User";
           $query=$this->db->query($sql);
           $row=$query->row_array();
           return $row['count(*)'];
        }

        public function getNumberEchange()
        {
           $sql="select count(*) from Echange";
           $query=$this->db->query($sql);
           $row=$query->row_array();
           return $row['count(*)'];
        }
    }
    


    

     
     
    
?>