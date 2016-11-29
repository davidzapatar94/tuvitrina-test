jQuery(document).ready(function($){
  $(".menu-open").click( function(){
    $("#menu-wrapper").toggleClass( "negro-transparentoso" );
  });

  $(".option-name").lettering();

  console.log($(".menu:nth-child(1)"));
});// end document ready
