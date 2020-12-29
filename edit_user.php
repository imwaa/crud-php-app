<?php

include("db.php");
include("includes/navbar.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row  = mysqli_fetch_array($result);
        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $mail = $row['mail'];
        $role = $row['role'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $role = $_POST['role'];


    $query = "UPDATE users set nom = '$nom', prenom = '$prenom', mail = '$mail' WHERE id = $id ";
    mysqli_query($conn, $query);


    $_SESSION['message'] = 'Utilisateur mis à jour';
    $_SESSION['message_type'] = 'info';

    header("Location: users.php");
}


?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <h1>Editer utilisateur</h1>
            <div class="card card-body">
            <form action="edit_user.php?id=<?php echo $_GET['id']; ?>" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nom" placeholder="Nom" value="<?php echo $nom; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="prenom" placeholder="Prenom" value="<?php echo $prenom; ?>">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="mail" placeholder="Mail" value="<?php echo $mail; ?>">
                    </div>
                    <div class="form-group">
                    <input class="form-control" type="text" placeholder="<?php echo $role; ?>" disabled>
                    </div>
                        <button class="btn btn-success" name="update">
                            update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include("includes/footer.php") ?>




