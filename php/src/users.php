<?php
    include "user2_conn.php";
    if ($conn_user2 == null)
        die ("ERROR !!!");
    try {
        $query = $conn_user2->prepare("SELECT * FROM utilisateur");
        $query->execute();
        $results = $query->fetchAll();
        echo '<div class="users-container">';
        for ($i=0; $i < count($results); $i++) {
            $user = $results[$i];
            echo '<div class="user-card">';
                echo '<h2>' . $user['id'] . ' ' . $user['prenom'] . ' ' . $user['nom'] . '</h2>';
                echo '<h3>' . $user['date_naissance'] . '</h3>';
                echo '<h3>' . $user['ville'] . '</h3>';
                echo '<h3>' . $user['numero_cb'] . '</h3>';
            echo '</div>';
        }
        echo '</div>';
    } catch (PDOException $e) {
        die ("Error while fetching database data !");
    }
?>