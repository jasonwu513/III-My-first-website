<?php
ob_start();
?>

<?php
    $mailto=$_POST["mailto"];
    $currentStatus=$_POST["currentStatus"];
		setcookie("mailto",$mailto,time()+60*60*24*365*10);
		setcookie("currentStatus",$currentStatus,time()+60*60*24*365*10);
    header('Location:androidsos.php');
?>

