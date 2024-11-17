<div class="wrap log_wrap">

<form  method="post" novalidate="" autocomplete="off">

<?php

//license ini
$licenseactive=get_option('wp_pinterest_automatic_license_active','');

//purchase check 
if(isset($_POST['wp_pinterest_automatic_license']) && trim($licenseactive) == '' ){

	//save it
	update_option('wp_pinterest_automatic_license' , $_POST['wp_pinterest_automatic_license'] );
	
	//activating
	//curl ini
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER,0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	curl_setopt($ch, CURLOPT_TIMEOUT,20);
	curl_setopt($ch, CURLOPT_REFERER, 'http://www.bing.com/');
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.8) Gecko/2009032609 Firefox/3.0.8');
	curl_setopt($ch, CURLOPT_MAXREDIRS, 5); // Good leeway for redirections.
	@curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // Many login forms redirect at least once.
	curl_setopt($ch, CURLOPT_COOKIEJAR , "cookie.txt");
	
	//curl get
	$x='error';

	//change domain ?
	$append='';
	
	if( isset($_POST['wp_pinterest_options']) && in_array('OPT_CHANGE_DOMAIN', $_POST['wp_pinterest_options']) ){
		$append='&changedomain=yes';
	}
	
	$url='http://deandev.com/license/index.php?itm=2203314&domain='.$_SERVER['HTTP_HOST'].'&purchase='.trim($_POST['wp_pinterest_automatic_license']).$append;
	
	curl_setopt($ch, CURLOPT_HTTPGET, 1);
	curl_setopt($ch, CURLOPT_URL, trim($url));
	while (trim($x) != ''  ){
		$exec=curl_exec($ch);
		 $x=curl_error($ch);
	}
	
	$resback=$exec;
	
	$resarr=json_decode($resback);
	
	if(isset($resarr->message)){
		$wp_pinterest_active_message=$resarr->message;
		
		//activate the plugin
		update_option('wp_pinterest_automatic_license_active', 'active');
		update_option('wp_pinterest_automatic_license_active_date', time('now'));
		$licenseactive=get_option('wp_pinterest_automatic_license_active','');
		
	}else{
		if(isset($resarr->error))
		$wp_pinterest_active_error=$resarr->error;
	}
	
	
	
}

// SAVE DATA
if (isset ( $_POST ['wp_pinterest_user'] )) {
	
	if( (integer)$_POST['wp_pinterest_automatic_interval_min'] > 2 && (integer)$_POST['wp_pinterest_automatic_interval_max'] > 2 && (integer)$_POST['wp_pinterest_automatic_interval_max'] >= (integer)$_POST['wp_pinterest_automatic_interval_min']   ){
		//valid
		$_POST['wp_pinterest_automatic_interval_min'] = (integer)$_POST['wp_pinterest_automatic_interval_min'];
		$_POST['wp_pinterest_automatic_interval_max'] = (integer)$_POST['wp_pinterest_automatic_interval_max'];
		
	}else{
		$_POST['wp_pinterest_automatic_interval_min'] = 3 ;
		$_POST['wp_pinterest_automatic_interval_max'] = 7 ;
		
	}
	
	foreach ( $_POST as $key => $val ) {
		update_option ( $key, $val );
	}
	echo '<div class="updated"><p>Changes saved</p></div>';
}

$dir = WP_PLUGIN_URL . '/' . str_replace ( basename ( __FILE__ ), "", plugin_basename ( __FILE__ ) );

$wp_pinterest_user = get_option ( 'wp_pinterest_user', '' );
$wp_pinterest_pass = get_option ( 'wp_pinterest_pass', '' );
$wp_pinterest_default = get_option ( 'wp_pinterest_default', '{awesome|nice|cool} [post_title]' );
$wp_pinterest_default_more = get_option('wp_pinterest_default_more','Check more at [post_link]');
$wp_pinterest_board = get_option ( 'wp_pinterest_board', '' );
$wp_pinterest_options = get_option ( 'wp_pinterest_options', array (
		'OPT_CHECK',
		'OPT_PIN' 
) );
$wp_pinterest_types = get_option ( 'wp_pinterest_types', array (
		'post',
		'page',
		'product' 
) );
$wp_pinterest_options = array_merge ( $wp_pinterest_options, $wp_pinterest_types );
$wp_pinterest_options = implode ( '|', $wp_pinterest_options );
$wp_pinterest_boards = get_option ( 'wp_pinterest_boards', array (
		'ids' => array (),
		'titles' => array () 
) );

