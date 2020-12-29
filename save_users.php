<?php

include("db.php");

if(isset($_POST['save_user'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $query = "INSERT INTO users (nom, prenom, role, mail, password  ) VALUES ('$nom', '$prenom','$role', '$mail', '$password')";

    $result = mysqli_query($conn, $query);
    if (!$result){
        die("Query Failed");
    }

    $_SESSION['message'] = 'Utilisateur ajouté';
    $_SESSION['message_type'] = 'success';

    header("location: users.php");

}

?>
