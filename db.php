<?php

session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_crud'
);

// if(isset($conn)) {
//     echo 'Database is connected';
// }

?>