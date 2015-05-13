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

        <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?=$_SESSION['Username']?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-9 col-lg-9 ">
                <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td><?=$_SESSION['FirstName']?> <?=$_SESSION['LastName']?></td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td><?=$_SESSION['EmailAddress']?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>            
          </div>

          <hr>
        <br>
          <h1>Upload:</h1>
          <hr>
            <div class="modal-body">


                    <form name="upload" id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title">

                            <label for="desc">Description</label>
                            <input type="text" class="form-control" id="desc" name="desc" placeholder="Description">

                            <label for="Category">Category</label>
                            <select class="form-control" id="category" name="category">
                            <?php
                                for ($i=0; $i < $arrlength; $i++) { ?>
                                    <option><?php echo $array[$i][1];?></option><?php
                                }
                            ?>
                                <option>Image</option>
                            </select>

                            <label for="imageupload">Image upload</label>
                            <input type="file" name="fileToUpload" id="fileToUpload" class="file">
                            
                            <p class="help-block">Max 25mb</p>
                        </div>
                        <button type="submit" name="submit" value="Upload Image" class="btn btn-success pull-right">Confirm</button>
                        <br>
                    </form> 
                </div>


                    
                
        
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

    <script src="js/fileinput.min.js"></script>
    <script>
    $("#fileToUpload").fileinput({
        showPreview: true,
        overwriteInitial: false,
        maxFileSize: 25600,
        showUpload: false,
        allowedFileExtensions: ["jpeg", "jpg", "png", "gif"],
        elErrorContainer: "#errorBlock43"
        // you can configure `msgErrorClass` and `msgInvalidFileExtension` as well
    });
    </script>

</body>

</html>
