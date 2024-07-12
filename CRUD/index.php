<?php

include "../Connection/connection.php";

if(isset($_POST['btninsert'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image_name = $_FILES["image"]["name"];
    $tmp_name = $_FILES["image"]["tmp_name"];
    $image_type = $_FILES["image"]["type"];
    $image_size = $_FILES["image"]["size"];
    $folder = "../Image/".$image_name;
    move_uploaded_file($tmp_name, $folder);
    $quantity = $_POST['quantity'];
    $discription = $_POST['discription'];
    $date = isset($_POST['date']) ? $_POST['date'] : null;

    $res = $database->insert($name, $price, $folder, $quantity, $discription, $date);
    if($res){
        echo "inserted";
    }else{
        echo "not inserted";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Add Product</title>
</head>
<body>
<h1>Add Product</h1>

<form  method="post" class="form" enctype="multipart/form-data">
    <input type="text" placeholder="Enter Product Name" name="name" required><br><br>
    <input type="number" placeholder="Enter Product price" name="price" required><br><br>
    <input type="file" placeholder="Enter Product Image" name="image" required><br><br>
    <input type="number" placeholder="Enter Product quantity" name="quantity" required><br><br>
    <input type="text" placeholder="Enter Product Discription" name="discription" required><br><br>
    <input type="date" placeholder="Enter Product Date" name="date"><br><br>
     <input type="submit" name="btninsert" value="Add Product">
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>