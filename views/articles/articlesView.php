<?php 

    $title = 'Articles';

    ob_start();
?>
    <ul class="navbar-nav">
        <li class="nav-item"><a href="?page=acceuil">Acceuil</a></li>
        <li class="nav-item"><a href="?page=projets">Projets</a></li>
        <li class="nav-item"><a href="?page=articles" class="active">Articles</a></li>
    </ul>
    

<?php  

    $links = ob_get_clean();

    $shape = '';

    ob_start();

?>



<h1 class="h1-article">Decouvrez une multitude <span> d’aricles</span> passionnant et interresant...</h1>

<section class="articles-container">   

<?php 

while($article = $requete->fetch()) {
    ?>   
        <div class="article-container ">
            <?php
                echo '<img src="public/asset/uploads/'. $article['img_path'] .'" alt="image de l\'article">';
            ?>
            <h2><?= $article['title'] ?></h2>
            <p><?= html_entity_decode($article['short_description']); ?>...</p>
            <a href="?page=article&id=<?= $article['id'] ?>">Voir plus</a>
            
        </div>       
    <?php
}
?>

</section>

<?php

    $content = ob_get_clean();

    require_once('views/bases/base1.php');

?>

