<?php 

    $title = "Connexion";

    $h1 = 'Connexion';

    $p = 'Vous n’avez pas encore de compte, ou <a href="?page=inscription">inscrivez-vous</a>';

    ob_start(); 
    
?>

    <p>
        <input type="email" name="email" id="email" placeholder="Email">
    </p>
    <p>
        <input type="password" name="password" id="password" placeholder="Mot de passe">
    </p>
    <p>
        <button type="submit">Connexion</button>
    </p>

<?php 

    $inputs = ob_get_clean();

    require('views/bases/base2.php');

?>