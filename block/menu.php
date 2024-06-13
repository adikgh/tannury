<? if ($site_set['header']): ?>
	<div class="header <?=(@$site_set['header_wh'] == 'true'?'header_wh':'')?> <?=(@$site_set['header2'] == 'true'?'header2':'')?>">
		<div class="bl_c">
			<div class="header_c">
				<div class="header_l">
					<a class="logo" href="/">
						<div class="logo_i lazy_logo" data-src="/assets/img/logo/logo.png"></div>
						<!-- <span><?=$site['name']?></span> -->
					</a>
					<div class="menu_wq">
						<a class="menu_wqi" href="#">Территория</a>
						<a class="menu_wqi" href="#">Отдых</a>
						<a class="menu_wqi" href="#about"><?=t::w('About')?></a>
						<a class="menu_wqi" href="#review">Отзывы</a>
						<a class="menu_wqi" href="#contact"><?=t::w('Contacts')?></a>
						<!-- <div class="lang">
							<? if ($lang == 'kz'): ?> <a class="menu_wqi" href="<?=$url?>?lang=ru">Русский</a>
							<? else: ?> <a class="menu_wqi" href="<?=$url?>?lang=kz">Қазақша</a> <? endif ?>
						</div> -->
					</div>
				</div>

				<div class="header_r">
					<a class="phone_nm" href="tel:<?=$site['phone']?>"><?=$site['phone_view']?></a>

					<div class="menu_o">
						<div class="menu_oz"></div>
						<div class="menu_os">					
							<div class="menu_ot"><?=t::w('Menu')?></div>
							<div class="menu-icon"><div><span></span><span></span></div></div>
						</div>
						<div class="menu_c">
							<div class="menu_cn">

								<div class="menu_cnq">
									<a class="menu_ci" href="/catalog/">
										<div class="menu_cim"><i class="far fa-h-square"></i></div>
										<span><?=t::w('Sanatoriums')?></span>
									</a>
									<div class="menu_ci menu_cip menu_cipc menu_clc_gprog">
										<div class="menu_cim"><div class="lazy_menu" data-src="/assets/img/logo/logo.png"></div></div>
										<span><?=t::w('About')?></span>
									</div>
									<!-- <div class="menu_ci menu_cip menu_cipc menu_clc_lang">
										<? if ($lang == 'kz'): ?>
											<div class="menu_cim"><div class="lazy_menu" data-src="/assets/img/icons/flag-kazakhstan_1f1f0-1f1ff.png"></div></div>
											<span><?=t::w('Language')?>: <b>Қазақша</b></span>
										<? else: ?>
											<div class="menu_cim"><div class="lazy_menu" data-src="/assets/img/icons/flag-russia_1f1f7-1f1fa.png"></div></div>
											<span><?=t::w('Language')?>: <b>Русский</b></span>
										<? endif ?>
									</div> -->
								</div>

								<div class="menu_cna dsp_n">
									<div class="menu_pod menu_pod_lang dsp_n">
										<div class="menu_ci menu_cipl">
											<div class="menu_cim"><i class="fal fa-angle-left"></i></div>
											<span>Назад</span>
										</div>
										<a class="menu_ci" href="<?=$url?>?lang=kz">
											<div class="menu_cim"><div class="lazy_menu" data-src="/assets/img/icons/flag-kazakhstan_1f1f0-1f1ff.png"></div></div>
											<span>Қазақша</span>
										</a>
										<a class="menu_ci" href="<?=$url?>?lang=ru">
											<div class="menu_cim"><div class="lazy_menu" data-src="/assets/img/icons/flag-russia_1f1f7-1f1fa.png"></div></div>
											<span>Русский</span>
										</a>
									</div>
									<div class="menu_pod menu_pod_gprog dsp_n">
										<div class="menu_ci menu_cipl">
											<div class="menu_cim"><i class="fal fa-angle-left"></i></div>
											<span>Назад</span>
										</div>
										<a class="menu_ci" href="#/about/">
											<div class="menu_cim"></div>
											<span>О нас</span>
										</a>
										<a class="menu_ci" href="/#review">
											<div class="menu_cim"></div>
											<span>Отзывы</span>
										</a>
										<a class="menu_ci" href="#/about/certificates.php">
											<div class="menu_cim"></div>
											<span>Сертификаты</span>
										</a>
									</div>
								</div>
							</div>

							<a class="menu_cn menu_cn2" href="tel:<?=$site['phone']?>">
								<div class="menu_cim">
									<div class="lazy_menu" data-src="/assets/img/bag/Frame 13.jpg"></div>
									<!-- <span class="menu_cim_on"></span> -->
								</div>
								<div class="menu_cizt">
									<span><?=t::w('Sales department')?></span>
									<div><?=$site['phone_view']?></div>
								</div>
								<div class="menu_cizi"><i class="fas fa-phone-alt"></i></div>
							</a>

						</div>
					</div>

				</div>

			</div>
		</div>
	</div>
<? endif ?>

<!-- tabs -->
<? if ($site_set['menu']): ?>
	<!-- <div class="tabs_f <?=(@$site_set['tabs']=='true'?'tabs_acts':'')?>">
		<div class="tabs">
			<a href="/" class="tabs_i <?=($menu_name=='home'?'tabs_iact':'')?>"><div class="tabs_img"></div></a>
			<a href="/catalog.php" class="tabs_i <?=($menu_name=='catalog'?'tabs_iact':'')?>"><i class="far fa-hotel"></i></a>
			<a href="/about/" class="tabs_i <?=($menu_name=='about'?'tabs_iact':'')?>"><i class="far fa-users"></i></a>
			<a href="/about/contact.php" class="tabs_i <?=($menu_name=='contact'?'tabs_iact':'')?>"><i class="far fa-phone-alt"></i></a>
		</div>
	</div> -->
<? endif ?>

<!-- app start-->
<div class="app">