<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<?php include("includes/navbar.php") ?>


<?php
$get_user = "SELECT * from users";
$result_user = mysqli_query($conn, $get_user);
$num_user = mysqli_num_rows($result_user); 

$get_task = "SELECT * from task";
$result_task = mysqli_query($conn, $get_task);
$num_task = mysqli_num_rows($result_task); ?>



<div class="container" style="padding-top: 5%">
    <h1 class="mb-5">Tableau de bord</h1>
    <div class="row " style="height: 500px; margin:auto">
        <div class="col">
            <div class="card bg-info text-white " style="height:100%">
                <div class="card-body" style="text-align: center">
                    <h1 class="card-title" style="font-size: 80px;">Tâches</h1>
                    <h1 style="font-size: 200px;"><?php echo $num_task; ?></h1>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-success text-white " style="height:100%">
                <div class="card-body" style="text-align: center">
                    <h1 class="card-title" style="font-size: 80px;">Utilisateurs</h1>
                    <h1 style="font-size: 200px;"><?php echo $num_user; ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<?php ?>



<?php include("includes/footer.php") ?>