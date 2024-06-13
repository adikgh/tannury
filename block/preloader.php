<? // unset($_SESSION['loader']); ?>
<? if (!isset($_SESSION['loader']) || !$_SESSION['loader']): ?>
	<div class="preload">
		<div class="preload-box">
			<div class="preload-container">
				<span class="circle"></span>
				<span class="circle"></span>
				<span class="circle"></span>
				<span class="circle"></span>
			</div>
		</div>
	</div>
	<script>
		window.onload =()=> {
			setTimeout(function () {
				$(".preload").addClass('preloader_act')
				setTimeout(function(){$(".preload").addClass('dsp_n')}, 300)
			}, 1000)
		}
	</script>
   <? $_SESSION['loader'] = true; ?>
<? endif ?>