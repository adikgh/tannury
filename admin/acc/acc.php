<?php include "../config/core_a.php";

	// site setting
	$menu_name = 'acc';
	$site_set = [
		'header' => 'user',
		'footer' => 'false',
      'ublock' => 'true',
		'utop_nm' => 'Жеке деректер',
		'utop_bk' => ' ',
	];
	$css = ['user', 'uacc'];
	$js = ['user'];
	
?>
<?php include "../block/header.php"; ?>
<?php include "all/acc_d.php"; ?>
<?php include "../block/footer.php"; ?>