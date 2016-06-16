function slideSwitch() {
    var $active = $('#slideshow .active');
    var $next = $active.next();    
    
   

    $next.addClass('active');
    
}

$(function() {
    setInterval( "slideSwitch()", 5000 );
});

function slideSwitch() {
    var $active = $('#slideshow .active');
    var $next = $active.next();

    $active.addClass('last-active');
        
    $active.removeClass('active');
    
    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 5000 );
});