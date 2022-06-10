<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
</head>
<body>
    
</body>
</html>

<style>
    *{
        margin: 0px;
        padding: 0px;

    }
    body{
        height:auto;
    }
    .conten{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        background-color:antiquewhite;
    }
    table{
        width:800px;
    }
table,tr,td,th{
    width:px;
    padding: 5px;
    border: 2px solid black;
    border-collapse: collapse;
}
th{
    color: blanchedalmond;
    background-color: blue;
}
table tr td{
    text-align: center;
    padding: 5px;
    color: black;
}
.fa{
    width: 50px;
    margin-left: -40px;
    margin-right: 20px;
    color: white
}
.fa:hover{
    cursor: pointer;
}
</style>

<?php
        require_once 'connect.php';
        $datacon=new Connect;
        class Upoad{
            private $result;
            private $row;
            private $select;
            public function upload_data(){
                global $datacon;
                $this->select="SELECT *from data_product";
                $this->result=(mysqli_query($datacon->con,$this->select));
                if(mysqli_num_rows($this->result)>0){
                    echo "<body class='conten'>";
                    echo "<table>";
                    echo "<tr class='header'>";
                             echo "<th>".'<a href="form.php">'.'<i class="fa fa-arrow-circle-left"></i>'.'</a>'."Name"."</th>";
                            echo"<th>"."address"."</th>";
                            echo"<th>"."Prices"."</th>";
                            echo "<th>"."Number"."</th>";
                            echo "<th>"."Discount"."</th>";
                            echo"<th>"."Date"."</th>";
                            echo"<th>"."Delet"."</th>";
                    echo "</tr>";
                    while($this->row=mysqli_fetch_assoc($this->result)){
                        $record=$this->row;
                        echo "<tr>";
                            echo "<td>".'<a href="updat_data.php?id='.$record['id'].'">'.$record['Nam'].'</a>'."</td>";
                            echo "<td>".$record['Address']."</td>";
                            echo "<td>".$record['price']."$"."</td>";
                           echo "<td>".$record['number']."</td>";
                            echo "<td>".$record['discount']."$"."</td>";
                            echo "<td>".$record['Dat']."</td>";
                            echo "<td>".'<a href="delet.php?id2='.$record['id'].'">'."Delet".'</a>'."</td>";
                           echo "<br>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</body>";
                }
            }

        }
        $database=new Upoad;
        $database->upload_data();
?>