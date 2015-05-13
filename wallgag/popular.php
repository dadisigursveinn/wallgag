<?php
    include ("whatever.php");
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
                    <small>wallpapers</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Project One -->
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/1920x1080" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>Project One</h3>
                <div class="btn-group" role="group" aria-label="...">
                  <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-up"></span></button>
                  <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-down"></span></button>
                </div>
                <a class="btn btn-primary" href="#">Download <span class="glyphicon glyphicon-download-alt"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project Two -->
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/1920x1080" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>Project Two</h3>
                <div class="btn-group" role="group" aria-label="...">
                  <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-up"></span></button>
                  <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-down"></span></button>
                </div>
                <a class="btn btn-primary" href="#">Download <span class="glyphicon glyphicon-download-alt"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project Three -->
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/1920x1080" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>Project Three</h3>
                <div class="btn-group" role="group" aria-label="...">
                  <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-up"></span></button>
                  <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-down"></span></button>
                </div>
                <a class="btn btn-primary" href="#">Download <span class="glyphicon glyphicon-download-alt"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project Four -->
        <div class="row">

            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/1920x1080" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>Project Four</h3>
                <div class="btn-group" role="group" aria-label="...">
                  <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-up"></span></button>
                  <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-down"></span></button>
                </div>
                <a class="btn btn-primary" href="#">Download <span class="glyphicon glyphicon-download-alt"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Project Five -->
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/1920x1080" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>Project Five</h3>
                <div class="btn-group" role="group" aria-label="...">
                  <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-up"></span></button>
                  <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-down"></span></button>
                </div>
                <a class="btn btn-primary" href="#">Download <span class="glyphicon glyphicon-download-alt"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        
        <!-- /.row -->

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
