<?php
include_once 'connect.php';
$db=new Connect;
        class Update{
                    private $result;
                    private $row;
                    private $select;
                    private $address;
                    private $name,$price;
                    private $discount,$date,$id;       
                 public  function update_data(){
                    $id=$_GET['id'];
                    global $db;
                    $this->select="SELECT *from data_product WHere `id`='$id'";
                    $this->result=(mysqli_query($db->con,$this->select));
                    if(mysqli_num_rows($this->result)>0){
                        while($this->row=mysqli_fetch_assoc($this->result)){
                            $record=$this->row;
                            $this->address=$record['Address'];
                            $this->name=$record['Nam'];
                            $this->price=$record['price'];
                            $this->number=$record['number'];
                            $this->discount=$record['discount'];
                            $this->date=$record['Dat'];
                            $this->id=$record['id'];
                        }
                    }

                }
                    public  function address(){
                            global $update;
                            $ad=$update->address;
                            echo $ad;
                        }
                    public function name(){
                            global $update;
                            $n=$update->name;
                            echo $n;
                        }
                    public function price(){
                            global $update;
                            $p=$update->price;
                            echo $p;
                    }
                   public function number(){
                        global $update;
                        $nm=$update->number;
                        echo $nm;
                   }
                    public function discount(){
                            global $update;
                            $d=$update->discount;
                            echo $d;
                    }
                    public function date(){
                            global $update;
                            $dt=$update->date;
                            echo $dt;
                    }
                    public function id(){
                            global $update;
                            $i=$update->id;
                            echo $i;
                    }

                    
        
        }
        $update=new Update;$update->update_data();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornn ensert</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        *{
    margin: 0;
    padding: 0;
}
body{
    background-color: beige;
}
.include{
    width: 400px;
    height: 320px;
    position: absolute;
    background-color: aqua;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    padding: 20px;
    border: 2px solid black;
    border-radius: 10px;
}
.head{
    width: 100%;
    margin-bottom: 10px;
}
h1{
    text-align: center;
    border-bottom: 2px solid black;
    padding: 5px;
}
.include> .form{
    width: 100%;
}
.include> .form> .rename> label{
    width: 40%;
    padding: 4px;
}
.include> .form> .rename> input{
    width:60%;
    padding: 4px;
}
.include> .form> .rename{
    padding: 5px;
    display: flex;
}
 button{
    width: 100%;
    padding: 5px;
    border-radius: 5px;
    background-color: blue;
    color: aliceblue;
}
button:hover{
    cursor: pointer;
}
a{
    width: 100%;
    margin-top: 4px;
}
    </style>
</head>
<body>
    <div class="include">
        <div class="head">
            <h1>
                Form Update data
            </h1>
        </div>
        <form class="form"name="fm"method="POST"action="data_update.php"id="form">
            <div class="rename">
                <input type="hidden"name="id"value="<?php $update->id(); ?>">
            </div>
            <div class="rename">
                <label for="address">adress</label>
                <input type="text"name="address"id="ad"value="<?php $update->address(); ?>">
            </div>
            <div class="rename">
                <label for="name">Name product</label>
                <input type="text"name="name"id="np"value="<?php $update->name();  ?>">
            </div>
            <div class="rename">
                <label for="price">Price</label>
                <input type="text"name="price"id="pr"value="<?php $update->price(); ?>">
            </div>
        
            <div class="rename">
                <label for="number">number</label>
                <input type="number"name="number"id="nm"value="<?php $update->number(); ?>">
            </div>
            <div class="rename">
                <label for="discount">Discount</label>
                <input type="float"name="discount"id="ds"value="<?php $update->discount(); ?>">
            </div>
            <div class="rename">
                <label for="date">Date</label>
                <input type="date"name="date"id="dt"value="<?php $update->date(); ?>">
            </div>
            <div class="renam">
                <button type="submit"name="submit"id="submit">Update</button>
                <a href="table_product.php">Cancel</a>
            </div>
        </form>
    </div>
</body>
<SCRIPt>
    $(document).ready(function(){
    $("#submit").click(function(){
        var id=("id").val();
        var ad=$("#ad").val();
        var np=$("#np").val();
        var pr=$("#pr").val();
        var nb=$("#nb").val();
        var ds=$("#ds").val();
        var dt=$("#dt").val();
        var sb=$("#submit").val();
        $.ajax({
            url:"data_update.php",
            type:"POST",
            data:{
                id=id,
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
</SCRIPt>
</html>