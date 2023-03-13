<?php
        
        function connection() {
            try {
                $bdd = new PDO('mysql:host=sql211.epizy.com;dbname=epiz_33783655_portfoliblog;charset=utf8','epiz_33783655','WLxB7tf78ECOB');
                
            }
            catch(Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
            
            return $bdd;
        }

?>
