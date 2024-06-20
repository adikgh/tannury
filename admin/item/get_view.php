<? include "../../config/core_a.php"; ?>

   <!--  -->
   <? if (isset($_GET['view'])): ?>
		<? $id = strip_tags($_POST['id']); ?>
		<? $lesson_d = fun::number($id); ?>

         <div class="form_c">

            <div class="form_im">
               <div class="form_span">Бөлме атауы:</div>
               <i class="fal fa-text form_icon"></i>
               <input type="text" class="form_txt nm_name" placeholder="Атауын жазыңыз" data-lenght="2" value="<?=$lesson_d['type_name']?>" data-val="<?=$lesson_d['type_name']?>" />
            </div>

            <div class="form_im">
               <div class="form_span">Бөлме cаны:</div>
               <i class="fal fa-text form_icon"></i>
               <input type="text" class="form_txt nm_number_name" placeholder="Атауын жазыңыз" data-lenght="2" value="<?=$lesson_d['door_name']?>" data-val="<?=$lesson_d['door_name']?>" />
            </div>

            <div class="form_im">
               <div class="form_span">Бағасы:</div>
               <i class="fal fa-tenge form_icon"></i>
               <input type="tel" class="form_im_txt fr_price nm_price" placeholder="10.000 тг" data-lenght="1" value="<?=$lesson_d['price']?>" data-val="<?=$lesson_d['price']?>" />
            </div>

            <div class="form_im">
               <div class="form_span">Бөлме фотосы:</div>
               <input type="file" class="cours_img nm_img file dsp_n" accept=".png, .jpeg, .jpg">
					<div class="form_im_img cours_img_add <?=($lesson_d['img']?'form_im_img2':'')?>" <?=($lesson_d['img']?'style="background-image: url(/assets/uploads/number/'.$lesson_d['img'].')"':'')?> data-txt="Фотоны жаңарту">Құрылғыдан таңдау</div>
            </div>

            <div class="form_im form_im_bn">
               <div class="btn btn_cours_edit" data-id="<?=$id?>">Сақтау</div>
            </div>
            <div class="form_im form_im_bn">
               <div class="btn btn_cl cours_del" data-id="<?=$id?>">Өшіру</div>
            </div>
         </div>


		<? exit(); ?>
	<? endif ?>