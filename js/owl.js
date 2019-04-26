//default settings:
autoplay:false
autoplayTimeout:5000
autoplayHoverPause:false

var owl = $('.owl-carousel');
owl.owlCarousel({
    items:4,
    loop:true,
    margin:8,
    autoplay:true,
    autoplayTimeout:1000,
    autoplayHoverPause:true
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})