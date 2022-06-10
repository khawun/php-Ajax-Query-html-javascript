<?php
include_once 'connect.php';
$d=new Connect;
class data{
   public function insert_data(){
        global $d;
        if(isset($_POST['submit'])){
         if((isset($_POST['address']))&&(isset($_POST['name']))&&isset($_POST['price'])&&isset($_POST['discount'])&&isset($_POST['date'])&&isset($_POST['number'])){
                if(!empty($_POST['address'])&&!empty($_POST['name'])&&!empty($_POST['price'])&&!empty($_POST['discount'])&&!empty($_POST['date'])&&!empty($_POST['number'])){
                    $address=$_POST["address"];
                    $name=$_POST["name"];
                    $price=$_POST["price"];
                    $number=$_POST["number"];
                    $discount=$_POST["discount"];
                    $date=$_POST["date"];
                    $upload_record="INSERT into data_product(`Address`,`Nam`,`price`,`discount`,`Dat`,`number`)values('$address','$name','$price','$discount','$date','$number')";
                    if(mysqli_query($d->con,$upload_record)){echo "insert data success full";}
                    else{echo "query error";}
                }
            }
         }
    }
}
$k=new data;
$k->insert_data();
?>