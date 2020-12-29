<?php

include("db.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $query = "DELETE FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("query failed");
    }

    $_SESSION['message'] = 'User Removed Successfully';
    $_SESSION['message_type'] = 'danger';
    header("Location: users.php");

}

?>



