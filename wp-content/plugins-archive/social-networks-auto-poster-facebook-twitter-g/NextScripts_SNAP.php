<?php
/*
Plugin Name: NextScripts: Social Networks Auto-Poster
Plugin URI: http://www.nextscripts.com/social-networks-auto-poster-for-wordpress
Description: This plugin automatically publishes posts from your blog to multiple accounts on Facebook, Twitter, and Google+ profiles and/or pages.
Author: NextScripts
Version: 3.6.10
Author URI: http://www.nextscripts.com
Text Domain: nxs_snap
Copyright 2012-2016  NextScripts, Inc
*/
define( 'NextScripts_SNAP_Version' , '3.6.10' ); 

$nxs_mLimit = ini_get('memory_limit'); if (strpos($nxs_mLimit, 'G')) {$nxs_mLimit = (int)$nxs_mLimit * 1024;} else {$nxs_mLimit = (int)$nxs_mLimit;}
  if ($nxs_mLimit>0 && $nxs_mLimit<64) { add_filter('plugin_action_links','ns_add_nomem_link', 10, 2 );
if (!function_exists("ns_add_nomem_link")) { function ns_add_nomem_link($links, $file) { global $nxs_mLimit; static $this_plugin; if (!$this_plugin) $this_plugin = plugin_basename(__FILE__);
  if ($file == $this_plugin){ $settings_link = '<b style="color:red;">Not Enough Memory allowed for PHP.</b> <br/> You have '.$nxs_mLimit.' MB. You need at least 64MB'; array_unshift($links, $settings_link);} return $links;}}
} else {    
require_once "nxs_functions.php"; require_once "inc/nxs-http.php"; require_once "inc/nxs_functions_adv.php"; require_once "inc/nxs_flt_class.php"; require_once "inc/nxs_snap_class.php";  require_once "inc/nxs_ntlist_class.php"; require_once "inc/nxs_oauth_class.php";
//## Include All Available Networks            
//error_reporting(E_ALL); ini_set('display_errors', '1');
global $nxs_snapAvNts, $nxs_snapThisPageUrl, $nxs_snapSetPgURL, $nxs_plurl, $nxs_plpath, $nxs_isWPMU, $nxs_tpWMPU, $nxs_skipSSLCheck; define( 'NXS_PLPATH', plugin_dir_path(__FILE__) );  define( 'NXS_PLURL', plugin_dir_url(__FILE__));  define( 'NXS_SETV', 350); 

$nxs_snapSetPgURL = nxs_get_admin_url().'options-general.php?page=NextScripts_SNAP.php'; $nxs_snapThisPageUrl = $nxs_snapSetPgURL; $nxs_plurl = plugin_dir_url(__FILE__); $nxs_plpath = plugin_dir_path(__FILE__); 
$nxs_isWPMU = defined('MULTISITE') && MULTISITE==true;  

do_action('nxs_doSomeMore');
if (!isset($nxs_snapAvNts) || !is_array($nxs_snapAvNts)) $nxs_snapAvNts = array(); $nxs_snapAPINts = array(); foreach (glob($nxs_plpath.'inc-cl/*.php') as $filename) require_once $filename; 
if (file_exists(WP_CONTENT_DIR.'/nx-apis/')) foreach (glob(WP_CONTENT_DIR.'/nx-apis/*.php') as $filename) require_once $filename; 
do_action('nxs_doSomeMoreSecond');
//## Init Class
if (class_exists("NS_SNAutoPoster")) { nxs_checkAddLogTable(); $plgn_NS_SNAutoPoster = new NS_SNAutoPoster(); new nxs_Filters;  }
//## Tests
if (isset($_GET['page']) && $_GET['page']=='NextScripts_SNAP.php' && isset($_GET['do']) && $_GET['do']=='test'){ 
  error_reporting(E_ALL); ini_set('error_reporting', E_ALL); ini_set('display_errors', 1); if (function_exists('gzdeflate')) echo "Y"; else echo "N";  echo "Testting... cURL<br/>";
  nxs_cURLTest("http://www.nextscripts.com/", "HTTPS to NXS", "Social Networks");
  nxs_cURLTest("http://www.google.com/intl/en/contact/", "HTTP to Google", "Mountain View, CA");
  nxs_cURLTest("https://www.google.com/intl/en/contact/", "HTTPS to Google", "Mountain View, CA");
  nxs_cURLTest("https://www.facebook.com/", "HTTPS to Facebook", 'id="facebook"');
  nxs_cURLTest("https://graph.facebook.com/", "HTTPS to API (Graph) Facebook", 'get');  
  nxs_cURLTest("https://www.linkedin.com/nhome/", "HTTPS to LinkedIn", 'rel="canonical" href="https://www.linkedin.com/');
  nxs_cURLTest("https://twitter.com/", "HTTPS to Twitter", '<link rel="canonical" href="https://twitter.com');
  nxs_cURLTest("https://www.pinterest.com/", "HTTPS to Pinterest", 'content="Pinterest"');
  nxs_cURLTest("http://www.livejournal.com/", "HTTP to LiveJournal", '1999 LiveJournal');  
  die('Done');
}
if (isset($_GET['page']) && $_GET['page']=='NextScripts_SNAP.php' && isset($_GET['do']) && $_GET['do']=='crtest'){ 
    if (isset($_GET['redo']) && $_GET['redo']=='1'){ delete_option("NXS_cronCheck");  ?><script type="text/javascript">window.location = "<?php echo $nxs_snapSetPgURL; ?>&do=crtest"</script><?php }    
    $cr = get_option('NXS_cronCheck'); if (!empty($cr) && is_array($cr)) { $checks = $cr['cronChecks']; $numChecks = count($checks); echo '<div style="font-family:\'Open Sans\',sans-serif;font-size: 15px;">';
      if ( ($cr['cronCheckStartTime']+900)>(time())) echo "<b>Cron Check is in Progress.....</b> will be finished in ".($cr['cronCheckStartTime']+900-time()).' seconds. Please <input type="button" value="Reload" onClick="location.reload()"> this page to see more results.... <br/><br/>'; else { echo "Cron Check Results:<br/>";
        echo '<span style="color:#761616">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;==== Cron was executed <b>'.$numChecks.'</b> times in 15 minutes ===</span>';
        if ($numChecks>15 || $numChecks<2) echo '<b style="color:#FF0000"><br/><br/>Your WP Cron is not healthy</b><br/><br/><span style="color:#761616">'.(($numChecks>15)?('WP Cron should NOT be executed more then once per minute.'):('WP Cron should be executed at least once in 5-10 minutes.')).'  Some functionality (like auto-reposting) will be disabled.</span><br/><br/><span style="color:#005858; font-weight:bold;">Why this is important?</span><br/><span style="color:#005858">Please see this post: <a href="http://www.nextscripts.com/blog/troubles-wp-cron-existing-posts-auto-reposter/" target="_blank">Troubles with WP Cron and existing posts auto-reposter</a></span><br/><br/><span style="color:#005858; font-weight:bold;">Solution</span><br/><span style="color:#005858">Please see the instructions for the correct WP Cron setup: <a href="http://www.nextscripts.com/tutorials/wp-cron-scheduling-tasks-in-wordpress/" target="_blank">WP-Cron: Scheduling Tasks in WordPress</a></span>'; else  echo '<b style="color:#0000FF"><br/><br/>Your WP Cron is OK</b>';
      }
     ?> <br/><br/><span style="color:#000058; font-weight:normal;">Technical Info:</span> <?php prr($cr);  ?>&nbsp;&nbsp;====&nbsp;<a href="<?php echo $nxs_snapThisPageUrl; ?>&do=crtest&redo=1">Re-do Cron Check</a> (it will take 15 minutes to complete)<?php
    } else echo 'Check is not started yet... Please <input type="button" value="Reload" onClick="location.reload()"> this page in couple minutes.';
     echo '</div>';
    die();
}

//## Initialize the admin panel if the plugin has been activated
if (!function_exists("nxs_AddSUASettings")) { function nxs_AddSUASettings() {  global $plgn_NS_SNAutoPoster, $nxs_plurl; // if (!isset($plgn_NS_SNAutoPoster)) return; $options = $plgn_NS_SNAutoPoster->nxs_options;       
  add_menu_page('Social Networks Auto Poster', 'Social Networks Auto Poster', 'manage_options', basename(__FILE__), array(&$plgn_NS_SNAutoPoster, 'showSNAP_WPMU_OptionsPage'), $nxs_plurl.'img/snap-icon12.png');  }}
//## Initialize the admin panel if the plugin has been activated
if (!function_exists("NS_SNAutoPoster_ap")) { function NS_SNAutoPoster_ap() { global $plgn_NS_SNAutoPoster, $nxs_plurl; // if (!isset($plgn_NS_SNAutoPoster)) return; $options = $plgn_NS_SNAutoPoster->nxs_options;       
   if (function_exists('add_options_page')) { add_options_page('Social Networks Auto Poster', 
     '<span style="font-weight:bold; color:#2ecc2e;">{SNAP} </span>Social Networks Auto Poster', 'manage_options', basename(__FILE__), array(&$plgn_NS_SNAutoPoster, 'showSNAutoPosterOptionsPage'));          
}}}
if (!function_exists("NS_SNAutoPoster_apx")) { function NS_SNAutoPoster_apx() { global $plgn_NS_SNAutoPoster, $nxs_plurl;  if (!isset($plgn_NS_SNAutoPoster)) return; $options = $plgn_NS_SNAutoPoster->nxs_options;       
   if (function_exists('add_options_page')) { add_options_page('Social Networks Auto Poster', 
     '<span style="font-weight:bold; color:#2ecc2e">{SNAP} </span>Social Networks Auto Poster ', 'manage_options', basename(__FILE__), array(&$plgn_NS_SNAutoPoster, 'showSNAutoPosterOptionsPagex'));     
}}}
//## Main Function to Post 
if (!function_exists("nxs_snapLogPublishTo")) { function nxs_snapLogPublishTo( $new_status, $old_status, $post ) { clean_post_cache( $post->ID );
  if ( $old_status!='publish' && $old_status!='trash' && $new_status == 'publish' ) { nxs_addToLogN('BG', "*** ID: {$post->ID}, Type: {$post->post_type}", '', ' Status Changed: '."{$old_status}_to_{$new_status}".'. Autopost requested.'); 
    nxs_snapPublishTo($post);
  }
}}
if (!function_exists("nxs_snapPublishTo")) { function nxs_snapPublishTo($postArr, $type='', $aj=false) {  global $plgn_NS_SNAutoPoster, $nxs_snapAvNts, $blog_id, $nxs_tpWMPU;  //  echo " | nxs_doSMAS2 | "; prr($postArr);
  if (!isset($plgn_NS_SNAutoPoster)) return; $options = $plgn_NS_SNAutoPoster->nxs_options; 
  if (!empty($_POST['nxs_snapPostOptions'])) { $NXS_POSTX = $_POST['nxs_snapPostOptions'];  $NXS_POST = array(); $NXS_POST = NXS_parseQueryStr($NXS_POSTX); } else $NXS_POST = $_POST;
  if(is_object($postArr)) $postID = $postArr->ID; else { $postID = $postArr; $postArr = get_post($postID);  } $isPost = isset($NXS_POST["snapEdIT"]);  $post = get_post($postID);   
  if ($post->post_status != 'publish') { sleep(5);  $post = get_post($postID); $postArr = $post;
    if ($post->post_status != 'publish') {  nxs_addToLogN('I', 'Cancelled', '', 'Autopost Cancelled - Post is not "Published" Right now - Post ID:('.$postID.') - Current Post status -'.$post->post_status ); return; }
  }  
   //## Apply Global Filters (At the time of publishing)
  $rMsg = nxs_snapCheckFilters($options, $postArr); if ($rMsg!==false) { nxs_LogIt('I', 'Skipped', '', '', 'Filter (Global) - Excluded - Post ID:('.$postID.')', $rMsg ); return; }
    
    if ($isPost && $options['skipSecurity']!='1' && !current_user_can("make_snap_posts") && !current_user_can("manage_options")) { nxs_addToLogN('I', 'Skipped', '', 'Current user can\'t autopost - Post ID:('.$postID.')' ); return; }
    $postUser = $postArr->post_author; 
    if ($options['skipSecurity']!='1' && !user_can( $postUser, "make_snap_posts" ) && !user_can( $postUser, "manage_options")){ nxs_addToLogN('I', 'Skipped', '', '', 'User ID '.$postUser.' can\'t autopost (please see <a target="_blank" href="http://www.nextscripts.com/support-faq/#a17">FAQ #1.7</a> for more info/solution)  - Post ID:('.$postID.')' ); return; } 
    if ($isPost) $plgn_NS_SNAutoPoster->NS_SNAP_SavePostMetaTags($postID); 
    if (function_exists('nxs_doSMAS2')) { nxs_doSMAS2($postArr, $type, $aj); return; } else {
    $options = $plgn_NS_SNAutoPoster->nxs_options;  $ltype=strtolower($type);
    if ($nxs_tpWMPU=='S') { switch_to_blog(1); $plgn_NS_SNAutoPoster = new NS_SNAutoPoster(); $options = $plgn_NS_SNAutoPoster->nxs_options; restore_current_blog(); }
    if (!isset($options['nxsHTDP']) || $options['nxsHTDP']=='S') { if(isset($NXS_POST["snapEdIT"]) && $NXS_POST["snapEdIT"]=='1') { $publtype='S'; $delay = rand(2,10); } else $publtype='A'; } else $publtype = 'I';
    
    if (!isset($options['nxsHTDP']) || $options['nxsHTDP']=='S') { 
      if (isset($NXS_POST["snapEdIT"]) && $NXS_POST["snapEdIT"]=='1') $publtype='S'; else $publtype='A'; 
      if (!$aj && $options['quLimit']=='1' && function_exists('nxs_addToPostingQuery')) { nxs_addToPostingQuery($postID); nxs_addToLog('I', 'Queried', '', 'Post ID:('.$postID.')' );  return; } 
    } else $publtype = 'I';  
    
    
    nxs_addToLogN('BG', 'Start =- ', '', '------=========#### NEW AUTO-POST REQUEST '.($blog_id>1?'BlogID:'.$blog_id:'').' PostID:('.$postID.') '.($publtype=='S'?'Scheduled +'.$delay:($publtype=='A'?'Automated':'Immediate')).' ####=========------');
  
    $snap_isAutoPosted = get_post_meta($postID, 'snap_isAutoPosted', true); if ($snap_isAutoPosted=='1') { nxs_addToLogN('W', 'Skipped', '', 'Already Autoposted - Post ID:('.$postID.')' ); return; }  
    
    foreach ($nxs_snapAvNts as $avNt) { 
      if (isset($options[$avNt['lcode']]) && count($options[$avNt['lcode']])>0 ){ $clName = 'nxs_snapClass'.$avNt['code']; 
        if ($isPost && isset($NXS_POST[$avNt['lcode']])) $po = $NXS_POST[$avNt['lcode']]; else { $po =  get_post_meta($postID, 'snap'.$avNt['code'], true); $po =  maybe_unserialize($po);}       
        if (isset($po) && is_array($po)) $isPostMeta = true; else { $isPostMeta = false; $po = $options[$avNt['lcode']]; }
        delete_post_meta($postID, 'snap_isAutoPosted'); add_post_meta($postID, 'snap_isAutoPosted', '1');
        $optMt = $options[$avNt['lcode']][0]; if ($isPostMeta) { $ntClInst = new $clName(); $optMt = $ntClInst->adjMetaOpt($optMt, $po[0]); }        
        
        
               
        if (!isset($optMt['do'])) $optMt['do'] = $optMt['do'.$avNt['code']]; // prr($avNt['code']); prr($optMt['do']); 
          //## Filters
          //prr($optMt);
          if (!empty($optMt['catSel']) || !empty($optMt['tagsSel'])) { $optMt =  nxs_FltrsV3toV4($optMt); if ($optMt['do']=='1') $optMt['do']='2'; }
          if ($optMt['do']=='2') { unset($optMt['catSel']); unset($optMt['tagsSel']); $postObj = get_post($postID); $rMsg = nxs_snapCheckFilters($optMt, $postObj); 
            if ($rMsg!==false) { nxs_LogIt('GR', 'Skipped: Filter - Network', $avNt['name'].' ('.$optMt['nName'].')', $avNt['code'], 'Excluded - Post ID:('.$postID.')', $rMsg); continue; } else { $optMt['do'] = 1; $optMt['do'.$avNt['code']] = 1; }
          }                    
        if (!isset($optMt['do'])) $optMt['do'] = $optMt['do'.$avNt['code']];  
        
        if ($optMt['do']=='1') { $optMt['ii'] = 0;  if (!isset($optMt['nDays'])) $optMt['nDays'] = 0; if (!isset($optMt['nHrs'])) $optMt['nHrs'] = 0; if (!isset($optMt['nMin'])) $optMt['nMin'] = 0;
            if ($publtype=='A' && (!empty($optMt['nMin']) || !empty($optMt['nHrs']) || !empty($optMt['nTime']))) $publtype='S';        
            if ($publtype=='S') { if ( !empty($optMt['timeToRun']) && $optMt['timeToRun']<$curTime && ((int)$optMt['nDays']>0 || (int)$optMt['nHrs']>0 || (int)$optMt['nMin']>0) ) {
                $delay = $delay+(int)$optMt['nDays']*86400+(int)$optMt['nHrs']*3600+(int)$optMt['nMin']*60;
                nxs_LogIt('I','Delayed',$avNt['name'].' ('.$optMt['nName'].')',$avNt['code'],'Post has been delayed for '.$delay.' Seconds ('.($optMt['nDays']>0?$optMt['nDays'].' Days':'')." ".($optMt['nHrs']>0?$optMt['nHrs'].' Hours':'')." ".($optMt['nMin']>0?$optMt['nMin'].' Minutes':'').')' );
              } else $delay = rand(2,10); $optMt['timeToRun'] = time()+$delay; 
              if ($options['ver']>300.330) { $shName = '_nxs_snap_sh_'.$avNt['code'].'0_'.$optMt['timeToRun']; delete_post_meta($postID, $shName); add_post_meta($postID, $shName, $optMt); $args = array($postID, $shName); }
                else $args = array($postID, $optMt);  
              wp_schedule_single_event($optMt['timeToRun'],'ns_doPublishTo'.$avNt['code'], $args); 
              nxs_LogIt('BI', 'Scheduled', $avNt['name'].' ('.$optMt['nName'].')', $avNt['code'], ' for '.$optMt['timeToRun']."(".date_i18n('Y-m-d H:i:s', $optMt['timeToRun'] + ( get_option( 'gmt_offset' ) * HOUR_IN_SECONDS )).")", ' PostID:('.$postID.')' );
            } else { $fname = 'nxs_doPublishTo'.$avNt['code']; $fname($postID, $optMt); }
        } else { nxs_LogIt('GR', 'Skipped: Checkbox', $avNt['name'].' ('.$optMt['nName'].')', $avNt['code'], '-=[Unchecked Account]=- - PostID:'.$postID.'' ); }
      }                   
    } }
   global $isS; if ($isS && function_exists("restore_current_blog")) restore_current_blog(); 
}} 

//## Add settings link to plugins list
if (!function_exists("ns_add_settings_link")) { function ns_add_settings_link($links, $file) {
    static $this_plugin;
    if (!$this_plugin) $this_plugin = plugin_basename(__FILE__);
    if ($file == $this_plugin){
        $settings_link = '<a href="options-general.php?page=NextScripts_SNAP.php">'.__("Settings", "default").'</a>';
        array_unshift($links, $settings_link);
    }
    return $links;
}}
//## Actions and filters    
if (!function_exists("nxs_adminInitFunc")) { function nxs_adminInitFunc(){ global $plgn_NS_SNAutoPoster, $nxs_snapThisPageUrl, $pagenow, $nxs_isWPMU; 
  $nxs_snapThisPageUrl = nxs_get_admin_url().($pagenow=='admin.php'?'network/':'').$pagenow.'?page=NextScripts_SNAP.php'; 
  if (function_exists('nxs_getInitUCheck') && (isset($plgn_NS_SNAutoPoster))) { $options = $plgn_NS_SNAutoPoster->nxs_options; if (is_array($options) && count($options)>1) nxs_getInitUCheck($options);  } 
  //## Javascript to Admin Panel        
  if (( ($pagenow=='options-general.php'||$pagenow=='admin.php') && isset($_GET['page']) && ( $_GET['page']=='NextScripts_SNAP.php' || stripos($_GET['page'], 'nxssnap')==0)) ||$pagenow=='post.php'||$pagenow=='post-new.php'){
     add_filter( 'tiny_mce_before_init', 'nxs_tiny_mce_before_init' ); add_action('admin_head', 'jsPostToSNAP'); add_action('admin_head', 'nxs_jsPostToSNAP2'); 
  }
  if (function_exists('nxsDoLic_ajax')) { add_action('wp_ajax_nxsDoLic', 'nxsDoLic_ajax');  } 
}}
if (!function_exists("nxs_adminInitFunc2")) { function nxs_adminInitFunc2(){ global $plgn_NS_SNAutoPoster, $nxs_snapThisPageUrl, $pagenow;   $nxs_snapThisPageUrl = nxs_get_admin_url().($pagenow=='admin.php'?'network/':'').$pagenow.'?page=NextScripts_SNAP.php';  //## Add MEtaBox to Post Edit Page
  if (current_user_can("see_snap_box") || current_user_can("manage_options")) { add_action('add_meta_boxes', array($plgn_NS_SNAutoPoster, 'NS_SNAP_addCustomBoxes'));        
    if (!($pagenow=='options-general.php' && !empty($_GET['page']) && $_GET['page']=='NextScripts_SNAP.php')) add_action( 'admin_bar_menu', 'nxs_toolbar_link_to_mypage', 999 );
  }
}}

function nxs_saveSiteSets_ajax(){ check_ajax_referer('nxssnap'); 
   if ($_POST['sid']=='A'){  global $wpdb; $allBlogs = $wpdb->get_results("SELECT blog_id FROM wp_blogs where blog_id > 1");
     foreach( $allBlogs as $aBlog ) { switch_to_blog($aBlog->blog_id); 
       $options =  get_option('NS_SNAutoPoster'); $options['suaMode'] = $_POST['sset']; update_option('NS_SNAutoPoster', $options);
     }       
   } else { switch_to_blog($_POST['sid']); 
     $options = get_option('NS_SNAutoPoster'); $options['suaMode'] = $_POST['sset']; if( is_super_admin() && $_POST['sid']=='1' && $options['suaMode']!='O') $options['suaMode'] = 'O'; update_option('NS_SNAutoPoster', $options); 
   }
   echo "OK"; die();
}

//## OG:Tags
function nxs_start_ob(){ if (!is_admin()) ob_start( 'nxs_ogtgCallback' );}
function nxs_end_flush_ob(){ if (!is_admin()) @ob_end_flush();}
function nxs_ogtgCallback($content){ global $post, $plgn_NS_SNAutoPoster;  
  if (stripos($content, 'og:title')!==false) $ogOut = "\r\n"; else {
    if (!isset($plgn_NS_SNAutoPoster)) $options = get_option('NS_SNAutoPoster'); else $options = $plgn_NS_SNAutoPoster->nxs_options;    $ogimgs = array();  
    if (!empty($post) && !is_object($post) && int($post)>0) $post = get_post($post); if (empty($options['advFindOGImg'])) $options['advFindOGImg'] = 0;       
    $title = preg_match( '/<title>(.*)<\/title>/', $content, $title_matches );  
    if ($title !== false && count( $title_matches) == 2 ) $ogT ='<meta property="og:title" content="' . $title_matches[1] . '" />'."\r\n"; else {
      if (is_home() || is_front_page() )  $ogT = get_bloginfo( 'name' ); else $ogT = get_the_title();
      $ogT =  '<meta property="og:title" content="' . esc_attr( apply_filters( 'nxsog_title', $ogT ) ) . '" />'."\r\n";          
    }    
    $prcRes = preg_match( '/<meta name="description" content="(.*)"/', $content, $description_matches );    
    if ( $prcRes !== false && count( $description_matches ) == 2 ) $ogD = '<meta property="og:description" content="' . $description_matches[1] . '" />'."\r\n"; {
      if (!empty($post) && is_object($post) && is_singular()) {
        if(has_excerpt($post->ID))$ogD=strip_tags(nxs_snapCleanHTML($post->post_excerpt));else $ogD= str_replace("  ", ' ', str_replace("\r\n", ' ', trim(substr(strip_tags(nxs_snapCleanHTML(strip_shortcodes($post->post_content))), 0, 200))));        
      } else $ogD = get_bloginfo('description');  $ogD = preg_replace('/\r\n|\r|\n/m','',$ogD); 
      $ogD = '<meta property="og:description" content="'.esc_attr( apply_filters( 'nxsog_desc', $ogD ) ).'" />'."\r\n";          
    }    
    $ogSN = '<meta property="og:site_name" content="'.get_bloginfo('name').'" />'."\r\n";
    $ogLoc = strtolower(esc_attr(get_locale())); if (strlen($ogLoc)==2) $ogLoc .= "_".strtoupper($ogLoc);
    $ogLoc = '<meta property="og:locale" content="'.$ogLoc.'" />'."\r\n"; $iss = is_home();  
    $ogType = is_singular()?'article':'website'; if(empty($vidsFromPost)) $ogType = '<meta property="og:type" content="'.esc_attr(apply_filters('nxsog_type', $ogType)).'" />'."\r\n";                  
        
    if (is_home() || is_front_page()) $ogUrl = get_bloginfo( 'url' ); else $ogUrl = 'http' . (is_ssl() ? 's' : '') . "://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $ogUrl = '<meta property="og:url" content="'.esc_url( apply_filters( 'nxsog_url', $ogUrl ) ) . '" />' . "\r\n";
  
    if (!is_home()) { /*
      $vidsFromPost = nsFindVidsInPost($post); if ($vidsFromPost !== false && is_singular()) {  echo '<meta property="og:video" content="http://www.youtube.com/v/'.$vidsFromPost[0].'" />'."\n";  
      echo '<meta property="og:video:type" content="application/x-shockwave-flash" />'."\n";
      echo '<meta property="og:video:width" content="480" />'."\n";
      echo '<meta property="og:video:height" content="360" />'."\n";
      echo '<meta property="og:image" content="http://i2.ytimg.com/vi/'.$vidsFromPost[0].'/mqdefault.jpg" />'."\n";
      echo '<meta property="og:type" content="video" />'."\n"; 
    } */    
      if (is_object($post)) { $imgURL = nxs_getPostImage($post->ID, 'full', $options['ogImgDef']); if (!empty($imgURL)) $ogimgs[] = $imgURL;
        $imgsFromPost = nsFindImgsInPost($post, (int)$options['advFindOGImg']==1);           
        if ($imgsFromPost !== false && is_singular() && is_array($ogimgs) && is_array($imgsFromPost))  $ogimgs = array_merge($ogimgs, $imgsFromPost);       
      }
    }       
    //## Add default image to the endof the array
    if ( count($ogimgs)<1 && isset($options['ogImgDef']) && $options['ogImgDef']!='') $ogimgs[] = $options['ogImgDef']; 
    //## Output og:image tags
    $ogImgsOut = ''; if (!empty($ogimgs) && is_array($ogimgs)) foreach ($ogimgs as $ogimage)  $ogImgsOut .= '<meta property="og:image" content="'.esc_url(apply_filters('ns_ogimage', $ogimage)).'" />'."\r\n"; 
    $ogOut  = "\r\n".$ogSN.$ogT.$ogD.$ogType.$ogUrl.$ogLoc.$ogImgsOut;
  } $content = str_ireplace('<!-- ## NXSOGTAGS ## -->', $ogOut, $content); 
  return $content;
}
function nxs_addOGTagsPreHolder() { echo "<!-- ## NXS/OG ## --><!-- ## NXSOGTAGS ## --><!-- ## NXS/OG ## -->\n\r";}

if (!function_exists("nxssnap_enqueue_scripts")) { function nxssnap_enqueue_scripts(){ if (function_exists('get_current_screen')) $screen = get_current_screen(); else return; // prr($screen->id);   // prr($screen);      
  if( $screen->id == 'settings_page_NextScripts_SNAP' || $screen->id=='toplevel_page_NextScripts_SNAP-network' || $screen->base == 'post' || $screen->id =='toplevel_page_NextScripts_SNAP-network') {
      wp_enqueue_script( 'nxssnap-scripts', plugin_dir_url( __FILE__ ) . 'js/js.js', array( 'jquery' ),  NextScripts_SNAP_Version);
      wp_enqueue_style( 'nxssnap-style',  plugin_dir_url( __FILE__ ) . 'js/snap.css', array(),  NextScripts_SNAP_Version );
      
      wp_enqueue_script( 'selectize', plugin_dir_url( __FILE__ ) . 'js/selectize.min.js', array( 'jquery' ),  NextScripts_SNAP_Version);
      wp_enqueue_style( 'selectize',  plugin_dir_url( __FILE__ ) . 'js/selectize.css', array( ),  NextScripts_SNAP_Version );
      
      wp_enqueue_script( 'tokenize', plugin_dir_url( __FILE__ ) . 'js/jquery.tokenize.js', array( 'jquery' ),  NextScripts_SNAP_Version);
      wp_enqueue_style( 'tokenize',  plugin_dir_url( __FILE__ ) . 'js/jquery.tokenize.css', array( ),  NextScripts_SNAP_Version );
      
      if( $screen->id == 'settings_page_NextScripts_SNAP' ||  $screen->id=='toplevel_page_NextScripts_SNAP-network' ) {  wp_enqueue_script( 'jquery-ui-datepicker' );            
        wp_enqueue_style( 'jquery-ui-datepicker',  plugin_dir_url( __FILE__ ) . 'js/jquery-ui.css', array( ),  NextScripts_SNAP_Version );
      }      
      wp_localize_script( 'nxssnap-scripts', 'MyAjax', array( 'ajaxurl' => nxs_get_admin_url( 'admin-ajax.php' ), 'nxsnapWPnonce' => wp_create_nonce( 'nxsnapWPnonce' ),));
      
  }  
}} 

function nxs_noR(&$item, &$key){ $item = is_string($item)?(str_replace("\r","\n",str_replace("\n\r","\n",str_replace("\r\n","\n",$item)))):$item; }

if (!function_exists("nxs_getExpSettings_ajax")) { function nxs_getExpSettings_ajax() { /* check_ajax_referer('nsDN'); */  $filename = preg_replace('/[^a-z0-9\-\_\.]/i','',$_POST['filename']);
 header("Cache-Control: "); header("Content-type: text/plain"); header('Content-Disposition: attachment; filename="'.$filename.'"');
 global $plgn_NS_SNAutoPoster;  if (!isset($plgn_NS_SNAutoPoster)) return; $options = $plgn_NS_SNAutoPoster->nxs_options; 
 //array_walk_recursive($options, 'nxs_addslashes');
 array_walk_recursive($options,"nxs_noR");  $ser = serialize($options); echo $ser;  die();
}}

function cron_add_nxsreposter( $schedules ) { $schedules['nxsreposter'] = array( 'interval' => 90, 'display' => __( 'NXS Reposter' )); return $schedules;} // Do this every 90 seconds

function nxs_showNewPostForm($options, $air = true) { global $nxs_snapAvNts, $nxs_plurl; ?> 
  <div id="nxsNewSNPost" style="width: 880px;">
  
    <div><h2>New Post to the Configured Social Networks</h2></div>
    <div class="nxsNPRow"><label class="nxsNPLabel">Title (Will be used where possible):</label><br/><input id="nxsNPTitle" type="text" size="80"></div>
    <div class="nxsNPRow"><label class="nxsNPLabel">Message:</label><br/><textarea id="nxsNPText" name="textarea" cols="90" rows="8"></textarea></div>
    
    <div class="nxsNPRow"><label class="nxsNPLabel">Post Type:</label><br/><input type="radio" name="nxsNPType"  id="nxsNPTypeT" value="T" checked="checked" /><label class="nxsNPRowSm">Text Post</label><br/>
    
    <br/><input type="radio" name="nxsNPType"  id="nxsNPTypeL" value="A"><label class="nxsNPRowSm">Link Post</label>
      <div class="nxsNPRowSm"><label class="nxsNPLabel">URL (Will be attached where possible, text post will be made where not):</label><br/><input id="nxsNPLink" onfocus="jQuery('#nxsNPTypeL').attr('checked', 'checked')" type="text" size="80" /></div>
    <br/><input type="radio" name="nxsNPType" id="nxsNPTypeI" value="I"><label class="nxsNPRowSm">Image Post</label>
      <div class="nxsNPRowSm"><label class="nxsNPLabel">Image URL (Will be used where possible, text post will be made where not):</label><br/><input id="nxsNPImg" onfocus="jQuery('#nxsNPTypeI').attr('checked', 'checked')" type="text" size="80" /></div>
    </div>
    <div class="nxsNPRow">
      <div class="nxsNPLeft" style="display: inline-block;">
      
      <div id="nxsNPLoaderPost" style="display: none";> <img  src="<?php echo $nxs_plurl; ?>img/ajax-loader-med.gif" /> Posting...., it could take some time...  </div>
      
      <div class="submitX"><input style="font-weight: bold; width: 70px;" type="button" onclick="nxs_doNP();" value="Post">
      <?php if ($air) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<input id="nxsNPCloseBt" style="width: 70px;" class="bClose" type="button" value="Cancel"> <?php } ?>
      </div> 
      
      <div id="nxsNPResult">&nbsp;</div>
      </div>
      <div class="nxsNPRight">
     
    <div class="nxsNPRow">
    <div style="float: right; font-size: 12px;" >
      <a href="#" onclick="jQuery('.nxsNPDoChb').attr('checked','checked'); return false;"><?php  _e('Check All', 'social-networks-auto-poster-facebook-twitter-g'); ?></a>&nbsp;<a href="#" onclick="jQuery('.nxsNPDoChb').removeAttr('checked'); return false;"><?php _e('Uncheck All', 'social-networks-auto-poster-facebook-twitter-g'); ?></a>
    </div>
    <label class="nxsNPLabel">Networks:</label><br/> 
    <div class="nxsNPRow" style="font-size: 12px;">
    <?php 
      foreach ($nxs_snapAvNts as $avNt) { $clName = 'nxs_snapClass'.$avNt['code']; $ntClInst = new $clName();
        if ( isset($options[$avNt['lcode']]) && count($options[$avNt['lcode']])>0) { ?>               
          <div class="nsx_iconedTitle" style="margin-bottom:1px;background-image:url(<?php echo $nxs_plurl;?>img/<?php echo $avNt['lcode']; ?>16.png);"><?php echo $avNt['name']; ?><br/>
              <?php $ntOpts = $options[$avNt['lcode']]; foreach ($ntOpts as $indx=>$pbo){ if (empty($pbo['do'])) $pbo['do'] = $pbo['do'.$avNt['code']];  ?>
              <input class="nxsNPDoChb" value="<?php echo $avNt['lcode']; ?>--<?php echo $indx; ?>" name="nxsNPNts" type="checkbox" <?php if ((int)$pbo['do'] > 0) echo "checked"; ?> />                       
              <?php echo $avNt['name']; ?> <i style="color: #005800;"><?php if($pbo['nName']!='') echo "(".$pbo['nName'].")"; ?></i></br>              
            <?php } ?>
          </div>  <?php  
        } } ?> 
      </div>   
  </div>   
  </div>
  </div> 
  </div> 
  
  <?php    
}
function nxs_doNewNPPost($options){ global $nxs_snapAvNts, $nxs_plurl; $postResults = '';
    if (!empty($_POST['mNts']) && is_array($_POST['mNts'])) { nxs_addToLogN('S', '-=== New Form Post requested ===-', 'Form', count($_POST['mNts']).' Networks', print_r($_POST['mNts'], true));
      $message = array('title'=>'', 'text'=>'', 'siteName'=>'', 'url'=>'', 'imageURL'=>'', 'videoURL'=>'', 'tags'=>'', 'urlDescr'=>'', 'urlTitle'=>'');  
      if (!empty($_POST['nxs_mqTest']) && (get_magic_quotes_gpc() || $_POST['nxs_mqTest']=="\'")) { $_POST['mText'] = stripslashes($_POST['mText']); $_POST['mTitle'] = stripslashes($_POST['mTitle']); }      
      //## Get URL info
      if (!empty($_POST['mLink']) && substr($_POST['mLink'], 0, 4)=='http') { $message['url'] = $_POST['mLink'];            
        $flds = array('id'=>$message['url'], 'scrape'=>'true');      $response =  nxs_remote_post('https://graph.facebook.com/v2.3/', array('body' => $flds)); 
        if (is_nxs_error($response)) $badOut['Error'] = print_r($response, true)." - ERROR"; else { $response = json_decode($response['body'], true);  
          if (!empty($response['description'])) $message['urlDescr'] = $response['description'];  if (!empty($response['title'])) $message['urlTitle'] =  $response['title'];
          if (!empty($response['site_name'])) $message['siteName'] = $response['site_name'];
          if (!empty($response['image'][0]['url'])) $message['imageURL'] = $response['image'][0]['url'];
        }
      }
      if (!empty($_POST['mImg']) && substr($_POST['mImg'], 0, 4)=='http') $message['imageURL'] = $_POST['mImg']; 
          
      foreach ($_POST['mNts'] as $ntC){ $ntA = explode('--',$ntC); $ntOpts = $options[$ntA[0]][$ntA[1]]; 
        if (!empty($ntOpts) && is_array($ntOpts)) { $logNT = $ntA[0];  $clName = 'nxs_class_SNAP_'.strtoupper($logNT); $message['pText'] = nxs_doSpin($_POST['mText']); $message['pTitle'] = nxs_doSpin($_POST['mTitle']);               
          $logNT = '<span style="color:#800000">'.strtoupper($logNT).'</span> - '.$ntOpts['nName'];      
          $ntOpts['postType'] = $_POST['mType']; $ntToPost = new $clName(); $ret = $ntToPost->doPostToNT($ntOpts, $message);      
          if (!is_array($ret) || empty($ret['isPosted']) || $ret['isPosted']!='1') { //## Error 
             nxs_addToLogN('E', 'Error', $logNT, '-=ERROR=- '.print_r($ret, true), ''); $postResults .= $logNT ." - Error (Please see log)<br/>";
          } else {  // ## All Good - log it.            
             if (!empty($ret['postURL'])) $extInfo = '<a href="'.$ret['postURL'].'" target="_blank">Post Link</a>'; 
             nxs_addToLogN('S', 'Posted', $logNT, 'OK - Message Posted ', $extInfo); $postResults .= $logNT ." - OK - ".$extInfo."<br/>"; 
          }
        }
    } echo "Done. Results:<br/> ".$postResults; }
}

