$('.hero-banner').on('click',function(e){
    
    e.preventDefault();

    var t = $(e.target),
        activeSlide = $('.hero-banner-item.active'),
        active = activeSlide.index() + 1,
        slideTotal = $('.hero-banner-item').length,
        activeDot = $('.hero-banner-dots .active');

    if(t.is('.nav-left, .nav-left *')){
         
        if(active === 1){
            activeSlide.removeClass('active');
            activeDot.removeClass('active');
            $('.hero-banner-item:nth-child('+slideTotal+')').addClass('active');
            $('.hero-banner-dots li:nth-child('+slideTotal+')').addClass('active');
        }
        else{
            activeSlide.removeClass('active').prev().addClass('active');
            activeDot.removeClass('active').prev().addClass('active');
        }
    }
    
    if(t.is('.nav-right, .nav-right *')){
           
        if(active === slideTotal){
            activeSlide.removeClass('active');
            activeDot.removeClass('active');
            $('.hero-banner-item:nth-child(1)').addClass('active');
            $('.hero-banner-dots li:nth-child(1)').addClass('active');
        }
        else{
            activeSlide.removeClass('active').next().addClass('active');
            activeDot.removeClass('active').next().addClass('active');
        }    
    }
    
    if(t.is('.dot a')){
        
        var p = t.parent('li').index() + 1;
        
        activeSlide.removeClass('active');
        activeDot.removeClass('active');
        
        $('.hero-banner-item:nth-child('+p+')').addClass('active');
        $('.hero-banner-dots li:nth-child('+p+')').addClass('active'); 
    }
    
    if(t.is('.hero-banner-pages a, .hero-banner-item-title a')){
        window.location.href = t.attr('href');
    }

});