<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<?php include("includes/navbar.php") ?>

<main class="container p-4">
<h1 class="mb-5">Ajouter une tâche</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body border-success">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Titre de la tâche" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="description"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Ajouter la tâche">

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
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Date de creation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM task";
                    $result_tasks = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td>
                                <a href="edit_task.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
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