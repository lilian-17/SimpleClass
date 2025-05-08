<?php

echo '
<footer>
        <span>
                <b>SimpleClass</b>
                © Tout droit réservés
                <span class="highlight"> 
                        Ethan Ménoury & Lilian Martineau
                </span>
        </span>';
        if (isset($_SESSION['user_id'])) {
                $username = $_SESSION['username']; // Récupère le username de la session
                echo "<span>ㅤ $username ㅤ<a href='logout.php'><u>Se déconnecter</u></a></span>";
        }
        
        echo '</footer>';
        ?>
