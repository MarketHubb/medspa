/* jQuery (Footer) */
(function($) {

    //region Variables
    let LogoSvg = window.location.origin + '/wp-content/themes/rela-child-theme/images/Confidence-Logo.svg';
    //endregion

    //region Window Load
    $(window).load(function() {

        // Replace PNG logo with SVG
        $('.main-header__logo a img').attr({
           'src': LogoSvg,
           'srcset': LogoSvg
        });
    });

    // Create custom show/hide functionality
    $('.show-hide .aheto-list__title').on('click', function() {
       $(this).next().slideToggle();
    });

    //endregion

})( jQuery );