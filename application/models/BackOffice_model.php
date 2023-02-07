<?php
    if (! defined('BASEPATH')) exit('No direct script access allowed');
    class BackOffice_model extends CI_Model 
    {
        public function insertNewCategorie ($new)
        {
           $sql="insert into Categorie values (null,%s)";
           $sql=sprintf($sql,$this->db->escape($new));
           try {
            $this->db->query($sql);
           } catch (Exception $e) {
            throw new Exception($e->getMessage());
           }
        }   
        
        public function supprimerCategorie($idCategorie){
            try {
            $this->db->query("DELETE FROM categorie where idCategorie='$idCategorie'");

            } catch (\Throwable $th) {
                throw $th;
            }
        }  
        public function modifierCategorie($idCategorie,$newCategorie)
        {
           $sql="update Categorie set nom= '%s' where idCategorie=%d";
           $sql=sprintf($sql,$newCategorie,$idCategorie);
           try {
           $this->db->query($sql);
           } catch (Exception $e) {
            throw new Exception($e->getMessage());
           }
        }    
    }
    


    

     
     
    
?>