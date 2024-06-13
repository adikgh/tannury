<? include "../../config/core_a.php";

	// Қолданушыны тексеру
	if (!$user_id) header('location: /admin/');

	// Cours 
	$cours = db::query("select * from sanatorium where number is not null ORDER BY number asc");

	// Сайттың баптаулары
	$menu_name = 'cours';
	$css = ['admin/user', 'admin/cours'];
	$js = ['admin/user'];
?>
<? include "../block/header.php"; ?>

	<div class="ucours">

		<div class="head_c">
			<h4>Шипажайлар</h4>
		</div>

		<div class="uc_d">
			<div class="uc_di bq3_ci_rg cours_add_pop">
				<i class="fal fa-plus"></i>
				<span>Қосу</span>
			</div>

			<? while($cours_d = mysqli_fetch_assoc($cours)): ?>
				<a class="uc_di" href="/admin/item/?id=<?=$cours_d['id']?>">
					<div class="bq_ci_img"><div class="lazy_img" data-src="/assets/uploads/sanatorium/<?=$cours_d['img']?>"></div></div>
					<div class="bq_ci_info">
						<div class="bq_cih"><?=$cours_d['name_'.$lang]?></div>
						<p class="fr_price"><?=$cours_d['price']?></p>
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
						<div class="form_span">Шипажайтың атауы:</div>
						<i class="fal fa-text form_icon"></i>
                  <input type="text" class="form_txt cours_name" placeholder="Атауын жазыңыз" data-lenght="2" />
               </div>
					
					<div class="form_im">
						<div class="form_span">Адрес:</div>
						<!-- <i class="fal fa-user-graduate form_icon"></i> -->
						<input type="text" class="form_txt cours_autor" placeholder="Адрес жазыңыз" data-lenght="2" />
					</div>

					<div class="form_im form_sel">
						<div class="form_span">Адрес таңдау:</div>
						<i class="fal fa-warehouse-alt form_icon"></i>
						<div class="form_im_txt sel_clc sh_adres" data-val="1">Қазақстан</div>
						<i class="fal fa-caret-down form_icon_sel"></i>
						<div class="form_im_sel sel_clc_i">
							<? $warehouses = db::query("select * from country where parent_id is not null"); ?>
							<? while ($warehouses_d = mysqli_fetch_assoc($warehouses)): ?>
								<div class="form_im_seli" data-val="<?=$warehouses_d['id']?>"><?=$warehouses_d['name_kz']?></div>
							<? endwhile ?>
						</div>
					</div>

					<div class="form_im">
						<div class="form_span">Шипажай фотосы:</div>
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