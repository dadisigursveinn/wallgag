<?php
    include ("whatever.php");
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

        <!-- Project One 

        Það er hægt að láta ekki sömu mynd koma tvisvar
        t.d. með því að nota cookies eða session í php.


        -->
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src=<?php echo $selectedImage; ?> alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3><?php echo $caption; ?></h3>
                <div class="btn-group" role="group" aria-label="...">
                  <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-up"></span></button>
                  <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-down"></span></button>
                </div>
                <a class="btn btn-primary" href="#">Download <span class="glyphicon glyphicon-download-alt"></span></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Pagination 
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
         /.row -->

        

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