$wp_pinterest_boards_ids = $wp_pinterest_boards ['ids'];
$wp_pinterest_boards_titles = $wp_pinterest_boards ['titles'];
$wp_pinterest_automatic_selector = get_option ( 'wp_pinterest_automatic_selector', '' );
$wp_pinterest_automatic_tax = get_option('wp_pinterest_automatic_tax','category,product_cat');
$wp_pinterest_automatic_tax_tags= get_option('wp_pinterest_automatic_tax_tags','post_tag,product_tag');
$wp_pinterest_automatic_interval_min = get_option('wp_pinterest_automatic_interval_min','3');
$wp_pinterest_automatic_interval_max = get_option('wp_pinterest_automatic_interval_max','5');
$wp_pinterest_proxies = get_option('wp_pinterest_proxies','');
$wp_pinterest_automatic_excerpt=get_option('wp_pinterest_automatic_excerpt','150');
$wp_pinterest_automatic_interval_clear = get_option('wp_pinterest_automatic_interval_clear',7); 
$wp_pinterest_search_replace = get_option('wp_pinterest_search_replace','');
$wp_pinterest_search_replace_txt = get_option('wp_pinterest_search_replace_txt','');

$wp_pinterest_automatic_interval_from_h  = get_option('wp_pinterest_automatic_interval_from_h','00');
$wp_pinterest_automatic_interval_from_m  = get_option('wp_pinterest_automatic_interval_from_m','00');

$wp_pinterest_automatic_interval_to_h  = get_option('wp_pinterest_automatic_interval_to_h','23');
$wp_pinterest_automatic_interval_to_m  = get_option('wp_pinterest_automatic_interval_to_m','59');


?>
<h2>
	General Settings <input type="submit" class="button-primary" value="Save Changes" name="save">
</h2>

<p>Add your Pinterest account, Fetch your boards , Set default board and pin text, Optionally set category to board rules or tag to board.  </p> 

