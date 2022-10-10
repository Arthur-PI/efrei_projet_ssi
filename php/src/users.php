<?php
    include "user2_conn.php";
    if ($conn_user2 == null)
        die ("ERROR !!!");
    try {
        $query = $conn_user2->prepare("SELECT * FROM utilisateurView");
        $query->execute();
        $results = $query->fetchAll();
        echo '<div class="users-container">';
        for ($i=0; $i < count($results); $i++) {
            $user = $results[$i];
            echo '<div class="user-card">';
                echo '<h2>' . htmlspecialchars($user['id']) . ' ' . htmlspecialchars($user['prenom']) . ' ' . htmlspecialchars($user['nom']) . '</h2>';
                echo '<h3>' . htmlspecialchars($user['date_naissance']) . '</h3>';
                echo '<h3>' . htmlspecialchars($user['ville']) . '</h3>';
                echo '<h3>' . htmlspecialchars($user['numero_cb']) . '</h3>';
            echo '</div>';
        }
        echo '</div>';
    } catch (PDOException $e) {
        die ("Error while fetching database data !" . $e->getMessage());
    }
?>