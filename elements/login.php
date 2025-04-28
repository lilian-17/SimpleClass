<?php

if(isset($_POST['loginUsername'])){

    $username = $_POST['loginUsername'];
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPSWD'];
    
    
    
    include 'db.php';

    $sql = "SELECT Id_Utilisateur FROM utilisateurs WHERE email=:email AND username=:username AND mdp=:password";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'email' => $email,
        'username' => $username,
        'password' => $password
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($user) {
        // L'utilisateur existe, redirection
        header('Location: main.php?id=' . $user['Id_Utilisateur']);
        exit();
    } else {
        // L'utilisateur n'existe pas, afficher une alerte
        ?>
        <script language="javascript">
            alert('Identifiants incorrects !');
        </script>
        
        <?php
        exit();
    }
    }
    echo"
        <h1>Se connecter</h1>

        <form id='formBloc' action='' method='POST'>
            <label for='loginUsername'>Nom : </label>
            <input id='loginUsername' name='loginUsername' type='text' required>
            
            <label for='loginEmail'>Email : </label>
            <input id='loginEmail' name='loginEmail' type='email' required>

            <label for='loginPSWD'>Mot de passe : </label>
            <input id='loginPSWD' name='loginPSWD' type='password' required>

            <input id='loginSubmit' type='submit'>

        </form>
"
?>