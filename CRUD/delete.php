<?php

include "../Connection/connection.php";

$id = $_GET['id'];

$res = $database->delete($id);
if($res){
    echo "success";
    header('Location:fetch.php');
    }else{
        echo "error";
}

?>