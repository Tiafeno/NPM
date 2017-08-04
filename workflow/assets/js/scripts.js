/**
 * Created by Tiafeno on 23/07/2017.
 */
(function($){
  $( document ).ready(function() {
    var stickys = UIkit.sticky('#sticky', {
      animation : 'uk-animation-slide-top'
    });

    $( 'a.scroll' ).click(function() {
      var Hook = $( this ).attr('id-target');
      $('html, body').animate({
        scrollTop: $( '#' + Hook ).offset().top - 60
      }, 2000);
    });

  });
   
})(jQuery);