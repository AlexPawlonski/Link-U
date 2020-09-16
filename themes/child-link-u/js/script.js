jQuery(document).ready(function($){ 
     /*---------------menu---------------*/
    var open;
    $('#menuB').click(function() {
         if(!open){
             $('#menuPrincipal').stop().slideDown();
             open = true;
         }else{
             $('#menuPrincipal').stop().slideUp();
             open = false;
         }         
    });
    $(window).resize(function () { 
         if($(window).width()> 1200){
             $("#menuPrincipal").css({"display":"block"})
         }
         if($(window).width()< 1200){
             $("#menuPrincipal").css({"display":"none"})
         }
    });   
});