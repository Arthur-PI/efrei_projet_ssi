<?php
    function invalid_card_number($number) {
        // TODO
        return false;
    }

    function invalid_date($date) {
        // TODO
        return false;
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $numero_cb = trim($_POST['numero_cb']);
        $ville = trim($_POST['ville']);
        $date_naissance = trim($_POST['date_naissance']);

        // TODO handle errors properly
        if ($nom == '' || $prenom == '' || $numero_cb == '' || $ville == '' || $date_naissance == '')
            die("Error: invalid form parameters, at least one of them is empty.");
        if (invalid_card_number($numero_cb))
            die("Error: invalid form parameter, the card numbers are invalid.");
        if (invalid_date($date_naissance))
            die("Error: invalid form parameter, date of birth is invalid.");
        include "user1_conn.php";
        if ($conn_user1 == null)
            die("Error while connecting to db");
        try {
            $query = $conn_user1->prepare("INSERT INTO utilisateur (nom, prenom, numero_cb, date_naissance, ville) VALUES (?, ?, ?, ?, ?)");
            $query->bindParam(1, $nom);
            $query->bindParam(2, $prenom);
            $query->bindParam(3, $numero_cb);
            $query->bindParam(4, $date_naissance);
            $query->bindParam(5, $ville);
            $query->execute();
            echo "<script>alert('User sucessfully added to the database');</script>";
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        // TODO handle new user creation
    }
    ?>
    <div>
        <h1>Ajouter un nouvel utilisateur</h1>
        <form action="newUser.php" method="POST">
            <div>
                Prenom: 
                <input type="text" name="prenom" required>
            </div>
            <div>
                Nom: 
                <input type="text" name="nom" required>
            </div>
            <div>
                Numero de carte bleu:
                <input type="number" name="numero_cb" required>
            </div>
            <div>
                Ville: 
                <input type="text" name="ville" required>
            </div>
            <div>
                Date de naissance
                <input type="date" name="date_naissance" required>
            </div>
            <button>Valider</button>
        </form>
    </div>
    <?php
?>