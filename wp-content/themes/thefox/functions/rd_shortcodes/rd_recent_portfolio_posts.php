<?php 

/*-----------------------------------------------------------------------------------*/



/*  Recent portfolio shortcode



/*-----------------------------------------------------------------------------------*/

if (!function_exists('recent_port_sc')) {

function recent_port_sc($atts, $content = null) {  


    extract(shortcode_atts(array(  
		'margin_top'   => '0',

		'margin_bottom' => '0',

			
		'port_order' => 'DESC',
		'port_orderby' => 'date',
		'to_show' => '5',
		
		'posts_per_line' => '3',
		'heading_color' => '',
		'text_color' => '',
		'bg_color' => '',
		'alt_bg_color' => '',
		'border_color' => '',
		'h_bg_color' => '',
		'h_text_color' => '',
		'style' => 'rd_pc_1',
		'title' => 'Recent Posts',
		'desc' => '',
		'pos' => 'left',
		'category' => 'all',
		'tags' => 'all',
		'scroll' => '',
		'speed' => '800',
		
    ), $atts));


if($posts_per_line > 3 ) {
 $c_width = '270';	
}else{
$c_width = '399';		
}
	ob_start();
	$rport_rs = RandomString(20);    				

if($style == 'rd_pc_1'){
	
	echo '<style type="text/css" >.rd_'.$rport_rs.' .port_details{background:'.$bg_color.'; border:1px solid '.$border_color.'; }.rd_'.$rport_rs.' .port_details:before{background:'.$bg_color.';}.rd_'.$rport_rs.' .carousel_recent_post:hover .port_details{background:'.$h_bg_color.'; border:1px solid '.$h_bg_color.'; }.rd_'.$rport_rs.' .carousel_recent_post:hover .port_details:before{background:'.$h_bg_color.';}.rd_'.$rport_rs.' .port_details h2 a{color:'.$heading_color.';}.rd_'.$rport_rs.' .port_details h3{color:'.$text_color.';}.rd_'.$rport_rs.' .carousel_recent_post:hover .port_details h2 a,.rd_'.$rport_rs.' .carousel_recent_post:hover .port_details h3{color:'.$h_text_color.'; }</style>';
	
}
if($style == 'rd_pc_2'){
	
	echo '<style type="text/css" >.rd_'.$rport_rs.' .carousel_recent_post:nth-child(odd) .port_details{background:'.$bg_color.'; }.rd_'.$rport_rs.'  .carousel_recent_post:nth-child(odd) .port_details:before{background:'.$bg_color.';}.rd_'.$rport_rs.'  .carousel_recent_post:nth-child(even) .port_details{background:'.$alt_bg_color.'; }.rd_'.$rport_rs.'  .carousel_recent_post:nth-child(even) .port_details:before{background:'.$alt_bg_color.';}.rd_'.$rport_rs.' .carousel_recent_post:hover .port_details{background:'.$h_bg_color.';}.rd_'.$rport_rs.' .carousel_recent_post:hover .port_details:before{background:'.$h_bg_color.';}.rd_'.$rport_rs.' .port_details h2 a{color:'.$heading_color.';}.rd_'.$rport_rs.' .port_details h3{color:'.$text_color.';}.rd_'.$rport_rs.' .carousel_recent_post:hover .port_details h2 a,.rd_'.$rport_rs.' .carousel_recent_post:hover .port_details h3{color:'.$h_text_color.'; }</style>';
	
}

			
		echo '
		<script type="text/javascript" charset="utf-8">
		jQuery.noConflict();		
		
	//setup up Carousel
		
		jQuery(document).ready(function($) {	
		"use strict";
		
		$(window).load(function(){
		$(".rd_'.$rport_rs.'.jcarousel ul").carouFredSel({
					responsive: true,
					width: "100%",';
					
					if($scroll !== 'yes' ){ 
					echo 'scroll: 1,
					auto: false,';
					 }else{ 
					echo 'scroll:  { items:1,duration: '.$speed.'},
					auto: true,';
					 }
					
					
if($style !== 'cbp_type08'){ 
					echo 'prev: ".rd_'.$rport_rs.'.carousel_left",
					next: ".rd_'.$rport_rs.'.carousel_right",';
}else{
	
					echo 'prev: ".rd_'.$rport_rs.'.rp_left",
					next: ".rd_'.$rport_rs.'.rp_right",';
}
					
					echo 'items: {
						width:'.$c_width.',
						height: "100%",
					 	swipe       : {
             		   		onTouch     : true,
		               		onMouse     : false
        		    	},
						visible: {
							min: 1,
							max: '.$posts_per_line.'
						}
						
					}
				});
				});
				});
	</script>';

	
if($style !== 'cbp_type08'){ 
	echo '<div class="rd_'.$rport_rs.' jcarousel '.$style.'"><div class="carousel_nav">
  <p class="rd_'.$rport_rs.' carousel_left"></p>
  <p class="rd_'.$rport_rs.' carousel_right"></p>
</div>';

}elseif($style == 'cbp_type08'){ 
	echo '<div class="cbp_'.$pos.'_desc '.$style.'"><h2 class="cbp_title">'.$title.'</h2>
	<div class="rp_desc">'.$desc.'</div>
	<div class="rp_nav">
  <p class="rd_'.$rport_rs.' rp_left"></p>
  <p class="rd_'.$rport_rs.' rp_right"></p>
</div></div><div class="rd_'.$rport_rs.' jcarousel '.$style.' cbp_'.$pos.'">';
}


echo '<ul>';


$n_category = explode(',', $category);
$n_tags = explode(',', $tags);
			

$category_f = ($category!=="all" ? $category : '');
   global $post;
		$i = 0;


			$args = array(
            'post_type' => 'Portfolio',
		'order' => $port_order,
		'orderby' => $port_orderby,
          'posts_per_page' => $to_show
	);
        if ($category !== '' && $category !== "all") {
            $args['tax_query']=array(
                array(
                    'taxonomy' => 'catportfolio',
                    'field' => 'slug',
                    'terms' => $n_category
                )
            );
        }

        if ($tags !== '' && $tags !== "all") {
            $args['tax_query']=array(
                array(
                    'taxonomy' => 'tagportfolio',
                    'field' => 'slug',
                    'terms' => $n_tags
                )
            );
        }

        if ($category !== '' && $category !== "all" && $tags !== '' && $tags !== "all") {
            $args['tax_query']=array(
                array(
                    'taxonomy' => 'catportfolio',
                    'field' => 'slug',
                    'terms' => $n_category
                ),
				array(
                    'taxonomy' => 'tagportfolio',
                    'field' => 'slug',
                    'terms' => $n_tags
                )
            );
        }
	
		$port_query = new WP_Query($args);
           

if ($port_query->have_posts()) : while ($port_query->have_posts()) : $port_query->the_post(); 
	if (!isset($echoallterm)) {$echoallterm = '';}
		$new_term_list = get_the_terms(get_the_id(), "tagportfolio");
		if (is_array($new_term_list)) {
			foreach ($new_term_list as $term) {
                    $tempname = strtr($term->name, array(
                    ' ' => '-',
                    ));
                    $echoallterm .= strtolower($tempname) . " ";
                    $echoterm = $term->name;
						$new_terms = str_replace ( '-', ' ', $echoallterm);
		}
	}    

$ext_url = get_post_meta($post->ID, 'rd_ext_url', true);
if($ext_url !== ''){ $linkToTheWork = $ext_url; }
else{	  
$linkToTheWork = get_permalink();
}
$terms = get_the_terms( $post->ID, 'tagportfolio' );
if ( $terms && ! is_wp_error( $terms ) ) : 
$links = array();
foreach ( $terms as $term ) 
{
$links[] = $term->name;
}
$links = str_replace(' ', '-', $links);	
$tax = join( " ", $links );		
else :	
$tax = '';	
endif;

 if($style !== 'cbp_type08'){ ?>
<!-- portfolio item -->

<li class="carousel_recent_post prsc">
  <div class="recent_port_ctn">
    <div class="filter_img"><a href="<?php if($ext_url !== ''){ echo esc_attr($ext_url); }else{ the_permalink(); } ?>" class="ico_link">
      <?php the_post_thumbnail(array(586, 440), array('title' => "")); ?>
      </a>
      <?php
	if ('' != get_the_post_thumbnail() ) {
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );
	echo '<a href="'.$url. '" class="prettyPhoto port_img_link">';
    echo "<span class='img_link'>";
    echo '';
	if($ext_url !== ''){ 
	echo "</span></a><a href='" . esc_attr($ext_url) . "' class='port_post_link'>"; }
	else{
	echo "</span></a><a href='" . get_permalink( $post->ID ) . "' class='port_post_link'>";
	}
    echo "<span class='post_link'><h2 class='fw_port_link'>" . get_the_title() . "</h2><h3 class='fw_port_tag'>".$new_terms."</h3>";
    echo '';
	echo "</span></a>";
	echo ""; 
	
	} ?>
    </div>
<div class="port_details">
		<h2><a href="<?php  echo esc_url($linkToTheWork);  ?>"><?php echo get_the_title(); ?></a></h2>
		<h3><?php if($new_terms !== '') { echo esc_html($new_terms); }?></h3>
        </div>
  </div>
</li>
<?php  }else { ?>

 <li class="carousel_recent_post brsc">
      <div class="recent_port_ctn <?php echo 'rand'.$rport_rs.'_post'; ?> ">
      <div class="blog_box">
<?php  

 the_post_thumbnail(array(540, 460), array('title' => ""));


echo "";
$image =wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');

echo "<a class='blog_post_link_ctn' href='" . esc_attr($linkToTheWork) . "'></a>";


?>

<div class="blog_box_content">
<h5 class="widget_post_title"> <a href="<?php echo esc_attr($linkToTheWork); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'thefoxwp'), get_the_title()); ?>">
<?php the_title(); ?>
</a> </h5>
<div class="clearfix"></div>
<?php echo rd_custom_excerpt('rd_bp_excerpt','rd_related_more'); ?>
</div>
</div>
</div>
</li>

<?php } unset($echoallterm); endwhile; endif; ?>
<?php wp_reset_postdata(); ?>
</ul>
</div>
<?php

$output_string = ob_get_contents();
ob_end_clean();


	return '<div class="clearfix" style="padding-top:'.$margin_top.'px"></div>'.$output_string.'<div class="clearfix" style="padding-top:'.$margin_bottom.'px"></div>';
}
add_shortcode( 'recent_port_sc', 'recent_port_sc' );

}
?>
