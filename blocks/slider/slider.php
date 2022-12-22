<?php

 /**
  * Quick function to change ACF 0 and 1 to false true
  */
 function hzd_change_0_1( $value ) {
     if ( $value == 1 ) {
         return 'true';
     }

     return 'false';
 }
 
$classes = [ 'acf-slider-block' ];

if ( ! empty( $block['className'] ) ) {
    $classes = array_merge( $classes, explode( ' ', $block['className'] ) );
}
// 
// if ( ! empty( $block['backgroundColor'] ) ) {
//     $classes[] = 'has-background';
//     $classes[] = 'has-' . $block['backgroundColor'] . '-background-color';
// }
// 
if ( ! empty( $block['textColor'] ) ) {
    $classes[] = 'has-text-color';
    $classes[] = 'has-' . $block['textColor'] . '-color';
}

$dots     = hzd_change_0_1( get_field( 'dots' ) );
$dots_colour     =  get_field( 'dots_colour' ) ?: '#000' ;

$arrows   = hzd_change_0_1 ( get_field( 'arrows' ) );
$arrow_colour = get_field( 'arrow_colour' ) ?: '#000';
$autoplay = hzd_change_0_1 ( get_field( 'autoplay' ) );

$infinite_scroll = hzd_change_0_1 ( get_field( 'infinite' ) );

$centre_mode  = hzd_change_0_1 ( get_field( 'centre_mode' ) );
$fade         = hzd_change_0_1 ( get_field( 'fade' ) );

$slides_show   = get_field( 'slides_to_show' );
$slides_scroll = get_field( 'slides_to_scroll' );

$responsive = get_field('responsive');

BUGFU::log($block);

?>
<script>
	const sliderArgs = {
		infinite: <?php echo $infinite_scroll; ?>,
		center: <?php echo $centre_mode; ?>,
		dots: <?php echo $dots; ?>,
		arrows: <?php echo $arrows; ?>,
		autoplay: <?php echo $autoplay; ?>,
		slidesToShow: <?php echo $slides_show; ?>,
		slidesToScroll: <?php echo $slides_scroll; ?>,
		
		<?php if ( $responsive ) { ?>
			responsive: [
				<?php foreach( $responsive as $breakpoint ) { ?>
					{
						breakpoint: <?php echo $breakpoint['breakpoint']; ?>,
						settings: {
							slidesToShow: <?php echo $breakpoint['slides_to_show']; ?>,
							slidesToScroll: <?php echo $breakpoint['slides_to_scroll']; ?>
						},
					},
				<?php } ?>
			],
		<?php } ?>
	};
</script>
<div 
	data-slides-to-show="<?php echo $slides_show; ?>"
    class="<?php echo join( ' ', $classes ); ?>" 
	style="
		--arrow-colour: <?php echo $arrow_colour; ?>;
		--dots-colour: <?php echo $dots_colour; ?>;
	"
>
    <InnerBlocks allowedBlocks="<?php echo esc_attr( wp_json_encode( [ 'acf/slide' ] ) ); ?>" />
</div>