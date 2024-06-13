<? $menu = mysqli_fetch_array(db::query("select * from `site_menu` where name = '$menu_name' and type = 'main'")); ?>
<? if ($menu_name == 'sana') $menu['title_'.$lang] = t::w('sana').$sana['name'].t::w('sana1'); ?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?=@$menu['title_'.$lang]?> | <?=$site['name']?></title>
<meta name="description" content="<?=@$menu['disc_'.$lang]?> <?=$site['phone_view']?>">
<meta name="keywords" content="<?=@$menu['keyw_'.$lang]?>">
<meta name="theme-color" content="<?=@$site['color']?>">

<!-- icon -->
<link rel="icon" href="/assets/img/logo/icon2.png" type="image/x-icon">
<link rel="shortcut icon" type="image/icon" href="/assets/img/logo/icon2.png">

<!-- Open Graph -->
<meta property="og:type" content="website" />
<meta property="og:url" content="https://<?=$site['site']?>.kz" />
<meta property="og:site_name" content="<?=$site['name']?>" />
<meta property="og:title" content="<?=@$menu['title_'.$lang]?> | <?=$site['name']?>" />
<meta property="og:description" content="<?=@$menu['disc_'.$lang]?> <?=$site['phone_view']?>" />
<meta property="og:image" content="/assets/img/logo/logo.png" />

<!-- apple -->
<meta name="application-name" lang="<?=$lang?>" content="<?=$site['site']?>">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

<!-- ms -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="cleartype" content="on">
<meta name="msapplication-tooltip" content="<?=@$menu['title_'.$lang]?> | <?=$site['name']?>">
<meta name="msapplication-TileColor" content="<?=@$site['color']?>">
<meta name="msapplication-starturl" content="https://<?=$site['site']?>">

<!-- css -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,700;1,500&family=Oswald:wght@500;600;700&display=swap" >
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" >
<link rel="stylesheet" href="/assets/pl/fontawesome/css/all.min.css" />
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" /> -->
<? if (@$site_set['swiper'] != 'false'): ?> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.0.6/swiper-bundle.min.css" /> <? endif ?>
<? if (@$site_set['plyr']): ?> <link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css" /> <? endif ?>

<!-- main css -->
<link rel="stylesheet" type="text/css" href="/assets/css/norm.css?v=<?=$ver?>" />
<link rel="stylesheet" type="text/css" href="/assets/css/anim.css?v=<?=$ver?>" />
<link rel="stylesheet" type="text/css" href="/assets/css/main.css?v=<?=$ver?>" />
<? foreach ($css as $i): ?> <link rel="stylesheet" type="text/css" href="/assets/css/<?=$i?>.css?v=<?=$ver?>" /> <? endforeach ?>
<? if (@$site_set['plyr']): ?> <script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script> <? endif ?>


<!-- js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.9/jquery.inputmask.bundle.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="/assets/js/func.js?v=<?=$ver?>"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.6/prefixfree.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js"></script>
<? if (@$site_set['swiper'] != 'false'): ?> <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.0.6/swiper-bundle.min.js"></script> <? endif ?>

	
<? if ($site['metrika'] != null): ?>
	<!-- Yandex.Metrika counter -->
	<script type='text/javascript'>
		(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
		m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
		(window, document, 'script', 'https://mc.yandex.ru/metrika/tag.js', 'ym');
		ym(<?=$site['metrika']?>, 'init', {clickmap:true,trackLinks:true,accurateTrackBounce:true,webvisor:true});
	</script>
<? endif ?>

<? if ($site['pixel'] != null): ?>
	<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window, document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '<?=$site['pixel']?>');
	fbq('track', 'PageView');
	</script>
<? endif ?>

<? if ($site['tiktok_pixel'] != null): ?>
	<script>
		!function (w, d, t) {
		w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var i="https://analytics.tiktok.com/i18n/pixel/events.js";ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=i,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};var o=document.createElement("script");o.type="text/javascript",o.async=!0,o.src=i+"?sdkid="+e+"&lib="+t;var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(o,a)};
		ttq.load('<?=$site['tiktok_pixel']?>');
		ttq.page();
		}(window, document, 'ttq');
	</script>
<? endif ?>