<? include "../../config/core_a.php";

	// Қолданушыны тексеру
	if (!$user_id) header('location: /admin/');

	// Cours 
	$cours = db::query("select * from sanatorium_number");

	// Сайттың баптаулары
	$menu_name = 'cours';
	$css = ['admin/user', 'admin/cours'];
	$js = ['admin/user'];
?>
<? include "../block/header.php"; ?>

	<div class="ucours">

		<div class="head_c">
			<h4>Бөлмелер</h4>
		</div>

		<div class="uc_d">
			<div class="uc_di bq3_ci_rg cours_add_pop">
				<i class="fal fa-plus"></i>
				<span>Қосу</span>
			</div>

			<? while($cours_d = mysqli_fetch_assoc($cours)): ?>
				<? $cours_id = $cours_d['id']; ?>
					<a class="uc_di" data-id="<?=$cours_id?>" href="../item/?=$cours_id?>">
						<div class="uc_dit">
							<div class="bq_ci_info">
								<div class="bq_cih"><?=$cours_d['type_name']?></div>
							</div>
							<div class="bq_ci_img">
								<div class="lazy_img" data-src="/assets/uploads/number/<?=$cours_d['img']?>"></div>
							</div>
						</div>
						<div class="uc_dib">
							<div class="uc_dib_ckb fr_price"><?=$cours_d['price']?></div>
						</div>
					</a>
			<? endwhile ?>
		</div>

	</div>

<? include "../block/footer.php"; ?>

	<!-- cours add -->
	<div class="pop_bl pop_bl2 cours_add_block">
		<div class="pop_bl_a cours_add_back"></div>
		<div class="pop_bl_c">
			<div class="head_c">
				<h5>Cабақты қосу</h5>
				<div class="btn btn_dd2 cours_add_back"><i class="fal fa-times"></i></div>
			</div>
			<div class="pop_bl_cl">
				<div class="form_c">
					
					<div class="form_im">
						<div class="form_span">Бөлме түрінің атауы:</div>
						<i class="fal fa-text form_icon"></i>
						<input type="text" class="form_txt cours_name" placeholder="Атауын жазыңыз" data-lenght="2" />
					</div>

					<div class="form_im">
						<div class="form_span">Бағасы:</div>
						<i class="fal fa-tenge form_icon"></i>
						<input type="tel" class="form_im_txt fr_price wb_price" placeholder="10.000 тг" data-lenght="1" />
					</div>

					<div class="form_im">
						<div class="form_span">Адам саны:</div>
						<i class="fal fa-number form_icon"></i>
						<input type="tel" class="form_im_txt fr_number " placeholder="2" data-lenght="1" />
					</div>

					<div class="form_im">
						<div class="form_span">Бөлме фотосы:</div>
						<input type="file" class="cours_img sh_img file dsp_n" accept=".png, .jpeg, .jpg">
						<div class="form_im_img lazy_img cours_img_add" data-txt="Фотоны жаңарту">Құрылғыдан таңдау</div>
					</div>

					<div class="form_im form_im_bn">
						<div class="btn btn_item_add"><i class="far fa-check"></i><span>Сақтау</span></div>
					</div>
				</div>
			</div>
		</div>
	</div>