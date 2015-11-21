<?php
if(isset($_COOKIE['id'])){
	setcookie('id','',time()-3600);
	setcookie('email','',time()-3600);
}
header('Location: index.php');
?>