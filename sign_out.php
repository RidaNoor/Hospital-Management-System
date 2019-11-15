<?php
if(isset($_POST['sign_out'])){
		session_destroy();
		echo '<script>window.location.href="'.$root.'index.php";</script>';
}
?>