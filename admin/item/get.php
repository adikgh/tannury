<? include "../../config/core_a.php";

	// 
	if(isset($_GET['add_item_photo'])) {
		$path = '../../assets/uploads/sanatorium/';
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
		$name = strip_tags($_POST['name']);
		$adres = strip_tags($_POST['adres']);
		$sh_adres = strip_tags($_POST['sh_adres']);
		$img = strip_tags($_POST['img']);

		$id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `sanatorium`")))['max(id)'] + 1;
		$number = fun::sh_next_number();

		$ins = db::query("INSERT INTO `sanatorium`(`number`, `name_kz`, `name_ru`) VALUES ('$number', '$name', '$name')");
		if ($adres) $upd = db::query("UPDATE `sanatorium` SET `address`='$adres' WHERE `id`='$id'");
		if ($sh_adres) $upd = db::query("UPDATE `sanatorium` SET `country_id`='$sh_adres' WHERE `id`='$id'");
		if ($img) $upd = db::query("UPDATE `sanatorium` SET `img`='$img' WHERE `id`='$id'");

		if ($ins) echo 'plus';
		exit();
	}

	// 
	if(isset($_GET['item_edit'])) {
		$id = strip_tags($_POST['id']);
		$name = @strip_tags($_POST['name']);
		$price = @strip_tags($_POST['price']);
		$img = @strip_tags($_POST['img']);

		if ($name) $upd = db::query("UPDATE `sanatorium` SET `name_kz`='$name', `name_ru`='$name' WHERE `id`='$id'");
		if ($price) $upd = db::query("UPDATE `sanatorium` SET `price`='$price' WHERE `id`='$id'");
		if ($img) $upd = db::query("UPDATE `sanatorium` SET `img`='$img' WHERE `id`='$id'");

		echo 'plus';
		exit();
	}

	// 
	if(isset($_GET['cours_arh'])) {
		$id = strip_tags($_POST['id']);
		$cours = fun::sanatorium($id);

		if ($cours['arh'] == 0) $upd = db::query("UPDATE `sanatorium` SET `arh` = 1 WHERE `id` = '$id'");
		else $upd = db::query("UPDATE `sanatorium` SET `arh` = 0 WHERE `id` = '$id'");

		if ($upd) echo 'yes';
		exit();
	}

	// 
	if(isset($_GET['cours_del'])) {
		$id = strip_tags($_POST['id']);
		$del = db::query("DELETE FROM `sanatorium` WHERE `id` = '$id'");
		if ($del) echo 'yes';
		exit();
	}




	
	// 
	if(isset($_GET['cours_copy'])) {
		$course_id = strip_tags($_POST['id']);
		$course_d = fun::cours($course_id);

		// 
		$new_course_id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `cours`")))['max(id)'] + 1;
		$ncourse_number = (mysqli_fetch_assoc(db::query("SELECT max(number) FROM `cours`")))['max(number)'] + 1;
		$ncourse_name = $course_d['name_kz'].' - көшірме';
		$ncourse_access = $course_d['access'];
		$ncourse_price = $course_d['price'];
		$ncourse_price_sole = $course_d['price_sole'];
		$ncourse_img = $course_d['img'];
		// $ncourse_info = $course_d['info'];
		
		$ins_item = db::query("INSERT INTO `cours`(`id`, `number`, `name_kz`, `access`) VALUES ('$new_course_id', '$ncourse_number', '$ncourse_name', '$ncourse_access')");
		if ($ncourse_price) $upd_item = db::query("UPDATE `cours` SET `price` = '$ncourse_price' WHERE id = '$new_block_id'");
		if ($ncourse_price_sole) $upd_item = db::query("UPDATE `cours` SET `price_sole` = '$ncourse_price_sole' WHERE id = '$new_course_id'");
		if ($ncourse_img) $upd_item = db::query("UPDATE `cours` SET `img` = '$ncourse_img' WHERE id = '$new_course_id'");
		// if ($ncourse_info) $upd_item = db::query("UPDATE `cours` SET `info` = '$ncourse_info' WHERE id = '$new_course_id'");

		// if ($course_d['info']) $course_info = fun::course_info($course_d['id']);

		$block = db::query("select * from c_block where cours_id = '$course_id' order by number asc");
		if (mysqli_num_rows($block)) {
			while ($block_d = mysqli_fetch_assoc($block)) {
				$block_id = $block_d['id'];

				$new_block_id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `c_block`")))['max(id)'] + 1;
				$nblock_number = $block_d['number'];
				$nblock_name = $block_d['name_kz'];
				$nblock_item = $block_d['item'];
				// $nblock_question = $block_d['question'];

				$ins_item = db::query("INSERT INTO `c_block`(`id`, `cours_id`, `number`, `name_kz`) VALUES ('$new_block_id', '$new_course_id', '$nblock_number', '$nblock_name')");
				if ($nblock_item) $upd_item = db::query("UPDATE `c_block` SET `item` = '$nblock_item' WHERE id = '$new_block_id'");
				// if ($nblock_question) $upd_item = db::query("UPDATE `c_block` SET `question` = '$nblock_question' WHERE id = '$new_block_id'");

				$lesson = db::query("select * from c_lesson where block_id = '$block_id' order by number asc");
				if (mysqli_num_rows($lesson)) {
					while ($lesson_d = mysqli_fetch_assoc($lesson)) {
						$lesson_id = $lesson_d['id'];

						$new_lesson_id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `c_lesson`")))['max(id)'] + 1;
						$nlesson_number = $lesson_d['number'];
						$nlesson_name = $lesson_d['name_kz'];
						$nlesson_open = $lesson_d['open'];
						$nlesson_arh = $lesson_d['arh'];

						$ins_item = db::query("INSERT INTO `c_lesson`(`id`, `cours_id`, `block_id`, `number`, `name_kz`) VALUES ('$new_lesson_id', '$new_course_id', '$new_block_id', '$nlesson_number', '$nlesson_name')");
						if ($nlesson_open) $upd_item = db::query("UPDATE `c_lesson` SET `open` = '$nlesson_open' WHERE id = '$new_lesson_id'");
						if ($nlesson_arh) $upd_item = db::query("UPDATE `c_lesson` SET `arh` = '$nlesson_arh' WHERE id = '$new_lesson_id'");

						$item = db::query("select * from c_lesson_item where lesson_id = '$lesson_id' order by number asc");
						if (mysqli_num_rows($item)) {
							while ($item_d = mysqli_fetch_assoc($item)) {

								$new_item_id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `c_lesson_item`")))['max(id)'] + 1;
								$nitem_number = $item_d['number'];
								$nitem_type = $item_d['type'];
								$nitem_type_name = $item_d['type_name'];
								$nitem_type_video = $item_d['type_video'];
								$nitem_txt = $item_d['txt'];

								$ins_item = db::query("INSERT INTO `c_lesson_item`(`id`, `lesson_id`, `number`, `type`) VALUES ('$new_item_id', '$new_lesson_id', '$nitem_number', '$nitem_type')");
								if ($nitem_type_name) $upd_item = db::query("UPDATE `c_lesson_item` SET `type_name` = '$nitem_type_name' WHERE id = '$new_item_id'");
								if ($nitem_type_video) $upd_item = db::query("UPDATE `c_lesson_item` SET `type_video` = '$nitem_type_video' WHERE id = '$new_item_id'");
								if ($nitem_txt) $upd_item = db::query("UPDATE `c_lesson_item` SET `txt` = '$nitem_txt' WHERE id = '$new_item_id'");

							}
						}

					}
				}

			}
		}


		if ($upd) echo 'yes';
		exit();
	}
	







	// 
	if(isset($_GET['lesson_add'])) {
		$sanatorium_id = strip_tags($_POST['cours_id']);
		$wb_type = strip_tags($_POST['wb_type']);
		$wb_number = strip_tags($_POST['wb_number']);
		$wb_price = strip_tags($_POST['wb_price']);
		$img = strip_tags($_POST['img']);
		
		// $cours = fun::cours($cours_id);
		
		$id = (mysqli_fetch_assoc(db::query("SELECT max(id) FROM `sanatorium_number`")))['max(id)'] + 1;
		// $number = fun::lesson_next_number($block_id);
		$ins = db::query("INSERT INTO `sanatorium_number`(`sanatorium_id`, `type_id`, `door_id`) VALUES ('$sanatorium_id', '$wb_type', '$wb_number')");

		if ($wb_price) $ubd_li = db::query("UPDATE `sanatorium_number` SET `price` = '$wb_price' WHERE id = '$id'");
		if ($img) $ubd_li = db::query("UPDATE `sanatorium_number` SET `img` = '$img' WHERE id = '$id'");
		
		if ($ins) echo 'yes';
		exit();
	}

	// 
	if(isset($_GET['lesson_edit'])) {
		$id = strip_tags($_POST['id']);
		$wb_type = strip_tags($_POST['wb_type']);
		$wb_number = strip_tags($_POST['wb_number']);
		$wb_price = strip_tags($_POST['wb_price']);
		$img = strip_tags($_POST['img']);

		if ($wb_type) $ins_li = db::query("UPDATE `sanatorium_number` SET `type_id` = '$wb_type' WHERE id = '$id'");
		if ($wb_number) $ins_li = db::query("UPDATE `sanatorium_number` SET `door_id` = '$wb_number' WHERE id = '$id'");
		if ($wb_price) $ins_li = db::query("UPDATE `sanatorium_number` SET `price` = '$wb_price' WHERE id = '$id'");
		if ($img) $ins_li = db::query("UPDATE `sanatorium_number` SET `img` = '$img' WHERE id = '$id'");

		echo 'yes';
		exit();
	}

	// 
	if(isset($_GET['lesson_del'])) {
		$id = strip_tags($_POST['id']);
		$del = db::query("DELETE FROM `sanatorium_number` WHERE `id` = '$id'");
		if ($del) echo 'yes';
		exit();
	}

































	// 
	if(isset($_GET['add_item_photo2'])) {
		$id = $_SESSION['project_id'];
		$input_name = 'file';
		$path = '../../assets/uploads/sanatorium/';
		$allow = array();
		$deny = array(
			'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp', 
			'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html', 
			'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi', 'exe'
		);
		$data = array();
		$datetime = date('Y-m-d-H-i-s', time());
		$filem = array();

		if (!isset($_FILES[$input_name])) { $error = 'Файлы не загружены.'; }
		else {
			$files = array();
			$diff = count($_FILES[$input_name]) - count($_FILES[$input_name], COUNT_RECURSIVE);
			if ($diff == 0) $files = array($_FILES[$input_name]);
			else {
				foreach($_FILES[$input_name] as $k => $l) {
					foreach($l as $i => $v) {
						$files[$i][$k] = $v;
					}
				}
			}

			foreach ($files as $key=>$file) {
				$error = $success = '';
				if (!empty($file['error']) || empty($file['tmp_name'])) {
					$error = 'Не удалось загрузить файл.';
				} elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) {
					$error = 'Не удалось загрузить файл.';
				} else {
					$pattern = "[^a-zа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
					$name = mb_eregi_replace($pattern, '-', $file['name']);
					$name = mb_ereg_replace('[-]+', '-', $name);
					$parts = pathinfo($name);
					$name = $datetime.'-'.$name;
					array_push($filem, $name);
					
					if (empty($name) || empty($parts['extension'])) {
						$error = 'Недопустимый тип файла';
					} elseif (!empty($allow) && !in_array(strtolower($parts['extension']), $allow)) {
						$error = 'Недопустимый тип файла';
					} elseif (!empty($deny) && in_array(strtolower($parts['extension']), $deny)) {
						$error = 'Недопустимый тип файла';
					} else {
						if (move_uploaded_file($file['tmp_name'], $path . $name)) {
							// $sql = db::query("INSERT INTO `sanatorium_img`(`sanatorium_id`, `number`, `name`, `ins_dt`) VALUES ('$id', '$key', '$name', '$datetime')");
							$sql = db::query("INSERT INTO `sanatorium_img`(`sanatorium_id`, `img`) VALUES ('$id', '$name')");
							$success = 'Файл «' . $name . '» успешно загружен.';
						} else $error = 'Не удалось загрузить файл.';
					}
				}
			}

			if (!empty($success)) $data[] = '<p style="color: green">' . $success . '</p>';  
			if (!empty($error)) $data[] = '<p style="color: red">' . $error . '</p>';  
		}
				
		$data = array(
			'error'   => $error,
			'success' => $success,
			'file' => $filem,
		);
		
		header('Content-Type: application/json');
		echo json_encode($data, JSON_UNESCAPED_UNICODE);

		exit();				
	}
	
	// 
	if(isset($_GET['sn_img_del'])) {
		$id = strip_tags($_POST['id']);
		$del = db::query("DELETE FROM `sanatorium_img` WHERE `id` = '$id'");
		if ($del) echo 'yes';
		exit();
	}