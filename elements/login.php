<?php

if (isset($_SESSION['user_id'])) {
    header('Location: main.php');
    exit();
}

if (isset($_POST['loginUsername'])) {
    $username = $_POST['loginUsername'];
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPSWD'];

    include 'db.php';

    $sql = "SELECT Id_Utilisateur, mdp FROM utilisateurs WHERE email = :email AND username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'email' => $email,
        'username' => $username
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['mdp'])) {
        $_SESSION['user_id'] = $user['Id_Utilisateur'];
        $_SESSION['username'] = $username;

        header('Location: main.php');
        exit();
    } else {
        echo "<script>alert('Identifiants incorrects !');</script>";
    }
}
?>

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
