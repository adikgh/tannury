<? include '../config/core.php';

	// 
	if (isset($_GET['id']) || $_GET['id'] == '') {
		$id = $_GET['id'];
		$sql = db::query("select * from sanatorium where id = '$id'");
		if (mysqli_num_rows($sql) != 0) $sana = mysqli_fetch_array($sql);
		else header('location: /catalog/');
	} else header('location: /catalog/');


	// site setting
	$menu_name = 'sanatorium';
	$pod_menu_name = 'main';
	// $site_set = [
	// 	'header' => 2,
	// 	'tabs' => 'true',
	// ];
	$css = ['view'];
	$js = ['view'];
	$share_txt = 'https://'.$site['site'].'/sanatorium2/?id='.$id;

?>
<? include '../block/header.php'; ?>

	<!--  -->
	<div class="sana_top">
		<div class="bl_c">
			<div class="sana_th">
				<a class="sana_thb" href="/catalog/"><i class="fal fa-long-arrow-left"></i></a>
				<a class="sana_thi" href="/">Главная</a>
				<a class="sana_thi" href="/catalog/">Каталог</a>
				<span class="sana_thi"><?=$sana['name_'.$lang]?></span>
			</div>
			<div class="sana_b">
				<div class="sana_bl">
					<div class="sana_blc">
						<div class="sana_bl1">
							<div class="swiper sana_bl1t">
								<div class="swiper-wrapper">
									<? $data_img = db::query("select * from sanatorium_img where sanatorium_id = '$id'"); ?>
									<?	while ($img = mysqli_fetch_array($data_img)): ?>
										<div class="swiper-slide sana_bl1ti lazy_sana_img" data-src="https://shipadeluxe.kz/assets/uploads/sanatorium/<?=$sana['name']?>/<?=$img['img']?>"></div>
									<? endwhile ?>
								</div>
							</div>
							<div class="swiper sana_bl1b">
								<div class="swiper-wrapper">
									<? $data_img = db::query("select * from sanatorium_img where sanatorium_id = '$id'"); ?>
									<?	while ($img = mysqli_fetch_array($data_img)): ?>
										<div class="swiper-slide sana_bl1bi lazy_sana_img" data-src="https://shipadeluxe.kz/assets/uploads/sanatorium/<?=$sana['name']?>/<?=$img['img']?>"></div>
									<? endwhile ?>
								</div>
							</div>
							<div class="swiper-pagination sana_bl1t_pag"></div>
							<div class="swiper-button-prev sana_bl1t_prev"><i class="fal fa-long-arrow-left"></i></div>
							<div class="swiper-button-next sana_bl1t_next"><i class="fal fa-long-arrow-right"></i></div>
						</div>
						<div class="blc1">
							<div class="blc1_t">
								<div class="head_star">
									<span>Рейтинг:</span>
									<div><?=fun::rank($sana['rank'])?></div>
								</div>
								<div class="head_around">
									<i class="far fa-shield-check"></i>
									<span>Гарантия низкой цены</span>
								</div>
							</div>
							<div class="blc1_h">
								<span>Cанатория:</span>
								<h1 class="sana_blh"><?=$sana['name_'.$lang]?></h1>
							</div>
		
							<div class="blc1_pr">
								<div class="sana_bpc">
									<? $sql2 = db::query("select min(price) from sanatorium_number where sanatorium_id = '$id'"); ?>
									<? $price = mysqli_fetch_array($sql2); ?>
									<div class="sana_bpc_p">от <?=$price[0]?> <span>тг./день</span></div>
								</div>
								<div class="sana_bp_btn">
									<div class="btn">Забронировать</div>
									<a class="btn btn_cm">Посмотреть номера</a>
								</div>
								<div class="sana_bpc sana_bpc2">
									<div class="sana_bpc_s">
										<i class="fal fa-person-sign"></i>
										<span>Встреча - бесплатно</span>
									</div>
									<div class="sana_bpc_s">
										<i class="fal fa-car"></i>
										<span>Трансфер - бесплатно</span>
									</div>
								</div>
								<!-- <div class="head_share disb_zab5"><i class="far fa-sign-out"></i></div> -->
							</div>
		
							<div class="blc1_in">
								<span>Описание:</span>
								<div class="blc1_inc">
									
									<? $data_serv = db::query("select * from sanatorium_services_item where sanatorium_id = '$id'"); ?>
									<?	if (mysqli_num_rows($data_serv) != 0): ?>
										<? $service_type = db::query("select * from sanatorium_services_type"); ?>
										<? while ($service_type_c = mysqli_fetch_array($service_type)): ?>
											<? $service_type_id = $service_type_c['id'] ?>
											<? $data_serv = db::query("select * from sanatorium_services_item where sanatorium_id = '$id' and type_id = '$service_type_id'"); ?>
											<?	if (mysqli_num_rows($data_serv) != 0): ?>
												<div class="blc1_ini">
													<div><?=$service_type_c['name_'.$lang]?>:</div>
													<div><?=mysqli_num_rows($data_serv)?></div>
												</div>
											<? endif ?>
										<? endwhile ?>
									<? endif ?>
		
									<? $data_serv = db::query("select * from sanatorium_services_pay where sanatorium_id = '$id'"); ?>
									<? if (mysqli_num_rows($data_serv) != 0): ?>
										<div class="blc1_ini">
											<div>Платные услуги:</div>
											<div><?=mysqli_num_rows($data_serv)?></div>
										</div>
									<? endif ?>
		
								</div>
							</div>
						</div>
					</div>
					<div class="sana_menu_yac" id="sana_menu"></div>
		
					<div class="swiper sana_menu" id="sana_menu">
						<div class="swiper-wrapper">
							<a class="swiper-slide sana_menu_i <?=($pod_menu_name=='main'?'sana_menu_act':'')?>" href="#number">Номера</a>
							<a class="swiper-slide sana_menu_i <?=($pod_menu_name=='about'?'sana_menu_act':'')?>" href="#about">Об санаторий</a>
							<a class="swiper-slide sana_menu_i <?=($pod_menu_name=='service'?'sana_menu_act':'')?>" href="#service">Услуги</a>
							<a class="swiper-slide sana_menu_i <?=($pod_menu_name=='service_pay'?'sana_menu_act':'')?>" href="#service_pay">Платные услуги</a>
						</div>
					</div>

					<div class="sana_bl2" id="number">
						<div class="head_c"><h4 class="">Выбрите номер</h4></div>
						<div class="blc2_c">
							<div class="blc2_b sana_cmc">
								<? $sql = db::query("select * from `sanatorium_number` where sanatorium_id = '$id' and arh = 0 ORDER BY type_id ASC"); ?>
								<?	while ($d = mysqli_fetch_array($sql)): ?>
									<div class="bl5_i">
										<a class="bl5_ia" href="#/sanatorium/?id=<?=$ana['id']?>">
											<div class="lazy_bag" data-src="https://shipadeluxe.kz/assets/uploads/sanatorium/<?=$sana['name']?>/<?=$d['img']?>"></div>
										</a>
										<div class="bl5_ic">
											<div class="bl5_ict">
												<div class="sana_inf_ictp">Номер на <?=fun::d($d['door_id'])?> чел.</div>
												<div class="bl5_icn"><?=fun::t($d['type_id'])?></div>
												<div class="sana_inf_icg">
													<div class="sana_inf_ics"><i class="fas fa-user"></i><span>1 взрослых за ночь:</span></div>
													<div class="sana_sena"><?=$d['price']?> <span>тг.</span></div>
												</div>
											</div>
											<a class="bl5_icb" href="#/sanatorium/?id=<?=$ana['id']?>">
												<div class="btn btn_cl disb_zab">Забронировать</div>
											</a>
										</div>
									</div>
								<? endwhile ?>
							</div>
						</div>
					</div>

					<div class="sana_bl2 " sana_bl3 id="about">
						<div class="head_c"><h5 class="">Инфо</h5></div>
						<div class="sana_bl_about">
							<p><?=fun::txt($id)?></p>
						</div>
					</div>

					<? $data_serv = db::query("select * from sanatorium_services_item where sanatorium_id = '$id'"); ?>
					<?	if (mysqli_num_rows($data_serv)): ?>

						<div class="sana_bl2 " sana_bl3 id="service">
							<div class="head_c"><h5 class="">Услуги санаторий</h5></div>
							<div class="num_bl2_c">
								<? $service_type = db::query("select * from sanatorium_services_type"); ?>
								<? while ($service_type_c = mysqli_fetch_array($service_type)): ?>
									<? $service_type_id = $service_type_c['id'] ?>
									<? $data_serv = db::query("select * from sanatorium_services_item where sanatorium_id = '$id' and type_id = '$service_type_id'"); ?>
									<?	if (mysqli_num_rows($data_serv) != 0): ?>
										<div class="num_bl1_c">
											<div class="num_bl1_ci"><?=$service_type_c['icon']?></div>
											<div class="num_bl1_cn">
												<div class="num_bl1_cns"><?=$service_type_c['name_'.$lang]?>:</div>
												<? if (mysqli_num_rows($data_serv) == 1): ?>
													<? $serv = mysqli_fetch_array($data_serv) ?>
													<p class="num_bl1_cnl"><?=fun::serv($serv['service_id'], $lang)?></p>
												<? else: ?>
													<ul>
														<? while ($serv = mysqli_fetch_array($data_serv)): ?>
															<li class="num_bl1_cnl"><?=fun::serv($serv['service_id'], $lang)?></li>
														<? endwhile ?>
													</ul>
												<? endif ?>
											</div>
										</div>
									<? endif ?>
								<? endwhile ?>
							</div>
						</div>

					<? endif ?>

					<? $data_serv = db::query("select * from sanatorium_services_pay where sanatorium_id = '$id'"); ?>
					<? if (mysqli_num_rows($data_serv)): ?>
						<div class="sana_bl2 " sana_bl3  id="service_pay">
							<div class="head_c"><h5 class="">Платный услуги санаторий</h5></div>
							<div class="sana_bl5_c">
								<? while ($serv = mysqli_fetch_array($data_serv)): ?>
									<div class="sana_bl5_i">
										<div class="sana_bl5_in"><?=fun::serv($serv['service_id'], $lang)?></div>
										<div class="sana_bl5_ip"><?=$serv['price']?> тг</div>
									</div>
								<? endwhile ?>
							</div>
						</div>
					<? endif ?>

				</div>

				<div class="sana_bp">
					<div class="sana_bpc">
						<? $sql2 = db::query("select min(price) from sanatorium_number where sanatorium_id = '$id'"); ?>
						<? $price = mysqli_fetch_array($sql2); ?>
						<div class="sana_bpc_p">от <?=$price[0]?> <span>тг./день</span></div>
						<div class="sana_bpc_s">
							<i class="fal fa-person-sign"></i>
							<span>Встреча - бесплатно</span>
						</div>
						<div class="sana_bpc_s">
							<i class="fal fa-car"></i>
							<span>Трансфер - бесплатно</span>
						</div>
					</div>
					<div class="sana_bp_btn">
						<div class="btn disb_zab">Забронировать</div>
						<a class="btn btn_cm" href="/sanatorium/?id=<?=$id?>#sana_menu">Посмотреть номера</a>
					</div>

					<div class="bl_share">
						<p>Поделится:</p>
						<div class="bl_share_c">
							<a target="_blank" href="https://api.whatsapp.com/send?text=<?=$share_txt?>"><i class="fab fa-whatsapp"></i></a>
							<a target="_blank" href="https://t.me/share/url?url=<?=$share_txt?>"><i class="fab fa-telegram-plane"></i></a>
							<a target="_blank" href="https://www.facebook.com/sharer.php?src=<?=$share_txt?>"><i class="fab fa-facebook-f"></i></a>
							<a target="_blank" href="https://vk.com/share.php?url=<?=$share_txt?>"><i class="fab fa-vk"></i></a>
							<div class="btn_copy" data-title="Копировать" onclick="copytext('<?=$share_txt?>')"><i class="fal fa-copy"></i></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<? include '../block/footer.php'; ?>