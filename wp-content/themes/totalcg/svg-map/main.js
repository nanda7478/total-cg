jQuery("path, circle").hover(function(e) {
  jQuery('#info-box').css('display','block');
  jQuery('#info-box').html(jQuery(this).data('info'));
});

jQuery("path, circle").mouseleave(function(e) {
  jQuery('#info-box').css('display','none');
}); 

/*
jQuery(document).mousemove(function(e) {

// $topOffset = event.pageY-470 ;

  $('#info-box').css('top', event.pageY-470);
  $('#info-box').css('left', e.pageX-($('#info-box').width())/2);

   // console.log($topOffset);
}).mouseover();
*/

jQuery(document).ready(function(){
  jQuery(document).mousemove(function(event){ 
  //   $("span").text("X: " + event.pageX + ", Y: " + event.pageY); 
   jQuery('#info-box').css('top', event.pageY-470);
   jQuery('#info-box').css('left', event.pageX-70);

   // console.log(event.pageY);

  });
});
 


var ios = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
if(ios) {
  jQuery('a').on('click touchend', function() {
    var link = jQuery(this).attr('href');
    window.open(link,'_blank');
    return false;
  });
}





