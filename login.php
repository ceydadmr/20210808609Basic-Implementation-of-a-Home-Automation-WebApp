<?php

// Kullanıcı adı ve şifre kontrolü
if(isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	if($username === 'user' && $password === '12345') {
		header('Location: welcome.php');
		exit();
	} else {
		$error = 'Invalid username or password';
		header('Location: loginconsumer.html?error=' . urlencode($error));
		exit();
	}
}
?>
