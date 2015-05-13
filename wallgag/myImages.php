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
		<!-- Display images -->
        <?php
        $dir = "uploads/*/" . $_SESSION['Username'] . "/*";
        $images = glob( $dir );

        foreach ($images as $image) {
            $findImage = mysql_query("SELECT * FROM images WHERE imagePath = '".$image."'");
            $row = mysql_fetch_array($findImage);
            $imageID = $row['imageID'];
            $imageName = $row['imageName'];
            $description = $row['imageText'];
            $category = $row['categoryID'];
            $uploader = $row['uploaderName'];
            $dateUploaded = date_create($row['uploadDate']);
            $array = $db_man->categoryList();
            $arrlength = count($db_man->categoryList());
            for ($i=0; $i < $arrlength; $i++) { 
                if ($array[$i][0] == $category) {
                    $categeory=$array[$i][1];
                }
            }  
            echo "
            <div class=\"row\">
                <div class=\"col-md-7\">
                    <a href=\"#\">
                        <img class=\"img-responsive\" src='" . $image . "' alt=\"\">
                    </a>
                </div>
                <div class=\"col-md-5\">
                    <h3>" . $imageName . " <small>by:" . $uploader . "</small></h3>
                    <h4>" . $description . " <small>" . date_format($dateUploaded, "d/m/Y") . "</small></h4>
                    <p>Category: <a href=\"" . $categeory . ".php\">" . $categeory . "</a></p>
                    
                    <form method=\"post\" action=\"delete.php\" name=\"deleteform\" id=\"deleteform\">
                    <input style=\"display:none\" name=\"directory\" id=\"directory\" value='" . $image . "' />
                    <input style=\"display:none\" name=\"imageID\" id=\"imageID\" value='" . $imageID . "' />
                    <a class=\"btn btn-primary\" href='" . $image . "' download>Download <span class=\"glyphicon glyphicon-download-alt\"></span></a>
                    <button type=\"submit\" class=\"btn btn-danger\">Delete <span class=\"glyphicon glyphicon-remove\"></span></button>
                    </form>
                    <form method=\"post\" action=\"edit.php\" name=\"editform\" id=\"editform\">
                    <input style=\"display:none\" name=\"imageID\" id=\"imageID\" value='" . $imageID . "' />
                    <button type=\"submit\" class=\"btn btn-warning\">Edit <span class=\"glyphicon glyphicon-pencil\"></span></button>
                    </form>
                </div>
            </div>
            <hr>
            ";
        }?>
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