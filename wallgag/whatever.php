<head>
<script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>
</head>
<?php

    $pageTitles = array(
        "" => "Fresh",
        "index.php" => "Fresh",
        "popular.php" => "Popular",
        "random.php" => "Random",
        "login.php" => "Login",
        "register.php" => "Signup",
        "myPage.php" => "My Page",
        "upload.php" => "Upload",
        "Animals.php" => "Animals",
        "Artistic.php" => "Artistic",
        "City.php" => "City",
        "Films.php" => "Films",
        "Games.php" => "Games",
        "Nature.php" => "Nature",
        "Other.php" => "Other",
        "Space.php" => "Space",
        "delete.php" => "Deleting",
        "create_thumb.php" => "Test",
        "resize.php" => "Resize",
        "myImages.php" => "My images",
        "edit.php" => "Edit",
        "update.php" => "Update"
    );
    $url = $_SERVER['REQUEST_URI'];
    $url = explode('/', $url);
    $url = $url[count($url)-1];
?>