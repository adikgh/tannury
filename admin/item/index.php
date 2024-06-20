<? include "../../config/core_a.php";

	// Қолданушыны тексеру
	if (!$user_id) header('location: /admin/');

	// Шипажай деректері
	if (isset($_GET['id']) || $_GET['id'] != '') {
		$cours_id = $_GET['id'];
		$_SESSION['project_id'] = $_GET['id'];
		$cours = db::query("select * from sanatorium where id = '$cours_id'");
		if (mysqli_num_rows($cours)) {
			$cours_d = mysqli_fetch_assoc($cours);			
			if ($cours_d['info']) $cours_d = array_merge($cours_d, fun::cours_info($cours_d['id']));
		} else header('location: /admin/catalog/');
	} else header('location: /admin/catalog/');

	// 
	// $cblock = db::query("select * from sanatorium_number where sanatorium_id = '$cours_id' order by number asc");
	

	
	// Сайттың баптаулары
	$menu_name = 'item';
	$site_set['utop_bk'] = 'catalog';
	$site_set['utop'] = $cours_d['name_'.$lang];
	$site_set['autosize'] = true;
	$css = ['admin/user', 'admin/cours', 'admin/item'];
	$js = ['admin/user'];
?>
<? include "../block/header.php"; ?>

	<div class="uitem">

		<div class="uitem_c uitem_c2">
			<!-- Инфо -->
			<div class="uitemc_l">

				<div class="uitemc_um">
					<a class="uitemc_umi uitemc_umi_act" href="/admin/item/?id=<?=$cours_id?>">Жалпы</a>
					<div class="uitemc_umi cours_edit_pop" href="/admin/item/?id=<?=$cours_id?>">Өңдеу</div>
					<div class="uitemc_umid">
						<div class="uitemc_umi uitemc_umidl">Қосымша</div>
						<div class="menu_c uitemc_umidc">
							<div class="menu_ci cours_copy" data-id="<?=$cours_id?>">
								<div class="menu_cin"><i class="fal fa-copy"></i></div>
								<div class="menu_cih">Көшіру</div>
							</div>
							<div class="menu_ci cours_arh" data-id="<?=$cours_id?>">
								<? if (!$cours_d['arh']): ?>
									<div class="menu_cin"><i class="fal fa-archive"></i></div>
									<div class="menu_cih">Архивке салу</div>
								<? else: ?>
									<div class="menu_cin"><i class="fal fa-box-up"></i></div>
									<div class="menu_cih">Архивтен шығару</div>
								<? endif ?>
							</div>
							<? if ($cours_d['arh']): ?>
								<div class="menu_ci cours_del" data-id="<?=$cours_id?>">
									<div class="menu_cin"><i class="fal fa-trash"></i></div>
									<div class="menu_cih">Жою</div>
								</div>
							<? endif ?>
						</div>
					</div>
				</div>

				<div class="uitemci_ck">
					<div class="uitemci_ckt">
						<div class="uitemci_cktl"><h1 class="uitemci_h"><?=$cours_d['name_'.$lang]?></h1></div>
						<div class="uitemci_cktr"><div class="lazy_img" data-src="/assets/uploads/sanatorium/<?=$cours_d['img']?>"></div></div>
					</div>
				</div>

				<!--  -->
				<div class="">
					
				</div>
			</div>

		</div>

		<div class="uc_list">
			<div class="head_c">
				<h4>Фотолар</h4>
			</div>
			<div class="cours_ls">
				<div class="cours_lsi ">
					<input type="file" class="item_file2 file" multiple accept=".png, .jpeg, .jpg">
					<div class="bq3_ci_rg item_ava_clc2">
						<i class="fal fa-plus"></i>
						<span>Қосу</span>
					</div>
				</div>

				<? $cblock = db::query("select * from sanatorium_img where sanatorium_id = '$cours_id'"); ?>			
				<? while($cblock_d = mysqli_fetch_assoc($cblock)): ?>
					<div class="cours_lsi">
						<div class="cours_lsimg" data-id="<?=$cblock_d['id']?>"><div class="lazy_img" data-src="/assets/uploads/sanatorium/<?=$cblock_d['img']?>"></div></div>
						<div class="cours_lsix sn_img_del" data-id="<?=$cblock_d['id']?>"><i class="fal fa-times"></i></div>
					</div>
				<? endwhile ?>
			</div>
		</div>

		<div class="">
			<div class="head_c">
				<h4>Бөлмелер</h4>
			</div>
			<div class="uc_d">
				<div class="uc_di bq3_ci_rg add_lesson_b">
					<i class="fal fa-plus"></i>
					<span>Қосу</span>
				</div>
					
				<? $cblock = db::query("select * from sanatorium_number where sanatorium_id = '$cours_id'"); ?>
				<? while($cblock_d = mysqli_fetch_assoc($cblock)): ?>
					<? $cblock_id = $cblock_d['id']; ?>
						<div class="uc_di clc_lesson_b" href="/admin/item/?id=<?=$cblock_id?>" data-id="<?=$cblock_id?>">
							<div class="uc_dit">
								<div class="bq_ci_info"><div class="bq_cih"><?=$cblock_d['name_'.$lang]?></div></div>
								<div class="bq_ci_img"><div class="lazy_img" data-src="/assets/uploads/sanatorium/<?=$cblock_d['img']?>"></div></div>
							</div>
							<div class="uc_dib">
								<div class="uc_dib_ckb">
									<div class=""><?=fun::number_type($cblock_d['type_id'])['name']?></div>
									<div class=""><?=fun::number_door($cblock_d['door_id'])['name']?>-дық бөлме</div>
									<div class=""><?=$cblock_d['price']?> тг</div>
								</div>
								<div class="bq_ci_btn"><div class="btn btn_gr btn_dd"><i class="fal fa-long-arrow-right"></i></div></div>
							</div>
						</div>
				<? endwhile ?>

			</div>
		</div>


	</div>

