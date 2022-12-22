<?php

// BUGFU::log($block);
	
$classes=[ 'acf-slide-block' ];

if ( ! empty( $block['className'] ) ) {
    $classes=array_merge( $classes, explode( ' ', $block['className'] ) );
}

if ( ! empty( $block['backgroundColor'] ) ) {
    $classes[]='has-background';
    $classes[]='has-' . $block['backgroundColor'] . '-background-color';
}

if ( ! empty( $block['textColor'] ) ) {
    $classes[]='has-text-color';
    $classes[]='has-' . $block['textColor'] . '-color';
}

?>
<div class="<?php echo join( ' ', $classes ); ?>">
    <InnerBlocks />
</div>