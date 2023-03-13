<?php 

    $title = "Créer un compte";

    $h1 = 'Créer un compte';

    $p = 'Créer un nouveau compte pour pouvoir ajouter des commentaires, ou <a href="?page=connexion">connectez-vous</a>';

    ob_start(); 
    
?>
    <p>
        <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
    </p>
    <p>
        <input type="email" name="email" id="email" placeholder="Email">
    </p>
    <p>
        <input type="password" name="password" id="password" placeholder="Mot de passe">
    </p>
    <p>
        <input type="password" name="password_two" id="password_two" placeholder="Confirmer mot de passe">
    </p>
    <p>
        <button type="submit">Créer</button>
    </p>

<?php 

    $inputs = ob_get_clean();

    require('views/bases/base2.php');

?>