<div class="metabox-holder columns-1" >
	<div style="" class="postbox-container" id="postbox-container-1">
		<div class="meta-box-sortables ui-sortable" id="normal-sortables">
 
		
			<?php if(trim($licenseactive) != '') { ?>
		
 
	<div class="postbox">
		<div title="Click to toggle" class="handlediv">
			<br>
		</div>
		<h3 class="hndle">
			<span>Basic options</span>
		</h3>
		<div class="inside">
			<table class="form-table">
						<tbody>
							
							<tr>
								<th scope="row"><label for="field-wp_pinterest_user"> Pinterest Login Email   </label></th>
								<td><input  class="widefat" value="<?php echo $wp_pinterest_user  ?>" name="wp_pinterest_user" id="field-wp_pinterest_user" required="required" type="text"></td>
							</tr>

							<tr>
								<th scope="row"><label for="field-wp_pinterest_user"> Pinterest Password   </label></th>
								<td><input class="widefat" value="<?php echo $wp_pinterest_pass  ?>" name="wp_pinterest_pass" id="field-wp_pinterest_pass" required="required" type="password" autocomplete=off></td>
							</tr>

							<tr>
								<th scope="row"><label for="field-wp_pinterest_board"> Default Pin Board ? </label></th>
								<td><select name="wp_pinterest_board" id="field1zz" required="required">
						      		
						      		<?php
														$i = 0;
														
														foreach ( $wp_pinterest_boards_ids as $id ) {
															?>
						      		
									<option value="<?php echo $id ?>" <?php wp_pinterest_automatic_opt_selected( $id ,$wp_pinterest_board) ?>><?php echo $wp_pinterest_boards_titles[$i]?></option>
						      			
						      		<?php
															$i ++;
														}
														
														?> 
						      	</select>  <a class="button" id="get_boards"  href="<?php echo site_url('/?wp_pinterest_automatic=boards')  ?>"> fetch boards </a><img alt="" id="ajax-loadingimg" class="ajax-loading" src="images/wpspin_light.gif" style=" margin: 3px">

									<div class="description">Select what pin board will be the default one so we select it for you by default .</div></td>
							</tr>

							<tr>
								<th scope="row"><label for="field-wp_pinterest_user"> Default Pin Text   </label></th>
								<td><input class="widefat" value="<?php echo stripslashes($wp_pinterest_default)  ?>" name="wp_pinterest_default" id="field-wp_pinterest_default" required="required" type="text">

									<div class="description">
										Supported tags: <abbr title="Image alternative text">[image_alt]</abbr> , <abbr title="Post title">[post_title]</abbr> , <abbr title="the post excerpt">[post_excerpt]</abbr> , <abbr title="The post title">[post_author]</abbr> , <abbr title="the post url">[post_link]</abbr> , <abbr title="Post tags as pinterest hashtags">[post_tags]</abbr>, <abbr title="Woo-Commerce product price if applicable">[product_price]</abbr>
									</div></td>
							</tr>
							
							<tr>
								<th scope="row"><label for="field-wp_pinterest_user"> Check more text   </label></th>
								<td><input class="widefat" value="<?php echo stripslashes($wp_pinterest_default_more)  ?>" name="wp_pinterest_default_more" id="field-wp_pinterest_default" required="required" type="text">

									<div class="description">
										This link will be appended to the pin text when the plugin pins images without link back to the original post. this is because pins with link back to the post are not unlimited but pinterest pose limits on this type of pins. <br>Supported tags:  <abbr title="the post url">[post_link]</abbr>  
									</div></td>
							</tr>



							

							<tr>
								<th scope="row"><label> Pin Box </label></th>
								<td><input name="wp_pinterest_options[]" id="field-wp_pinterest_options-1" value="OPT_PIN" type="checkbox"> <span class="option-title"> Expand pinning box on editing page </span></td>
							</tr>


							<tr>
								<th scope="row"><label> Auto check </label></th>
								<td><input name="wp_pinterest_options[]" id="field-wp_pinterest_options-1" value="OPT_CHECK" type="checkbox"> <span class="option-title"> Auto check first image to be pinned </span></td>
							</tr>

							<tr>
								<th scope="row"><label> Auto Pin </label></th>
								<td><input name="wp_pinterest_options[]" id="field-wp_pinterest_options-1" value="OPT_BOT" type="checkbox"> <span class="option-title"> Auto pin first image of bots posts (like wordpress robot or wordpress automatic ,etc) </span></td>
							</tr>

							<tr>
								<th scope="row"><label> idle when limited? </label></th>
								<td><input name="wp_pinterest_options[]"   value="OPT_IDLE" type="checkbox"> <span class="option-title">Yes idle untill limits are lifted</span><div class="description">Pinterest limit numbers of pins with link back to a site. By default if we found that pinterest throttled this type of pins the plugin will pin images with the link attached to the description instead. Tick this option if you want the plugin to sleep untill pinterest lift the limits and the plugin can pin images with link back again.</div></td>
							</tr>
							
							<tr>
								<th scope="row"><label> Upload images without link back to your site? </label></th>
								<td><input name="wp_pinterest_options[]"   value="OPT_REGULAR" type="checkbox"> <span class="option-title">By default the plugin pin images with link back to your site. This option will make the pin with no link back to your site and like if you have uploaded the image manually from your computer.</div></td>
							</tr>
	 
	 						<tr>
								<th scope="row"><label> Parse front-end </label></th>
								<td><input name="wp_pinterest_options[]"  value="OPT_FRONT" type="checkbox"> <span class="option-title"> Parse front end for images. <div class="description">If your images does not appear in the post editing page tick this for the plugin to load them from the front-end. May be your images displays by a shortcode or not listed at your editing page  </div></span></td>
							</tr>
							
							<tr>
								<th scope="row"><label> Show to admin only </label></th>
								<td><input name="wp_pinterest_options[]"   value="OPT_ADMIN_ONLY" type="checkbox"> <span class="option-title"> Tick this to show the pinning box to only administrators </span></td>
							</tr>
							
							<tr>
								<th scope="row"><label> Add all images to the queue </label></th>
								<td><input name="wp_pinterest_options[]"   value="OPT_QUEUE_ONLY" type="checkbox"> <span class="option-title"> Tick this to add all selected post images to the queue. by default the first one get pinned directly </span></td>
							</tr>
							
							<tr>
								<th scope="row"><label for="field-wp_pinterest_user"> Post types   </label></th>
								<td>
								<?php
								$post_types = get_post_types ();
								
								foreach ( $post_types as $post_type ) {
									?>
						
											 
											<input name="wp_pinterest_types[]" value="<?php echo $post_type ?>" type="checkbox"> <span class="option-title">
								       			 <?php echo $post_type ?> 
								                </span>
											 
											
										    <?php
								}
								
								?>
														
								<div class="description">Choose what post types the plugin will support so it shows it's box when you edit this post type</div>
								</td>

								
							</tr>




						</tbody>
			</table>
		</div>
	 </div>

	<div class="postbox">
		<div title="Click to toggle" class="handlediv">
			<br>
		</div>
		<h3 class="hndle">
			<span>Tags to boards</span>
		</h3>
		<div class="inside">
     		 
			
		    <table class="form-table">
						<tbody>
							<tr>
								<th scope="row"><label>Active ?</label></th>
								<td> <input data-controls="ctt_container" name="wp_pinterest_options[]" id="field-ctt_enable-1" value="OPT_CTT" type="checkbox">  Enable tags to board
								
								<div id="ctt_container" class="ctt-contain" style="padding-bottom: 20px;">

								<?php
								
								$wp_pinterest_automatic_wordpress_tags = get_option ( 'wp_pinterest_automatic_wordpress_tags', array (
										'' 
								) );
								
								$wp_pinterest_automatic_pinterest_tags = get_option ( 'wp_pinterest_automatic_pinterest_tags', array () );
								
								$pinterest_category = 0;
								 
								 
								?>
						 
								<?php
								$n = 0;
								foreach ( $wp_pinterest_automatic_wordpress_tags as $wp_tag ) {
									
									?> 
								 
								<div class="ctt">
		
											<div id="field-pinterest_tag-container">
												<label> Tag : </label> 
													
													<input type="text" name="wp_pinterest_automatic_wordpress_tags[]" value="<?php echo $wp_tag ?>" />
													
													 
		
												<label for="field-pinterest_tags"> to Board </label> 
												
												<select name="wp_pinterest_automatic_pinterest_tags[]"  >
										
													<?php
												$i = 0;
												
												foreach ( $wp_pinterest_boards_ids as $id ) {
													?>
											      		
														<option value="<?php echo $id ?>" <?php wp_pinterest_automatic_opt_selected( $id ,$wp_pinterest_automatic_pinterest_tags[$n]) ?>><?php echo $wp_pinterest_boards_titles[$i]?></option>
											      			
											      		<?php
													$i ++;
												}
												
												?>
										
		 
												</select>
		
												<button class="ctt_add">+</button>
												<button class="ctt_remove">x</button>
		
											</div>
		
										</div>
										<!-- ctb contain-->
									
									<?php $n++;}?>
									
									</div>
									
									<div class="description">Set the pin board according to the tag of the post</div>

								</td>
							</tr>

						</tbody>
					</table>
			</div>
			</div>

			<div class="postbox">
				<div title="Click to toggle" class="handlediv">
					<br>
				</div>
				<h3 class="hndle">
					<span>Category to board</span>
				</h3>
				<div class="inside">
			
			
			<table class="form-table">
						<tbody>
							<tr>
								<th scope="row"><label>Active ?</label></th>
								<td> <input data-controls="ctb_container" name="wp_pinterest_options[]" id="field-ctb_enable-1" value="OPT_CTB" type="checkbox">  Enable category to board
								
								<div id="ctb_container" class="ctb-contain" style="padding-bottom: 20px;">
 								
								<?php
								
								$wp_pinterest_automatic_wordpress_category = get_option ( 'wp_pinterest_automatic_wordpress_category', array (
										'' 
								) );
								
								$wp_pinterest_automatic_pinterest_category = get_option ( 'wp_pinterest_automatic_pinterest_category', array () );
								
								$pinterest_category = 0;
								
								$tax_txt=$wp_pinterest_automatic_tax;
								
								if(! stristr($tax_txt, 'category') ){
									$tax_txt='category,product_cat';
								}
								
								$tax=explode(',', $tax_txt);
								$tax=array_filter($tax);
								$tax=array_map('trim', $tax);
								
								
								
								foreach($tax as $key=>$taxitm){
									if(!taxonomy_exists($taxitm)){
										unset($tax[$key]);
									}
								}
								
								
								$cats = get_categories ( array (
											'hide_empty'               => 0 ,
											'taxonomy'                 => $tax,
											'parent'                   => 0

 
								) );

							
 
								?>
						 
								<?php
								$n = 0;
								
								 
								
								foreach ( $wp_pinterest_automatic_wordpress_category as $wp_category ) {
									
									?> 
								 
								<div class="ctb">
		
											<div id="field-pinterest_category-container">
												<label> Category : </label> 
													<select name="wp_pinterest_automatic_wordpress_category[]" id="field1zza">
														
														<?php
															
															foreach ( $cats as $cat ) {
																
																wp_pinterest_automatic_list_cat($cat,$wp_category,$tax);
				
															}
															 
														?>
										
													</select>
		
		
												<label for="field-pinterest_category"> to Board </label> 
												
												<select name="wp_pinterest_automatic_pinterest_category[]" id="field1zzb">
										
													<?php
												$i = 0;
												
												foreach ( $wp_pinterest_boards_ids as $id ) {
													?>
											      		
														<option value="<?php echo $id ?>" <?php wp_pinterest_automatic_opt_selected( $id ,$wp_pinterest_automatic_pinterest_category[$n]) ?>><?php echo $wp_pinterest_boards_titles[$i]?></option>
											      			
											      		<?php
													$i ++;
												}
												
												?>
										
		 
												</select>
		
												<button class="ctb_add">+</button>
												<button class="ctb_remove">x</button>
		
											</div>
		
										</div>
										<!-- ctb contain-->
									
									<?php $n++;}?>
									
									</div>
									
									<div class="description">Select what post category will post to what board</div>

								</td>
							</tr>

						</tbody>
			</table>
			</div>
			</div>

			<div class="postbox">
				<div title="Click to toggle" class="handlediv">
					<br>
				</div>
				<h3 class="hndle">
					<span>Advanced Settings (optional)</span>
				</h3>
				<div class="inside">
			 

			<table class="form-table">
						<tbody>
							
							<tr><th scope="row"><label>Be Carefull</label> </th><td>  <div class="description">Faulty settings in this fields may break the plugin working. ask for support if you need so .</div></td></tr>
						
						<tr>
								
								<th scope="row"><label>Use ip:port proxies ?   </label></th>
								 
								<td>
								  
								  <div  class="field f_100" >
						 			     <div class="option clearfix">
						 			     	
						 			         <input     name="wp_pinterest_options[]"  value="OPT_PROXY" type="checkbox">
						 			         <label>Activate using proxies</label>     
						 			     </div>
						 			</div> 
								 	 
								</td>
							</tr>
							
							<tr>
								
								<th scope="row"><label>Proxy List   </label></th>
								 
								<td>
								  
								  <div   class="field f_100" >
						 			     <div class="option clearfix">
						 			     	 
						 			     	<div   class="field f_100" >
						 			     		 
						 			     		<textarea class="widefat" rows="5" cols="20" name="wp_pinterest_proxies"  ><?php echo $wp_pinterest_proxies ?></textarea>
						 			     	</div>
						 			     	
						 			     	<div class="description">
						 			     	
						 			     	*Make sure your proxies are with port 80 (always open) or 8080 (sometimes open) which are open for connection with most servers or use any port that is open to connect on your server 
						 			     	<br> *Format:<strong>ip:port</strong> 
						 			     	<br> *Another Format : <strong>ip:port:username:password</strong>   for proxies with authentication
						 			     	<br> *one proxy per line
						 			     	<br> *Some proxy services require server ip for authentication <a target="_blank" href="<?php echo site_url('?wp_pinterest_automatic=show_ip') ?>"><strong>Click here</strong></a> to know your server ip to use</strong>
						 			     	<br> *Check <a href="http://valvepress.com/use-private-proxies-pinterest-automatic/" target="_blank"><strong>this tutorial</strong></a> showing a tested service named <a href="http://www.newipnow.com/private-proxies.html">NewIPNow</a> you can use.
						 			     	<br> *Don't use public proxies used by thousands of pepole, it may get you into zillion troubles.
						 			     	</div>
						 			     	   
						 			     </div>
						 			</div> 
								 	 
								</td>
							</tr>
						
							<tr>
								<th scope="row"><label>Detect images from this custom field</label></th>
								<td><input class="widefat" value="<?php echo get_option('wp_pinterest_automatic_cf' )  ?>" name="wp_pinterest_automatic_cf" type="text">

									<div class="description">If your theme uses a custom field for the tumbnail and you like to use it to detect image from add this field name</div></td>
							</tr>

							<tr>
								<th scope="row"><label for="field-wp_pinterest_user">Custom jQuery selector</label></th>
								<td><input class="widefat" value="<?php echo $wp_pinterest_automatic_selector  ?>" name="wp_pinterest_automatic_selector" type="text">

									<div class="description">By default, the plugin searchs the editor for images but if your images are visible elsewhere then This selector for admin page will be used by the plugin to list images in it to check and pin . use a jQuery selector like ".my_class" for a div named "my_class" or "#my_id" for div with ID of "my_id".</div></td>
							</tr>
							
							<tr>
								<th scope="row"><label>Categories Taxonomies</label></th>
								<td><input class="widefat" value="<?php echo $wp_pinterest_automatic_tax  ?>" name="wp_pinterest_automatic_tax" type="text">

									<div class="description">By default, the plugin lists categories above on the category to board section from posts and woo-commerce product post type , but if you have another post type with a categories taxonomy you can add this taxonomy comma separated .</div></td>
							</tr>
							
							<tr>
								<th scope="row"><label>Tags Taxonomies</label></th>
								<td><input class="widefat" value="<?php echo $wp_pinterest_automatic_tax_tags  ?>" name="wp_pinterest_automatic_tax_tags" type="text">

									<div class="description">By default, the plugin lists tags above on the tag to board section from posts and woo-commerce product post type , but if you have another post type with a tags taxonomy you can add this taxonomy comma separated .</div></td>
							</tr>
							
							
							<tr>
								<th scope="row"><label>Excerpt Length</label></th>
								<td><input class="widefat" value="<?php echo $wp_pinterest_automatic_excerpt  ?>" name="wp_pinterest_automatic_excerpt" type="text">

									<div class="description">By default, the plugin uses the post excerpt added to the post for the [post_excerpt] tag but some posts doesn't have excerpt and the plugin will auto generate excerpt from the content with this charcter length .</div></td>
							</tr>
							
							<tr>
							<th scope="row"><label>Search and replace texts at image src</label></th>
								 
								<td>
								  
								  <div   class="field f_100" >
						 			     <div class="option clearfix">
						 			     	 
						 			     	<div   class="field f_100" >
						 			     		 
						 			     		<textarea class="widefat" rows="5" cols="20" name="wp_pinterest_search_replace"  ><?php echo $wp_pinterest_search_replace ?></textarea>
						 			     	</div>
						 			     	
						 			     	<div class="description">
						 			     	
						 			     	  
						 			     	<br> *Format:<strong>search|replace</strong> 
						 			     	<br> *Example : <strong>thumb|fullwidth</strong> so the plugin will replace the text "thumb" with "fullwidth" at the pinned image src link
						 			     	<br> *one per line  
						 			     	<br> *for stripping text use this format  <strong>text|</strong> this will replace the text "text" for nothing
						 			     	</div>
						 			     	   
						 			     </div>
						 			</div> 
								 	 
								</td>
							</tr>
							
							<tr>
							<th scope="row"><label>Search and replace texts at pin tags</label></th>
								 
								<td>
								  
								  <div   class="field f_100" >
						 			     <div class="option clearfix">
						 			     	 
						 			     	<div   class="field f_100" >
						 			     		 
						 			     		<textarea class="widefat" rows="5" cols="20" name="wp_pinterest_search_replace_txt"  ><?php echo $wp_pinterest_search_replace_txt ?></textarea>
						 			     	</div>
						 			     	
						 			     	<div class="description">
						 			     	
						 			     	  
						 			     	<br> *Format:<strong>search|replace</strong> 
						 			     	<br> *Example : <strong>ğ|g</strong> so the plugin will replace the text "ğ" with "g" at the pinned tag text
						 			     	<br> *one per line  
						 			     	<br> *for stripping text use this format  <strong>ğ|</strong> this will replace the text "ğ" for nothing
						 			     	</div>
						 			     	   
						 			     </div>
						 			</div> 
								 	 
								</td>
							</tr>

						</tbody>
			</table>			
			</div>
			</div>

			<div class="postbox">
				<div title="Click to toggle" class="handlediv">
					<br>
				</div>
				<h3 class="hndle">
					<span>Cron Setup (optional)</span>
				</h3>
				<div class="inside">				
			 	
			
			<table class="form-table">
						<tbody>
							
							
						
							<tr>
								<th scope="row"><label>Cron command</label></th>
								<td><input readonly="readonly" class="widefat" value="<?php echo 'curl '. site_url('?wp_pinterest_automatic=cron')  ?>"   type="text">

									<div class="description">By Default, the plugin uses built-in wordpress cron that is triggered by site visiotrs but you can still setup a cron job to call processing the queue just copy the command in the box to your hosting crontab. make it every minute. you can trigger the cron manually <a href="<?php echo site_url('?wp_pinterest_automatic=cron')  ?>">here</a> </div></td>
									
									
									
							</tr>
							
							<tr>
								<th scope="row"><label> Disable using built-in wordpress Cron </label></th>
								<td><input name="wp_pinterest_options[]" id="field-wp_pinterest_options-1" value="OPT_EXTERNAL_CRON" type="checkbox"> <span class="option-title"> Tick this if you will use the external cron job instead (Recommended)</span></td>
							</tr>
							
							<tr>
								<th scope="row"><label>Pin interval</label></th>
								<td><input style="width:50px" value="<?php echo $wp_pinterest_automatic_interval_min  ?>" name="wp_pinterest_automatic_interval_min" type="text">
								To <input style="width:50px" value="<?php echo $wp_pinterest_automatic_interval_max  ?>" name="wp_pinterest_automatic_interval_max" type="text"> Minutes 

									<div class="description">Random Number of minutes between pins. Minimum value is 3 minutes</div></td>
							</tr>
							
							
							<tr>
								
								
								
								<th scope="row"><label>Queue processing time</label></th>
								<td>
								From
								<select name="wp_pinterest_automatic_interval_from_h">
									
									<?php 
									
										for($i= 0 ;$i<24;$i++){
										$hour = sprintf('%02u', $i);
										?>
										
										<option <?php wp_pinterest_automatic_opt_selected( $hour ,$wp_pinterest_automatic_interval_from_h) ?> value="<?php echo $hour; ?>"><?php echo $hour; ?></option>
										
										
									<?php } ?>
									
									 
								</select>
								:
								<select name="wp_pinterest_automatic_interval_from_m">
									 
									 <?php 
									
										for($i= 0 ;$i<60;$i++){
										$minute = sprintf('%02u', $i);
										?>
										
										<option <?php wp_pinterest_automatic_opt_selected( $minute ,$wp_pinterest_automatic_interval_from_m) ?> value="<?php echo $minute; ?>"><?php echo $minute; ?></option>
										
										
									<?php } ?>
									 
								</select>
								
								To
								<select name="wp_pinterest_automatic_interval_to_h">
									
									<?php 
									
										for($i= 0 ;$i<24;$i++){
										$hour = sprintf('%02u', $i);
										?>
										
										<option <?php wp_pinterest_automatic_opt_selected( $hour ,$wp_pinterest_automatic_interval_to_h) ?> value="<?php echo $hour; ?>"><?php echo $hour; ?></option>
										
										
									<?php } ?>
									
									 
								</select>
								:
								<select name="wp_pinterest_automatic_interval_to_m">
									 
									 <?php 
									
										for($i= 0 ;$i<60;$i++){
										$minute = sprintf('%02u', $i);
										?>
										
										<option <?php wp_pinterest_automatic_opt_selected( $minute ,$wp_pinterest_automatic_interval_to_m) ?> value="<?php echo $minute; ?>"><?php echo $minute; ?></option>
										
										
									<?php } ?>
									 
								</select>
								
								<div class ="description">24h format. current time is <?php echo date ( 'H:i',current_time('timestamp') ); ?> From Time should be lower than the To time </div>
								 									
									</td>
							</tr>
														
							
							<tr>
								<th scope="row"><label>Keep log for how many days</label></th>
								<td><input style="width:50px" value="<?php echo $wp_pinterest_automatic_interval_clear  ?>" name="wp_pinterest_automatic_interval_clear" type="text">Days
								  

									<div class="description">Clear log records older than this day</div></td>
							</tr>
							
							

							
							
						</tbody>
					</table>
			
			</div>
			</div>
			
			<?php  }//license active? ?>			
			

			<div class="postbox">
				<div title="Click to toggle" class="handlediv">
					<br>
				</div>
				<h3 class="hndle">
					<span>License</span>
				</h3>
				<div class="inside">
			 
			 <table class="form-table">
						<tbody>
							
							
						
							<tr>
								<th scope="row"><label>Purchase Code</label></th>
								<td><input class="widefat" name="wp_pinterest_automatic_license" value="<?php echo get_option('wp_pinterest_automatic_license','') ?>"   type="text">

									<div class="description">If you don't know what is your purchase code check this <a href="http://www.youtube.com/watch?v=eAHsVR_kO7A">video</a> on how to get it   .</div></td>
							</tr>
							
							<?php if( isset($wp_pinterest_active_error) && stristr($wp_pinterest_active_error,	 'another')  ) {?>
							
							<tr>
								<th scope="row"><label> Change domain </label></th>
								<td><input name="wp_pinterest_options[]" id="field-wp_pinterest_options-1" value="OPT_CHANGE_DOMAIN" type="checkbox"> <span class="option-title"> Disable license at the other domain and use it with this domain </span></td>
							</tr>
							
							<?php } ?>
							
							<tr>
								<th scope="row"><label>License Status</label></th>
								<td>

									<div class="description"><?php 
									
									if(trim($licenseactive) !=''){
										echo 'Active';
									}else{
										echo 'Inactive ';
										if(isset($wp_pinterest_active_error)) echo '<p><span style="color:red">'.$wp_pinterest_active_error.'</span></p>';
									}
									
									?></div></td>
							</tr>

							
						</tbody>
					</table>
			 </div>
			</div>
 			
 
		</div>
	</div>
	<!-- end .postbox-container -->

	<div style="" class="postbox-container" id="postbox-container-2">
		<div class="meta-box-sortables ui-sortable empty-container" id="side-sortables"></div>
	</div>
	<!-- end .postbox-container -->

	<div style="" class="postbox-container" id="postbox-container-3">
		<div class="meta-box-sortables ui-sortable empty-container" id="column3-sortables"></div>
	</div>
	<!-- end .postbox-container -->

	<div style="" class="postbox-container" id="postbox-container-4">
		<div class="meta-box-sortables ui-sortable empty-container" id="column4-sortables"></div>
	</div>
	<!-- end .postbox-container -->

	</div>
	<div style="clear:both"></div>
	
	<input   type="submit" name="save" value="Save Changes" class="button-primary">
	
 
</form>
</div><!-- wrap -->
 <script type="text/javascript">
    var $vals = '<?php echo  $wp_pinterest_options ?>';
    $val_arr = $vals.split('|');
    jQuery('input:checkbox').removeAttr('checked');
    jQuery.each($val_arr, function (index, value) {
        if (value != '') {
            jQuery('input:checkbox[value="' + value + '"]').attr('checked', 'checked');
        }
    });
</script>
	