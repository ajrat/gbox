<?php


	if (!empty($_POST['sign_out'])) {
			setcookie("signin", $salt, time()-3600, "/");
		}	
			


//	if (!empty($_POST['user'])) {
//		if (!empty($_POST['skey'])) {
//			if (!empty($_POST['skey'])) {
//				if (strlen($_POST['skey'])==64) {

require_once "../databases/user.php";
$puser = $_POST['user'];
$ppass = $_POST['pass'];


$source = ImageCreateFromPNG($_FILES['skey']['tmp_name']); 

$key = "";

for ($x=0; $x <5 ; $x++) { 
	for ($y=0; $y <5 ; $y++) {
		$color_index = imagecolorat($source,  $x*30, $y*30);
		$color_tran = imagecolorsforindex($source, $color_index);
		$pskey .= $color_tran['red'].$color_tran['green'].$color_tran['blue'];
	}
}


$options = [
    'cost' => 11,
    'salt' => md5($pskey),
];

$cryptpass = password_hash($ppass, PASSWORD_BCRYPT, $options);



if ($cryptpass == $salt) {
	setcookie("signin", $salt, time()+3600, "/");
	echo "true";
}else{
	echo "Ошибка авторизации";
}



/*
if (hash_equals($cryptpass, crypt($ppass, $cryptpass))) {
   echo "Пароль верен!";
}*/

//echo $_FILES['skey']['tmp_name'];

/*

$key = pack('H*',$pskey);
$ciphertext_dec = base64_decode($salt);
$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
$iv_dec = substr($ciphertext_dec, 0, $iv_size);
$ciphertext_dec = substr($ciphertext_dec, $iv_size);
$plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,$ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
$plaintext_dec = strval($plaintext_dec);

	if ((strncmp($puser,$user,strlen($user))==0)&&(strncmp ($plaintext_dec,$salt2,strlen($salt2))==0)&&(strncmp($ppass,$pass,strlen($pass))==0)) {
		setcookie("signin", $salt, time()+3600, "/");
		echo "true";
	}else{
		echo "Неправильные данные";
	}

				}else{
					echo "Неправильная длинна секретной строки";
				}
			}else{
				echo "Введи пароль";
			}
		}else{
			echo "Введи секретный ключ";
		}
	}else{
		echo "Введи логин";
	}


	/*echo $_POST['user'];
	echo $_POST['skey'];
	echo $_POST['pass'];*/

	//echo "JIb,jxrf";
	//echo "true";
?>