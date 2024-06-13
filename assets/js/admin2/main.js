$(document).ready(function() {

	// 
	$('.menu_bars_clc').on('click', function() {
		$(this).parent().toggleClass('menu_act');
	})
	$('.usmenu_bars_clc').on('click', function() {
		$(this).parent().toggleClass('menu_act');
		$('.ub1_r').toggleClass('ub1_r_act');
	})
	

	// sign in
	$('.btn_sign_in').on('click', function() {
		btn = $(this);
		phone = $('.phone');
		password = $('.password')

		if (password.attr('data-sel') != 1 || phone.attr('data-sel') != 1) {
			if (phone.attr('data-sel') != 1) mess('Cіз телефон нөміріңізді жазбапсыз')
			else mess('Cіз кодты жазбапсыз')
		} else {
			$.ajax({
				url: "/admin/get.php?login",
				type: "POST",
				dataType: "html",
				data: ({
					phone: phone.attr('data-val'),
					password: password.attr('data-val')
				}),
				success: function(data){
					if (data == 'yes') location.reload();
					else if (data == 'none') mess('Сіз базадан таппадым, админге жазып көріңіз')
					else if (data == 'password') mess('Cіздің жазған кодыңыз қате, қайта жазып көріңіз')
					console.log(data);
				},
				beforeSend: function(){ },
				error: function(data){ console.log(data) }
			})
		}
	});



	// ubdate user
	$('.user_edit_pop').click(function(){
		$('.user_edit_block').addClass('pop_bl_act');
		$('#html').addClass('ovr_h');
	})
	$('.user_edit_back').click(function(){
		$('.user_edit_block').removeClass('pop_bl_act');
		$('#html').removeClass('ovr_h');
	})

	// 
	$('.user_img_add').click(function(){ $(this).siblings('.user_img').click() })
	$(".user_img").change(function(){
		tfile = $(this)
		if (window.FormData === undefined) mess('Бұл формат келмейді')
		else {
			var formData = new FormData();
			formData.append('file', $(this)[0].files[0]);
			$.ajax({
				type: "POST",
				url: "/user/get.php?add_user_img",
				cache: false, contentType: false,
				processData: false, dataType: 'json',
				data: formData,
				success: function(msg){
					if (msg.error == '') {
						tfile_n = 'url(/assets/uploads/users/' + msg.file + ')'
						tfile.attr('data-val', msg.file)
						tfile.siblings('.user_img_add').addClass('form_im_img2')
						tfile.siblings('.user_img_add').css('background-image', tfile_n)
					} else mess(msg.error)
				},
				beforeSend: function(){ },
				error: function(msg){ console.log(msg) }
			});
		}
	});

	$('.btn_user_edit').click(function () {
		if ($('.user_name').val().length <= 2 || $('.user_code').val().length != 4) {
			if ($('.user_name').val().length <= 2) mess('Атыңызды толтырыңыз')
			if ($('.user_code').val().length != 4) mess('Код бос болмауы керек!')
		} else {
			$.ajax({
				url: "/user/get.php?user_edit",
				type: "POST",
				dataType: "html",
				data: ({
					name: $('.user_name').attr('data-val'), surname: $('.user_surname').attr('data-val'),
					age: $('.user_age').attr('data-val'), img: $('.user_img').attr('data-val'),
					code: $('.user_code').attr('data-val')
				}),
				success: function(data){
					if (data == 'yes') {
						mess('Cәтті сақталды!')
						$('.user_edit_block').removeClass('pop_bl_act');
						setTimeout(function() { location.reload(); }, 500);
					}
					console.log(data);
				},
				beforeSend: function(){ },
				error: function(data){ console.log(data) }
			})
		}
	})
	




	// menu sk
	$('.uitemc_umidl').on('click', function () {
		$('.uitemc_umid').toggleClass('menu_act')
	})

















	
	











   // cours add block
	$('.cours_add_pop').click(function(){
		$('.cours_add_block').addClass('pop_bl_act');
		$('#html').addClass('ovr_h');
	})
	$('.cours_add_back').click(function(){
		$('.cours_add_block').removeClass('pop_bl_act');
		$('#html').removeClass('ovr_h');
	})

	// 
	$('.cours_img_add').click(function(){ $(this).siblings('.cours_img').click() })
	$(".cours_img").change(function(){
		tfile = $(this)
		if (window.FormData === undefined) mess('Бұл формат келмейді')
		else {
			var formData = new FormData();
			formData.append('file', $(this)[0].files[0]);
			$.ajax({
				type: "POST",
				url: "/user/item/get.php?add_item_photo",
				cache: false, contentType: false,
				processData: false, dataType: 'json',
				data: formData,
				success: function(msg){
					if (msg.error == '') {
						tfile_n = 'url(/assets/img/cours/' + msg.file + ')'
						tfile.attr('data-val', msg.file)
						tfile.siblings('.cours_img_add').addClass('form_im_img2')
						tfile.siblings('.cours_img_add').css('background-image', tfile_n)
					} else mess(msg.error)
				},
				beforeSend: function(){ },
				error: function(msg){ console.log(msg) }
			});
		}
	});

	// 
	$('.price1_clc').click(function() { $('.price1_block').toggleClass('price1_block_act') });
	$('.number1_clc').click(function() { $('.number1_block').toggleClass('number1_block_act') });

	// 
	$('.btn_item_add').click(function () { 
		if ($('.cours_name').attr('data-sel') != 1) mess('Форманы толтырыңыз')
		else {
			$.ajax({
				url: "/user/item/get.php?item_add",
				type: "POST",
				dataType: "html",
				data: ({
					name: $('.cours_name').attr('data-val'), access: $('.cours_access').data('val'),
					autor: $('.cours_autor').data('val'), img: $('.cours_img').attr('data-val'),
					price: $('.cours_price').data('val'), price_sole: $('.cours_price_sole').data('val'),
					item: $('.cours_item').data('val'), assig: $('.cours_assig').data('val'),
				}),
				success: function(data){
					if (data == 'plus') location.reload();
					else console.log(data)
				},
				beforeSend: function(){ },
				error: function(data){ console.log(data) }
			})
		}
	})
	
	// cours add block
	$('.cours_edit_pop').click(function(){
		$('.cours_edit_block').addClass('pop_bl_act');
		$('#html').addClass('ovr_h');
	})
	$('.cours_edit_back').click(function(){
		$('.cours_edit_block').removeClass('pop_bl_act');
		$('#html').removeClass('ovr_h');
	})
	$('.btn_cours_edit').click(function () { 
		$.ajax({
			url: "/user/item/get.php?item_edit",
			type: "POST",
			dataType: "html",
			data: ({
				id: $('.btn_cours_edit').data('cours-id'),
				name: $('.cours_name').data('val'), access: $('.cours_access').data('val'),
				autor: $('.cours_autor').data('val'), img: $('.cours_img').data('val'),
				price: $('.cours_price').data('val'), price_sole: $('.cours_price_sole').data('val'),
				item: $('.cours_item').data('val'), assig: $('.cours_assig').data('val'),
			}),
			success: function(data){
				if (data == 'plus') location.reload();
				else console.log(data)
			},
			beforeSend: function(){ },
			error: function(data){ console.log(data) }
		})
	})

	// 
	$('.cours_arh').click(function () {
		$.ajax({
			url: "/user/item/get.php?cours_arh",
			type: "POST",
			dataType: "html",
			data: ({ id: $('.cours_arh').data('id'), }),
			success: function(data){
				if (data == 'yes') location.reload();
				else console.log(data)
			},
			beforeSend: function(){ },
			error: function(data){ console.log(data) }
		})
	})
	// 
	$('.cours_del').click(function () {
		$.ajax({
			url: "/user/item/get.php?cours_del",
			type: "POST",
			dataType: "html",
			data: ({ id: $('.cours_del').data('id'), }),
			success: function(data){
				if (data == 'yes') $(location).attr('href', '/user/cours/');
				else console.log(data)
			},
			beforeSend: function(){ },
			error: function(data){ console.log(data) }
		})
	})




	// add_block_b
	$('.add_block_b').click(function(){
		$('.block_add').addClass('pop_bl_act');
		$('#html').addClass('ovr_h');
	})
	$('.block_add_back').click(function(){
		$('.block_add').removeClass('pop_bl_act');
		$('#html').removeClass('ovr_h');
	})
	$('.btn_block_add').on('click', function(){
		if ($('.block_name').attr('data-sel') != 1) mess('Тақырыпты жазыңыз')
		else {
			$.ajax({
				url: "/user/item/get.php?block_add",
				type: "POST",
				dataType: "html",
				data: ({
					name: $('.block_name').attr('data-val'),
					cours_id: $('.btn_block_add').data('cours-id'),
					item: $('.block_item').data('val'), assig: $('.block_assig').data('val'),
				}),
				success: function(data){
					if (data == 'yes') location.reload();
					else console.log(data)
				},
				beforeSend: function(){},
				error: function(data){console.log(data)}
			})
		} 
	})


	// add_lesson_b
	$('.add_lesson_b').click(function(){
		$('.lesson_add').addClass('pop_bl_act');
		$('#html').addClass('ovr_h');
		if ($(this).attr('data-block-id')) $('.btn_lesson_add').attr('data-block-id', $(this).attr('data-block-id'))
	})
	$('.lesson_add_back').click(function(){
		$('.lesson_add').removeClass('pop_bl_act');
		$('#html').removeClass('ovr_h');
		$('.btn_lesson_add').attr('data-block-id', '')
	})
	$('.lesson1_clc').click(function() { $('.lesson1_block').toggleClass('lesson1_block_act') });

	$('.btn_lesson_add').on('click', function(){
		if ($('.lesson_name').attr('data-sel') != 1) mess('Тақырыпты жазыңыз')
		else {
			$.ajax({
				url: "/user/item/get.php?lesson_add",
				type: "POST",
				dataType: "html",
				data: ({
					name: $('.lesson_name').attr('data-val'),
					cours_id: $('.btn_lesson_add').data('cours-id'),
					block_id: $('.btn_lesson_add').data('block-id'),
					open: $('.lesson_open').attr('data-val'),
					youtube: $('.lesson_youtube').attr('data-val'),
					txt: $('.lesson_txt').val(),
				}),
				success: function(data){
					if (data == 'yes') location.reload();
					else console.log(data)
				},
				beforeSend: function(){},
				error: function(data){console.log(data)}
			})
		}
	})



















	// cours add block
	$('.company_edit_pop').click(function(){
		$('.company_edit_block').addClass('pop_bl_act');
		$('#html').addClass('ovr_h');
	})
	$('.company_edit_back').click(function(){
		$('.company_edit_block').removeClass('pop_bl_act');
		$('#html').removeClass('ovr_h');
	})
	$('.btn_company_edit').click(function () {
		if ($('.company_name').val().length <= 2) mess('Атыңызды толтырыңыз')
		else {
			$.ajax({
				url: "/user/admin/get.php?company_edit",
				type: "POST",
				dataType: "html",
				data: ({
					name: $('.company_name').attr('data-val'),
					phone: $('.company_phone').attr('data-val'), phone_alt: $('.company_phone').val(),
					whatsapp: $('.company_whatsapp').attr('data-val'), whatsapp_alt: $('.company_whatsapp').val(),
					instagram: $('.company_instagram').attr('data-val'), telegram: $('.company_telegram').attr('data-val'), youtube: $('.company_youtube').attr('data-val'), 
					metrika: $('.company_metrika').attr('data-val'), pixel: $('.company_pixel').attr('data-val'),
				}),
				success: function(data){
					if (data == 'yes') {
						mess('Cәтті сақталды!')
						$('.company_edit_block').removeClass('pop_bl_act');
						setTimeout(function() { location.reload(); }, 500);
					} else console.log(data);
				},
				beforeSend: function(){ },
				error: function(data){ console.log(data) }
			})
		}
	})
		
		




























}) // end jquery