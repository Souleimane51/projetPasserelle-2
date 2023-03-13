<?php 

    $title = 'Acceuil';

    ob_start();
?>
    <ul>
        <li><a href="?page=acceuil" class="active">Acceuil</a></li>
        <li><a href="?page=projets">Projets</a></li>
        <li><a href="?page=articles">Articles</a></li>
    </ul>
    

<?php  

    $links = ob_get_clean();

    ob_start();

?>

    <div class="vector">
        <img src="public/asset/shapeVector.svg" alt="verctor">
    </div>

<?php

    $shape = ob_get_clean();

    ob_start();

?>
    
    <div class="presentationText">
        <h1>👋 Salut, moi c’est <span>Souleimane</span>, je suis étudiant en tant que developpeur web, bienvenue dans mon “PortfoliBlog” !</h1>
    </div>

    <section class="container">

    <div class="sub-container-1">
        <img src="public/asset/portfolio.jpg" alt="Portfolio illustration">
        <h2>Portfolio:</h2>
        <p class="p-1">Venez voir des projets plus fou les uns que les autres utilisant les technologies les plus recantes</p>
        <div class="btn-container">
            <div class="btn-1"><a href="?page=projets">Decouvrir</a></div>
            <p class="p-2">Ou</p>
            <div class="btn-2"><a href="?page=nouveau_projet">Ajouter un projet</a></div>
        </div>
    </div>

    <div class="sub-container-2">
    <img src="public/asset/blog.jpg" alt="Blog illustration">
        <h2>Blog:</h2>
        <p class="p-1">Decouvrez des articles ecrit par mes soins sur le theme qui vous passionne...</p>
        <div class="btn-container">
            <div class="btn-1"><a href="?page=articles">Decouvrir</a></div>
            <p class="p-2">Ou</p>
            <div class="btn-2"><a href="?page=nouvel_article">Ajouter un article</a></div>
        </div>
    </div>
    
    </section>

<?php

    $content = ob_get_clean();

    require_once('views/bases/base1.php');

?>
