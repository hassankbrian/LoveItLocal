/* Admin javascript */
jQuery(document).ready(function(){
	
	//Show custom Page background option
	var page_custom=jQuery('select[name="page_custom_value"]');
	function custom_page_bg(){
	    if(page_custom.val()=='Yes'){
		   jQuery('#page_custom_bgcolor').add('#page_custom_fontcolor').add('#page_full_embed').add('#page_bg_fixed').add('#page_custom_img').add('#page_bg_repeat').show();
		}else{
		   jQuery('#page_custom_bgcolor').add('#page_custom_fontcolor').add('#page_full_embed').add('#page_bg_fixed').add('#page_custom_img').add('#page_bg_repeat').hide();
		}
	}custom_page_bg();
	
	page_custom.change(function(){
	    custom_page_bg();
	});
	
	//Show portfolio options
	jQuery('#portfolio_video').add('#portfolio_audio').add('#portfolio_col').hide();
	var portfolio_type=jQuery('select[name="portfolio_type_value"]');
	function portfolio_types(){
	    if(portfolio_type.val()=='Image'){
             jQuery('#portfolio_video').add('#portfolio_audio').hide();
		}else if(portfolio_type.val()=='Video'){
             jQuery('#portfolio_video').show();
			 jQuery('#portfolio_audio').hide();
		}else if(portfolio_type.val()=='Audio'){
		     jQuery('#portfolio_audio').show();
			 jQuery('#portfolio_video').hide();
		}
	}portfolio_types();
	
	portfolio_type.change(function(){
	    portfolio_types();
	});
	
	var portfolio_layout=jQuery('select[name="portfolio_layout_value"]');
	function portfolio_col(){
	    if(portfolio_layout.val()=='Slider'){
             jQuery('#portfolio_col').hide();
		}else{
		     jQuery('#portfolio_col').show();
		}
	}portfolio_col();
	
	portfolio_layout.change(function(){
	    portfolio_col();
	});
	
	//Show custom slider option
	jQuery('#slider_content').hide();
	var slider_custom=jQuery('select[name="slider_custom_value"]');
	function custom_slider_bg(){
	    if(slider_custom.val()=='Yes'){
		   jQuery('#slider_content').show();
		   jQuery('#slider_mainHeading').add('#slider_subHeading').add('#slider_excerpt').add('#slider_button').hide();
		}else if(slider_custom.val()=='No'){
		   jQuery('#slider_mainHeading').add('#slider_subHeading').add('#slider_excerpt').add('#slider_button').show();
		}
	}custom_slider_bg();
	
	slider_custom.change(function(){
	    custom_slider_bg();
	});
	
	//Hide colorpicker
	var colorpicker=jQuery('.metabox').children('.colorpicker');
	colorpicker.mouseleave(function(){
	   colorpicker.delay(200).hide();
	});
});