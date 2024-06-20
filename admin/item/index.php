<? include "../../config/core_a.php";

	// Қолданушыны тексеру
	if (!$user_id) header('location: /admin/');

	// Шипажай деректері
	if (isset($_GET['id']) || $_GET['id'] != '') {
		$cours_id = $_GET['id'];
		$_SESSION['cours_id'] = $cours_id;
		$cours = db::query("select * from sanatorium_number where id = '$cours_id'");
		$cours_d = mysqli_fetch_assoc($cours);		
		// $_SESSION['project_id'] = $_GET['id'];
		// if (mysqli_num_rows($cours)) {
			// if ($cours_d['info']) $cours_d = array_merge($cours_d, fun::cours_info($cours_d['id']));
		// } else header('location: /admin/catalog/');
	} else header('location: /admin/catalog/');

	// 
	// $cblock = db::query("select * from sanatorium_number where sanatorium_id = '$cours_id' order by number asc");
	

	
	// Сайттың баптаулары
	$menu_name = 'item';
	$site_set['cl_wh'] = false;
	// $site_set['utop_bk'] = 'catalog';
	// $site_set['utop'] = $cours_d['name_'.$lang];
	$site_set['autosize'] = true;
	$css = ['admin/user', 'admin/cours', 'admin/item'];
	$js = ['admin/user'];
?>
<? include "../block/header.php"; ?>

	<div class="uitem">

		<div class="uitem_c uitem_c2">
			<div class="uitemc_l">
				<div class="uitemci_ck">
					<div class="uitemci_ckt">
						<div class="uitemci_cktl">
							<h1 class="uitemci_h"><?=$cours_d['type_name']?></h1>
							<p class=""><?=$cours_d['door_name']?></p>
							<p class="fr_price"><?=$cours_d['price']?></p>
						</div>
						<div class="uitemci_cktr"><div class="lazy_img" data-src="/assets/uploads/number/<?=$cours_d['img']?>"></div></div>
					</div>
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

				<? $cblock = db::query("select * from sanatorium_img where number_id = '$cours_id'"); ?>			
				<? while($cblock_d = mysqli_fetch_assoc($cblock)): ?>
					<div class="cours_lsi">
						<div class="cours_lsimg" data-id="<?=$cblock_d['id']?>"><div class="lazy_img" data-src="/assets/uploads/number/<?=$cblock_d['img']?>"></div></div>
						<div class="cours_lsix sn_img_del" data-id="<?=$cblock_d['id']?>"><i class="fal fa-times"></i></div>
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