jQuery.noConflict();
(function($)
{
  $(function()
  {
    // Ajustar el ancho del slider
    $('#homeRecetas').width(
      ($('.item').length * 414) + ($('.separator').length * 35)
    );

    // Eventos para los botones del slider
    $('#btn_slide_right').click(function(e)
    {
      if( !$('#homeRecetas').is(':animated')
        && $('#homeRecetas').position().left > ($('#homeRecetasWrapper').width() - $('#homeRecetas').width()) ){

        $('#homeRecetas').animate({
          left: '-=449px'
        }, 500);
      }
    });

    // Eventos para los botones del slider
    $('#btn_slide_left').click(function(e)
    {
      if( !$('#homeRecetas').is(':animated')
        && $('#homeRecetas').position().left < 0 ){

        $('#homeRecetas').animate({
          left: '+=449px'
        }, 500);
      }
    });
  });
})(jQuery);