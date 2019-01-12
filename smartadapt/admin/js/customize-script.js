jQuery(document).ready(function ($) {

	$('#customize-info .preview-notice').html('<a class="button button-primary" href="https://creativemarket.com/netbiel/312170-SmartAdapt-Pro-Clean-Responsive" target="_blank">Upgrade to SmartAdapt Pro version</a>');
	$('#customize-info .preview-notice').append('<p style="color: #d10000">The pro version includes more Customizer options e.g. backgrounds, colors, fonts and layout adjustments, extended support and more!</p>');

	$(".smartadapt_theme_options_smartadapt_layout_width").noUiSlider({

		range:[1000, 1280], slide:triggerChange, start:$("#smartadapt_theme_options_smartadapt_layout_width").val(), handles:1, step: 1, serialization:{
			to:$("#smartadapt_theme_options_smartadapt_layout_width"),  resolution: 1
		}

	});
});

function triggerChange() {
	jQuery('input').change();






}