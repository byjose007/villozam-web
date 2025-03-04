<?php
$output = $font_color = $el_class = $el_id = $width = $offset = '';
extract(shortcode_atts(array(
	'font_color'      => '',
    'el_class' => '',
	  'el_id' => '',
    'width' => '1/1',
    'css' => '',
	'offset' => '',
	'animation' => ''
), $atts));

if(!empty($el_id)){
  $el_id = 'id="'. $el_id .'"';
}

$el_class = $this->getExtraClass($el_class);
$width = wpb_translateColumnWidthToSpan($width);
$width = vc_column_offset_class_merge($offset, $width);
$el_class .= ' wpb_column vc_column_container';
$style = buildColStyle( $font_color );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width . $el_class , $this->settings['base'], $atts );
$output .= "\n\t".'<div '.$el_id.' class="'.$css_class.' '.$animation.'"'.$style.'>';
$output .= '<div class="vc_column-inner ' . esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ) . '">';
$output .= "\n\t\t".'<div class="wpb_wrapper">';
$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
$output .= '</div>';
$output .= "\n\t".'</div> '.$this->endBlockComment($el_class) . "\n";

echo !empty( $output ) ? $output : '';
