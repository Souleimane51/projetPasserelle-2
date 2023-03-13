<?php

    require_once('models/userModel.php');

        function home() {
            require_once('views/homeView.php');
        }


        function sign_up() {
            
            if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_two'])) {

                $pseudo = htmlspecialchars($_POST['pseudo']);
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                $password_two = htmlspecialchars($_POST['password_two']);

                addUser($pseudo, $email, $password, $password_two);
            }
            require_once('views/register/sign_upView.php');
        }



        function login() {
            if(!empty($_POST['email']) && !empty($_POST['password'])) {
                
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);

                user_login($email, $password);

            }
            require_once('views/register/loginView.php');
        }



        function logout() {
            if(isset($_POST['logout'])) {
                user_logout();
            }
            require_once('views/register/logoutView.php');
        }
