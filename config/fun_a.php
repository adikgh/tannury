<? 

	class fun {
		
		function __construct() {}

		public static function sanatorium($id) {
			$sql = db::query("select * from sanatorium where id = '$id'");
			if (mysqli_num_rows($sql)) return mysqli_fetch_array($sql); else return null;
		}

		public static function country($id) {
			$sql = db::query("select * from country where id = '$id'");
			if (mysqli_num_rows($sql)) return mysqli_fetch_array($sql); else return null;
		}

		public static function sh_next_number() {
			$sql = db::query("select * from sanatorium_number where number is not null order by number desc limit 1");
			if (mysqli_num_rows($sql)) return (mysqli_fetch_array($sql))['number'] + 1; else return 1;
		}

		// cours
		public static function number($id) {
			$sql = db::query("select * from sanatorium_number where id = '$id'");
			if (mysqli_num_rows($sql)) return mysqli_fetch_array($sql); else return null;
		}
		public static function number_type($id) {
			$sql = db::query("select * from sanatorium_number_type where id = '$id'");
			if (mysqli_num_rows($sql)) return mysqli_fetch_array($sql); else return null;
		}
		public static function number_door($id) {
			$sql = db::query("select * from sanatorium_number_door where id = '$id'");
			if (mysqli_num_rows($sql)) return mysqli_fetch_array($sql); else return null;
		}
		







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