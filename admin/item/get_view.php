<? include "../../config/core_a.php"; ?>

   <!--  -->
   <? if (isset($_GET['view'])): ?>
		<? $id = strip_tags($_POST['id']); ?>
		<? $lesson_d = fun::number($id); ?>

         <div class="form_c">

            <div class="form_im form_sel">
               <div class="form_span">Бөлме түрі:</div>
               <i class="fal fa-warehouse-alt form_icon"></i>
               <div class="form_im_txt sel_clc wb_type_ubd" data-val="<?=$lesson_d['type_id']?>"><?=fun::number_type($lesson_d['type_id'])['name']?></div>
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
               <div class="form_im_txt sel_clc wb_number_ubd" data-val="<?=$lesson_d['door_id']?>"><?=fun::number_door($lesson_d['door_id'])['name']?> адамдық</div>
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
               <input type="tel" class="form_im_txt fr_price wb_price_ubd" placeholder="10.000 тг" data-lenght="1" data-val="<?=$lesson_d['price']?>" />
            </div>

            <div class="form_im">
               <div class="form_span">Бөлме фотосы:</div>
               <input type="file" class="cours_img wb_img_ubd file dsp_n" accept=".png, .jpeg, .jpg">
					<div class="form_im_img cours_img_add <?=($lesson_d['img']?'form_im_img2':'')?>" <?=($lesson_d['img']?'style="background-image: url(/assets/uploads/sanatorium/'.$lesson_d['img'].')"':'')?> data-txt="Фотоны жаңарту">Құрылғыдан таңдау</div>
            </div>

            <div class="form_im form_im_bn">
               <div class="btn btn_lesson_edit" data-id="<?=$id?>">Сақтау</div>
            </div>
         </div>


		<? exit(); ?>
	<? endif ?>