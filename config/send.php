<?

	// bot
	// https://api.telegram.org/bot1082028620:AAGRXcmhEtOlK3Z29Fa7Vq6JfIK1Uwdw-P4/getUpdates
		
	$token = "1082028620:AAGRXcmhEtOlK3Z29Fa7Vq6JfIK1Uwdw-P4";
	$chat_id = "-1002172876169";
	$txt = '';

	// 
	if(isset($_GET['mess'])) {
		$sms = strip_tags($_POST['sms']);
		$name  = strip_tags($_POST['name']);
		$phone = strip_tags($_POST['phone']);
		// $phone = substr_replace($phone, '', 0, 1);
		// $phone = substr_replace($phone, '8', 0, 1);

		$arr = array(
			// 'Cайт: '	=> 'Басты',
			'Типі: ' => $sms,
			'Аты-жөні: ' => $name,
			'Телефон: ' => $phone
		);

		foreach ($arr as $key => $value) {$txt .= "<b>".$key."</b> ".$value."%0A";};
		$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
		if ($sendToTelegram) echo "yes"; else echo "error";

		exit();
	}


	// 
	if(isset($_GET['sms'])) {
		$sms = strip_tags($_POST['sms']);
		$phone = strip_tags($_POST['phone']);

		$arr = array(
			// 'Cайт: '	=> 'Басты',
			'Типі: '	=> $sms,
			'Телефон: ' => $phone
		);

		foreach($arr as $key => $value) {$txt .= "<b>".$key."</b> ".$value."%0A";};
		$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
		if ($sendToTelegram) echo "yes"; else echo "error";

		exit();
	}	

	// 
	if(isset($_GET['test1'])) {

		$tv1 = strip_tags($_POST['tv1']);
		$tv2 = strip_tags($_POST['tv2']);
		$tv3 = strip_tags($_POST['tv3']);

		$name  = strip_tags($_POST['name']);
		$phone = strip_tags($_POST['phone']);

		$arr = array(
			// 'Cайт: '	=> 'Басты',
			'Типі: ' => 'Тест №1',
			'Адам саны: ' => $tv1,
			'Дем алу күні: ' => $tv2,
			'Бөлме: ' => $tv3,
			'Аты-жөні: ' => $name,
			'Телефон: ' => $phone
		);

		foreach($arr as $key => $value) {$txt .= "<b>".$key."</b> ".$value."%0A";};
		$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
		if ($sendToTelegram) echo "yes"; else echo "error";

		exit();
	}



	// 
	if(isset($_GET['book'])) {
		$sms1 = strip_tags($_POST['sms1']);
		$sms2 = strip_tags($_POST['sms2']);
		$dt = strip_tags($_POST['dt']);
		$dt2 = strip_tags($_POST['dt2']);

		$name  = strip_tags($_POST['name']);
		$phone = strip_tags($_POST['phone']);

		$arr = array(
			'Типі: '			=> 'Забронировать',
			'Санатория: '	=> $sms1,
			'Номер: '		=> $sms2,
			'Басталуы: '	=> $dt,
			'Күн: '			=> $dt2,
			'Аты-жөні: '	=> $name,
			'Телефон: ' 	=> $phone
		);

		foreach($arr as $key => $value) {$txt .= "<b>".$key."</b> ".$value."%0A";};
		$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
		if ($sendToTelegram) echo "yes"; else echo "error";

		exit();
	}
	