<?php 

    $title = "Créer un projet";

    $h1 = 'Ajouter un projet un que vous pourrez retrouve sur la page <span>"Projets"</span>';

    ob_start();

?>
    <form action="?page=nouveau_projet" method="post" enctype="multipart/form-data">
        <p>
            <label for="img">Miniature</label>
            <input type="file" name="img" id="img">
        </p>
        <p>
            <label for="title" require>Titre</label>
            <input type="text" name="title" id="title" placeholder="Nom du projet" require>
        </p>
        <p>
            <label for="short_description" require>Déscription courte (Pour l'exposition sur la page "Projets")</label>
            <textarea name="short_description" id="short_description" placeholder="Dans ce projet vous trouverez..." require></textarea>
        </p>
        <p>
            <label for="description" require>Description</label>
            <textarea name="description" id="description" placeholder="Ce projet a été..." class="textarea" require></textarea>
        </p>
        <p>
            <label for="language" require>Langue de programmation utilisé</label>
            <textarea name="language" id="language" placeholder="Ce projet utile les languages suivant..." class="textarea" require></textarea>
        </p>
        <p>
            <button type="submit" name="submit">Créer</button>
        </p>
    </form>

<?php 

    $form = ob_get_clean();

    require_once('views/bases/base3.php')

?>