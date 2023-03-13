<?php
session_start();

    require_once('controllers/articlesController.php');
    require_once('controllers/commentsController.php');
    require_once('controllers/projectsController.php');
    require_once('controllers/usersController.php');

    if(isset($_GET['page'])) {
        
        switch($_GET['page']) {

            // Acceuil, inscription, connexion, deconnexion

            case "acceuil":
                home();
                break;

            case "inscription":
                sign_up();
                break; 
                
            case "connexion":
                login();
                break;

            case "deconnexion":
                logout();
                break;


            // Partie projets 

            case "projets";
                projects();
                break;
                
            case "projet";
                getProject();
                break;

            case "nouveau_projet";
                createProject();
                break;

            case "supprimer_projet";
                removeProject();
                break;

            case "modifier_projet";
                selectProject();
                break;

            case "modification_projet";
                editProject();
                break;

            case "commentaire_projet";
                newProjectComment();
                break;

            // Partie article

            case "articles";
                articles();
                break;

            case "article";
                getArticle();
                break;

            case "nouvel_article";
                createArticle();
                break;
                
            case "supprimer_article";
                removeArticle();
                break;

            case "modifier_article";
                selectArticle();
                break;

            case "modification_article";
                editArticle();
                break;

            case "commentaire_article";
                newArticleComment();
                break;

            default:
                home();
                break;
                   
        }
    }
    else {
        home();
    }