<?php

    require_once('models/projectsModel.php');



    function projects() {
        $requete = getProjects();
        require_once('views/projects/projectsView.php');
    }


    


    function createProject() {
        if($_SESSION['id'] === 2 && $_SESSION['secret'] === '9ae7da67ae5dcba824b5c9e368cce275a5f63d0f1678179464' && $_SESSION['email'] === 'admin@admin.admin' && $_SESSION['password'] === '6544fb338e53de7b6b75d18fc7e3178d4992710ba54gf4') {
            if(isset($_POST['submit'])) {
                if(!empty($_POST['title']) && !empty($_POST['short_description']) && !empty($_POST['description']) && !empty($_POST['language'])) {

                    if(!empty($_FILES['img']) && $_FILES['img']['error'] === 0) {
                    
                        $img = $_FILES['img'];

                        if ($img['size'] <= 3000000) {
                            
                            $imgInfo = pathinfo($img['name']);
                            $imgExts = $imgInfo['extension'];
                            $extsAllowed = ['png', 'PNG', 'gif', 'GIF', 'jpg', 'JPG', 'jpeg', 'JPEG', 'svg', 'SVG', 'jfif', 'JFIF'];
                
                            if(in_array($imgExts, $extsAllowed)) {
                
                                $newImgName = time().rand().rand().'.'.$imgExts;
                                move_uploaded_file($img['tmp_name'], 'public/asset/uploads/'.$newImgName);
                            }
                            else {
                                header('location: ?page=nouveau_projet&error=1&message= Type de fichier non valide');
                                exit();
                            }
                        }
                        else {
                            header('location: ?page=nouveau_projet&error=1&message= Image trop volumineuse');
                            exit();
                        }
                    }
                    else {
                        $newImgName = time().rand().rand().'.jpg';
                        copy('public/asset/article.jpg', 'public/asset/uploads/'.$newImgName);
                    }  
                    
                    $title = htmlspecialchars($_POST['title']);
                    $short_description = htmlspecialchars($_POST['short_description']);
                    $description = htmlspecialchars($_POST['description']);
                    $language = htmlspecialchars($_POST['language']);
                    
                    addProject($newImgName, $title, $short_description, $description, $language);
                    
                    header('location: ?page=projets&success=1&message= Projet ajouté avec succés');
                    exit();
                }
                else {
                    header('location: ?page=nouveau_projet&error=1&message= Veuillez rempire tout les champs de Texte');
                    exit();
                }
            }
        }
        else {
            header("location: ?page=acceuil&error=1&message= Vous devez être l'administrateur de se site pour pouvoir ajouter un projet");
            exit();
        } 
        
        require_once('views/projects/newProjectView.php');
    }





    function getProject() {

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $request = getRightProject($id);
            $request2 = getProjectsComments($id);
            require('views/projects/projectView.php');
        }
    }




 
    function selectProject() {

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $request = projectToEdit($id);
            require('views/projects/editProjectView.php');
        }
    }





    function editProject() {

        if(!empty($_POST['title']) && !empty($_POST['short_description']) && !empty($_POST['description']) && !empty($_POST['language']) && !empty(($_GET['id']))) {

            $title = htmlspecialchars($_POST['title']);
            $short_description = htmlspecialchars($_POST['short_description']);
            $description = htmlspecialchars($_POST['description']);
            $language = htmlspecialchars($_POST['language']);
            $id = $_GET['id'];


            if(!empty($_FILES['img']) && $_FILES['img']['error'] === 0) {
                $img = $_FILES['img'];

                if ($img['size'] <= 3000000) {
                    
                    $imgInfo = pathinfo($img['name']);
                    $imgExts = $imgInfo['extension'];
                    $extsAllowed = ['png', 'PNG', 'gif', 'GIF', 'jpg', 'JPG', 'jpeg', 'JPEG', 'svg', 'SVG', 'jfif', 'JFIF'];
        
                    if(in_array($imgExts, $extsAllowed)) {
        
                        $newImgName = time().rand().rand().'.'.$imgExts;
                        move_uploaded_file($img['tmp_name'], 'public/asset/uploads/'.$newImgName);
                    }
                    else {
                        header('location: ?page=projet&id='.$id.'&error=1&message= Type de fichier non valide');
                        exit();
                    }
                }
                else {
                    header('location: ?page=projet&id='.$id.'&error=1&message= Image trop volumineuse');
                    exit();
                }
            }
            else {
                $newImgName = time().rand().rand().'.jpg';
                copy('public/asset/article.jpg', 'public/asset/uploads/'.$newImgName);
            }
        }
            

            $request = modifyProject($title, $newImgName, $short_description, $description, $language, $id);
            
            header('location: ?page=projet&id='.$id.'&success=1&message=Projet modifié avec succés');
            exit();
            require('views/projects/editProjectView.php');
             
            
    }
       
       



    function removeProject() {

        $id = $_GET['id'];
        deleteProject($id);
        header('location: ?page=projets&success=1&message= Projet supprimé avec succés');
        exit();   
        require('views/projects/projectsView.php');
    }
        
