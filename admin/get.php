<? include "../config/core_a.php";


	// login
	if(isset($_GET['login'])) {
		$phone = strip_tags($_POST['phone']);
		// $m_code = strip_tags($_POST['code']);
		$password = strip_tags($_POST['password']);
		$user = db::query("SELECT * FROM user WHERE phone = '$phone' and phone is not null");
		if (mysqli_num_rows($user)) {
			$user_d = mysqli_fetch_assoc($user);
			if ($password == $user_d['password']) {
				$_SESSION['uph'] = $phone;
				$_SESSION['upc'] = $password;
				setcookie('uph', $phone, time() + 3600*24*30*6, '/');
				setcookie('upc', $password, time() + 3600*24*30*6, '/');
				echo 'yes';
			} else echo 'none';
		} else echo 'none';
		exit();
	}


	// 
	if(isset($_GET['add_user_img'])) {
		$path = '../assets/uploads/users/';
		$allow = array();
		$deny = array(
			'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp', 
			'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html', 
			'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi', 'exe'
		);
		$error = $success = '';
		$datetime = date('Ymd-His', time());

		if (!isset($_FILES['file'])) $error = 'Файлды жүктей алмады';
		else {
			$file = $_FILES['file'];
			if (!empty($file['error']) || empty($file['tmp_name'])) $error = 'Файлды жүктей алмады';
			elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) $error = 'Файлды жүктей алмады';
			else {
				$pattern = "[^a-zа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
				$name = mb_eregi_replace($pattern, '-', $file['name']);
				$name = mb_ereg_replace('[-]+', '-', $name);
				$parts = pathinfo($name);
				$name = $datetime.'-'.$name;

				if (empty($name) || empty($parts['extension'])) $error = 'Файлды жүктей алмады';
				elseif (!empty($allow) && !in_array(strtolower($parts['extension']), $allow)) $error = 'Файлды жүктей алмады';
				elseif (!empty($deny) && in_array(strtolower($parts['extension']), $deny)) $error = 'Файлды жүктей алмады';
				else {
					if (move_uploaded_file($file['tmp_name'], $path . $name)) $success = '<p style="color: green">Файл «' . $name . '» успешно загружен.</p>';
					else $error = 'Файлды жүктей алмады';
				}
			}
		}
		
		if (!empty($error)) $error = '<p style="color:red">'.$error.'</p>';  
		
		$data = array(
			'error'   => $error,
			'success' => $success,
			'file' => $name,
		);
		
		header('Content-Type: application/json');
		echo json_encode($data, JSON_UNESCAPED_UNICODE);

		exit();
	}

	// user edit
	if(isset($_GET['user_edit'])) {
		$name = strip_tags($_POST['name']);
		$surname = strip_tags($_POST['surname']);
		$age = strip_tags($_POST['age']);
		$img = strip_tags($_POST['img']);
		$code = strip_tags($_POST['code']);
		
		if ($name) $upd = db::query("UPDATE `user` SET `name`='$name' WHERE id = '$user_id'");
		if ($surname) $upd = db::query("UPDATE `user` SET `surname`='$surname' WHERE id = '$user_id'");
		if ($age) $upd = db::query("UPDATE `user` SET `age`='$age' WHERE id = '$user_id'");
		if ($img) $upd = db::query("UPDATE `user` SET `img`='$img' WHERE id = '$user_id'");
		if ($code) $upd = db::query("UPDATE `user` SET `code`='$code' WHERE id = '$user_id'");

		echo "yes";
		exit();
	}




	// company_edit
	if(isset($_GET['company_edit'])) {
		$name = @strip_tags($_POST['name']);
		$phone = @strip_tags($_POST['phone']); 
		$phone_alt = @strip_tags($_POST['phone_alt']);
		$whatsapp = @strip_tags($_POST['whatsapp']); 
		$whatsapp_alt = @strip_tags($_POST['whatsapp_alt']);
		$instagram = @strip_tags($_POST['instagram']); 
		$telegram = @strip_tags($_POST['telegram']); 
		$youtube = @strip_tags($_POST['youtube']);
		$metrika = @strip_tags($_POST['metrika']); 
		$pixel = @strip_tags($_POST['pixel']);

		if (@$name) $upd = db::query("UPDATE `site` SET `name`='$name', `upd_dt` = '$datetime' WHERE `id`=1");
		if (@$phone) {
			$phone2 = '8'.substr(strval($phone), 1); 
			if (@$phone2) {
				$upd = db::query("UPDATE `site` SET `phone`='$phone2', `upd_dt` = '$datetime' WHERE `id`=1");
			}
		}
		if (@$phone_alt) $upd = db::query("UPDATE `site` SET `phone_view`='$phone_alt', `upd_dt` = '$datetime' WHERE `id`=1");
		if (@$whatsapp) $upd = db::query("UPDATE `site` SET `whatsapp`='$whatsapp', `upd_dt` = '$datetime' WHERE `id`=1");
		if (@$whatsapp_alt) $upd = db::query("UPDATE `site` SET `whatsapp_view`='$whatsapp_alt', `upd_dt` = '$datetime' WHERE `id`=1");
		if (@$instagram) $upd = db::query("UPDATE `site` SET `instagram`='$instagram', `upd_dt` = '$datetime' WHERE `id`=1");
		if (@$telegram) $upd = db::query("UPDATE `site` SET `telegram`='$telegram', `upd_dt` = '$datetime' WHERE `id`=1");
		if (@$youtube) $upd = db::query("UPDATE `site` SET `youtube`='$youtube', `upd_dt` = '$datetime' WHERE `id`=1");
		if (@$metrika) $upd = db::query("UPDATE `site` SET `metrika`='$metrika', `upd_dt` = '$datetime' WHERE `id`=1");
		if (@$pixel) $upd = db::query("UPDATE `site` SET `pixel`='$pixel', `upd_dt` = '$datetime' WHERE `id`=1");

		echo 'yes';
		exit();
	}
	