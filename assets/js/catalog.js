$(document).ready(function() {


	// 
	$('.btn_filtr').click(function(e) {
		e.preventDefault();
		if ($('.blc2_t').hasClass('blc2_ta') == true) {
			$('.blc2_t').removeClass('blc2_ta')
			$('.head_btn').removeClass('head_btna')
		} else {
			$('.blc2_t').addClass('blc2_ta')
			$('.head_btn').addClass('head_btna')
		}
	});


})