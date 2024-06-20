// start jquery
$(document).ready(function() {

	// sign in
	$('.btn_sign_in').on('click', function() {
		btn = $(this)
		phone = $('.phone')
		password = $('.password')

		if (password.attr('data-sel') != 1 || phone.attr('data-sel') != 1) {
			if (phone.attr('data-sel') != 1) mess('Cіз телефон нөміріңізді жазбапсыз')
			else mess('Cіз пароль жазбапсыз')
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
				url: "/admin/get.php?add_user_img",
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
				url: "/admin/get.php?user_edit",
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
	
	

	// // ubdate user phone
	// $('.user_ph_pop').click(function(){
	// 	$('.user_ph_block').addClass('pop_bl_act');
	// 	$('#html').addClass('ovr_h');
	// })
	// $('.user_ph_back').click(function(){
	// 	$('.user_ph_block').removeClass('pop_bl_act');
	// 	$('#html').removeClass('ovr_h');
	// })
	// $('.btn_user_ph').click(function () {
	// 	if ($('.user_phone').attr('data-sel') != 1) mess('Форманы толтырыңыз')
	// 	else {
	// 		$.ajax({
	// 			url: "/user/get.php?user_ph",
	// 			type: "POST",
	// 			dataType: "html",
	// 			data: ({
	// 				phone: $('.user_phone').attr('data-val'),
	// 				code: $('.new_code').attr('data-val')
	// 			}),
	// 			success: function(data){
	// 				if (data == 'yes') mess('Cәтті сақталды!'); $('.user_ph_block').removeClass('pop_bl_act');
	// 				console.log(data);
	// 			},
	// 			beforeSend: function(){ },
	// 			error: function(data){ console.log(data) }
	// 		})
	// 	}
	// })












	// Че за ? 
	$('.phone').on('input', function() {
		if ($('.btn_fdal').parent().attr('data-type') == 'reg_info') {
			$('.btn_fdal').children('span').html($('.btn_fdal').attr('data-aut'))
			$('.btn_fdal').parent().attr('data-type', 'aut')
			$('.lg_top_head > *').each(function() {$(this).html($(this).attr('data-lg'))})
		}
	})





	// 
	$('.btn_lc_log').on('click', function() {

		phone = $(this).parent().siblings().children('.phone');
		form_sms = $(this).parent().siblings().children('.form_sms');
		num = '';
		$('.form_cn_code2 input').each(function() {
			num += $(this).attr('data-val')
		});
		
		if (phone.attr('data-sel') != 1 || num.length != 4) {
			phone.parent().addClass('form_pust')
			form_sms.html(form_sms.attr('data-code-pust'))
			form_sms.parent().removeClass('dsp_n')
		} else {
			$.ajax({
				url: "/admin/get.php?ls_aut",
				type: "POST",
				dataType: "html",
				data: ({phone: phone.attr('data-val'), code: num}),
				success: function(data){
					if (data == 'yes') {
						location.reload();
					} else if (data == 'none') {
						form_sms.parent().removeClass('dsp_n')
						form_sms.html(form_sms.attr('data-code'))
					} else {console.log(data)}
				},
				beforeSend: function(){},
				error: function(data){console.log(data)}
			})
		}

	});


















	









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
	$('html').on('click', '.cours_img_add', function(){
		$(this).siblings('.cours_img').click() 
	})
	$('html').on('change', '.cours_img', function(){
		tfile = $(this)
		if (window.FormData === undefined) mess('Бұл формат келмейді')
		else {
			var formData = new FormData();
			formData.append('file', $(this)[0].files[0]);
			$.ajax({
				type: "POST",
				url: "/admin/item/get.php?add_item_photo",
				cache: false, contentType: false,
				processData: false, dataType: 'json',
				data: formData,
				success: function(msg){
					if (msg.error == '') {
						tfile_n = 'url(/assets/uploads/number/' + msg.file + ')'
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
	$('.btn_item_add').click(function () { 
		if ($('.na_name').attr('data-sel') != 1) mess('Форманы толтырыңыз')
		else {
			$.ajax({
				url: "/admin/item/get.php?item_add",
				type: "POST",
				dataType: "html",
				data: ({
					na_name: $('.na_name').data('val'),
					na_number_name: $('.na_number_name').data('val'), 
					na_price: $('.na_price').data('val'),
					na_img: $('.na_img').data('val'),
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

		id = $(this).attr('data-id')

		$.ajax({
			url: "/admin/item/get_view.php?view",
			type: "POST",
			dataType: "html",
			data: ({ id: id, }),
			beforeSend: function(){ },
			error: function(data){ console.log(data) },
			success: function(data){
				if (data) $('.lesson_edit_99').html(data)
				else console.log(data)
			},
		})

	})
	$('.cours_edit_back').click(function(){
		$('.cours_edit_block').removeClass('pop_bl_act');
		$('#html').removeClass('ovr_h');
	})
	$('html').on('click', '.btn_cours_edit', function () {
		console.log('fff');
		$.ajax({
			url: "/admin/item/get.php?number_edit",
			type: "POST",
			dataType: "html",
			data: ({
				id: $('.btn_cours_edit').data('id'),
				nm_name: $('.nm_name').data('val'),
				nm_number_name: $('.nm_number_name').data('val'), 
				nm_price: $('.nm_price').data('val'),
				nm_img: $('.nm_img').data('val'),
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
	$('html').on('click', '.cours_del', function () {
		$.ajax({
			url: "/admin/item/get.php?cours_del",
			type: "POST",
			dataType: "html",
			data: ({ id: $('.cours_del').data('id'), }),
			success: function(data){
				if (data == 'yes') $(location).attr('href', '/admin/');
				else console.log(data)
			},
			beforeSend: function(){ },
			error: function(data){ console.log(data) }
		})
	})














	// 
	$('.item_ava_clc2').click(function(){ $(this).siblings('.item_file2').click() })
	$(".item_file2").change(function(){
		tfile = $(this)
		if (window.FormData === undefined) mess('В вашем браузере FormData не поддерживается')
		else {
			var formData = new FormData();
			$.each(tfile[0].files,function(key, input){ formData.append('file[]', input); });
			$.ajax({
				type: "POST",
				url: "/admin/item/get.php?add_item_photo2",
				cache: false,
				contentType: false,
				processData: false,
				dataType: 'json',
				data: formData,
				beforeSend: function(){ },
				success: function(msg){
					if (msg.error == '') {
						$.each(msg.file, function(index, value){
							tfile_n = 'url(/assets/uploads/number/'+value+')'
							tfile.parent().after('<div class="cours_lsi"><div class="cours_lsimg" data-id="" data-val="' + value + '"><div class="lazy_img" style="background-image:' + tfile_n + '"></div></div></div>')
						})
					} else mess(msg.error)
				},
				error: function(msg){ console.log(msg) }
			});
		}
	});

	// 
	$('html').on('click', '.sn_img_del', function(){
		btn = $(this) 
		$.ajax({
			url: "/admin/item/get.php?sn_img_del",
			type: "POST",
			dataType: "html",
			data: ({ id: btn.attr('data-id'), }),
			beforeSend: function(){ },
			error: function(data){ console.log(data) },
			success: function(data){
				// if (data == 'yes') location.reload();
				if (data == 'yes') btn.parent('').remove()
				else console.log(data)
			},
		})
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
				url: "/admin/get.php?company_edit",
				type: "POST",
				dataType: "html",
				data: ({
					name: $('.company_name').attr('data-val'),
					phone: $('.company_phone').attr('data-val'), 
					phone_alt: $('.company_phone').val(),
					whatsapp: $('.company_whatsapp').attr('data-val'), 
					whatsapp_alt: $('.company_whatsapp').val(),
					instagram: $('.company_instagram').attr('data-val'), 
					telegram: $('.company_telegram').attr('data-val'), 
					youtube: $('.company_youtube').attr('data-val'), 
					metrika: $('.company_metrika').attr('data-val'), 
					pixel: $('.company_pixel').attr('data-val'),
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