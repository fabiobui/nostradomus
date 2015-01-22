<?php
/**
 * Banner
 *
 */
if (!function_exists('banner_shortcode')) {

	function banner_shortcode($atts, $content = null) {
 	    extract(shortcode_atts(
	        array(
				'img' => '',
				'banner_link' => '',
				'title' => '',
				'text' => '',
				'btn_text' => '',
				'target' => '',
				'custom_class' => ''
	    ), $atts));
	 
	 	// get site URL
		$home_url = home_url();

		$output =  '<div class="banner-wrap '.$custom_class.'">'; 
	if ($title!="") {
			$output .= '<h5>';
			$output .= $title;
			$output .= '</h5>';
		}
		if ($img !="") {
			$output .= '<figure class="featured-thumbnail">';
			if ($banner_link != "") {
				$output .= '<a href="'. $banner_link .'" ><img src="' . $home_url . '/' . $img .'"  alt="" />';
			} else {
				$output .= '<a href="#" ><img src="' . $home_url . '/' . $img .'" alt="" />';
			}
			$output .= '</a></figure>';
		}
	 	

		
		if ($text!="") {
			$output .= '<p class="banner-txt">';
			$output .= $text;
			$output .= '</p>';
		}
		
		if ($btn_text!="") {	
			$output .=  '<div class="link-align"><a href="'.$banner_link.'" title="'.$btn_text.'" class="btn btn-link" target="'.$target.'">';
			$output .= $btn_text;
			$output .= '</a></div>';
		}
	 
		$output .= '</div><!-- .banner-wrap (end) -->';
	 
	    return $output;
	 
	} 
	add_shortcode('banner', 'banner_shortcode');
	
}?>