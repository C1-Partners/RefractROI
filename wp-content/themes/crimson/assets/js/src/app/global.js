/**
 * Global
 * ------
 */
// Sticky Nav
let stickyNav = $('.site-header').offset().top;

$(window).scroll(function() {

  let siteMain = $('.site-main'),
      siteHeader = $('.site-header');

  if ($(window).scrollTop() > stickyNav) {
    var $primaryWrap = siteHeader.addClass('is-fixed').css('top','0');
    siteMain.css('padding-top', $primaryWrap.outerHeight());
  }
  else {
    siteHeader.removeClass('is-fixed').css('top','');
    siteMain.css('padding-top','');
  }
});