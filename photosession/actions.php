<?
require_once "functions.php";
require_once "db.php";


switch ($_POST['action']){
      case 'load_all':
      echo load_all($database);
      break;
};
?>