function nxs_admin_footer() {global $nxs_plurl; ?> <div style="display: none;" id="nxs_popupDiv"><span class="nxspButton bClose"><span>X</span></span> 
   <div id="nxsNPLoader" style="text-align: center; width: 100%; height: 80px; padding-top: 60px;";> <img  src="<?php echo $nxs_plurl; ?>img/ajax-loader-med.gif" /> </div> 
   <div id="nxs_popupDivCont" style="right: 10px; top:10px; font-size: 16px; font-weight: lighter;"> </div></div> <?php 
}
function nxs_admin_header() { wp_nonce_field( 'nxsSsPageWPN', 'nxsSsPageWPN_wpnonce' ); }
function nxs_popupCSS() {?><style type="text/css">
  .nxspButton:hover { background-color: #1E1E1E;}
  .nxspButton { background-color: #2B91AF; color: #FFFFFF; cursor: pointer; display: inline-block; text-align: center; text-decoration: none; border-radius: 6px 6px 6px 6px; box-shadow: none; font: bold 131% sans-serif; padding: 0 6px 2px; position: absolute; right: -7px; top: -7px;}
  #nxs_spPopup, #nxs_popupDiv, #showLicForm{ min-height: 250px; z-index:999991; background-color: #FFFFFF; border-radius: 5px 5px 5px 5px;  box-shadow: 0 0 3px 2px #999999; color: #111111; display: none;  min-width: 850px; padding: 25px;}
  #nxsNewSNPost .nxsNPLabel {position: relative;}
  #nxsNewSNPost .nxsNPRow {position: relative; padding: 8px;}
  #nxsNewSNPost input {position: relative; font-size: 16px;}
  .nsx_iconedTitle {font-size: 17px; font-weight: bold; margin-bottom: 15px; padding-left: 20px; background-repeat: no-repeat; }
  .nxsNPRowSm, .nxsNPRow .nsx_iconedTitle {font-size: 12px; }
  .nxsNPLeft, .nxsNPRight {position: relative; float: left;}
  .nxsNPLeft {width: 40%;} .nxsNPRight {width: 60%;}
  
  
</style><?php
}

add_action('admin_head', 'nxs_popupCSS');
add_action('in_admin_footer', 'nxs_admin_footer');
add_action('in_admin_header', 'nxs_admin_header');
 
//## Actions and filters    
//add_action( 'transition_post_status', 'nxs_snapLogPublishTo', 10, 3 );

add_filter('cron_schedules', 'cron_add_nxsreposter');  
add_action('nxs_hourly_event', 'nxs_do_this_hourly'); //## Adds Hourly Event  
add_action('nxs_querypost_event', 'nxs_do_post_from_query'); //## Query and Re-Poster  
add_action('wp', 'nxs_activation'); 
add_action('shutdown', 'nxs_psCron', 25); 

add_filter('get_avatar','ns_get_avatar', 10, 5 );
  
if (isset($plgn_NS_SNAutoPoster)) { //## Actions
  //## Add the admin menu    
  if ($nxs_skipSSLCheck===true){ add_filter('https_ssl_verify', '__return_false'); add_filter('https_local_ssl_verify', '__return_false'); }  
  if ($nxs_isWPMU) { add_action('network_admin_menu', 'nxs_AddSUASettings'); global $blog_id; } $suOptions = array(); 
  $suOptions = $plgn_NS_SNAutoPoster->nxs_options; if ($nxs_isWPMU) { $ntOptions = $plgn_NS_SNAutoPoster->nxs_ntoptions; if (!isset($suOptions['suaMode'])) $suOptions['suaMode'] = ''; }  
  $isPMB = $nxs_isWPMU && function_exists('nxs_doSMAS1') && $blog_id==1;
  $isO = !$nxs_isWPMU || ($nxs_isWPMU && ($suOptions['isMU']||$suOptions['isMUx']) && ($suOptions['suaMode']=='O' || ($suOptions['suaMode']=='' && $ntOptions['nxsSUType']=='O')));
  $isS = !$nxs_isWPMU || ($nxs_isWPMU && ($suOptions['isMU']||$suOptions['isMUx']) && ($suOptions['suaMode']=='S' || ($suOptions['suaMode']=='' && $ntOptions['nxsSUType']=='S')));
  if ($nxs_isWPMU) { if ($isO) $nxs_tpWMPU = 'O'; elseif ($isS) $nxs_tpWMPU = 'S';} // prr($nxs_tpWMPU); prr($suOptions);
  
  if (function_exists('nxs_doSMAS3')) nxs_doSMAS3($isS, $isO);
  if (!$isO && !$isS && !$isPMB && !function_exists('showSNAP_WPMU_OptionsPageExt')) add_action('admin_menu', 'NS_SNAutoPoster_apx');    

  add_action('admin_init', 'nxs_adminInitFunc');  
  add_action( 'admin_enqueue_scripts', 'nxssnap_enqueue_scripts' ); 
  
  add_action('wp_ajax_nxs_snap_aj', 'nxs_snapAjax');
  
  add_action('wp_ajax_nxs_clLgo', 'nxs_clLgo_ajax');
  add_action('wp_ajax_nxs_rfLgo', 'nxs_rfLgo_ajax');
  add_action('wp_ajax_nxs_prxTest', 'nxs_prxTest_ajax');
  add_action('wp_ajax_nxs_prxGet', 'nxs_prxGet_ajax');
  add_action('wp_ajax_nxs_getExpSettings', 'nxs_getExpSettings_ajax');
  add_action('wp_ajax_nxs_hideTip', 'nxs_hideTip_ajax');
  
  add_action( 'http_api_curl','nxs_altCurlProxy', 15, 2); 
  
  if (!empty($suOptions['yo'])) {
    //##Show
    add_action( 'show_user_profile', 'nxs_show_yo_profile_fields' );
    add_action( 'edit_user_profile', 'nxs_show_yo_profile_fields' );
    //##Edit/Save
    add_action( 'personal_options_update', 'nxs_save_yo_profile_fields' );
    add_action( 'edit_user_profile_update', 'nxs_save_yo_profile_fields' );
  }
                       
  if ($isO || $isS) {    
    add_action( 'transition_post_status', 'nxs_snapLogPublishTo', 10, 3 );
  
    foreach ($nxs_snapAvNts as $avNt) { add_action('ns_doPublishTo'.$avNt['code'], 'nxs_doPublishTo'.$avNt['code'], 1, 2); }
    foreach ($nxs_snapAvNts as $avNt) { add_action('wp_ajax_rePostTo'.$avNt['code'], 'nxs_rePostTo'.$avNt['code'].'_ajax'); }
    
    //## Add AJAX Calls for Test and Repost    
    
    add_action('wp_ajax_nxs_getBrdsOrCats' , 'nxs_getBrdsOrCats_ajax');
    add_action('wp_ajax_getBoards' , 'nsGetBoards_ajax');
    add_action('wp_ajax_getGPCats' , 'nsGetGPCats_ajax');
    add_action('wp_ajax_getWLBoards' , 'nsGetWLBoards_ajax');
    add_action('wp_ajax_SetRpstAll' , 'nxs_SetRpstAll_ajax');
    add_action('wp_ajax_nxs_delPostSettings' , 'nxs_delPostSettings_ajax');    
    add_action('wp_ajax_nsDN', 'ns_delNT_ajax');    
  }
  
 
  if ($isO) {    
    add_action('admin_menu', 'NS_SNAutoPoster_ap');    
    add_action('admin_init', 'nxs_adminInitFunc2');        
    //## Initialize options on plugin activation
    $myrelpath = preg_replace( '/.*wp-content.plugins./', '', __FILE__ ); 
    add_action("activate_".$myrelpath,  array(&$plgn_NS_SNAutoPoster, 'init'));    
    
    //## Add/Change meta on Save
    add_action('edit_post', array($plgn_NS_SNAutoPoster, 'NS_SNAP_SavePostMetaTags'));
    add_action('publish_post', array($plgn_NS_SNAutoPoster, 'NS_SNAP_SavePostMetaTags'));
    add_action('save_post', array($plgn_NS_SNAutoPoster, 'NS_SNAP_SavePostMetaTags'));
  //  add_action('edit_page_form', array($plgn_NS_SNAutoPoster, 'NS_SNAP_SavePostMetaTags'));         
  
    
    
    add_action('wp_ajax_nsAuthFBSv', 'nsAuthFBSv_ajax');
    //## Custom Post Types and OG tags
    add_filter('plugin_action_links','ns_add_settings_link', 10, 2 );

    //## Scedulled Publish Calls    
    if (!empty($suOptions['nsOpenGraph']) && (int)$suOptions['nsOpenGraph'] == 1) {    
      add_action( 'init', 'nxs_start_ob', 0 );
      add_action('wp_head', 'nxs_addOGTagsPreHolder', 150);  
      add_action('shutdown', 'nxs_end_flush_ob', 1000);   
    }    
  }    
  if ($nxs_isWPMU){      
      if (function_exists('nxssnapmu_columns_head')) add_filter('wpmu_blogs_columns', 'nxssnapmu_columns_head');
      if (function_exists('nxssnapmu_columns_content')) add_action('manage_blogs_custom_column', 'nxssnapmu_columns_content', 10, 2);
      if (function_exists('nxssnapmu_columns_content')) add_action('manage_sites_custom_column', 'nxssnapmu_columns_content', 10, 2);    
      if (function_exists('nxs_add_style')) add_action( 'admin_footer', 'nxs_add_style' );  
      if (function_exists('nxs_saveSiteSets_ajax')) add_action('wp_ajax_nxs_saveSiteSets', 'nxs_saveSiteSets_ajax');
  }
 }
}
/*
 function nxs_SNAP_PostOnUpdate($postID) {
    delete_post_meta($postID, 'snap_isAutoPosted'); 
    $post = get_post($postID); 
    nxs_snapPublishTo($post);
  }
add_action('save_post', 'nxs_SNAP_PostOnUpdate');
*/
?>