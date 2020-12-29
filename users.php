<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<?php include("includes/navbar.php") ?>

<main class="container p-4">
    <h1 class="mb-5">Ajouter un utilisateur</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body border-success">
                <form action="save_users.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nom" placeholder="Nom">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="prenom" placeholder="Prenom">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="mail" placeholder="Mail">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="role">Chose a role:</label>
                        <select name="role" class="custom-select">

                            <option value="client">Client</option>
                            <option value="employee">Employee</option>
                            <option value="staff-member">Staff member</option>
                        </select>
                    </div>

                    <input type="submit" class="btn btn-success btn-block" name="save_user" value="Ajouter Utilisateur">

                </form>
            </div>


            <?php if (isset($_SESSION['message'])) { ?>

                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible" role="alert">
                    <?= $_SESSION['message'] ?>
                </div>

            <?php session_unset();
            } ?>


        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Mail</th>
                        <th>Role</th>
                        <th>Date de creation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM users";
                    $result_tasks = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
                        <tr>
                            <td><?php echo $row['nom']; ?></td>
                            <td><?php echo $row['prenom']; ?></td>
                            <td><?php echo $row['mail']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>


                            <td>
                                <a href="edit_user.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete_user.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
    </div>




    <?php include("includes/footer.php") ?>