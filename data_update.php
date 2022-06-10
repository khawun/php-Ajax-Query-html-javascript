<?php
include_once "connect.php";
$db=new Connect;
     class UPdate{
            public function updat_record(){
                 global $db;
                     $id=$_POST["id"];
                     $address=$_POST["address"];
                     $name=$_POST["name"];
                     $price=$_POST["price"];
                     $number=$_POST["number"];
                     $discount=$_POST["discount"];
                     $date=$_POST["date"];
                $update="UPDATE `data_product` SET `address`='$address',`Nam`='$name',`price`='$price',`number`='$number',`discount`='$discount',`Dat`='$date'where `id`='$id'";
                if(mysqli_query($db->con,$update)){
                    header('location:table_product.php');
                }
                else{
                     echo "not fond!";
                }
            }
    }
$data=new UPdate;
$data->updat_record();
?>