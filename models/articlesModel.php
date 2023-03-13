<?php

    require_once('bdd/bddConnection.php');
    

    function getArticles() {

        $bdd = connection();
        $requete = $bdd->query('SELECT * FROM articles');
        return $requete;
    }



    function addArticle($newImgName, $title, $short_description, $description) {
            
            $bdd = connection();
            $request = $bdd->prepare('INSERT INTO articles(img_path, title, short_description, description) VALUES(?, ?, ?, ?)');
            $request->execute([$newImgName, $title, $short_description, $description]);

    }



    function getRightArticle($id) {

            $bdd = connection();
            $request = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
            $request->execute([$id]);
            return $request;

    }


    function articleToEdit($id) {

        $bdd = connection();
        $request = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
        $request->execute([$id]);
        return $request;


   
}


    function modifyArticle($title, $newImgName,  $short_description, $description, $id) {

        $bdd = connection();
        $request = $bdd->prepare('UPDATE articles SET img_path = ?, title = ?, short_description = ?, description = ? WHERE id = ? ');
        $request->execute([$newImgName, $title, $short_description, $description, $id]);
        
    }



    function deleteArticle($id) {

        $bdd = connection();
        $request = $bdd->prepare('SELECT img_path FROM articles WHERE id = ?');
        $request->execute([$id]);

        while($img = $request->fetch()) {
            unlink('public/asset/uploads/'. $img['img_path']);
        }
        
        $bdd = connection();
        $request = $bdd->prepare('DELETE FROM articles WHERE id = ?');
        $request->execute([$id]);
        $request = $bdd->prepare('DELETE FROM articles_comments WHERE article_id = ?');
        $request->execute([$id]);
    }
              