<?php

class Database{

   private $con ;

   public function connection(){
    $this->con = mysqli_connect("localhost","root","","opp_product");
    if(mysqli_connect_errno()){
        die("Connection Failed". mysqli_connect_error());
    }
   }
   public function insert($name, $price, $folder, $quantity, $discription, $date){
    $query = "INSERT INTO `product`(`name`, `price`, `image`, `quantity`, `discription`, `date`) VALUES ('$name','$price','$folder','$quantity','$discription','$date')";
    $result = mysqli_query($this->con, $query);
    if($result){
        return true;
    }else{
        return false;
    }
}

   public function fetch(){
    $query = "SELECT * FROM `product`";
    $result = mysqli_query($this->con, $query); 
    return $result;
   }

   public function delete($id){
    $query = "DELETE FROM `product` WHERE id = $id";
    $result = mysqli_query($this->con, $query); 
    if($result){
        return true;
    }else{
        return false;
    }
   }

   public function edit($id){
    $query = "SELECT * FROM `product` WHERE id = $id";
    $result = mysqli_query($this->con, $query); 
    return $result;
   }    

   public function update($id, $name, $price, $folder, $quantity, $discription, $date){
    $query = "UPDATE  product SET  name='$name', price=$price, image='$folder', quantity=$quantity,discription ='$discription', date=$date WHERE id = $id";
    $result = mysqli_query($this->con, $query);
    if($result){
        return true;
    }else{
        return false;
    }
}

}

$database = new Database();
$database->connection();

?>