<?php
//Case Belum Login

if(isset($_SESSION['log'])){

}else {
	header('location:index.php');
}
?>