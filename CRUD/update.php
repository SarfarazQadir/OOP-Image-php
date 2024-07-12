<?php

include "../Connection/connection.php";

$id = $_GET['id'];

$res = $database->edit($id);
$row = mysqli_fetch_assoc($res);


if(isset($_POST['btnupdate'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image_name = $_FILES["image"]["name"];
    $tmp_name = $_FILES["image"]["tmp_name"];
    $image_type = $_FILES["image"]["type"];
    $image_size = $_FILES["image"]["size"];
    $folder = "../Image".$image_name;
    move_uploaded_file($tmp_name, $folder);
    $quantity = $_POST['quantity'];
    $discription = $_POST['discription'];
    $date = isset($_POST['date']) ? $_POST['date'] : null;

    $res = $database->update($id, $name, $price, $folder, $quantity, $discription, $date);
    if($res){
        echo "Updated";
        header('Location:fetch.php');
    }else{
        echo "not Updated";
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
<title>Update Product</title>
</head>
<body>
<h1>Update Product</h1>

<form  method="post" class="form" enctype="multipart/form-data">
    <input type="number" value="<?php echo $row['id'] ?>" readonly name="id" required><br><br>
    <input type="text" value="<?php echo$row['name'] ?>" name="name" required><br><br>
    <input type="number" value="<?php echo $row['price'] ?>" name="price" required><br><br>
    <input type="file" name="image" ><img style="width: 100px; height: 100px;" src="<?php echo $row['image']?>"><br><br>
    <input type="number" value="<?php echo $row['quantity'] ?>" name="quantity" required><br><br>
    <input type="text" value="<?php echo $row['discription'] ?>" name="discription" required><br><br>
    <input type="date" value="<?php echo $row['date'] ?>" placeholder="Enter Product Date" name="date"><br><br>
    <!-- <input type="text" placeholder="Enter Product Name" name="name" required><br><br> -->
     <input type="submit" name="btnupdate" value="Update Product">
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>