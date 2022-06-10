<?php
include "connect.php";
$db=new Connect;
class Staff{
    private $first,
            $last,
            $Gender,
            $phone,
            $email,
            $birth,
            $birthplace,
            $job,
            $salary,
            $profile;
    private $type=array("text","text","text","number","text","date","text","text","number","file");
    private $class=array("first","last","Gender","phone","email","birth","birthplace","job","salary","image");
    public function __construct($first,$last,$Gender,$phone,$email,$birth,$birthplace,$job,$salary,$profile){
        $this->first=$first;
        $this->last=$last;
        $this->Gender=$Gender;
        $this->phone=$phone;
        $this->email=$email;
        $this->birth=$birth;
        $this->birthplace=$birthplace;
        $this->job=$job;
        $this->salary=$salary;
        $this->profile=$profile;
    }
    public function __destruct()
    {
        $class=$this->class;
        $name=$class;
        $type=$this->type;
        $staff=array($this->first,$this->last,$this->Gender,$this->phone,$this->email,$this->birth,$this->birthplace,$this->job,$this->salary,$this->profile);
        echo "<div class='main'>";
            echo "<form action='#'method='POST'enctype='multipart/form-data'>";
                echo "<div class='insert'>";
                    for($i=0;$i<count($staff);$i++){
                        echo "<div class='field'>"."<label>".$staff[$i]."</label>"."<input name='$name[$i]' class='$class[$i]'type='$type[$i]'/>"."</div>";
                        echo "<br>";
                    }
                echo "</div>";       
                echo "<div class='btn'>
                       <button id='b1'>cancel</button>
                        <button id='b2'class='submit'>submit</button>
                    </div>";
            echo "</form>";
        echo "</div>";
    }
    public function valid(){
        global $db;
        if(!isset($_POST["submit"])){
            $name=($this->class);
            $leng=count($name);
            for($i=1;$i<$leng-1;$i++){
                $data=empty($_POST[$name[$i]]);
            }
                if(!empty($_POST["first"])&&!$data){
                    $email=$_POST["email"];
                    if(filter_var($email,FILTER_VALIDATE_EMAIL)==true){
                       // echo "<pre>";
                       // print_r($_FILES["image"]);
                       // echo "</pre>";
                        $image_name=$_FILES["image"]["name"];
                    //    $image_type=$_FILES["image"]["type"];
                        $image_size=$_FILES["image"]["size"];
                        $image_error=$_FILES["image"]["error"];
                        $tmp_image=$_FILES["image"]["tmp_name"];
                        if($image_error===0){
                            if($image_size>12500000){
                                echo "sory your file is too large";
                            }
                            else{
                                $check1=pathinfo($image_name,PATHINFO_EXTENSION);
                                $check2=strtolower($check1);
                                $compare=array("jpg","jpeg","png");
                                if(in_array($check2,$compare)){
                                        $stor=uniqid("IMG-",true).'.'.$check2;
                                        $upload="photo/".$stor;
                                        move_uploaded_file($tmp_image,$upload);
                                        $first=$_POST["first"];
                                        $last=$_POST["last"];
                                        $Gender=$_POST["Gender"];
                                        $phone=$_POST["phone"];
                                        $email=$_POST["email"];
                                        $birth=$_POST["birth"];
                                        $birthplace=$_POST["birthplace"];
                                        $job=$_POST["job"];
                                        $salary=$_POST["salary"];
                                        $Upload="INSERT INTO db_staff(`first_name`, `last_name`, `Gender`, `phone`, `email`, `birth`, `birthplace`, `job_role`, `salary`, `image`)
                                        VALUES('$first','$last','$Gender','$phone','$email','$birth','$birthplace','$job','$salary','$stor')";
                                        if(mysqli_query($db->con,$Upload)){
                                            echo "<script>alert('Upload data for staff success full');</script>";
                                        }
                                        else {
                                            echo "error data insert!";
                                        }
                                }
                            }
                        }
                        
                    }
                    else {
                        echo "noooooooot";
                    }
                 }
        }
    }
}
$staff=new Staff('First name','Lasst name','Gender','phone','email','birth','birthplace','Job Role','Salary','profile');
$staff->valid();
?>
<style>
    .main{
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        width:400px;
        background-color: aqua;
    }
    form{
        padding: 10px;
    }
    .field{
        display: flex;
    }
    label{
        width:30%;
        padding: 4px;
    }
    input{
        padding: 4px;
        width: 70%;
    }
    .main form .btn{
        width: 80%;
        margin-left:10px;
    }
   .main form .btn button{
        align-items: center;
        justify-content: center;
        padding: 6px 30px;
        margin-left:4px;
        background-color:blue;
        color: white;
        border-radius:5px;
    }
    .main form .btn button:hover{
        cursor:pointer;
        background-color:black;
        color:white;
    }
    .main form .btn button:focus{
        transform: scale(0.9);
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    
</body>
<script>
    $(document).ready(function(){
        $('.submit').click(function(){
            var first=$('.first').val();
            alert(first);
        })
    })
</script>
</html>