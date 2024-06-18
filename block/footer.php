		<? if ($site_set['bl10']): ?>
			<div class="bl10">
				<div class="bl10_a lazy_bag" data-src="/assets/img/bag/bl11bag2.jpg"></div>
				<div class="bl10_abc">
					<div class="bl10_ab lazy_bag" data-src="/assets/img/bag/cloud_ab.png" style="--bl10:1"></div>
					<div class="bl10_ab lazy_bag" data-src="/assets/img/bag/cloud_ab.png" style="--bl10:2"></div>
					<div class="bl10_ab lazy_bag" data-src="/assets/img/bag/cloud_ab.png" style="--bl10:3"></div>
					<div class="bl10_ab lazy_bag" data-src="/assets/img/bag/cloud_ab.png" style="--bl10:4"></div>
					<div class="bl10_ab lazy_bag" data-src="/assets/img/bag/cloud_ab.png" style="--bl10:5"></div>
				</div>
				<div class="bl10_c" data-aos="fade-up">
					<div class="head_c txt_c">
						<h4><?=t::w('Still have questions?')?></h4>
						<p><?=t::w('bl10_w')?></p>
					</div>
					<div class="form_c">
						<div class="form_im dsp_n">
							<input type="text" class="sms" value="Консультация 2">
						</div>
						<div class="form_im">
							<input type="tel" placeholder="8 (___) ___-__-__" class="form_txt phone fr_phone">
						</div>
						<div class="form_im">
							<div class="btn send"><?=t::w('submit your')?></div>
						</div>
					</div>
				</div>
			</div>
		<? endif ?>

	<!-- end body -->
	</div>
	
	<? if ($site_set['footer']): ?>
		<footer class="footer" id="contact">
			<div class="bl_c">
				<? if ($site_set['footer_c']): ?>
					<div class="foot_c">
						<div class="foot_i">
							<div class="foot_logo">
								<a href="/">
									<div class="logo_con lazy_bag" data-src="/assets/img/logo/logo.png"></div>
									<div class="logo_txt">Cамый лучший <br> санаторий в природе</div>
								</a>
							</div>
						</div>
						<div class="foot_i">
							<div class="bl1_sos">
								<a target="_blank" href="https://instagram.com/<?=@$site['instagram']?>"><div class="bl1_si"><i class="fab fa-instagram"></i></div></a>
								<a target="_blank" href="https://facebook.com/<?=@$site['facebook']?>"><div class="bl1_si"><i class="fab fa-facebook"></i></div></a>
								<a target="_blank" href="https://wa.me/<?=@$site['whatsapp']?>"><div class="bl1_si"><i class="fab fa-whatsapp"></i></div></a>
							</div>
						</div>
						<div class="foot_i">
							<div class="foot_n">
								<a href="tel:<?=$site['phone']?>"><?=$site['phone_view']?></a>
								<span><?=t::w('calc_al')?></span>
							</div>
						</div>
					</div>
				<? endif ?>
				<div class="footer_b">
					<div class="footer_bl">© <?=$site['name']?>, 2022</div>
					<div class="footer_br">
						<a href="https://gprog.kz" target="_blank" class="gprog_bl">
							<span>#gprog-та</span>
							<div class="gprog_heart"><i class="fas fa-heart"></i></div>
							<span>жасалған</span>
							<div class="gprog_ab">
								<div class="gprog_lg"><div class="lazy_img" data-src="https://gprog.kz/assets/img/logo/logo.png"></div></div>
								<div class="gprog_h">G prog</div>
								<div class="gprog_p">Шипажайға арнап сайт жасатыңыз</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</footer>
	<? endif ?>

	<!-- main js -->
	<script src="/assets/js/norm.js?v=<?=$ver?>"></script>
	<? foreach ($js as $i): ?> <script src="/assets/js/<?=$i?>.js?v=<?=$ver?>"></script> <? endforeach ?>

	<? if ($site['metrika'] != null): ?><noscript><div><img src='https://mc.yandex.ru/watch/<?=$site['metrika']?>' style='position:absolute; left:-9999px;'/></div></noscript><?php endif ?>
	<? if ($site['pixel'] != null): ?><noscript><img height='1' width='1' style='display:none' src='https://www.facebook.com/tr?id=<?=$site['pixel']?>&ev=PageView&noscript=1'/></noscript><?php endif ?>

</body>
</html>

	<? include 'modal.php'; ?>