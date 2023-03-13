<?php

    $title = 'Projet';

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

    while($project = $request->fetch()) {
        if(isset($_SESSION['id']) && isset($_SESSION['secret']) && isset($_SESSION['email']) && isset($_SESSION['password'])) {
            if($_SESSION['id'] === 2 && $_SESSION['secret'] === '9ae7da67ae5dcba824b5c9e368cce275a5f63d0f1678179464' && $_SESSION['email'] === 'admin@admin.admin' && $_SESSION['password'] === '6544fb338e53de7b6b75d18fc7e3178d4992710ba54gf4') {
            ?>
                <div class="edit_remove">
                    <a href="?page=supprimer_projet&id=<?= $id ?>" class="remove">Supprimer ce projet</a>
                    <a href="?page=modifier_projet&id=<?= $id ?>" class="edit">Modifier ce projet</a>
                </div>
            <?php
            }
        }
            ?>

        <section class="individual-project-container">
            <p class="date">Posté le: <?= $project['creation_date'] ?></p>
            <h1><?= $project['title'] ?></h1>
            <?php echo '<img src="public/asset/uploads/'. $project['img_path'] .'" alt="image du projet">'; ?>
            <div class="project-div-1">
                <h3>Description</h3>
                <p><?= html_entity_decode($project['description']); ?></p> 
            </div>
            <div class="project-div-2">
                <h3>Language utilisé</h3>
                <p><?= html_entity_decode($project['languages']); ?></p>
            </div>
        </section>

        <section class="comments_section">
            <h2>Envie d'ajouter un commentaire</h2>
            <form action="?page=commentaire_projet&id= <?= $id ?>" method="post">
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
            
            while($project = $request2->fetch()) {
            ?>
                <div class="comment_div">
                    <div class="pseudo_icon"><span class="icon"><i class="fa-solid fa-user"></i></span><span class="text"> <?= $project['pseudo'] ?></span><span class="date"> <?= $project['date_added'] ?></span></div>
                    <div class="message"><?= $project['content'] ?></div>
                </div>
            <?php
            }
            ?>
        </div>
    </section>
    <?php

    $content = ob_get_clean();

    require_once('views/bases/base1.php');

?>