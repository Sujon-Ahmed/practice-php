<?php
    require 'connection.php';
    
    if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST"){
        function test_input($data) {

            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $name = test_input($_POST['name']);
        $email = test_input($_POST['email']);
        $phone = test_input($_POST['phone']);
        $district = $_POST['district'];
        $gender = $_POST['gender'];
        $hobby = ($_POST['hobby'])?implode(',',$_POST['hobby']):'';
        $message = test_input($_POST['message']);

        if($name != '' && $email != '' && $phone != '' && $district != '' && $gender != '' && $hobby != '' && $message != ''){
           
            $sql = "INSERT INTO `simple`(`name`, `email`, `phone`, `district`, `gender`, `hobby`, `message`) VALUES ('$name','$email','$phone','$district','$gender','$hobby','$message')";

            if($con->query($sql) == true){
                header('location:index.php?insert=success');
            }else{
                echo 'something went wrong';
            }



        }else{
            header('location:index.php?valid=error');
        }

    }else{
        header('location:index.php');
    }





?>