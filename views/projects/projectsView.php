<?php 

    $title = 'Projets';

    ob_start();
?>
    <ul class="navbar-nav">
        <li><a href="?page=acceuil">Acceuil</a></li>
        <li><a href="?page=projets" class="active">Projets</a></li>
        <li><a href="?page=articles">Articles</a></li>
    </ul>
    

<?php  

    $links = ob_get_clean();

    $shape = '';

    ob_start();

?>



<h1 class="h1-project">Decouvrez des <span>projets</span> créer par mes soins </h1>

<section class="projects-container">  

<?php 
    while($project = $requete->fetch()) {
    ?>   
        <div class="project-container ">
            <?php
                echo '<img src="public/asset/uploads/'. $project['img_path'] .'" alt="image du projet">';
            ?>
            <h2><?= $project['title'] ?></h2>
            <p><?= html_entity_decode($project['short_description']); ?>...</p>
            <a href="?page=projet&id=<?= $project['id'] ?>">Voir plus</a>
            
        </div>       
    <?php
    }
?>

</section>

<?php

    $content = ob_get_clean();

    require_once('views/bases/base1.php');

?>

