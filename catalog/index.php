<? include '../config/core.php';



	
	$country = '';

	$sql_all = db::query("select * from sanatorium where number is not null");
	$page_result = mysqli_num_rows($sql_all);
	
	// page number
	$page = 1; if (@$_GET['page'] && is_int(intval($_GET['page']))) $page = $_GET['page'];
	$page_age = 50;
	$page_all = ceil($page_result / $page_age);
	if ($page > $page_all) $page = $page_all;
	$page_start = ($page - 1) * $page_age;
	$number = $page_start;
	
	$sql = db::query("select * from `sanatorium` where number is not null ORDER BY number ASC");


	// site setting
	$menu_name = 'catalog';
	$site_set['tabs'] = true;
	$site_set['css'] = true;
	$site_set['js'] = true;
	$site_set['bl8'] = false;
	$site_set['bl10'] = false;
	$site_set['bl14'] = false;
?>
<? include '../block/header.php'; ?>

	<div class="blc1">
		<div class="bl_c">
			<div class="head_c">
				<h4 class=""><?=t::w('Choice of sanatorium')?></h4>
				<div class="head_ln">
					<ul>
						<li><a href="/"><?=t::w('Home')?></a></li>
						<span><i class="fal fa-angle-right"></i></span>
						<li><?=t::w('Choice of sanatorium')?></li>
					</ul>
				</div>
				<!-- <div class="head_btn">
					<div class="btn btn_sqr btn_filtr"><i class="far fa-sliders-v"></i></div>
				</div> -->
			</div>
		</div>
	</div>

	<div class="blc2">
		<div class="bl_c">
			<div class="blc2_c">
			
				<div class="blc2_b">
					<? while ($ana = mysqli_fetch_array($sql)): ?>
						<? $id = $ana['id']; ?>

						<a class="bl5_i" href="/sanatorium/?id=<?=$ana['id']?>" target="_blank">
							<div class="bl5_ia" href="/sanatorium/?id=<?=$ana['id']?>">
								<div class="lazy_bag"  data-src="/assets/uploads/sanatorium/<?=$ana['img']?>"></div>
							</div>
							<div class="bl5_ic">
								<div class="bl5_ict">
									<div class="bl5_ictq">
										<div class="bl5_icn"><?=$ana['name_'.$lang]?></div>
										<div class="bl5_icts"><?=fun::rank($ana['rank'])?></div>
									</div>
									<!-- <div class="bl5_iadd"><i class="fas fa-map-marker-alt"></i><?=$ana['address']?></div> -->
								</div>
								<div class="bl5_icb" href="/sanatorium/?id=<?=$ana['id']?>">
									<div class="bl5_icp">от <p class="fr_price"><?=($ana['price']?$ana['price']:@fun::p($ana['id']))?></p></div>
									<div class="btn btn_dd btn_clm"><i class="fal fa-long-arrow-down"></i></div>
								</div>
							</div>
						</a>

					<? endwhile ?>
				</div>

			</div>
		</div>
	</div>

<? include '../block/footer.php'; ?>