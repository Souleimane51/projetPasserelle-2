<?php 

    $title = "Créer un article";

    $h1 = 'Ajouter un article un que vous pourrez retrouve sur la page <span>"Article"</span>';

    ob_start();

?>
    <form action="?page=nouvel_article" method="post" enctype="multipart/form-data">
        <p>
            <label for="img">Miniature</label>
            <input type="file" name="img" id="img">
        </p>
        <p>
            <label for="title" require>Titre</label>
            <input type="text" name="title" id="title" placeholder="Nom de l'article" require>
        </p>
        <p>
            <label for="short_description" require>Déscription courte (Pour l'exposition sur la page "Articles")</label>
            <textarea name="short_description" id="short_description" placeholder="Dans cet article vous trouverez..." require></textarea>
        </p>
        <p>
            <label for="description" require>Description</label>
            <textarea name="description" id="description" placeholder="Cet article a été..." class="textarea" require></textarea>
        </p>
        <p>
            <button type="submit" name="submit">Créer</button>
        </p>
    </form>

<?php 

    $form = ob_get_clean();

    require_once('views/bases/base3.php')

?>