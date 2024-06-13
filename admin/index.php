<? include "../config/core_a.php";

	// Қолданушыны тексеру
	if (!$user_id) header('location: /admin/sign.php');
	else header('location: /admin/catalog/');