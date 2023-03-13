<?php

require_once('models/articlesModel.php');





    function articles() {
        $requete = getarticles();
        require_once('views/articles/articlesView.php');
    }






    function createArticle() {
        if($_SESSION['id'] === 2 && $_SESSION['secret'] === '9ae7da67ae5dcba824b5c9e368cce275a5f63d0f1678179464' && $_SESSION['email'] === 'admin@admin.admin' && $_SESSION['password'] === '6544fb338e53de7b6b75d18fc7e3178d4992710ba54gf4') {
          if(isset($_POST['submit'])) {
              if(!empty($_POST['title']) && !empty($_POST['short_description']) && !empty($_POST['description'])) {

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

                    addArticle($newImgName, $title, $short_description, $description);

                    header('location: ?page=articles&success=1&message= Article ajouté avec succés');
                    exit();
        
                    
                }
                elseif(empty($_POST['title']) || empty($_POST['short_description']) || empty($_POST['description'])) {
                    header('location: ?page=nouvel_article&error=1&message= Veillez remplire tout les champs de Texte');
                    exit();
                }
          }
        }
        else {
            header("location: ?page=acceuil&error=1&message= Vous devez être l'administrateur de ce site pour pouvoir ajouter un article");
            exit();
        }
        require_once('views/articles/newArticleView.php');
    }





    function getArticle() {

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $request = getRightArticle($id);
            $request2 = getArticlesComments($id);
            require('views/articles/articleView.php');
        }
    }





 
    function selectArticle() {

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $request = articleToEdit($id);
            require('views/articles/editarticleView.php');
        }
    }






    function editArticle() {
      if(!empty($_POST['title']) && !empty($_POST['short_description']) && !empty($_POST['description']) && !empty(($_GET['id']))) {

        $title = htmlspecialchars($_POST['title']);
        $short_description = htmlspecialchars($_POST['short_description']);
        $description = htmlspecialchars($_POST['description']);
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
                    header('location: ?page=article&id='.$id.'&error=1&message= Type de fichier non valide');
                    exit();
                }
            }
            else {
                header('location: ?page=article&id='.$id.'&error=1&message= Image trop volumineuse');
                exit();
            }
        }
        else {
            $newImgName = time().rand().rand().'.jpg';
            copy('public/asset/article.jpg', 'public/asset/uploads/'.$newImgName);
        }
    }
        

        $request = modifyArticle($title, $newImgName, $short_description, $description, $id);
        
        header('location: ?page=article&id='.$id.'&success=1&message=Article modifié avec succés');
        exit();
        require('views/projects/editProjectView.php');
         
        
            
    }




       
       



    function removeArticle() {

        $id = $_GET['id'];
        deleteArticle($id);
        header('location: ?page=articles&success=1&message= Article supprimé avec succés');
        exit();   
        require('views/articles/articlesView.php');
    }
        


