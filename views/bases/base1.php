<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="public/css/style.css" type="text/css">
        <script src="https://kit.fontawesome.com/cfc17bf4d1.js" crossorigin="anonymous"></script>
        <link rel="shortcut icon" href="public/asset/favicon.png" type="image/x-icon">
        <title><?= $title ?></title>
    </head>
    <body>
    <script>    
        if(typeof window.history.pushState == 'function') {
            window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
        }
    </script>
    <?php 
        if(isset($_GET['error']) && isset($_GET['message'])) {
             echo'<div class="alert error" style=" animation: pop-down 5s ease-out 1;">'.htmlspecialchars($_GET['message']).'</div>';
        }

        elseif(isset($_GET['success']) && isset($_GET['message'])) {
            echo'<div class="alert success" style=" animation: pop-down 5s ease-out 1;">'.htmlspecialchars($_GET['message']).'</div>';
        } 
    ?>

        <header>
            <div class="responsiveNavbar">
                <div class="logo">
                    <p><a href="index.php">Portfoli<span>Blog</span></a></p>
                </div>
                <span class="hamburger-menu"><i class="fa-solid fa-bars"></i></span>
            </div>
            <nav>
                <span class="cross"><i class="fa-solid fa-xmark"></i></span>
                <div class="logo">
                    <p><a href="index.php">Portfoli<span>Blog</span></a></p>
                </div>
                <div class="nav">
                    <?= $links ?>
                </div>
                
                <?php

                    if(isset($_SESSION['connected']) && $_SESSION['connected'] === 1) { ?>
                         <div class="logout">
                            <div class="sub-div-3"><a href="?page=deconnexion"><span><i class="fa-solid fa-user"></i></span><span> <?= $_SESSION['pseudo'] ?></span></a></div>
                        </div>

                <?php }
                    else { ?>
                        <div class="register">
                            <div class="sub-div-1"><a href="?page=connexion">Se connecter</a></div>
                            <div class="sub-div-2"><a href="?page=inscription">S'inscrire</a></div>
                        </div>

                <?php }
                ?>
            </nav>

                <?= $shape ?>

        </header>

                <?= $content ?>

        <footer class="footer">
            <p>© Souleimane | PortfoliBlog 2023</p>
        </footer>
    <script type="text/javascript" src="public/menuToggle.js"></script>
    </body>
</html>

