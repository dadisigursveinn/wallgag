<?php
	$_SESSION['timeout'] = time();
	  if ($_SESSION['timeout'] + 10 * 1 < time()) {
	    include "base.php"; $_SESSION = array(); session_destroy();
		?><meta http-equiv="refresh" content="0;index.php"><?php
	  } else {
	     // session ok
	  }
?>