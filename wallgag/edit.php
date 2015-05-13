<?php
    include ("whatever.php");
    //include ("test_page.php");
    //include ("class.datamanager.php");
    //$db_man = new DatabaseManager('localhost','PictureBase','root','');
    include ("random_image.php");
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
        <?php
            $findImage = mysql_query("SELECT * FROM images WHERE imageID = '".$_POST['imageID']."'");
            $row = mysql_fetch_array($findImage);
            $imageID = $row['imageID'];
            $imageName = $row['imageName'];
            $description = $row['imageText'];
            $category = $row['categoryID'];
            $uploader = $row['uploaderName'];
            $directory = $row['imagePath'];
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
                        <img class=\"img-responsive\" src='" . $directory . "' alt=\"\">
                    </a>
                </div>
                <div class=\"col-md-5\">
                    
                    
                    
                    <form method=\"post\" action=\"update.php\" name=\"updateform\" id=\"updateform\">
                        <input style=\"display:none\" name=\"category\" id=\"category\" value='" . $category . "' />
                        <input style=\"display:none\" name=\"directory\" id=\"directory\" value='" . $directory . "' />
                        <input style=\"display:none\" name=\"imageID\" id=\"imageID\" value='" . $imageID . "' />
                        <label for=\"title\">Title:</label><input placeholder=\"" . $imageName . "\" class=\"form-control\" type=\"text\" name=\"title\" id=\"title\"/>
                        <label for=\"description\">Description:</label><textarea class=\"form-control\" placeholder=\"" . $description . "\" name=\"description\" id=\"description\"></textarea>
                        <h5>Upload date: " . date_format($dateUploaded, "d/m/Y") . "</h5>
                        <h5>Category: <a href=\"" . $categeory . ".php\">" . $categeory . "</a></h5>
                        <a href=\"myImages.php\"><button class=\"btn btn-danger\">Cancel</button></a>
                        <button type=\"submit\" class=\"btn btn-success\">Save</button>
                    </form>
                    
                </div>
            </div>"
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