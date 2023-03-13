<?php

    $title = 'Article';

    ob_start();
    ?>
        <ul class="navbar-nav">
            <li><a href="?page=acceuil">Acceuil</a></li>
            <li><a href="?page=projets">Projets</a></li>
            <li><a href="?page=articles">Articles</a></li>
        </ul>
    
    <?php  
    
    $links = ob_get_clean();

    $shape = '';

    ob_start();

    while($article = $request->fetch()) {
        if(isset($_SESSION['id']) && isset($_SESSION['secret']) && isset($_SESSION['email']) && isset($_SESSION['password'])) {
            if($_SESSION['id'] === 2 && $_SESSION['secret'] === '9ae7da67ae5dcba824b5c9e368cce275a5f63d0f1678179464' && $_SESSION['email'] === 'admin@admin.admin' && $_SESSION['password'] === '6544fb338e53de7b6b75d18fc7e3178d4992710ba54gf4') {
            ?>
                <div class="edit_remove">
                    <a href="?page=supprimer_article&id=<?= $id ?>" class="remove">Supprimer cet article</a>
                    <a href="?page=modifier_article&id=<?= $id ?>" class="edit">Modifier cet article</a>
                </div>
            <?php
            }
        }
            ?>

        <section class="individual-article-container">
            <p class="date">Posté le: <?= $article['creation_date'] ?></p>
            <h1><?= $article['title'] ?></h1>
            <?php echo '<img src="public/asset/uploads/'. $article['img_path'] .'" alt="image du de l\'article">'; ?>
            <div class="article-div-1">
                <h3>Description</h3>
                <p><?= html_entity_decode($article['description']); ?></p> 
            </div>
        </section>

        <section class="comments_section">
            <h2>Envie d'ajouter un commentaire</h2>
            <form action="?page=commentaire_article&id= <?= $id ?>" method="post">
                <p class="comments_p">
                    <label for="comment">Commentaire</label>
                    <textarea name="comment" id="comment"></textarea>
                </p>
                <p class="comments_p_2">
                    <button type="submit">Envoyer</button>
                </p>
            </form>
        </section>
        <section class="display_comment">
            <div class="sub_display_comment">
                <?php
    }
            
            while($article = $request2->fetch()) {
            ?>
                <div class="comment_div">
                    <div class="pseudo_icon"><span class="icon"><i class="fa-solid fa-user"></i></span><span class="text"> <?= $article['pseudo'] ?></span><span class="date"> <?= $article['date_added'] ?></span></div>
                    <div class="message"><?= $article['content'] ?></div>
                </div>
            <?php
            }
            ?>
        </div>
    </section>
    <script type="text/javascript" src="public/menuToggle.js"></script>
    <?php

    $content = ob_get_clean();

    require_once('views/bases/base1.php');

?>