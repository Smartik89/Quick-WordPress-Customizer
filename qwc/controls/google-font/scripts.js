;(function( $ ) {
	"use strict";
$(document).ready(function(){

	function qwc_add_selected_font( selected_elem_from_list, parent_block ){
		var font_class = selected_elem_from_list.attr('class');
		var font_title = selected_elem_from_list.attr('title');
		parent_block.find('.show-selected-font .qwc-font-item').attr('class', font_class).attr('title', font_title);
	}

	/* Show fonts list
	------------------------------------------------*/
	function qwc_show_fonts_list(){
		$('.show-selected-font').on('click', function(){
			$('.show-selected-font').removeClass('active');
			$('.qwc-fonts').hide();
			$(this).toggleClass('active');
			$(this).parents('.qwc-fonts-block').find('.qwc-fonts').toggle();
		});

		//Cache the container
		var container = $('.show-selected-font');
		
		//Hide/Show when we leave the area
		$(document).mouseup(function ( event ){
			if (!container.is(event.target) // if the target of the click isn't the container...
			&& ! $('.qwc-fonts').is(event.target) // if the target of the click isn't the a font from list...
			&& $('.qwc-fonts').has(event.target).length === 0 // ... nor a descendant of the fonts list
			&& container.has(event.target).length === 0){// ... nor a descendant of the container
				container.removeClass('active');
				container.parents('.qwc-fonts-block').find('.qwc-fonts').hide();
			}
		});
	}
	qwc_show_fonts_list();

	/* On ready active
	------------------------------------------------*/
	$('.qwc-fonts-block').each(function(){
		var font_val = $(this).find('.qwc-fonts-value').val();
		var selected = $(this).find('.qwc-fonts li.qwc-font-item[title="'+ font_val +'"]');
		selected.addClass('active').html('<span></span>');

		// Add class to the "selected font" block
		qwc_add_selected_font( selected, $(this) );
	});

	/* Activate selected
	------------------------------------------------*/
	$('.qwc-fonts li').on('click', function(){
		var parent = $(this).parents('.qwc-fonts');
		var the_input = parent.find('input.qwc-fonts-value');
		var font_name = this.title;
		the_input.val(font_name).change();
		parent.find('li.qwc-font-item').removeClass('active').html('');
		$(this).addClass('active').html('<span></span>');

		// Add class to the "selected font" block
		qwc_add_selected_font( $(this), $(this).parents('.qwc-fonts-block') );
	});

	/* Search font
	------------------------------------------------*/
	function qwc_search_google_fonts() {
		$('.qwc-fonts-block .qwc-fonts-search-field').on( 'keyup', function(){
			var value    = $(this).val().toLowerCase(),
			    headings = $(this).parents('.qwc-fonts').find('li.qwc-font-letter');

			// Hide or show headings
			value.length > 0 ? headings.hide() : headings.show();

			$(this).parents('.qwc-fonts').find('li.qwc-font-item').each(function() {
				$(this).attr('title').toLowerCase().search(value) > -1 ? $(this).show() : $(this).hide();
			});
		});
	}
	qwc_search_google_fonts();

});
})(jQuery);