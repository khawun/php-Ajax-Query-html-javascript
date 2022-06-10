

<?php
session_start();
include_once 'connect.php';
$db=new Connect;
    class OPerator{
        public function operator(){
        global $db;
        if(isset($_POST['submit'])&&isset($_POST["address"])&&isset($_POST["number"])){
            $add=$_POST['address'];
            $num=$_POST['number'];
            $select="SELECT *from `data_product`where `address`='$add'";
            $resuld=(mysqli_query($db->con,$select));
            if(mysqli_num_rows($resuld)>0){
                while($row=mysqli_fetch_assoc($resuld)){
                    $id=$row['id'];
                    $discount=$row['discount'];
                    $price=$row['price'];
                    $name=$row['Nam'];
                    $date=$row['Dat'];
                }  
                $usa=(($price*$num)-($num*$discount));
                $khmer=($usa*4100);
                $insert="INSERT into db_resuld(`id`,`name`,`price`,`number`,`USA`,`KHMER`,`address`,`date`)values('$id','$name','$price','$num','$usa','$khmer','$add','$date')";
                if(mysqli_query($db->con,$insert)){
                     echo "";
                    }
                else{echo "insert not fond!";}
            }
            else { 
                echo "enter value!";
            }
        }
    }
    private $output_khmer,$output_usa;
    public function stor(){
            global $db;
            $selecle="SELECT id,SUM(USA) as usa,SUM(KHMER) as khmer from `db_resuld`";
            $resuld=(mysqli_query($db->con,$selecle));
                while($row=mysqli_fetch_assoc($resuld)){
                    $this->output_usa=$row['usa'];
                    $this->output_khmer=$row['khmer'];
                   /* echo $output_khmer;
                    echo $output_usa;
                    $this->USA($output_usa);
                    $this->KHM($output_khmer);*/
                }
        }
    public function USA(){
            global $op;
            $output=$op->output_usa;
            echo $output;
    }
    public function KHM(){
        global $op;
        $output=$op->output_khmer;
        echo $output;
    }
    public function delete(){
        global $db;
        if(isset($_POST["delete"])){
        $delete="DELETE from `db_resuld`";
             if(mysqli_query($db->con,$delete)){
                 echo "clear";
            }
            else{echo "clear";} }
        else{echo "clear";}
        }

    }
    $op=new OPerator;
    $op->stor();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>well come</title>
   <link rel="stylesheet" href="cashier.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="include">
        <div class="header">
            <div class="left">
                <img  src="https://globalcastaway.com/wp-content/uploads/2019/11/the-ultimate-guide-for-visiting-Angkor-Wat.jpg" alt="google.com">
            </div>
            <div class="right">
                <h1>Well come to River</h1>
            </div>
        </div>
        <div class="center">
            <div class="insert">
                <form action=""method="POST"id="form"autocomplete="off">
                    <div class="field">
                        <label for="address">address</label>
                        <input type="text"name="address"id="a"/>
                    </div>
                    <div class="field">
                        <label for="number">number</label>
                        <input type="number"name="number"id="n"/>
                    </div>
                    <div class="field">
                         <input type="submit"name="delete"value="<?php $op->delete() ?>"/>
                         <button type="submit"id="s"class="submit"name="submit">upload</button>
                    </div>
                </form>
            </div>
           <div class="resuld">
                    <form method="POST"class="form"id="form"action="invoice.php">
                        <div class="field tt">
                            <label for="usa">TOTAL USA</label>
                            <input type="text"id="us_p"name="usa"class="usa"value="<?php $op->stor(); $op->USA();?>"/>
                        </div>
                        <div class="field">
                            <label for="khmer">TOTAL KHM</label>
                            <input type="text"id="kh_p"name="khmer"class="khmer"value="<?php $op->stor(); $op->KHM(); ?>"/>
                        </div>
                        <div class="field">
                            <label for="payment">payment USA</label>
                            <input type="number"name="payment_usa"id="pu"class="pu"/>
                        </div>
                        <div class="field">
                            <label for="payment">payment KHM</label>
                            <input type="number"name="payment_khm"id="pk"class="pk"/>
                        </div>
                        <div class="field">
                            <label for="us">Amount USA</label>
                            <input type="text"name="amount_usa"class="show"id="mu">
                        </div>
                        <div class="field">
                            <label for="kh">Amount KHM</label>
                            <input type="text"name="amount_khm"class="show_k"id="mk"/>
                        </div>
                            <button class="answer"type="submit"id="an">result</button>
                            <button class="invoice"id="pt"name="invoice">Invoice</button>
                    </form>
            </div>
        </div>
    </div>
</body>
<SCRIPt>
/* $(document).ready(function(){
     $("#an").click(function(e){
         e.prevtDefault();
            var usa="<?php $op->stor(); $op->USA();?>";
            var khmer="<?php $op->stor(); $op->KHM();?>";
            var py_us=$("#pu").val();
            var py_kh=$("#pk").val();
            var result=py_us-usa;
            $("#us").text(result);
     })
 });*/
 const btn_show=document.querySelector(".answer");
 btn_show.addEventListener("click",function (e) {
     e.preventDefault();
    var usa="<?php $op->stor(); $op->USA();?>";
    var khmer="<?php $op->stor(); $op->KHM();?>";
    let py_us=document.querySelector(".pu").value.trim();
    let py_kh=document.querySelector(".pk").value.trim();
    const result_usa=(py_us-usa).toFixed(2);
    const result_khm=(py_kh-khmer).toLocaleString();
    let x="000,000";
    if(py_us===""&&py_kh===""){
        document.querySelector(".show").value="Not fond!"
        document.querySelector(".show_k").value="Not fond!"

    }
   else if(py_us===""){
        document.querySelector(".show").value="$"+x;
        document.querySelector(".show_k").value=result_khm+"​​​ ៛";
    }
    else {
        document.querySelector(".show").value=result_usa+"$";
        document.querySelector(".show_k").value=x+"៛";
    }
 });
  $(document).ready(function(){
    $(".invoice").click(function(){
        var py_usa=$("#pu").val();
        var py_khm=$("#pk").val();
        var s=$("#pt").val();
        var up0="<?php $op->stor();$op->USA();?>";
        var up1="<?php $op->stor();$op->KHM(); ?>";
        var mu=$("#mu").val();
        var mk=$("#mk").val();
        var km=up1.toLocaleString();
      $.ajax({
            url:"http://localhost:8080/appproduct/invoice.php",
            type:"POST",
            data:{
                usa:up0,
                khmer:km,
                payment_usa:py_usa,
                payment_khm:py_khm,
                amount_uas:mu,
                amount_khm:mk,
                print:pt
            },
            success:function(data){
            $("#aa").html(data);
            alert(data);
        }
        })
    $("#form")[0].reset();
    })
    });
</SCRIPt>
</html>