<?php 

    $title = "Modifier un article";

    $h1 = 'Mofiez cet article et retrouvez le sur la page <span>"Articles"</span>';

    ob_start();

    while($article = $request->fetch()) {

?>
        <form action="?page=modification_article&id=<?=$article['id']?>" method="post" enctype="multipart/form-data">
            <p>
                <label for="img">Miniature</label>
                <input type="file" name="img" id="img">
            </p>
            <p>
                <label for="title" require>Titre</label>
                <input type="text" name="title" id="title" placeholder="Nom de l'article" value="<?= $article['title'] ?>" require>
            </p>
            <p>
                <label for="short_description" require>Déscription courte (Pour l'exposition)</label>
                <textarea name="short_description" id="short_description" placeholder="Dans cet article vous trouverez..." require><?= $article['short_description'] ?></textarea>
            </p>
            <p>
                <label for="description" require>Description</label>
                <textarea name="description" id="description" placeholder="Cet article a été..." class="textarea" require><?= $article['description'] ?></textarea>
            </p>
            <p>
                <button type="submit">Modifier</button>
            </p>
        </form>

<?php 
    }

    $form = ob_get_clean();

    require_once('views/bases/base3.php')

?>