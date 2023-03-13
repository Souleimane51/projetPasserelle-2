<?php if(isset($_SESSION['connected']) && $_SESSION['connected'] === 1) { ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="shortcut icon" href="public/asset/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="public/css/newBootstrap.css">
    <script src="https://kit.fontawesome.com/cfc17bf4d1.js" crossorigin="anonymous"></script>
    <title>Deconnexion</title>
</head>
<body>
    <div class="container-logo">
            <div class="logo">
            <p><a href="?page=acceuil" class="text-decoration-none">Portfoli<span>Blog</span></a></p>
        </div>
    </div>

    <section class="logout-container">
        <div class="logout-sub-container"><span><i class="fa-solid fa-user bg-primary text-white"></i></span><span class="username text-secondary"> <?= $_SESSION['pseudo'] ?></span></div>
        <form action="" method="post">
            <button type="submit" name="logout" class="btn btn-danger text-white">Me déconnecter</button>
        </form>
    </section>
</body>
</html>

<?php }
    else {
        header('location: ?page=acceuil');
    }