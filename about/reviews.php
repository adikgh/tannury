<? include 'config/core.php';

	// site setting
	$menu_name = 'contact';
	$site_set['tabs'] = true;
	$site_set['footer'] = false;
	$site_set['css'] = true;
	$site_set['bl8'] = false;
	$site_set['bl14'] = false;
?>
<? include 'block/header.php'; ?>

	<div class="blc1">
		<div class="bl_c">
			<div class="head_c">
				<h2 class="txt_tu txt_c"><?=t::w('Contact')?></h2>
				<div class="head_ln">
					<ul>
						<li><a href="/">Главная</a></li>
						<span><i class="fal fa-angle-right"></i></span>
						<li><?=t::w('Contact')?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="blc1">
		<div class="bl_c">
			<div class="blc1_t">
				<a href="tel:<?=$site['phone']?>"><?=$site['phone_view']?></a>
				<span><?=t::w('calc_al')?></span>
			</div>

			<div class="blc1_tn">
				<a target="_blank" href="tel:<?=$site['phone']?>">
					<div type="button" class="callback-bt">
						<i class="fa fa-phone"></i>
					</div>
				</a>
			</div>

			<div class="blc1_ts">
				<span><?=t::w('or')?></span>
				<p><?=t::w('write to us on social networks')?></p>
				<div class="bl1_sos">
					<a target="_blank" href="https://instagram.com/<?=$site['instagram']?>"><div class="bl1_si"><i class="fab fa-instagram"></i></div></a>
					<a target="_blank" href="https://facebook.com/<?=$site['facebook']?>"><div class="bl1_si"><i class="fab fa-facebook"></i></div></a>
					<a target="_blank" href="https://wa.me/<?=$site['whatsapp']?>"><div class="bl1_si"><i class="fab fa-whatsapp"></i></div></a>
				</div>
			</div>
		</div>
	</div>

<? include 'block/footer.php'; ?>