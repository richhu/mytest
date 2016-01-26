<?php
//EditorTools全自动采集软件开源接口文件
//更多资源请访问软件官网：www.zzcity.net

@$vercode=''; //此处取值请自行修改
if(!empty($vercode)){
        if ($_POST['vercode']!=$vercode){
         echo("[err]invalid vercode[/err]");
         exit();
        }
}


ob_start();
if ( isset($_GET['import']) && !defined('WP_LOAD_IMPORTERS') )
    define('WP_LOAD_IMPORTERS', true);
require_once(dirname(dirname(__FILE__)) . '/wp-load.php');

ob_end_clean();
if ( get_option('db_version') != $wp_db_version ) {
 //wp_redirect(admin_url('upgrade.php?_wp_http_referer=' . urlencode(stripslashes($_SERVER['REQUEST_URI']))));
 echo('[err]db_version error[/err]');
 exit;
}


$post_title = $_REQUEST['post_title'];
 if (empty($post_title)){
 echo('[no]'); 
 exit; 
}

if ( !$datas = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE post_title = '$post_title'") ){
 echo('[no]'); 
 }
else{
 echo('[yes]'); 
 }
exit;

?>