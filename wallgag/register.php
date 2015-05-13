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
        	<small>Please enter your details below to register.</small></h1>
    	</div>
	</div>
		<?php
		if(!empty($_POST['username']) && !empty($_POST['password']))
		{
			$firstName = mysql_real_escape_string($_POST['firstName']);
			$lastName = mysql_real_escape_string($_POST['lastName']);
			$username = mysql_real_escape_string($_POST['username']);
		    $password = mysql_real_escape_string($_POST['password']);
		    $email = mysql_real_escape_string($_POST['email']);
		    
			 $checkusername = mysql_query("SELECT * FROM users WHERE userName = '".$username."'");
		     
		     if(mysql_num_rows($checkusername) == 1)
		     {
		     	echo "<h1>Error</h1>";
		        echo "<p>Sorry, that username is taken. Please go back and <a href=\"register.php\">try again</a>.</p>";
		     }
		     else
		     {
		     	$registerquery = mysql_query("INSERT INTO users (firstName, lastName, userName, userPassword, userEmail) VALUES('".$firstName."', '".$lastName."', '".$username."', '".$password."', '".$email."')");
		        if($registerquery)
		        {
		        	echo "<h1>Success</h1>";
		        	echo "<p>Your account was successfully created. Please <a href=\"login.php\">click here to login</a>.</p>";
		        }
		        else
		        {
		     		echo "<h1>Error</h1>";
		        	echo "<p>Sorry, your registration failed. Please go back and <a href=\"register.php\">try again</a>.</p>";    
		        }    	
		     }
		}
		else
		{
			?>
		    
			<form method="post" action="register.php" name="registerform" id="registerform">
			<fieldset>
				<label for="firstName">First name:</label><input class="form-control" type="text" name="firstName" id="firstName" /><br />
				<label for="lastName">Last name:</label><input class="form-control" type="text" name="lastName" id="lastName" /><br />
				<label for="username">Username:</label><input class="form-control" type="text" name="username" id="username" /><br />
				<label for="password">Password:</label><input class="form-control" type="password" name="password" id="password" /><br />
		        <label for="email">Email Address:</label><input class="form-control" type="text" name="email" id="email" /><br />
		        <label for="hearofwebsite">Where did you hear about us?</label>
		        <select class="form-control" name="hearofwebsite" id="hearofwebsite">
				  <option>From the goverment</option>
				  <option>From a friend</option>
				  <option>Found you on Google</option>
				  <option>On the ground</option>
				  <option>On eBay</option>
				</select><br />
				<input type="submit" name="register" id="register" value="Register" class="btn btn-info" />
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