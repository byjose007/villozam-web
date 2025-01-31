<?php
if (!function_exists('rd_share_panel')) {
	function rd_share_panel()
	{
	ob_start();
	$post_title = get_the_title();
	$post_title = str_replace('|','-' , $post_title);
?>
   <div class="share-box">
      <ul>
        <li id="facebook"> <a  target="_blank" onClick="popup = window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php echo esc_attr($post_title); ?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false" href="#"><i class="fa fa-facebook"></i></a>
         </li>
        <li id="twitter"> <a  target="_blank" onClick="popup = window.open('https://twitter.com/intent/tweet?text=<?php echo esc_attr($post_title); ?> <?php the_permalink(); ?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false" href="#"><i class="fa fa-twitter"></i></a>
         </li>
        <li id="lin"> <a  target="_blank" onClick="popup = window.open('http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php echo esc_attr($post_title); ?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false" href="#"><i class="fa fa-linkedin"></i></a>
         </li>
        <li id="reddit"> <a  target="_blank" onClick="popup = window.open('http://reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php echo esc_attr($post_title); ?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false" href="#"><i class="fa fa-reddit"></i></a>
         </li>
        <li id="tumblr"> <a  target="_blank" onClick="popup = window.open('https://www.tumblr.com/widgets/share/tool?posttype=link&amp;title=<?php echo esc_attr($post_title); ?>&amp;caption=<?php echo esc_attr($post_title); ?>&amp;content=<?php echo urlencode(the_permalink()); ?>&amp;canonicalUrl=<?php echo urlencode(the_permalink()); ?>&amp;shareSource=tumblr_share_button', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false" href="#"><i class="fa fa-tumblr"></i></a>
         </li>
        <li id="member_email"> <a  target="_blank" onClick="popup = window.open('mailto:?subject=<?php echo esc_attr($post_title); ?>&amp;body=<?php the_permalink(); ?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false" href="#"><i class="fa fa-envelope-o"></i></a>
         </li>
      </ul>
    </div>

	<?php
$output_string = ob_get_contents();
ob_end_clean();

echo !empty( $output_string ) ? $output_string : '';
	}
}
if (!function_exists('rd_woo_share_panel')) {
	function rd_woo_share_panel()
	{
	ob_start();
?>
   <div class="woo-share-box">
      <ul>
        <li id="facebook"> <a  target="_blank" onClick="popup = window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php echo esc_attr($post_title); ?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false" href="#"><i class="fa fa-facebook"></i></a>
         </li>
        <li id="twitter"> <a  target="_blank" onClick="popup = window.open('https://twitter.com/intent/tweet?text=<?php echo esc_attr($post_title); ?> <?php the_permalink(); ?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false" href="#"><i class="fa fa-twitter"></i></a>
         </li>
        <li id="lin"> <a  target="_blank" onClick="popup = window.open('http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php echo esc_attr($post_title); ?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false" href="#"><i class="fa fa-linkedin"></i></a>
         </li>
        <li id="reddit"> <a  target="_blank" onClick="popup = window.open('http://reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php echo esc_attr($post_title); ?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false" href="#"><i class="fa fa-reddit"></i></a>
         </li>
        <li id="tumblr"> <a  target="_blank" onClick="popup = window.open('https://www.tumblr.com/widgets/share/tool?posttype=link&amp;title=<?php echo esc_attr($post_title); ?>&amp;caption=<?php echo esc_attr($post_title); ?>&amp;content=<?php echo urlencode(the_permalink()); ?>&amp;canonicalUrl=<?php echo urlencode(the_permalink()); ?>&amp;shareSource=tumblr_share_button', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false" href="#"><i class="fa fa-tumblr"></i></a>
         </li>
        <li id="member_email"> <a  target="_blank" onClick="popup = window.open('mailto:?subject=<?php echo esc_attr($post_title); ?>&amp;body=<?php the_permalink(); ?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false" href="#"><i class="fa fa-envelope-o"></i></a>
          </li>
      </ul>
    </div>

	<?php
$output_string = ob_get_contents();
ob_end_clean();

echo !empty( $output_string ) ? $output_string : '';
	}
}
?>
