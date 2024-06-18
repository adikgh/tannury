// if (window.matchMedia("(max-width: 768px)").matches) { }


$(document).ready(function() {


	// lazy load 
	$('.lazy_logo').lazy()
	$('.lazy_bag').lazy({effect:"fadeIn",effectTime:500,threshold:0})
	$('.lazy_img').lazy({effect:"fadeIn",effectTime:300,threshold:0})
	$('.lazy_menu').lazy({effect:"fadeIn",effectTime:500,threshold:0})
	$('.lz_bl3').lazy({effect:"fadeIn",effectTime:500,threshold:0})
	$('.lz_bl7').lazy({effect:"fadeIn",effectTime:500,threshold:0})
	$('.lz_bl13').lazy({effect:"fadeIn",effectTime:500,threshold:0})
	$('.lazy_rev').lazy({effect:"fadeIn",effectTime:500,threshold:0})

	$('.lazy_c .lazy_img').lazy({
		effect: "fadeIn",
		effectTime: 100,
		threshold: 0,
		appendScroll: $('.lazy_c'),
	})


	// 
	$('.clc_top').click(function(){$('body,html').animate({scrollTop:0},1000)})




	
	// mask form
	$('.fr_code').mask('0000');
	$('.fr_age').mask('00');
	$('.fr_number').mask('# ##0', {reverse: true});
	$('.fr_days').mask('000 күн', {reverse: true});
	$('.fr_price').mask('#.##0 тг', {reverse: true});
	$('.fr_phone').mask('8 (000) 000-00-00');
	$('.fr_phone2').mask('+7 (000) 000-00-00');
	$('.fr_metrika').mask('00 000 000');
	$('.fr_pixel').mask('000 000 000 000 000');

	//
	$('input[type*="text"], input[type*="password"]').on('input', function() {
		$(this).attr('data-val', $(this).val())
		if ($(this).attr('data-lenght') <= $(this).val().length) {
			$(this).attr('data-sel', 1);
		} else {$(this).attr('data-sel',0)}
	});
	$('input[type*="tel"]').on('input', function() {
		var val = $(this).val().replace(/_/g, '').replace(/ /g, '').replace(/-/g, '').replace(/\(/g, '').replace(/\)/g, '').replace(/\+/g, '').replace(/тг/g, '').replace(/\./g, '')
		$(this).attr('data-val', val)
		if ($(this).attr('data-lenght') <= val.length) {
			$(this).attr('data-sel', 1);
		} else {$(this).attr('data-sel',0)}
	});
	$('input[type*="url"]').on('input', function(){
		val = $(this).val().replace('https://', '').replace('www.', '').replace('youtube.com/watch?v=', '').replace('youtu.be/', '').replace(/\&.*/, '');
		$(this).attr('data-val', val);
	})


	//
	$('.form_icon_pass').on('click', function() {
		if ($(this).siblings('.password').attr('data-eye') == 0) {
			$(this).siblings('.password').attr('type', 'text')
			$(this).siblings('.password').attr('data-eye', '1')
			$(this).addClass('fa-eye')
			$(this).removeClass('fa-eye-slash')
		} else {
			$(this).siblings('.password').attr('type', 'password')
			$(this).siblings('.password').attr('data-eye', '0')
			$(this).removeClass('fa-eye')
			$(this).addClass('fa-eye-slash')
		}
	})


	// 
	$('.sel_clc').click(function() {
		if ($(this).hasClass('form_sel_act') == false) {
			$('.sel_clc').removeClass('form_sel_act')
			$(this).addClass('form_sel_act')
		} else $(this).removeClass('form_sel_act')
	});
	$('.sel_clc_i .form_im_seli').click(function() {
		$(this).parent().siblings('.sel_clc').attr('data-val', $(this).attr('data-val'))
		$(this).parent().siblings('.sel_clc').html($(this).html())
		$(this).parent().siblings('.sel_clc').removeClass('form_sel_act')
	});

	// 
	$('.form_im_toggle_btn').click(function() { 
		if ($(this).hasClass('form_im_toggle_act') == true) $(this).siblings('input').attr('data-val', 0)
		else $(this).siblings('input').attr('data-val', 1)
		$(this).toggleClass('form_im_toggle_act')
	});



















	// 
	// AOS.init({duration:500,once:true});


	// 
	// setTimeout(function() {
	// 	$('.preloader').animate({
	// 		opacity : 0
	// 	}, 500, function () {
	// 		$(this).css('display', 'none')
	// 	})
	// }, 500)




	// 
	$('.menu_os, .menu_oz').click(function(e) {
		$('#html').toggleClass('ovr_h');
		$('.menu_o').toggleClass('menu_o_act');
	});
	$('.header_r .menu_c').click(function(e) {
		$('#html').removeClass('ovr_h');
	});


	// 
	$('.menu_cipc').on('click', function() {
		// $(this).siblings('.menu_pod').addClass('menu_pod_act')
		$('.menu_cnq').addClass('dsp_n')
		$('.menu_cna').removeClass('dsp_n')

		$('.lazy_menu').lazy()
	});
	$('.menu_clc_lang').on('click', function() {
		$('.menu_pod_lang').removeClass('dsp_n')
	});
	$('.menu_clc_gprog').on('click', function() {
		$('.menu_pod_gprog').removeClass('dsp_n')
	});
	$('.menu_cipl').on('click', function() {
		$('.menu_pod').addClass('dsp_n')
		$('.menu_cnq').removeClass('dsp_n')
		$('.menu_cna').addClass('dsp_n')
	});



	// 
	$('.menu_pj').click(function(){
		$('.header').toggleClass('trs_act')
		$('.body').toggleClass('trs_act')
		$('.footer').toggleClass('trs_act')
		$('.menu_ph').toggleClass('trs_act')
	})
	$('.menu_back, .menu_phi a').click(function(){
		$('.header').removeClass('trs_act')
		$('.body').removeClass('trs_act')
		$('.footer').removeClass('trs_act')
		$('.menu_ph').removeClass('trs_act')
	})


	// 
	let scroll = $(window).scrollTop();
	if (scroll > 400) {$('.tabs_f').addClass('tabs_act')}else{$('.tabs_f').removeClass('tabs_act')}
	$(window).scroll(function() {
    	scroll = $(window).scrollTop();
		if (scroll > 400) {$('.tabs_f').addClass('tabs_act')}else{$('.tabs_f').removeClass('tabs_act')}
	})








	// setting input
	// $(".ms_phone").inputmask("+7 (999) 999-99-99");
	// form - input
	$('input[type=text]').on('input', function(){
		if ($(this).val().length < $(this).attr('data-lenght')) {
			$(this).attr('data-pr', 0)
		} else {
			$(this).attr('data-pr', '1')
			$(this).attr('data-val', $(this).val())
		}
	})
	$('input[type=tel]').on('input', function(){
		in_rez = $(this).val().replace(/ /g, '').replace(/\+/g, '').replace(/\)/g, '').replace(/\(/g, '').replace(/-/g, '').replace(/_/g, '')
		if (in_rez.length < $(this).attr('data-lenght')) {
			$(this).attr('data-pr', 0)
		} else {
			$(this).attr('data-pr', 1)
			$(this).attr('data-val', in_rez)
		}
	})



	// СМС +
	$('.orderSend').on('click', function() {

		var sms = $(this).parent().siblings().children('.sms')
		var name = $(this).parent().siblings().children('.name')
		var phone = $(this).parent().siblings().children('.phone')

		if (name.attr('data-pr') != 1 || phone.attr('data-pr') != 1) mess('Введите свой данный') 
		else {
			$.ajax({
				url: "/config/send.php?mess",
				type: "POST",
				dataType: "html",
				data: ({
					sms: sms.val(),
					name: name.val(),
					phone: phone.attr('data-val'),
				}),
				beforeSend: function(){ mess('Отправка..') },
				error: function(data){ mess('Ошибка..') },
				success: function(data){
					if (data == 'yes') { 
						mess('Успешно отправлено')
						phone.val('')
						phone.attr('data-pr', 0)
						name.val('')
						name.attr('data-pr', 0)
					} else mess('Пожалуйста, перезагрузите сайт <br>и попробуйте еще раз')
					console.log(data);
				},
			})
		}
	})



	// 
	$('.send').on('click', function() {

		var sms = $(this).parent().siblings().children('.sms')
		var phone = $(this).parent().siblings().children('.phone')

		if (phone.attr('data-pr') != 1) mess('Введите свой данный')
		else {
			$.ajax({
				url: "/config/send.php?sms",
				type: "POST",
				dataType: "html",
				data: ({
					sms: sms.val(),
					phone: phone.attr('data-val')
				}),
				beforeSend: function(){ mess('Отправка..') },
				error: function(data){ mess('Ошибка..') },
				success: function(data){
					if (data == 'yes') { 
						mess('Успешно отправлено')
						phone.val('')
						phone.attr('data-pr', 0)
					} else mess('Пожалуйста, перезагрузите сайт <br>и попробуйте еще раз')
					console.log(data);
				},
			})
		}
	})


	$('.test1').on('click', function() {

		var msg = $('#test1').serialize();
		var phone = $('.phone2')

		if (phone.attr('data-pr') != 1)  mess('Введите свой данный')
		else {
			$.ajax({
				url: "/config/send.php?test1",
				type: "POST",
				data: msg,
				success: function(data){
					if (data == 'yes') { 
						mess('Успешно отправлено')
						$(location).attr('href', '/catalog/');
					} else {
						mess('Пожалуйста, перезагрузите сайт <br>и попробуйте еще раз')
					}
				},
				beforeSend: function(){ mess('Отправка..') },
				error: function(data){ mess('Ошибка..') }
			})
		}
	})









   var bl13_c = new Swiper('.bl13_c', {
		slidesPerView: 1,
		autoHeight: true,
		navigation:{nextEl:'.bl13_next',prevEl:'.bl13_prev'},
		pagination:{el:'.bl13_pagination',dynamicBullets:true},
		on:{slideChange:function(){$('.lz_bl13').lazy({effect:"fadeIn",effectTime:500,threshold:0})}},
	})
   	var bl4_cls = new Swiper('.bl4_cls', {
		effect: 'fade',
		autoHeight: true,
		allowTouchMove: false,
		fadeEffect:{crossFade:true},
		navigation:{nextEl:'.gallery-next',prevEl:'.gallery-prev'},
		pagination:{el:'.bl4_pag',type:'progressbar'},
   	})
	var bl9_con = new Swiper('.bl9_con', {
		slidesPerView: 1,
		spaceBetween: 30,
		autoHeight: true,
		navigation:{nextEl:'.bl9_next',prevEl:'.bl9_prev'},
		on:{slideChange:function(){$('.lazy_rev').lazy({effect:"fadeIn",effectTime:500,threshold:0})}},
   })
	var bl3_c = new Swiper('.bl3_c', {
		slidesPerView: 'auto',
		grabCursor: true,
		centeredSlides: true,
		navigation:{nextEl:'.bl3_next',prevEl:'.bl3_prev'},
		on:{slideChange:function(){$('.lz_bl3').lazy({effect:"fadeIn",effectTime:500,threshold:0})}},
   })




   	// 
	$('.disb_zab').click(function(){$('.fr').addClass('pop_bl_act')})
	$('.zabr_back').click(function(){$('.fr').removeClass('pop_bl_act')})

	// 
	$('.disb_zab2').click(function(){$('.fr2').addClass('pop_bl_act')})
	$('.zabr_back2').click(function(){$('.fr2').removeClass('pop_bl_act')})

	// 
	$('.disb_zab3').click(function(){$('.fr3').addClass('pop_bl_act')})
	$('.zabr_back3').click(function(){$('.fr3').removeClass('pop_bl_act')})

	// 
	$('.disb_zab4').click(function(){
		$('.fr4').addClass('pop_bl_act')
		$('.fr4 .sms1').val($(this).attr('data-name'))
		$('.fr4 .sms2').val($(this).attr('data-number'))
	})
	$('.zabr_back4').click(function(){$('.fr4').removeClass('pop_bl_act')})

	// 
	$('.disb_zab5').click(function(){$('.fr5').addClass('pop_bl_act')})
	$('.zabr_back5').click(function(){$('.fr5').removeClass('pop_bl_act')})



	// 
	$('.faq-a').each(function(){$(this).height($(this).children('.faq-ah').height())})
	$('.faq-a').on('click', function(e) {
		e.preventDefault();
		if ($(this).hasClass('faq-act') == true) {
			$(this).removeClass('faq-act')
			$(this).height($(this).children('.faq-ah').height())
		} else {
			$(this).addClass('faq-act')
			$(this).height($(this).children('.faq-text').height() + $(this).children('.faq-ah').height() + 30)
		}
	});








	
	// 
	// $('.bj_wcqn').click(function(e) {
	// 	if ($(this).parent('.bj_wcq').hasClass('bj_wcq_act') == false) {
	// 		$('.bj_wcq').removeClass('bj_wcq_act');
	// 		$(this).parent('.bj_wcq').addClass('bj_wcq_act');
	// 	} else $('.bj_wcq').removeClass('bj_wcq_act');
	// });

	$('.bj_wcq .menu_ci').click(function(e) {
		txt = $(this).children('.menu_cih').html()
		$(this).parents('.bj_wcq').children('.bj_wcqn').children('span').html(txt)
		$('.ucours_tmi').parent().removeClass("ucours_tm_act");
		console.log(txt);
	});



	id1 = id2 = id3 = 0;
	$('.bj_wcq_country .menu_ci').click(function(e) {
		id1 = $(this).data('id');
	});
	$('.bj_wcq_country2 .menu_ci').click(function(e) {
		id2 = $(this).data('id');
	});
	$('.bj_wcq_services .menu_ci').click(function(e) {
		id3 = $(this).data('id');
	});
	$('.bj_wcq_btn').click(function(e) {
		url = '/catalog/?country=' + id1 + '&country2=' + id2 + '&services=' + id3;
		$(location).attr('href', url);
	});











	   	// 
		$('.bl5_iclc div').click(function(){
			$('.lechy').addClass('pop_bl_act')
			$('.lazy_img').lazy({})
		})
		$('.lechy_back').click(function(){$('.lechy').removeClass('pop_bl_act')})


	   	// 
		$('.price_clc').click(function(){
			$('.price_blc').addClass('pop_bl_act')
			$('.lazy_img').lazy({})
		})
		$('.price_back').click(function(){$('.price_blc').removeClass('pop_bl_act')})









	// 
	$('html').on('click', '.ucours_tmi', function() {
		if ($(this).parent().hasClass("ucours_tm_act")	!= true) {
			$('.ucours_tmi').parent().removeClass("ucours_tm_act");
			$(this).parent().addClass("ucours_tm_act");
		} else $('.ucours_tmi').parent().removeClass("ucours_tm_act");
	})
	$('html').on('click', '.ucours_tmas', function() {
		$('.ucours_tmi').parent().removeClass("ucours_tm_act");
	})





})