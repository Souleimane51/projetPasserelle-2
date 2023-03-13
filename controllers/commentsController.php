<?php

    require_once('models/commentsModel.php');

        function newProjectComment() {
            if(!empty($_POST['comment'])) { 

                $id = $_GET['id'];

                if(isset($_SESSION['id'])) {
                    $comment = $_POST['comment'];
                    addProjectComment($comment, $id);
                    header('location: ?page=projet&id='.$id.'&success=1&message= Commentaire ajouté avec succés');
                    exit();
                }
                else {
                    header('location: ?page=projet&id='.$id.'&error=1&message= Vous devez être connecté pour pouvoir ajouter un commentaire');
                    exit();
                }
                

            }
        }

        function newArticleComment() {

            if(!empty($_POST['comment'])) { 

                $id = $_GET['id'];

                if(isset($_SESSION['id'])) {
                    $comment = $_POST['comment'];
                    addArticleComment($comment, $id);
                    header('location: ?page=article&id='.$id.'&success=1&message= Commentaire ajouté avec succés');
                    exit();
                }
                else {
                    header('location: ?page=article&id='.$id.'&error=1&message= Vous devez être connecté pour pouvoir ajouter un commentaire');
                    exit();
                }

            }
        }




        // function displayComments() {
            
        //     $project_id = $_GET['id'];
        //     $request2 = getComments($project_id);
        //     require('views/projects/projectView.php');
        // }
    
