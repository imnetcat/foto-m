<?

$query ="CREATE TABLE  IF NOT EXISTS photosession (
  id INT(50) NOT NULL,
  image VARCHAR(60) NOT NULL,
  description VARCHAR(60) NOT NULL,
  sub_img_1 VARCHAR(60) NULL,
  sub_img_2 VARCHAR(60) NULL,
  sub_img_3 VARCHAR(60) NULL,
  sub_img_4 VARCHAR(60) NULL,
  sub_img_5 VARCHAR(1000) NULL
  sub_img_6 VARCHAR(60) NULL,
  sub_img_7 VARCHAR(60) NULL,
  sub_img_8 VARCHAR(60) NULL,
  sub_img_9 VARCHAR(60) NULL,
  sub_img_10 VARCHAR(60) NULL,
  sub_img_11 VARCHAR(60) NULL,
  sub_img_12 VARCHAR(60) NULL,
  sub_img_13 VARCHAR(60) NULL,
  sub_img_14 VARCHAR(60) NULL,
  sub_img_15 VARCHAR(60) NULL,
  sub_img_16 VARCHAR(60) NULL,
  sub_img_17 VARCHAR(60) NULL,
  sub_img_18 VARCHAR(60) NULL,
  sub_img_19 VARCHAR(60) NULL,
  sub_img_20 VARCHAR(60) NULL,
  sub_img_21 VARCHAR(60) NULL,
  sub_img_22 VARCHAR(60) NULL,
  sub_img_23 VARCHAR(60) NULL,
  sub_img_24 VARCHAR(60) NULL,
  sub_img_25 VARCHAR(60) NULL,
)";
if(mysqli_query($database, $query)){
}else{
  echo  mysqli_error($database);
}

?>
