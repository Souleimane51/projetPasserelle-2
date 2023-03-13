<?php

    require_once('bdd/bddConnection.php');

        function addUser($pseudo, $email, $password, $password_two) {

            if($password != $password_two) {
                header('location: ?page=inscription&error=1&message= Les mots de passe ne sont pas identique');
                exit();
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header('location: ?page=inscription&error=1&message= Adresse email non valide');
                exit();
            }

            $bdd = connection();
            $request = $bdd->prepare('SELECT COUNT(*) as numberEmail FROM users WHERE email = ?');
            $request->execute([$email]);

            while($emailCheck = $request->fetch()){
        
                if($emailCheck['numberEmail'] != 0) {
                    header('location: ?page=inscription&error=1&message= Adresse email déjà utilisée');
                    exit();
                }
            }

            $password = "654".sha1($password."42d")."gf4";
    
            $secret = sha1($email).time();
            $secret = sha1($secret).time();

            $bdd = connection();
            $request = $bdd->prepare('INSERT INTO users(pseudo, email, password, secret_key) VALUES(?, ?, ?, ?)');
            $request->execute([$pseudo, $email, $password, $secret]);


            $_SESSION['connected'] = 1;
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['secret_key'] = $secret;

            $request = $bdd->prepare('SELECT * FROM users WHERE email = ?');
            $request->execute([$email]);

            while($userInfo = $request->fetch()){

                $_SESSION['id'] = $userInfo['id'];

            }
            header('location: ?page=acceuil&success=1&message= Inscription effectuée avec succés');
            exit();
        
        }

        

        function user_login($email, $password) {

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header('location: ?page=connexion&error=1&message= Adresse email ou mot de passe invalide');
                exit();
            }
    
            $bdd = connection();
            $request = $bdd->prepare('SELECT COUNT(*) as numberEmail FROM users WHERE email = ?');
            $request->execute([$email]);
    
            while($emailCheck = $request->fetch()){
                
                if($emailCheck['numberEmail'] != 1) {
    
                    header('location: ?page=connexion&error=1&message= Adresse email ou mot de passe invalide');
                    exit();
                }
    
            }
    
            $password = "654".sha1($password."42d")."gf4";
    
            $bdd = connection();
            $request = $bdd->prepare('SELECT * FROM users WHERE email = ?');
            $request->execute([$email]);
    
            while($passwordCheck = $request->fetch()){
                
                if($passwordCheck['password'] == $password) {
    
    
                    $_SESSION['connected'] = 1;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $passwordCheck['password'];
                    $_SESSION['pseudo'] = $passwordCheck['pseudo'];
                    $_SESSION['secret'] = $passwordCheck['secret_key'];
                    $_SESSION['id'] = $passwordCheck['id'];
                    
                    header('location: ?page=acceuil?&success=1&message= Vous étes maintenant connecté');
                    exit();
            
                    
                }
                else {
                    header("location: ?page=connexion&error=1&message= Adresse email ou mot de passe invalide");
                    exit();
                }
            }    
        }



        function user_logout() {
            $_SESSION['connected'] = 0;
            unset($_SESSION['pseudo']);
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            unset($_SESSION['id']);
            unset($_SESSION['secret']);

            header('location: ?page=acceuil&success=1&message= Déconnexion effectuée avec succés');
            exit();
        }
