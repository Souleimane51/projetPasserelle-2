<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="shortcut icon" href="public/asset/favicon.png" type="image/x-icon">
    <script src="https://cdn.tiny.cloud/1/9riryue5efdcat74kcwtl9m24oew7ejgq88hz0e4f8ff4ncu/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script> tinymce.init({ 
        selector: '.textarea',
        menubar: false,
        skin: 'small',
        icons: 'small'
    }); 
    </script>
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
    <section class="new_project_section">
        <div>
            <h1><?= $h1 ?></h1>

                <?= $form ?>
        </div>
    </section>
    

    <footer class="footer">
        <p>© PortfoliBlog 2023</p>
    </footer>
    
</body>
</html>