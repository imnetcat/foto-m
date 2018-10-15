<?
function found_items($database, $filters){
  $id = array();
  $types = explode("-_-", $filters["types"]);
  $query ="SELECT id, type FROM archive";
  for( $x = 0; $x < count($types); $x++ ){
    if($result = mysqli_query($database, $query)){
      while ($row = mysqli_fetch_row($result)) {
        if($row[1] == $types[$x]){
          $id['types'][count($id['types'])] = $row[0];
        }
      }
    }  
  }
  $stones = explode("-_-", $filters["stones"]);
  $query ="SELECT id, stone FROM archive";
  if($result = mysqli_query($database, $query)){
    while ($row = mysqli_fetch_row($result)) {
      $item_filters = explode(", ", $row[1]);
      for($n = 0; $n < count($item_filters); $n++ ){
        for( $x = 0; $x < count($stones); $x++ ){
          if($item_filters[$n] == $stones[$x]){
            if($id['stones'][count($id['stones'])-1] != $row[0]){
              $id['stones'][count($id['stones'])] = $row[0];
            }
          }
        }
      }
    }  
  }
  $technology = explode("-_-", $filters["technology"]);
  $query ="SELECT id, technology FROM archive";  
  if($result = mysqli_query($database, $query)){
    while ($row = mysqli_fetch_row($result)) {
      $item_filters = explode(", ", $row[1]);
      for($n = 0; $n < count($item_filters); $n++ ){
        for( $x = 0; $x < count($technology); $x++ ){
          if($item_filters[$n] == $technology[$x]){
            if($id['technology'][count($id['technology'])-1] != $row[0]){
              $id['technology'][count($id['technology'])] = $row[0];
            }
          }
        }
      }
    }  
  }
  return $id;
}

function id_parse($array_of_id){
  $parsed = array();
  for( $n = 0; $n < count($array_of_id['types']); $n++ ){
    for( $x = 0; $x < count($array_of_id['stones']); $x++ ){
      if($array_of_id['types'][$n] == $array_of_id['stones'][$x]){
        $parsed[count($parsed)] = $array_of_id['types'][$n];
      }
    }
  }
  for( $n = 0; $n < count($parsed); $n++ ){
    for( $x = 0; $x < count($array_of_id['technology']); $x++ ){
      if($parsed[$n] == $array_of_id['technology'][$x]){
        $parsed__[count($parsed__)] = $parsed[$n];
      }
    }
  }
  $parsed = $parsed__;
  $parsed__ = array();
  return $parsed;
}

function get_items($database, $id, $sortings){
  if($sortings['cost'] == "cost-down-to-up"){
    $sort = "cost";
  }else{
    $sort = "cost DESC";
  }
  $raw = array();
  $items = " ";
  $query ="SELECT id, image, type, stone, technology, cost, filter_5, description FROM archive ORDER BY " . $sort;
  if($result = mysqli_query($database, $query)){
    while ($row = mysqli_fetch_row($result)) {
      for( $n = 0; $n < count($id); $n++ ){
        if($row[0] == $id[$n]){
          $items .= var_dump($row);
        }
      }
    }
  }
  return $items;
}
?>
