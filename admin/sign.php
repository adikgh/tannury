<? include "../config/core_a.php";

	// link
	if ($user_id) header('location: /admin/');

	// site setting
	$menu_name = 'sign_in';
	$site_set['header'] = false;
	// $site_set['footer'] = false;
	$site_set['cl_wh'] = true;
	$css = ['admin/user'];
	$js = ['admin/user'];
?>
<? include "block/header.php"; ?>

	<div class="u_sign">
		
		<div class="u_sign_logo">
			<div class="u_sign_logo_l lazy_img" data-src="/assets/img/logo/logo_bl.png"></div>
			<div class="u_sign_logo_r"><?=$site['name']?></div>
		</div>

		<div class="usign_c">

			<div class="">
				<h3 class="usign_h">Админ панель</h3>
			</div>

			<div class="usign_cn">

				<div class="usign_f">
					<div class="form_im form_im_ph">
						<i class="fal fa-user form_icon"></i>
						<input type="tel" class="form_im_txt fr_phone phone phone_inp" placeholder="8 (000) 000-00-00" data-lenght="11" data-sel="0" />
					</div>
					<div class="form_im form_im_cd">
						<i class="fal fa-lock-alt form_icon"></i>
						<input type="tel" class="form_im_txt password" placeholder="Пароль" data-lenght="6" data-sel="0" />
					</div>
					<div class="form_im">
						<button class="btn btn_sign_in">Кіру</button>
					</div>
				</div>

			</div>

		</div>
	</div>

<? include "block/footer.php"; ?>