<?php
include "connect.php";
$db=new Connect;
   if(isset($_POST['invoice'])){
      if(!empty($_POST["usa"])&&!empty($_POST["khmer"])&&(!empty($_POST["payment_usa"])||!empty($_POST["payment_khm"]))&&!empty($_POST["amount_usa"])&&!empty($_POST["amount_khm"])){
         $usa=($_POST["usa"]);
         $khmer=($_POST["khmer"]);
         $payment_usa=$_POST["payment_usa"];
         $payment_khm=$_POST["payment_khm"];
          //select table  db_result for upload data from database;
          $select="SELECT *from `db_resuld`";
          $result=(mysqli_query($db->con,$select));
          echo "<div clas='main'>";
             echo "<table>";
                echo "<tr>";
                    echo "<td>"."name"."</td>";
                    echo "<td>"."address"."</td>";
                    echo "<td>"."price"."</td>";
                    echo "<td>"."number"."</td>";
                    echo "<td>"."Total"."</td>";
                echo "</tr>";
              while($row=mysqli_fetch_assoc($result)){
                $name=$row["name"];
                $price=$row["price"];
                $number=$row["number"];
                $TOTAl=number_format($row["USA"],2);
                $address=$row["address"];
                $date=$row['date'];
                echo "<tr>";
                  echo "<th>".$name."</th>";
                  echo "<th>".$address."</th>";
                  echo "<th>".$price."</th>";
                  echo "<th>".$number."</th>";
                  echo "<th>".$TOTAl."</th>";
                  echo "<br>";
                echo "</tr>"; 
                }
              echo "<tr>";
                    echo "<td>"."</td>";
                    echo "<td>"."</td>";
                    echo "<td>"."</td>";
                    echo "<td>"."</td>";
                    echo "<td>".$usa."<br>".$khmer."</td>";
              echo "</tr>";
            echo "</table>";
            echo "<div>";
               echo "<button>".'<a href="cashier.php">Back</a>'."</button>";
               echo "<a href='print.php'>"."print"."</a>";
            echo "</div>";
         echo "</div>";
      }
      else{echo "not";}

    }
     ?>