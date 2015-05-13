<?php
    include ("whatever.php");
    //include ("test_page.php");
    //include ("class.datamanager.php");
    //$db_man = new DatabaseManager('localhost','PictureBase','root','');
    include ("random_image.php");

    use wallgag\Image\Thumbnail;

	if (isset($_POST['create'])) {
		require_once('../wallgag/Image/Thumbnail.php');
		try {
			$thumb = new Thumbnail($_POST['pix']);
			$thumb->setDestination('../wallgag/thumbs/');
 			$thumb->setMaxSize(100);
 			$thumb->setSuffix('small');
 			$thumb->create();
			//$thumb->test();
			$messages = $thumb->getMessages();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
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
    <?php if (isset($imageSize)) { ?>
        <style>
            figcaption {
                width: <?= $imageSize[0]; ?>px;
            }
        </style>
     <?php } ?>

</head>

<body>
    <!-- Navigation -->
    <?php
        include ("nav.php");
    ?>

    <!-- Page Content -->
    <div class="container">
        <!--<figure>
            <img src="<?= $selectedImage; ?>" alt="Random image">
            <figcaption><?= $caption; ?></figcaption>
        </figure>-->
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $pageTitles[$url]; ?>
                    <small>wallpapers</small>
                </h1>
            </div>
        </div>

		<form method="post" action="">
			 <p>
				<select name="pix" id="pix">
				<option value="">Select an image</option>
				<?php
				$dir = "uploads/*/*/*";
		        $images = glob( $dir );
				foreach ($images as $image) {
				 	$findImage = mysql_query("SELECT * FROM images WHERE imagePath = '".$image."'");
		            $row = mysql_fetch_array($findImage);
		            $imageName = $row['imageName'];
				 	?>
					<option value="<?= $image; ?>"><?= $imageName; ?></option>
					<?php } ?>
				</select>
			</p>
			<p>
				<input type="submit" name="create" value="Create Thumbnail">
			 </p>
		</form>

		<?php
			if (isset($messages) && !empty($messages)) {
				echo '<ul>';
				foreach ($messages as $message) {
					echo "<li>$message</li>";
				}
				echo '</ul>';
			}
		?>

		<hr>
<!-- Footer -->
        <?php
            include ("footer.php");
        ?>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>