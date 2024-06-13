<? 

    require 'db.php';
    require 'fun_a.php';
    require 't.php';
    // require "smsc_api.php";

    class core {
        public static $user_ph = false;
        public static $user_pm = false;
        public static $user_data = array();

        public function __construct() {
            new db; new fun; new t;
            session_start();
            date_default_timezone_set('Asia/Almaty');
            $this->authorize();
        }

        private function authorize() {
            $user_ph = false;
            $user_pc = false;
            // $user_pm = false;

            if (isset($_SESSION['uph']) && isset($_SESSION['upc'])) {
                $user_ph = $_SESSION['uph'];
                $user_pc = $_SESSION['upc'];
            } else if (isset($_COOKIE['uph']) && isset($_COOKIE['upc'])) {
                $user_ph = $_COOKIE['uph'];
                $user_pc = $_COOKIE['upc'];
            }
            if ($user_ph && $user_pc) {
                $user = db::query("SELECT * FROM user WHERE phone = '$user_ph'");
                if (mysqli_num_rows($user)) {
                    $user_data = mysqli_fetch_assoc($user);
                    if ($user_pc == '123456') {
                        self::$user_ph = $user_ph;
                        self::$user_data = $user_data;
                    } else $this->user_unset();
                } else $this->user_unset();
            }
        }
    
        public function user_unset() {
            self::$user_ph = false;
            self::$user_data = array();
            unset($_SESSION['uph']);
            unset($_SESSION['upc']);
            setcookie('uph', '', time(), '/');
            setcookie('upc', '', time(), '/');
        }
        
    }


    // data
    $core = new core;
    $user = core::$user_data;
    $user_id = @$user['id'];


    // lang
    $lang = 'kz';
    if (isset($_GET['lang'])) if ($_GET['lang'] == 'kz' || $_GET['lang'] == 'ru') $_SESSION['lang'] = $_GET['lang'];
    if (isset($_SESSION['lang'])) $lang = $_SESSION['lang'];


    // setting
    $ver = 1.191;
    $site = mysqli_fetch_array(db::query("select * from `site` where id = 1"));
    $site_set = [
        'header' => true,
        'menu'   => true,
        'footer' => true,
        'utopu' => true,
    ];
    $css = [];
    $js = [];
    $code = rand(1000, 9999);


    // date - time
    $date = date("Y-m-d", time());
    $time = date("H:m:s", time());
    $datetime = date('Y-m-d H:i:s', time());