<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="shortcut icon" href="public/asset/favicon.png" type="image/x-icon">
    <title><?= $title ?></title>
</head>
<body>

    <?php 
        if(isset($_GET['error']) && isset($_GET['message'])) {
             echo'<div class="alert error" style=" animation: pop-down 5s ease-out 1;">'.htmlspecialchars($_GET['message']).'</div>';
        }

        elseif(isset($_GET['success']) && isset($_GET['message'])) {
            echo'<div class="alert success" style=" animation: pop-down 5s ease-out 1;">'.htmlspecialchars($_GET['message']).'</div>';
        } 
    ?>

    <div class="container-logo">
        <div class="logo">
            <p><a href="?page=acceuil">Portfoli<span>Blog</span></a></p>
        </div>
    </div>
    <section class="sign_up_container">

        <div class="sign_up_sub_div_1">
            
            
            <div class="form_container">
                <h1><?= $h1 ?></h1>
                <p><?= $p ?></p>

                <form  action="" method="post">
                    <?= $inputs ?>
                </form>
            </div>
            </div>

        <div class="sign_up_sub_div_2"></div>

    </section>
    
</body>
</html>