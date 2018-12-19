<?php
//include_once ("func.php");
$server = "localhost";
$port = "8889";
$login = "root";
$password = "root";
$database = "expensdb";
error_reporting(E_ALL);
$conn = mysqli_connect($server, $login, $password);
mysqli_query($conn, 'SET NAMES UTF8');
mysqli_select_db($conn, $database);

    $output = [];
    $result = mysqli_query($conn, "SELECT * FROM type_id");

  //  $output .= '<ul class="list-unstyled">';

    if(mysqli_num_rows($result)!=0){
        while($row = mysqli_fetch_array($result)){
            $output [] = $row;
        }
    }
    $array = ['result' => $output];
    echo json_encode($array, JSON_UNESCAPED_UNICODE);