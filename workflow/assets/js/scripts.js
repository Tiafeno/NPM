/**
 * Created by Tiafeno on 23/07/2017.
 */
(function($){
  $( document ).ready(function() {
    var stickys = UIkit.sticky('#sticky', {
      animation : 'uk-animation-slide-top'
    });
    var scrollArrowTop = $( '.scroll-arrow-up' );
    if (scrollArrowTop.length > 0){
      var scrollArrow = $( '.scroll-arrow-up > li > span');
      scrollArrow.on('click', function(){
        var body = $( this ).data( 'href' );
        $('html, body').animate({
          scrollTop: $( body ).offset().top - 60
        }, 1000);
      });
    }

    $( '#sticky' )
    .on('active', function(){
      $( '.scroll-arrow-up' ).show('fadein', function(){});
    })
    .on( 'inactive', function(){
      $( '.scroll-arrow-up' ).hide('fadeout', function(){});
    });

    $( 'span.scroll' )
    .css('cursor', 'pointer')
    .click(function() {
      var Hook = $( this ).data('href');
      $('html, body').animate({
        scrollTop: $( Hook ).offset().top - 60
      }, 2000);
    });


  });
   
})(jQuery);