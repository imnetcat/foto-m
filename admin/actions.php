<?php
require_once "functions.php";
require_once "db.php";
require_once "db_init.php";


switch ($_POST['action']){
  case 'add_in_photosession':
    $image = $_POST['image'];
    $derectory = $_POST['derectory'];
    $description = $_POST['description'];
    echo add_in_shop($database, $derectory, $image, $description);
  break;
  case 'get_photosession':
    $derectory = $_POST['derectory'];
    echo get_shop($database, $derectory);
  break;
  case 'delete':
    $id = $_POST['id'];
    $derectory = $_POST['derectory'];
    echo delete($database, $id, $derectory);
  break;
  case 'change':
    $id = $_POST['id'];
    $derectory = $_POST['derectory'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    echo change($database, $id, $derectory, $image, $description);
  break;
};
?>
