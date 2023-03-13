<?php

    require_once('bdd/bddConnection.php');
    

    function getProjects() {

        $bdd = connection();
        $requete = $bdd->query('SELECT * FROM projects');
        return $requete;
    }



    function addProject($newImgName, $title, $short_description, $description, $language) {
            
            $bdd = connection();
            $request = $bdd->prepare('INSERT INTO projects(img_path, title, short_description, description, languages) VALUES(?, ?, ?, ?, ?)');
            $request->execute([$newImgName, $title, $short_description, $description, $language]);

    }



    function getRightProject($id) {

            $bdd = connection();
            $request = $bdd->prepare('SELECT * FROM projects WHERE id = ?');
            $request->execute([$id]);
            return $request;

    }


    function projectToEdit($id) {

        $bdd = connection();
        $request = $bdd->prepare('SELECT * FROM projects WHERE id = ?');
        $request->execute([$id]);
        return $request;


   
}


    function modifyProject($title, $newImgName,  $short_description, $description, $language, $id) {

        $bdd = connection();
        $request = $bdd->prepare('UPDATE projects SET img_path = ?, title = ?, short_description = ?, description = ?, languages = ? WHERE id = ? ');
        $request->execute([$newImgName, $title, $short_description, $description, $language, $id]);
        
    }



    function deleteProject($id) {
        
        $bdd = connection();
        $request = $bdd->prepare('SELECT img_path FROM projects WHERE id = ?');
        $request->execute([$id]);

        while($img = $request->fetch()) {
            unlink('public/asset/uploads/'. $img['img_path']);
        }
        
        $request = $bdd->prepare('DELETE FROM projects WHERE id = ?');
        $request->execute([$id]);
        $request = $bdd->prepare('DELETE FROM projects_comments WHERE project_id = ?');
        $request->execute([$id]);

    }