<? include "../block/footer.php"; ?>

	<!-- cours edit -->
	<div class="pop_bl pop_bl2 cours_edit_block">
		<div class="pop_bl_a cours_edit_back"></div>
		<div class="pop_bl_c">
			<div class="head_c">
				<h5>Шипажай өзгерту</h5>
				<div class="btn btn_dd2 cours_edit_back"><i class="fal fa-times"></i></div>
			</div>
			<div class="pop_bl_cl lazy_c">
				<div class="form_c">
					<div class="form_im">
						<div class="form_span">Шипажайтың атауы:</div>
                  <input type="text" class="form_txt sh_name_ubd" placeholder="Атауын жазыңыз" data-lenght="2" value="<?=$cours_d['name_kz']?>" />
						<i class="fal fa-text form_icon"></i>
               </div>
					<div class="form_im">
						<div class="form_span">Автор:</div>
						<!-- <i class="fal fa-user-graduate form_icon"></i> -->
						<input type="text" class="form_txt cours_autor_ubd" placeholder="Авторды жазыңыз" data-lenght="2" value="<?=$cours_d['address']?>" />
					</div>

					<div class="form_im form_sel">
						<div class="form_span">Адрес таңдау:</div>
						<i class="fal fa-warehouse-alt form_icon"></i>
						<div class="form_im_txt sel_clc sh_adres_ubd" data-val="<?=$cours_d['country_id']?>"><?=fun::country($cours_d['country_id'])['name_kz']?></div>
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
						<input type="file" class="cours_img sh_img_ubd file dsp_n" accept=".png, .jpeg, .jpg">
						<div class="form_im_img cours_img_add <?=($cours_d['img']?'form_im_img2':'')?>" <?=($cours_d['img']?'style="background-image: url(\'/assets/uploads/sanatorium/'.$cours_d['img'].'\')"':'')?> data-txt="Фотоны жаңарту">Құрылғыдан таңдау</div>
					</div>

					<div class="form_im form_im_bn">
						<div class="btn btn_cours_edit" data-cours-id="<?=$cours_id?>">
							<i class="far fa-check"></i>
							<span>Сақтау</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>




	<!-- lesson add -->
	<div class="pop_bl pop_bl2 lesson_add">
		<div class="pop_bl_a lesson_add_back"></div>
		<div class="pop_bl_c">
			<div class="head_c txt_c">
				<h5>Бөлме қосу</h5>
				<div class="btn btn_dd2 lesson_add_back"><i class="fal fa-times"></i></div>
			</div>
			<div class="pop_bl_cl">
				<div class="form_c">

					<div class="form_im form_sel">
						<div class="form_span">Бөлме түрі:</div>
						<i class="fal fa-warehouse-alt form_icon"></i>
						<div class="form_im_txt sel_clc wb_type" data-val="2">Стандарт</div>
						<i class="fal fa-caret-down form_icon_sel"></i>
						<div class="form_im_sel sel_clc_i">
							<? $warehouses = db::query("select * from sanatorium_number_type"); ?>
							<? while ($warehouses_d = mysqli_fetch_assoc($warehouses)): ?>
								<div class="form_im_seli" data-val="<?=$warehouses_d['id']?>"><?=$warehouses_d['name']?></div>
							<? endwhile ?>
						</div>
					</div>

					<div class="form_im form_sel">
						<div class="form_span">Адам саны:</div>
						<i class="fal fa-warehouse-alt form_icon"></i>
						<div class="form_im_txt sel_clc wb_number" data-val="1">1 адамдық</div>
						<i class="fal fa-caret-down form_icon_sel"></i>
						<div class="form_im_sel sel_clc_i">
							<? $warehouses = db::query("select * from sanatorium_number_door"); ?>
							<? while ($warehouses_d = mysqli_fetch_assoc($warehouses)): ?>
								<div class="form_im_seli" data-val="<?=$warehouses_d['id']?>"><?=$warehouses_d['name']?> адамдық</div>
							<? endwhile ?>
						</div>
					</div>

					<div class="form_im">
						<div class="form_span">Бағасы:</div>
						<i class="fal fa-tenge form_icon"></i>
						<input type="tel" class="form_im_txt fr_price wb_price" placeholder="10.000 тг" data-lenght="1" />
					</div>

					<div class="form_im">
						<div class="form_span">Бөлме фотосы:</div>
						<input type="file" class="cours_img wb_img file dsp_n" accept=".png, .jpeg, .jpg">
						<div class="form_im_img lazy_img cours_img_add" data-txt="Фотоны жаңарту">Құрылғыдан таңдау</div>
					</div>

					<div class="form_im form_im_bn"><div class="btn btn_lesson_add" data-cours-id="<?=$cours_id?>"><span>Қосу</span></div></div>
				</div>
			</div>
		</div>
	</div>

	<!--  -->
	<div class="pop_bl pop_bl2 lesson_edit">
		<div class="pop_bl_a lesson_edit_back"></div>
		<div class="pop_bl_c">
			<div class="head_c txt_c">
				<h5>Cабақты өңдеу</h5>
				<div class="btn btn_dd2 lesson_edit_back"><i class="fal fa-times"></i></div>
			</div>
			<div class="pop_bl_cl">
				<div class="lesson_edit_89">
					<div class="menu_c lesson_clc_menu" data-id="">
						<div class="menu_ci del_lesson_b">
							<div class="menu_cin"><i class="fal fa-trash"></i></div>
							<div class="menu_cih">Жою</div>
						</div>
					</div>
				</div>
				<div class="lesson_edit_99"></div>
			</div>
		</div>
	</div>