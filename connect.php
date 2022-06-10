<?php
class Connect{
    public function __construct()
    {
       $this->db_con();
    }
   public $con;
   public function db_con(){
        $servername="localhost";
        $username="root";
        $password="";
        $database="product";
        $this->con=mysqli_connect($servername,$username,$password,$database);
        if(!$this->con){echo"error";
        }
        else{ echo "";
        }
   }
}
    /*public function select($a){
       $sel=mysqli_real_escape_string($this->con,$a);
       return $sel;
   }
}*/
?>