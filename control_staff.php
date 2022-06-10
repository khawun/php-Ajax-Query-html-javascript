<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page control to Staff</title>
</head>
<body>
    <div class="include">
        <div class="header">
            <h1>Control staff</h1>
        </div>
        <div class="center">
            <table>
                <tr class="title">
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>JOb Title</th>
                    <th>Birth</th>
                    <th>Id</th>
                    <th>Profile</th>
                    <th>Dalet</th>
                </tr>
                <?php include "connect.php";
                    $db=new Connect;
                    $sql="SELECT *from `db_staff`";
                    $result=(mysqli_query($db->con,$sql));
                    if(mysqli_num_rows($result)>0){ 
                        while($field=mysqli_fetch_assoc($result)){ ?>
                            <tr>
                                <td><?php echo $field["first_name"]." ".$field["last_name"]; ?></td>
                                <td><?php echo $field["Gender"]; ?></td>
                                <td><?php echo $field["phone"]; ?></td>
                                <td><?php echo $field["email"]; ?></td>
                                <td><?php echo $field["job_role"]; ?></td>
                                <td><?php echo $field["birth"]; ?></td>
                                <td><?php echo $field["staff_id"]; ?></td>
                                <td><img width="100px" src="photo/<?php echo $field['image']; ?>" alt=""></td>
                                <td><a href="">Dalet</a></td>

                            </tr>

                    <?php  }} ?>
            </table>
        </div>
    </div>
</body>
</html>