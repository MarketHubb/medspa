/* jQuery (Footer) */
(function($) {

    //region Variables
    let LogoSvg = window.location.origin + '/wp-content/themes/rela-child-theme/images/Confidence-Logo.svg';
    //endregion

    //region Window Load
    $(window).load(function() {
        $('.main-header__logo a img').attr({
           'src': LogoSvg,
           'srcset': LogoSvg
        });
    });
    //endregion

})( jQuery );