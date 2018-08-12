$(document).ready(function() {
  $('.tipito').change(function() {
      dropdown = $('.tipito').val();
 
      if (dropdown == 'script')
      {
        $('.codigo').show();
      }else{
        $(".codigo").hide();
      }

      if(dropdown == 'imagen')
      {
        $('.imagen').show();
      }else
      {
        $(".imagen").hide();
      }
  });
});