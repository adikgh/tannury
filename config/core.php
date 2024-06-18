<? 

   require 'db.php';
   require 't.php';
   require 'fun.php';

   class core {
      public function __construct() {
         session_start();
         new db; new t; new fun;
      }
   }
   $core = new core;


   // lang
   $lang = 'ru';
   if (isset($_GET['lang'])) if ($_GET['lang'] == 'kz' || $_GET['lang'] == 'ru') $_SESSION['lang'] = $_GET['lang'];
   if (isset($_SESSION['lang'])) $lang = $_SESSION['lang'];

   $ver = 1.3134;
   $site = mysqli_fetch_array(db::query("select * from `site` where id = 1"));
   $site_set = [
      'header' => true,
      'menu' => true,
      'footer' => true,
      'footer_c' => true,
      // 'bl8' => true,
      // 'bl14' => true,
      // 'bl3' => true,
      // 'bl12' => true,
      // 'bl9' => true,
      // 'bl11' => true,
      'bl10' => true,
   ];
   $css = [];
   $js = [];

   // 
   $url = $_SERVER['REQUEST_URI'];
   $url = explode('?', $url);
   $url = $url[0];