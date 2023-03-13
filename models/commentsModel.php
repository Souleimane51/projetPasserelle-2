<?php

    require_once('bdd/bddConnection.php');

    function getProjectsComments($project_id) {

        $bdd = connection();
        $request2 = $bdd->prepare("SELECT * FROM projects_comments WHERE project_id = ? ORDER BY id DESC");
        $request2->execute([$project_id]);
        return $request2;

    }


    function getArticlesComments($project_id) {

        $bdd = connection();
        $request2 = $bdd->prepare("SELECT * FROM articles_comments WHERE article_id = ? ORDER BY id DESC");
        $request2->execute([$project_id]);
        return $request2;

    }

    

    function addProjectComment($comment, $id) {
            
        $bdd = connection();
        $request = $bdd->prepare('INSERT INTO projects_comments(content, project_id, user_id, pseudo) VALUES(?, ?, ?, ?)');
        $request->execute([$comment, $id, $_SESSION['id'], $_SESSION['pseudo']]);
        

    }


    function addArticleComment($comment, $id) {
            
        $bdd = connection();
        $request = $bdd->prepare('INSERT INTO articles_comments(content, article_id, user_id, pseudo) VALUES(?, ?, ?, ?)');
        $request->execute([$comment, $id, $_SESSION['id'], $_SESSION['pseudo']]);
        

    }