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
            $thumb->setMaxSize($_POST['size']);
            $thumb->setSuffix('resized_' . $_POST['size']);
            $thumb->create();
            //$thumb->test();
            $messages = $thumb->getMessages();
            $filename = $thumb->getFilename();
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
    <link href="css/fileinput.min.css" rel="stylesheet">
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
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $pageTitles[$url]; ?>
                    <small></small>
                </h1>
            </div>
        </div>
		<form method="post" action="">
             <p>
                <label for="pix">Chose picture:</label><select name="pix" id="pix" class="form-control">
                <?php
                $dir = "uploads/*/" . $_SESSION['Username'] . "/*";
                $images = glob( $dir );
                foreach ($images as $image) {
                    $findImage = mysql_query("SELECT * FROM images WHERE imagePath = '".$image."'");
                    $row = mysql_fetch_array($findImage);
                    $imageName = $row['imageName'];
                    ?>
                    <option value="<?= $image; ?>"><?= $imageName; ?></option>
                    <?php } ?>
                </select>
                <label for="size">Chose maximum side length:</label>
                <input type="text" name="size" id="size" class="form-control"></input>
            </p>
            <p>
                <button class="btn btn-success" type="submit" name="create" value="Create Thumbnail" href="#resize">Create</button>
             </p>
        </form>

        <?php
            if (isset($messages) && !empty($messages)) {
                foreach ($messages as $message) {
                    echo "<h4>$message </h4>";
                }
            }
        ?>
<!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
        <hr>

        <!-- Footer -->
        <?php
            include ("footer.php");
        ?>
    </div>
    </div>
        </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


</body>

</html>