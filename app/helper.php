<?php 
// Important Finctions
if (!function_exists('p')) {
    # code...
  function p($data)  {
        echo '<pre>';
print_r($data);
    }
}
if (!function_exists('getFormatedDate')) {
    # code...
  function getFormatedDate($date,$format)  {
      $formatedDate = date($format,strtotime($date));
      return $formatedDate;
    }
}
if (!function_exists('getSearchDta')) {
    # code...
  function getSearchDta($data)  {

      return $data;
    }
}
?>
