export default {
  init() {
    // JavaScript to be fired on all pages
    $('.use-slick').slick({
			dots: true,
			infinite: true,
		});

    $('.related .products').slick({
      infinite: true,
      dots: false,
      slidesToShow: 3,
    });

    $('.product-categories .cat-parent').append('<span class="toggle-parent"></span>');
    $('.product-categories .cat-item > a').wrapInner('<span class="text"></span>');
    $('.sidebar .menu .menu-item-has-children').append('<span class="toggle-parent"></span>');
    $('.sidebar .menu .menu-item > a').wrapInner('<span class="text"></span>');

    $('.product-categories').on( "click", ".toggle-parent", function() {
      var parentElement = $(this).parent('.cat-parent');
      if (parentElement.hasClass('open')) {
        parentElement.removeClass('open').find('> .children').slideUp(300);
      }
      else {
        parentElement.addClass('open').find('> .children').slideDown(300);
      }
    });

    $('.sidebar .menu').on( "click", ".toggle-parent", function() {
      var parentElement = $(this).parent('.menu-item-has-children');
      if (parentElement.hasClass('open')) {
        parentElement.removeClass('open').find('> .sub-menu').slideUp(300);
      }
      else {
        parentElement.addClass('open').find('> .sub-menu').slideDown(300);
      }
    });

    $('.widget_product_categories').on( "click", ".title-widget", function() {
      var elementParent = $(this).parent();
      if (elementParent.hasClass('open')) {
        elementParent.find('.product-categories').slideUp();
        elementParent.removeClass('open');
      }
      else {
        elementParent.find('.product-categories').slideDown();
        elementParent.addClass('open');
      }      
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    $('.tnp-widget-minimal form').append('<button type="submit" class="tnp-submit-button"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></button>');
  },
};
