
<?php
    include "user1_conn.php";
    if ($conn_user1 == null)
        die ("ERROR !!!");
    try {
        $query = $conn_user1->prepare("SELECT * FROM commentaire");
        $query->execute();
        $results = $query->fetchAll();
        echo '<div class="comments-container">';
        for ($i=0; $i < count($results); $i++) {
            $comment = $results[$i];
            echo '<div class="comments-card">';
                echo '<h2>' . htmlspecialchars($comment['id']) . ' from ' . htmlspecialchars($comment['utilisateur_id']) . '</h2>';
                echo '<h3>' . htmlspecialchars($comment['description']) . '</h3>';
            echo '</div>';
        }
        echo '</div>';
    } catch (PDOException $e) {
        die ("Error while fetching database data !" . $e->getMessage());
    }
?>