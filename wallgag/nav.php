<?php
    include ("whatever.php");
    include ("class.datamanager.php");
    $db_man = new DatabaseManager('tagl.is','dadis_PictureBase','dadis','');
    include ("base.php"); 
    include ("session_timeout.php");
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Wallgag</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php
                        if($pageTitles[$url] == "Fresh")
                        {
                            ?><li class="active"><?php
                        }
                        else
                        {
                            ?><li><?php                   
                        }
                    ?>
                        <a href="index.php">Fresh</a>
                    </li>
                    <?php
                        if($pageTitles[$url] == "Popular")
                        {
                            ?><li class="active"><?php
                        }
                        else
                        {
                            ?><li><?php                   
                        }
                    ?>
                        <a href="popular.php">Popular</a>
                    </li>

                    <?php
                        if($pageTitles[$url] == "Random")
                        {
                            ?><li class="active"><?php
                        }
                        else
                        {
                            ?><li><?php                   
                        }
                    ?>
                        <a href="random.php">Random</a>
                    </li>

                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Category <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <?php
                                $array = $db_man->categoryList();
                                $arrlength = count($db_man->categoryList());
                                for ($i=0; $i < $arrlength; $i++) { ?>
                                    <li><a href="<?php echo $array[$i][1] ?>.php"><?php echo $array[$i][1] ?></a></li><?php
                                }
                            ?>
                        </ul>
                    </li>

                    <?php
                    if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
                    {
                         ?>
                         <?php
                            if($pageTitles[$url] == "Resize")
                            {
                                ?><li class="active"><?php
                            }
                            else
                            {
                                ?><li><?php                   
                            }
                        ?>
                            <a href="resize.php">Resize</a>
                        </li>

                        <?php
                            if($pageTitles[$url] == "My images")
                            {
                                ?><li class="active"><?php
                            }
                            else
                            {
                                ?><li><?php                   
                            }
                        ?>
                            <a href="myImages.php">My images</a>
                        </li>
                                                
                        <!--<a href="logout.php"><button type="button" class="btn btn-danger navbar-btn navbar-right">Logout</button></a>
                        <p class="navbar-text navbar-right">Signed in as <a href="#" class="navbar-link"><?=$_SESSION['Username']?>  </a></p>-->
                        <?php
                    }
                    else
                    {
                        if($pageTitles[$url] == "Login")
                        {
                            ?><li class="active"><?php
                        }
                        else
                        {
                            ?><li><?php                   
                        }
                        ?>
                        <a href="login.php">Login</a>
                        </li>

                        <?php
                        if($pageTitles[$url] == "Signup")
                        {
                            ?><li class="active"><?php
                        }
                        else
                        {
                            ?><li><?php                   
                        }
                        ?>
                        <a href="register.php">Signup</a>
                        </li><?php
                    }
                    ?>

                </ul>
                <?php
                if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
                {
                ?>
                                            
                    
                    <p class="navbar-text navbar-right">Signed in as <a href="myPage.php" class="navbar-link"><?=$_SESSION['Username']?></a>&nbsp;<a href="logout.php" style="color: #f41c1c">Logout</a></p>
                    <?php
                }
                else{}?>
                <!--<button type="button" class="btn btn-success navbar-btn navbar-right" data-toggle="modal" data-target="#myModal">Upload</button>-->

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Upload</h4>
                </div>
                <div class="modal-body">


                    <form name="upload" id="uploadForm" action="upload.php" method="post">
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
                            <input type="file" id="inputImage" name="inputImage">
                            <p class="help-block">Max 25mb</p>
                        </div>
                     
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Confirm</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>-->