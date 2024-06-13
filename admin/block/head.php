<? $menu = mysqli_fetch_array(db::query("select * from `site_menu` where name = '$menu_name'")); ?>

<meta charset="UTF-8">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0"/> -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title><?=@$menu['title_'.$lang]?> | <?=$site['name']?></title>
<meta name="description" content="<?=$menu['disc_'.$lang]?> <?=$site['phone_view']?>">
<meta name="keywords" content="<?=$menu['keyw_'.$lang]?>">
<meta name="theme-color" content="<?=@$site['color']?>">

<!-- icon -->
<link rel="icon" type="image/x-icon" href="/assets/img/logo/logo_bl.png" >
<link rel="shortcut icon" type="image/icon" href="/assets/img/logo/logo_bl.png">

<!-- Open Graph -->
<meta property="og:type" content="website" />
<meta property="og:url" content="https://<?=$site['site']?>.kz" />
<meta property="og:site_name" content="<?=$site['name']?>" />
<meta property="og:title" content="<?=$menu['title_'.$lang]?> | <?=$site['name']?>" />
<meta property="og:description" content="<?=$menu['disc_'.$lang]?> <?=$site['phone_view']?>" />
<meta property="og:image" content="/assets/img/logo/logo.jpg" />

<!-- apple -->
<meta name="application-name" lang="<?=$lang?>" content="<?=$site['site']?>">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

<!-- ms -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="cleartype" content="on">
<meta name="msapplication-tooltip" content="<?=$menu['title_'.$lang]?> | <?=$site['name']?>">
<meta name="msapplication-TileColor" content="<?=@$site['color']?>">
<meta name="msapplication-starturl" content="https://<?=$site['site']?>">


<!-- css -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&display=swap" />
<link rel="stylesheet" href="/assets/pl/fontawesome/css/all.min.css" />
<? if (@$site_set['plyr'] == true): ?> <link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css" /> <? endif ?>
<? if (@$site_set['swiper'] == true): ?> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.0.6/swiper-bundle.min.css" /> <? endif ?>

<!-- main css -->
<link rel="stylesheet" type="text/css" href="/assets/css/admin/anim.css?v=<?=$ver?>" />
<link rel="stylesheet" type="text/css" href="/assets/css/admin/norm.css?v=<?=$ver?>" />
<!-- <link rel="stylesheet" type="text/css" href="/assets/css/main.css?v=<?=$ver?>" /> -->
<? foreach ($css as $i): ?> <link rel="stylesheet" type="text/css" href="/assets/css/<?=$i?>.css?v=<?=$ver?>" /> <? endforeach ?>


<!-- js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<? if (@$site_set['plyr'] == true): ?> <script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script> <? endif ?>
<? if (@$site_set['swiper'] == true): ?> <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.0.6/swiper-bundle.min.js"></script> <? endif ?>
<? if (@$site_set['autosize'] == true): ?> <script src="/assets/pl/autosize.min.js"></script> <? endif ?>
<script src="/assets/js/admin/fun.js?v=<?=$ver?>"></script>