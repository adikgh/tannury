$(document).ready(function() {


	// 
	$('.lazy_sana_img').lazy({effect:"fadeIn",effectTime:500,threshold:0})



	// 
	let scroll2 = $(window).scrollTop();
	if (scroll2 > 54) {$('.header_sana').addClass('header_sana_act')}else{$('.header_sana').removeClass('header_sana_act')}
	$(window).scroll(function() {
    	scroll2 = $(window).scrollTop();
		if (scroll2 > 54) {$('.header_sana').addClass('header_sana_act')}else{$('.header_sana').removeClass('header_sana_act')}
	})


	// 
	var sana_bl1b = new Swiper('.sana_bl1b', {
      slidesPerView: 'auto',
      freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      loop: true,
   	centeredSlides: true,
   });
   var sana_bl1t = new Swiper('.sana_bl1t', {
      slidesPerView: 1,
      loop: true,
   	centeredSlides: true,
   	effect: 'fade',
   	fadeEffect: {crossFade:true},
      navigation:{nextEl:'.sana_bl1t_next',prevEl:'.sana_bl1t_prev'},
      on:{slideChange:function(){$('.lazy_sana_img').lazy({effect:"fadeIn",effectTime:500,threshold:0})}},
      pagination:{el:'.sana_bl1t_pag',dynamicBullets:true},
      breakpoints: {769:{thumbs:{swiper:sana_bl1b}}},
   });


   // 
   var sana_bl3_ct = new Swiper('.sana_bl3_ct', {
      slidesPerView: 'auto',
      freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      breakpoints: {426:{allowTouchMove:false}},
   });
   var sana_bl3_cb = new Swiper('.sana_bl3_cb', {
      slidesPerView: 1,
      autoHeight: true,
   	allowTouchMove: false,
   	effect: 'fade',
   	fadeEffect: {crossFade:true},
      thumbs: {swiper:sana_bl3_ct},
   });


   // 
	$('.sana_bl3_c').on('click', function(e) {
		e.preventDefault();
		if ($(this).hasClass('sana_bl3_c_act') == true) {
			$(this).removeClass('sana_bl3_c_act')
			$(this).children('.sana_bl3_ct').height(75)
		} else {
			$(this).addClass('sana_bl3_c_act')
			$(this).children('.sana_bl3_ct').height($(this).children('.sana_bl3_ct').children('p').height() + 15)
		}
	});


   // 
   $('.form_klb_min').click(function(){
      san = Number($(this).siblings('.form_kln').html())
      if (san > 5) $(this).siblings('.form_kln').html(san-1)
   })
   $('.form_klb2').click(function(){
      san = Number($(this).siblings('.form_kln').html())
      if (san >= 5) $(this).siblings('.form_kln').html(san+1)
   })





   // 
   $('.book').on('click', function() {

      var sms1 = $(this).parent().siblings().children('.sms1')
      var sms2 = $(this).parent().siblings().children('.sms2')
      var dt = $(this).parent().siblings().children('.date')
      var dt2 = $(this).parent().siblings().children('.form_kl').children('.form_kln')
      var name = $(this).parent().siblings().children('.name')
      var phone = $(this).parent().siblings().children('.phone')

      if (phone.attr('data-pr') != 1) { mess('Введите свой данный') } 
      else {
         $.ajax({
            url: "/send/?book",
            type: "POST",
            dataType: "html",
            data: ({sms1:sms1.val(),sms2:sms2.val(),dt:dt.val(),dt2:dt2.html(),name:name.val(),phone:phone.val()}),
            success: function(data){
               if (data == 'yes') { 
                  mess('Успешно отправлено')
                  name.val('')
                  name.attr('data-pr', 0)
                  phone.val('')
                  phone.attr('data-pr', 0)
               } else {
                  mess('Пожалуйста, перезагрузите сайт <br>и попробуйте еще раз')
                  console.log(data);
               }
            },
            beforeSend: function(){ mess('Отправка..') },
            error: function(data){ mess('Ошибка..') }
         })
      }
   })





})