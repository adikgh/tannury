<? include "../../config/core_a.php";

	// 
	if(isset($_GET['add_item_photo'])) {
		$path = '../../assets/uploads/number/';
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



	
	// 
	if(isset($_GET['item_add'])) {
		$na_name = @strip_tags($_POST['na_name']);
		$na_number_name = @strip_tags($_POST['na_number_name']);
		$na_price = @strip_tags($_POST['na_price']);
		$na_img = @strip_tags($_POST['na_img']);

		$id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `sanatorium_number`")))['max(id)'] + 1;
		// $number = fun::sh_next_number();

		$ins = db::query("INSERT INTO `sanatorium_number`(`type_name`) VALUES ('$na_name')");
		if ($na_number_name) $upd = db::query("UPDATE `sanatorium_number` SET `door_name`='$na_number_name' WHERE `id`='$id'");
		if ($na_price) $upd = db::query("UPDATE `sanatorium_number` SET `price`='$na_price' WHERE `id`='$id'");
		if ($na_img) $upd = db::query("UPDATE `sanatorium_number` SET `img`='$na_img' WHERE `id`='$id'");

		if ($ins) echo 'plus';
		exit();
	}

	// 
	if(isset($_GET['number_edit'])) {
		$id = @strip_tags($_POST['id']);
		$nm_name = @strip_tags($_POST['nm_name']);
		$nm_number_name = @strip_tags($_POST['nm_number_name']);
		$nm_price = @strip_tags($_POST['nm_price']);
		$nm_img = @strip_tags($_POST['nm_img']);

		if ($nm_name) $upd = db::query("UPDATE `sanatorium_number` SET `type_name`='$nm_name' WHERE `id`='$id'");
		if ($nm_number_name) $upd = db::query("UPDATE `sanatorium_number` SET `door_name`='$nm_number_name' WHERE `id`='$id'");
		if ($nm_price) $upd = db::query("UPDATE `sanatorium_number` SET `price`='$nm_price' WHERE `id`='$id'");
		if ($nm_img) $upd = db::query("UPDATE `sanatorium_number` SET `img`='$nm_img' WHERE `id`='$id'");

		echo 'plus';
		exit();
	}

	// 
	if(isset($_GET['cours_del'])) {
		$id = strip_tags($_POST['id']);
		$del = db::query("DELETE FROM `sanatorium_number` WHERE `id` = '$id'");
		if ($del) echo 'yes';
		exit();
	}
