<?php 

class fun {
	
	function __construct() {}

	// cours
	public static function cours($id) {
	  $sql = db::query("select * from cours where id = '$id'");
	  if (mysqli_num_rows($sql)) return mysqli_fetch_array($sql); else return null;
	}
	public static function cours_info($id) {
		$sql = db::query("select * from cours_info where cours_id = '$id'");
		if (mysqli_num_rows($sql)) return mysqli_fetch_array($sql); else return null;
	}


	// block
	public static function cours_block($id) {
		$sql = db::query("select * from c_block where id = '$id'");
		$sql = mysqli_fetch_array($sql);
		return $sql['cours_id'];
	}
	public static function cblock_next_number($id) {
		$sql = db::query("select * from c_block where cours_id = '$id' order by number desc limit 1");
		if (mysqli_num_rows($sql)) return (mysqli_fetch_array($sql))['number'] + 1; else return 1;
	}


	// lesson
	public static function lesson($id) {
		$sql = db::query("select * from c_lesson where id = '$id'");
		$sql = mysqli_fetch_array($sql);
		return $sql;
	}
	public static function lesson_next_number($id) {
		$sql = db::query("select * from c_lesson where block_id = '$id' order by number desc limit 1");
		if (mysqli_num_rows($sql)) return (mysqli_fetch_array($sql))['number'] + 1; else return 1;
	}
	




	// 
	public static function sub($id, $u_id) {
	  $sql = db::query("select * from c_sub where cours_id = '$id' and user_id = '$u_id'");
	  if (mysqli_num_rows($sql)) return 1; else return 0;
	}



	// 
	public static function cours_pack_item_info($id) {
	  $user_id = core::$user_data['id'];
	  $sql = db::query("select * from c_sub_lesson where pack_item_id = '$id' and user_id = '$user_id'");
	  $sql = mysqli_fetch_array($sql);
	  return $sql;
	}



	// user
	public static function user($id) {
		$sql = db::query("select * from user where id = '$id'");
		$sql = mysqli_fetch_array($sql);
	  	return $sql;
	}














	public static function p($id) {
		$sql = mysqli_fetch_array(db::query("select MIN(price) as min from sanatorium_number where sanatorium_id = '$id' and arh = 0"));
		$sn = substr_replace($sql[0], ' ', -3, 0);
		return $sn;
	}

	public static function t($id) {
		$sql = mysqli_fetch_array(db::query("select * from `sanatorium_number_type` where id = '$id'"));
		return $sql['name'];
	}

	public static function d($id) {
		$sql = mysqli_fetch_array(db::query("select * from `sanatorium_number_door` where id = '$id'"));
		return $sql['name'];
	}

	public static function dn($id) {
		$sql = mysqli_fetch_array(db::query("select * from `sanatorium_number_door` where id = '$id'"));
		return $sql['number'];
	}

	public static function txt($id) {
		if (isset($_SESSION['lang'])) $lang = $_SESSION['lang']; else $lang = 'ru';
		$sql = db::query("select * from `sanatorium_info` where sana_id = '$id' and lang = '$lang'");
		if (mysqli_num_rows($sql)) return mysqli_fetch_array($sql); else return null;
	}

	public static function rank($n) {
		$res = '';
		for ($i=1; $i <= 5; $i++) {
			if ($i <= $n) $res .= '<i class="fas fa-star"></i>';
			else $res .= '<i class="fal fa-star"></i>';
		}
		return $res;
	}

	public static function serv($id, $l) {
		$sql = mysqli_fetch_array(db::query("select * from `sanatorium_services` where id = '$id'"));
		return $sql['name_'.$l];
	}


	








	// mall send
	public static function send_mail($mail, $txt) {
		$from = "info@dosbolike.kz";
		$subject = "Dosbolike";
		$headers = "From:" . $from. "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8";
      $mess = "<html>
						<head><title>$subject</title></head>
						<body>
							<div><b>$txt<b></div>
						</body>
					</html>";
	  	return mail($mail, $subject, $mess, $headers);
	}







	
	
}