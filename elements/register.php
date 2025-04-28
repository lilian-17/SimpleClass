<?php

if(isset($_POST['registerUsername'])){

    $username = $_POST['registerUsername'];
    $email = $_POST['registerEmail'];
    $password = $_POST['registerPSWD'];
    $confirmedpassword = $_POST['registerConfirmPSWD'];
    
    if($password != $confirmedpassword){
        ?>
        <script language="javascript">
            alert('Les mots de passes sont différents');
        </script>
        
        <?php
    }
    else{
        include 'db.php';

        $sql = "INSERT INTO utilisateurs (email,username, mdp) VALUES (:email,:username,:password)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'email' => $email,
            'username' => $username,
            'password' => $password
        ]);

        $last_id = $conn->lastInsertId();

        header('Location: main.php?id='.$last_id);
    }


    

}

    echo"
        <h1>S'inscrire</h1>

        <form id='formBloc' action='' method='POST'>
            <label for='registerUsername'>Nom : </label>
            <input id='registerUsername' name='registerUsername' type='text' required >
            
            <label for='registerEmail'>Email : </label>
            <input id='registerEmail' name='registerEmail' type='email' required >

            <label for='registerPSWD'>Mot de passe : </label>
            <input id='registerPSWD' name='registerPSWD' type='password' required >

            <label for='registerConfirmPSWD'>Confirmez le mot de passe : </label>
            <input id='registerConfirmPSWD' name='registerConfirmPSWD' type='password' required >
            
            <input id='registerSubmit' type='submit' value='Envoyer'>

        </form>

        

"
?>