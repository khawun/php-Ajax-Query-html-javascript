=<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornn ensert</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="include">
        <div class="head">
            <h1>
                Form Ensert product
            </h1>
        </div>
        <form class="form"name="form"method="POST"action="#"id="form">
            <div class="rename">
                <label for="adress">adress</label>
                <input type="text"name="address"placeholder="enter adress"id="ad">
            </div>
            <div class="rename">
                <label for="name">Name product</label>
                <input type="text"name="name"placeholder="enter name"id="np">
            </div>
            <div class="rename">
                <label for="price">Price</label>
                <input type="number"name="price"placeholder="enter price"id="pr">
            </div>
            <div class="rename">
                <label for="number">Number</label>
                <input type="number"name="number"placeholder="enter number"id="nb">
            </div>
            <div class="rename">
                <label for="discount">Discount</label>
                <input type="number"name="discount"placeholder="enter discount"id="ds">
            </div>
            <div class="rename">
                <label for="date">Date</label>
                <input type="date"name="date"placeholder="enter date"id="dt">
            </div>
            <button type="submit"name="submit"id="submit">submit</button>
            <a href="table_product.php">Show Table</a>
        </form>
    </div>
</body>
<SCRIPt>
   $(document).ready(function(){
    $("#submit").click(function(){
        var ad=$("#ad").val();
        var np=$("#np").val();
        var pr=$("#pr").val();
        var nb=$("#nb").val();
        var ds=$("#ds").val();
        var dt=$("#dt").val();
        var sb=$("#submit").val();
        $.ajax({
            url:"insertdata.php",
            type:"POST",
            data:{
                address:ad,
                name:np,
                price:pr,
                number:nb,
                discount:ds,
                date:dt,
                submit:sb
            },
            success:function(data){
            $("#aa").html(data);
            alert(data);
        }
        })
    $("#form")[0].reset();
    })
    });
</script>
</html>