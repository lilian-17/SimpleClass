<?php

if (isset($_POST['registerUsername'])) {

    $username = $_POST['registerUsername'];
    $email = $_POST['registerEmail'];
    $password = $_POST['registerPSWD'];
    $confirmedpassword = $_POST['registerConfirmPSWD'];

    if ($password != $confirmedpassword) {
        echo "<script>alert('Les mots de passe sont différents');</script>";
    } else {
        include 'db.php';

        // Vérifier si l'utilisateur existe déjà
        $checkSql = "SELECT Id_Utilisateur FROM utilisateurs WHERE email = :email OR username = :username";
        $checkStmt = $conn->prepare($checkSql);
        $checkStmt->execute([
            'email' => $email,
            'username' => $username
        ]);

        if ($checkStmt->fetch()) {
            echo "<script>alert('Un compte avec ce nom ou cet email existe déjà');</script>";
        } else {
            // Hasher le mot de passe
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insérer le nouvel utilisateur
            $sql = "INSERT INTO utilisateurs (email, username, mdp) VALUES (:email, :username, :password)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'email' => $email,
                'username' => $username,
                'password' => $hashedPassword
            ]);

            // Stocker l'utilisateur dans la session
            $_SESSION['user_id'] = $conn->lastInsertId();
            $_SESSION['username'] = $username;

            header('Location: main.php');
            exit();
        }
    }
}
?>

<h1>S'inscrire</h1>

<form id='formBloc' action='' method='POST'>
    <label for='registerUsername'>Nom : </label>
    <input id='registerUsername' name='registerUsername' type='text' required>
    
    <label for='registerEmail'>Email : </label>
    <input id='registerEmail' name='registerEmail' type='email' required>

    <label for='registerPSWD'>Mot de passe : </label>
    <input id='registerPSWD' name='registerPSWD' type='password' required>

    <label for='registerConfirmPSWD'>Confirmez le mot de passe : </label>
    <input id='registerConfirmPSWD' name='registerConfirmPSWD' type='password' required>
    
    <input id='registerSubmit' type='submit' value='Envoyer'>
</form>
