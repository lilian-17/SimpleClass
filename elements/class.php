<?php



if (isset($_POST['classe']) && isset($_SESSION['user_id'])) {

    include '../elements/db.php';
    $nom = $_POST['classe'];
    $user = $_SESSION['user_id'];


    if ($conn) {
        $sql = "INSERT INTO classes (nom, Id_Utilisateur) VALUES (:nom, :user)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':nom' => $nom,
            ':user' => $user
        ]);


        $class = $conn->lastInsertId();
        header('Location: main.php?page=students&class=' . $class);

    } else {
        echo "Erreur de connexion à la base de données.";
    }
}


echo
    '
<h3>Entrez le nom de votre nouveau plan</h3>

<label for="classParams">Nom de votre classe : </label>
<form id="classParams" method="POST">
    <input id="className" name="classe" type="text">
    <input type="submit" value="Envoyer">
</form>

<h1>ou</h1>
<h3>Choisissez une de vos classes existantes</h3>


';

include '../elements/db.php';

$user = $_SESSION['user_id'];
$sql = "SELECT classes.Id_classe, classes.nom, COUNT(eleves.Id_eleve) AS 'nombre_eleves' FROM classes
        
        LEFT JOIN eleves
        ON eleves.Id_classe = classes.Id_classe
        
        INNER JOIN utilisateurs
        ON utilisateurs.Id_Utilisateur = classes.Id_Utilisateur 

        WHERE utilisateurs.Id_Utilisateur = '$user'

        GROUP BY classes.Id_classe
        "; 
$stmt = $conn->query($sql);

$classes = $stmt->fetchAll(PDO::FETCH_ASSOC);

$count = 0;
?>
<h1>Liste des utilisateurs enregistrés</h1>
<div class="container">
    <table>
        <tr>
            <th>Numéro</th>
            <th>Nom</th>
            <th>Nombre d'élèves</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($classes as $classe): ?>
            <tr>
                <td><?php $count += 1; echo $count ;?></td>
                <td><?php echo $classe['nom']; ?></td>
                <td><?php echo $classe['nombre_eleves']; ?></td>

                <td>

                    <a href="classname.php?id=<?php echo $classe['Id_classe']; ?> " id='modifier'>Changer le nom</a>

                    <a href="main.php?page=students&class=<?php echo $classe['Id_classe']; ?>">Selectionner</a>

                    <a href="modifier.php?id=<?php echo $classe['Id_classe']; ?> " id='modifier'>Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>