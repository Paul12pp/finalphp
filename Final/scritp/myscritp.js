$(document).ready(function() {
    $('.categoria').change(function() {
        dropdown = $('.categoria').val();
 
        if (dropdown == 'bc')
        {
           $('.bici').show();
        }else{
          $(".bici").hide();
        }
        //componente
        if(dropdown == 'cm')
        {
          $('.compo').show();
        }else{
          $(".compo").hide();
        }
        //servicio
        if (dropdown == 'cv')
        {
           $('.servi').show();
        }else{
          $(".servi").hide();
        }
        //accesorio
        if (dropdown == 'ac')
        {
           $('.acceso').show();
        }else{
          $(".acceso").hide();
        }
    });
    $('.bicicleta').change(function() {
        dropdown = $('.bicicleta').val();
 
        if (dropdown !=null && dropdown !='0')
        {
           $('.sigui').show();
        }else{
          $(".sigui").hide();
        }
    });
    $('.accesorio').change(function() {
        dropdown = $('.accesorio').val();
 
        if (dropdown !=null && dropdown !='0')
        {
           $('.sigui').show();
        }else{
          $(".sigui").hide();
        }
    });
    $('.servicio').change(function() {
        dropdown = $('.servicio').val();
 
        if (dropdown !=null && dropdown !='0')
        {
           $('.sigui').show();
        }else{
          $(".sigui").hide();
        }
    });
    $('.componente').change(function() {
        dropdown = $('.componente').val();
 
        if (dropdown !=null && dropdown !='0')
        {
           $('.sigui').show();
        }else{
          $(".sigui").hide();
        }
    });
});

function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("nav-link");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        //document.getElementById(cityName).style.display = "show";
        evt.currentTarget.className += " active";
}

function validar() {
      return confirm("Esta informacion se eliminara permanentemente, estas seguro?")
    }
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
      jQuery(function ($) {
          $("#contenido").shieldEditor({
              height: 260
          });
      }); 