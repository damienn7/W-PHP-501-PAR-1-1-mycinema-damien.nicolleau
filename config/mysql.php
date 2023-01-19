<?php 
            try {
                $db = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8','damien','PETITnuage-26');
            } catch (Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
?>