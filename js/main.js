$(document).ready(function(){
    
    
    
    
    // Konami Easter Egg Start
    var kkeys = [], konami = "38,38,40,40,37,39,37,39,66,65";
    
    $(document).keydown(function(e) {
    
      kkeys.push( e.keyCode );
    
      if ( kkeys.toString().indexOf( konami ) >= 0 ) {
    
        $(document).unbind('keydown',arguments.callee);
        
        // do something awesome
        //$("body").addClass("konami");
        document.getElementById("id1").play();  // play 
        //window.open("http://www.youtube.com/watch?v=oHg5SJYRHA0", '_blank');
      
      }
    
    });
    // Konami Easter Egg End
});
    
