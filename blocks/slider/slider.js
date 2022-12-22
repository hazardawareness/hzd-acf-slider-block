jQuery(document).ready(function ($) {
	const sliderContainer = document.getElementsByClassName('acf-slider-block');

	if (sliderContainer != null && sliderArgs != null) {
		jQuery('.acf-slider-block > .acf-innerblocks-container').slick(sliderArgs);
	}
});
