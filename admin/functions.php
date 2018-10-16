<?

function add_in($database, $image, $derectory, $description, $sub_img_1, $sub_img_2, $sub_img_3, $sub_img_4, $sub_img_5, $sub_img_6, $sub_img_7, $sub_img_8, $sub_img_9, $sub_img_10, $sub_img_11, $sub_img_12, $sub_img_13, $sub_img_14, $sub_img_15, $sub_img_16, $sub_img_17, $sub_img_18, $sub_img_19, $sub_img_20, $sub_img_21, $sub_img_22, $sub_img_23, $sub_img_24, $sub_img_25){
  $query = "SELECT MAX(id) FROM ".$derectory;
  if($result = mysqli_query($database, $query)){
    while ($row = mysqli_fetch_row($result)) {
      $new_id = array_pop($row) + 1;
    }
  }
  $query = "INSERT INTO ".$derectory." ( id, image, description, sub_img_1, sub_img_2, sub_img_3, sub_img_4, sub_img_5, sub_img_6, sub_img_7, sub_img_8, sub_img_9, sub_img_10, sub_img_11, sub_img_12, sub_img_13, sub_img_14, sub_img_15, sub_img_16, sub_img_17, sub_img_18, sub_img_19, sub_img_20, sub_img_21, sub_img_22, sub_img_23, sub_img_24, sub_img_25) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
  $stmt = mysqli_prepare($database, $query);
  mysqli_stmt_bind_param($stmt, "issssssssssssssssssssssss", $new_id, $image, $description, $sub_img_1, $sub_img_2, $sub_img_3, $sub_img_4, $sub_img_5, $sub_img_6, $sub_img_7, $sub_img_8, $sub_img_9, $sub_img_10, $sub_img_11, $sub_img_12, $sub_img_13, $sub_img_14, $sub_img_15, $sub_img_16, $sub_img_17, $sub_img_18, $sub_img_19, $sub_img_20, $sub_img_21, $sub_img_22, $sub_img_23, $sub_img_24, $sub_img_25);
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_close($stmt);
    return "Изображение успешно добавлено!";
  }else{
    return "Error in: " . $query . "<br>" . mysqli_error($database);
  }
}

function delete($database, $id, $derectory){
  $query = "DELETE FROM ".$derectory." WHERE id=".$id;
  if($result = mysqli_query($database, $query)){ 
    return "Изображение номер ". $id . " удалено успешно";
  } else {
    return "Error in: " . $query . "<br>" . mysqli_error($database);
  }
}

function change($database, $id, $derectory, $image, $description, $sub_img_1, $sub_img_2, $sub_img_3, $sub_img_4, $sub_img_5, $sub_img_6, $sub_img_7, $sub_img_8, $sub_img_9, $sub_img_10, $sub_img_11, $sub_img_12, $sub_img_13, $sub_img_14, $sub_img_15, $sub_img_16, $sub_img_17, $sub_img_18, $sub_img_19, $sub_img_20, $sub_img_21, $sub_img_22, $sub_img_23, $sub_img_24, $sub_img_25){
  $query = "UPDATE $derectory SET image=?, description=?, sub_img_1=?, sub_img_2=?, sub_img_3=?, sub_img_4=?, sub_img_5=?, sub_img_6=?, sub_img_7=?, sub_img_8=?, sub_img_9=?, sub_img_10=?, sub_img_11=?, sub_img_12=?, sub_img_13=?, sub_img_14=?, sub_img_15=?, sub_img_16=?, sub_img_17=?, sub_img_18=?, sub_img_19=?, sub_img_20=?, sub_img_21=?, sub_img_22=?, sub_img_23=?, sub_img_24=?, sub_img_25=? WHERE id=$id";
  $stmt = mysqli_prepare($database, $query);
  mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssssss", $image, $description, $sub_img_1, $sub_img_2, $sub_img_3, $sub_img_4, $sub_img_5, $sub_img_6, $sub_img_7, $sub_img_8, $sub_img_9, $sub_img_10, $sub_img_11, $sub_img_12, $sub_img_13, $sub_img_14, $sub_img_15, $sub_img_16, $sub_img_17, $sub_img_18, $sub_img_19, $sub_img_20, $sub_img_21, $sub_img_22, $sub_img_23, $sub_img_24, $sub_img_25);
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_close($stmt);
    return "Изображение успешно изменено";
  }else{
    return "Error in: " . $query . "<br>" . mysqli_error($database);
  }
}

function get($database, $derectory){
  $items = " ";
  $query ="SELECT id, image, description, sub_img_1, sub_img_2, sub_img_3, sub_img_4, sub_img_5, sub_img_6, sub_img_7, sub_img_8, sub_img_9, sub_img_10, sub_img_11, sub_img_12, sub_img_13, sub_img_14, sub_img_15, sub_img_16, sub_img_17, sub_img_18, sub_img_19, sub_img_20, sub_img_21, sub_img_22, sub_img_23, sub_img_24, sub_img_25 FROM ".$derectory;
  if($result = mysqli_query($database, $query)){
    while ($row = mysqli_fetch_row($result)) {
      $items .= var_dump($row);
    }
  }
  return $items;
}

?>
