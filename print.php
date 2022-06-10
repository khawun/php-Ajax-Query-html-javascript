<?php
include_once "connect.php";
$db=new Connect;
global $db;
$select="SELECT *from `db_resuld`";
$result=(mysqli_query($db->con,$select));
    if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
      $name=$row["name"];
      $price=$row["price"];
      $number=$row["number"];
      $TOTAl=$row["USA"];
      $address=$row["address"];
      $date=$row['date'];
      $insert ="INSERT into db_sell(`Name`,`Address`,`Price`,`Number`,`Total`,`Dat`)values('$name','$address','$price','$number','$TOTAl','$date')";
            if(mysqli_query($db->con,$insert)){
                header("location:cashier.php");
            }
            else{echo "error";}
    }
}
?>