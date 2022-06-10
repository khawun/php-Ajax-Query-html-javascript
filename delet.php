<?php
include_once 'connect.php';
$db=new Connect;
$id= $_GET['id2'];
global $db;
$delete="DELETE from `data_product`where `id`='$id'";
if(mysqli_query($db->con,$delete)){
    header("location:table_product.php");
}
else{

}

?>