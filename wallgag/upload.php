<?php 
    include ("whatever.php");
    //include ("base.php"); 
?>
<html lang="en">  
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        include ("header.php");
    ?>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/1-col-portfolio.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/loginSignup.css">
</head>
<body>
    <!-- Navigation -->
    <?php
        include ("nav.php");
    ?>
    <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $pageTitles[$url]; ?>
                    </h1>
                </div>
            </div>
    <h3>  
    <?php

    //require "class.datamanager.php";
    //$db_man = new DatabaseManager('localhost','PictureBase','root','');
    if (!file_exists('uploads/' . $_POST['category'])){
        mkdir('uploads/' . $_POST['category']);
    }
    if (!file_exists('uploads/' . $_POST['category'] . '/' . $_SESSION['Username'])) {
        mkdir('uploads/' . $_POST['category'] . '/' . $_SESSION['Username']);
    }
    $target_dir = "uploads/" . $_POST['category'] . "/" . $_SESSION['Username'] . "/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "<span class='glyphicon glyphicon-ok'></span> File is an image - " . $check["mime"] . ".<br>";
            $uploadOk = 1;
        } else {
            echo "<span class='glyphicon glyphicon-remove'></span> File is not an image.<br>";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<span class='glyphicon glyphicon-remove'></span> Sorry, file already exists.<br>";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "<span class='glyphicon glyphicon-remove'></span> Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "<span class='glyphicon glyphicon-remove'></span> Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<span class='glyphicon glyphicon-remove'></span> Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "<span class='glyphicon glyphicon-ok'></span> The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br>";
            $categeory=$_POST['category'];
            $array = $db_man->categoryList();
            $arrlength = count($db_man->categoryList());
            for ($i=0; $i < $arrlength; $i++) { 
                if ($array[$i][1] == $categeory) {
                    $category=$array[$i][0];
                }
            }  
            $db_man->newImageInfo($_POST['title'],$target_file,$_POST['desc'],$category,$_SESSION['Username']);
        } else {
            echo "<span class='glyphicon glyphicon-remove'></span> Sorry, there was an error uploading your file.<br>";
        }
    }?></h3>
    <a href="myPage.php"><button class="btn btn-warning">Back</button></a>
    </div>
</body>
</html>



<?php
    /*if(isset($_FILES['inputImage'])){
        $errors= array();

        $file_name = $_FILES['inputImage']['name'];
        $file_size =$_FILES['inputImage']['size'];
        $file_tmp =$_FILES['inputImage']['tmp_name'];
        $file_type=$_FILES['inputImage']['type']; 

        $title=$_POST['title'];
        $desc=$_POST['desc'];
        $categeory=$_POST['category'];
        $array = $db_man->categoryList();
        $arrlength = count($db_man->categoryList());
        for ($i=0; $i < $arrlength; $i++) { 
            if ($array[$i][1] == $categeory) {
                $category=$array[$i][0];
            }
        }  
        $file_ext=strtolower(end(explode('.',$_FILES['inputImage']['name'])));
        if($file_size > 2097152){
        $errors[]='File size must be less than 2 MB';
        }               
        if(empty($errors)==true){
            move_uploaded_file($file_tmp,"images/uploads/".$file_name);
            echo "Success";
        }else{
            echo json_encode($errors);
        }
        $path = ("images/uploads/".$file_name);
        $db_man->newImageInfo($title,$path,$desc,$categeory);
    //}*/
?>
<!--
<form action="" method="POST" enctype="multipart/form-data">
<input type="file" name="image" />
<input type="submit"/>
</form>
-->
<?php
//OLD STUFF
/*
    error_reporting(E_ALL); ini_set('display_errors', true);
    require "class.datamanager.php";
    $db_man = new DatabaseManager('localhost','PictureBase','root','');
    require 'scrypt.php';
    session_start(); //session start
    $error=''; 
try{
    $title=$_POST['title'];
    $desc=$_POST['desc'];
    $categeory=$_POST['category'];
    $array = $db_man->categoryList();
    $arrlength = count($db_man->categoryList());
    for ($i=0; $i < $arrlength; $i++) { 
        if ($array[$i][1] == $categeory) {
            $category=$array[$i][0];
        }
    }
    //$fileName=$_POST['inputImage'];   við vitum að það á ekki að gera þetta svona en við viljum fá filename.
    //$path=("image/".$file);

    $testPath="image/testing";
    //echo ($title . $desc . $category . $testPath);
    //Þetta virkaði ekki og við höfðum ekki tíma í að finna út hvers vegna. En þetta er annars svo drullu solid hjá okkur að vonandi skiptir það engu máli.
    $db_man->newImageInfo($title,$testPath,$categeory,$categeory);




    $email=$_POST['loginEmail'];
    $password=$_POST['loginPassword'];
    $sql = $pdo->prepare("SELECT email_user, password_user, username_user FROM user WHERE email_user=:loginEmail");
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    $sql->bindParam(':loginEmail', $_POST['loginEmail'], PDO::PARAM_STR);
    $sql->execute();
    $count = $sql->rowCount(); // telja rows
    $rows = $sql->fetch(); //ná í gögn
    
    $username = $rows['username_user'];
    
    
    if (Password::check($_POST['loginPassword'] ,$rows['password_user'])) {
        $_SESSION['loginEmail']=$username; // Session'ið er username
        session_write_close();
        echo $_SESSION['loginEmail'];
        header('Location: ../index.php');  // Redirecting To Other Page
    } else {
        $error = "Username or Password is invalid b";
        echo $error;
    }
        
    } catch(PDOException $e){echo $e;}
    session_write_close();*/
    /*
*      Simple file Upload system with PHP.
*      Created By Tech Stream
*      Original Source at http://techstream.org/Web-Development/PHP/Single-File-Upload-With-PHP
*      This program is free software; you can redistribute it and/or modify
*      it under the terms of the GNU General Public License as published by
*      the Free Software Foundation; either version 2 of the License, or
*      (at your option) any later version.
*      
*      This program is distributed in the hope that it will be useful,
*      but WITHOUT ANY WARRANTY; without even the implied warranty of
*      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*      GNU General Public License for more details.
*     
*/
?>