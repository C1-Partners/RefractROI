/**
 * Global
 * ------
 */


 
/*
  Fixed Navigation
*/ 

let stickyNav = $('.site-header').offset().top;

$(window).scroll(function() {

  let siteMain = $('.site-main'),
      siteHeader = $('.site-header');

  if ($(window).scrollTop() > stickyNav) {
    let $primaryWrap = siteHeader.addClass('is-fixed').css('top','0');
    siteMain.css('padding-top', $primaryWrap.outerHeight());
  }
  else {
    siteHeader.removeClass('is-fixed').css('top','');
    siteMain.css('padding-top','');
  }
});

/*
  Search 
*/

const closeSearch = () => {
	$b.removeClass('search-shown');
  $('#search-overlay').remove();
}

let navToggler = $('.navbar-toggler');

$('#search-open').on('click', function(e){
  e.preventDefault();
  $b.addClass('search-shown');
  $('.search-field').focus();
  $('<div id="search-overlay"></div>').insertAfter('#site-utilities');
  navToggler.css('visibility', 'hidden');
});
$('#search-close').on('click', function(e){
  e.preventDefault();
  closeSearch();
  navToggler.css('visibility', 'visible');
});