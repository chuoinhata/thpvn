export default {
  init() {
    // JavaScript to be fired on all pages
    $('.use-slick').slick({
			dots: true,
			infinite: true,
		});

    $('.product-categories .cat-parent').append('<span class="toggle-parent"></span>');
    $('.product-categories .cat-item > a').wrapInner('<span class="text"></span>');

    $('.product-categories').on( "click", ".toggle-parent", function() {
      var parentElement = $(this).parent('.cat-parent');
      if (parentElement.hasClass('open')) {
        parentElement.removeClass('open').find('> .children').slideUp(300);
      }
      else {
        parentElement.addClass('open').find('> .children').slideDown(300);
      }
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    $('.tnp-widget-minimal form').append('<button type="submit" class="tnp-submit-button"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></button>');
  },
};
