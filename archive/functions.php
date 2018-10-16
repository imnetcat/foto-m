<?
function load_all($database){
  $raw = " ";
  $query ="SELECT id, image, description, sub_img_1, sub_img_2, sub_img_3, sub_img_4, sub_img_5, sub_img_6, sub_img_7, sub_img_8, sub_img_9, sub_img_10, sub_img_11, sub_img_12, sub_img_13, sub_img_14, sub_img_15, sub_img_16, sub_img_17, sub_img_18, sub_img_19, sub_img_20, sub_img_21, sub_img_22, sub_img_23, sub_img_24, sub_img_25, sub_des_1, sub_des_2, sub_des_3, sub_des_4, sub_des_5, sub_des_6, sub_des_7, sub_des_8, sub_des_9, sub_des_10, sub_des_11, sub_des_12, sub_des_13, sub_des_14, sub_des_15, sub_des_16, sub_des_17, sub_des_18, sub_des_19, sub_des_20, sub_des_21, sub_des_22, sub_des_23, sub_des_24, sub_des_25 FROM items";
  if($result = mysqli_query($database, $query)){
    while ($row = mysqli_fetch_row($result)) {
      $raw .= var_dump($row);
    }
  }
  return $raw;
}
?>
