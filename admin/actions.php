<?php
require_once "functions.php";
require_once "db_init.php";
require_once "db.php";


switch ($_POST['action']){
  case 'add_in_shop':
    $image = $_POST['image'];
    $type = $_POST['type'];
    $stone = $_POST['stone'];
    $technology = $_POST['technology'];
    $cost = $_POST['cost'];
    $filter_5 = $_POST['filter_5'];
    $description = $_POST['description'];
    echo add_in_shop($database, $image, $type, $stone, $technology, $cost, $filter_5, $description);
  break;
  case 'add_in_archive':
    $image = $_POST['image'];
    $type = $_POST['type'];
    $stone = $_POST['stone'];
    $technology = $_POST['technology'];
    $cost = $_POST['cost'];
    $filter_5 = $_POST['filter_5'];
    $description = $_POST['description'];
    echo add_in_archive($database, $image, $type, $stone, $technology, $cost, $filter_5, $description);
  break;
  case 'get_shop':
    echo get_shop($database);
  break;
  case 'get_archive':
    echo get_archive($database);
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
    $type = $_POST['type'];
    $stone = $_POST['stone'];
    $technology = $_POST['technology'];
    $cost = $_POST['cost'];
    $filter_5 = $_POST['filter_5'];
    $description = $_POST['description'];
    echo change($database, $id, $derectory, $image, $type, $stone, $technology, $cost, $filter_5, $description);
  break;
};
?>
