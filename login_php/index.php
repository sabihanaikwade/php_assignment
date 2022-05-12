<?php
$insert = false;
if(isset($_POST['name'])){

   $server="localhost";
   $username="root";
   $password="";

   $con=mysqli_connect($server,$username,$password);

   if(!$con){
       die("connection to this database failed due to" . mysqli_connect_error());
   }

//    echo "Success connecting to the db";

     $name = $_POST['name'];
     $phone = $_POST['phone'];
     
     $sql="  INSERT INTO `form`.`form` ( `name`,`phone`) VALUES ('$name','$phone');";
     
    //  echo $sql;

     if($con->query($sql)== true){
        //  echo "successfully inserted";
        $insert=true;
     }
     else{
         echo "ERROR: $sql <br> $con->error";
        //  $not_insert = true;
     }

     $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Please Enter your Name and Number here</h1>
        
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Your form is submitted successfully!!!.</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <button class="btn">Submit</button>
            
        </form>
    </div>
    
</body>
</html>