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
		<?php
		if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
		{
			 ?>
		    
		     <meta http-equiv="refresh" content="0;index.php">
		    
		    <?php
		}
		elseif(!empty($_POST['username']) && !empty($_POST['password']))
		{
			$username = mysql_real_escape_string($_POST['username']);
		    $password = mysql_real_escape_string($_POST['password']);
		    
			$checklogin = mysql_query("SELECT * FROM users WHERE userName = '".$username."' AND userPassword = '".$password."'");
		    
		    if(mysql_num_rows($checklogin) == 1)
		    {
		    	 $row = mysql_fetch_array($checklogin);
		        $email = $row['userEmail'];
		        $firstName = $row['firstName'];
		        $lastName = $row['lastName'];
		        
		        $_SESSION['Username'] = $username;
		        $_SESSION['EmailAddress'] = $email;
		        $_SESSION['FirstName'] = $firstName;
		        $_SESSION['LastName'] = $lastName;
		        $_SESSION['LoggedIn'] = 1;
		        
		    	echo "<h1>Success</h1>";?>
		        <meta http-equiv="refresh" content="0;myPage.php"><?php
		    }
		    else
		    {
		    	echo "<h1>Error</h1>";
		        echo "<p>Sorry, your account could not be found. Please <a href=\"login.php\">click here to try again</a>.</p>";
		    }
		}
		else
		{
			?>
		    
		   
		    
			<form method="post" action="login.php" name="loginform" id="loginform">
			<fieldset>
				<label for="username">Username:</label><input class="form-control" type="text" name="username" id="username" /><br />
				<label for="password">Password:</label><input class="form-control" type="password" name="password" id="password" /><br />
				<input type="submit" name="login" id="login" value="Login" class="btn btn-info" />
			</fieldset>
			</form>
		    
		   <?php
		}
		?>
		<!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php
            include ("footer.php");
        ?>
	</div>

</body>
</html>