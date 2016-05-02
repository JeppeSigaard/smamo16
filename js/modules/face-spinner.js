if($('.contact-face-spinner').length){
    
    var fs_nav_buffer = false,
        fs_top = $('.face-spinner-top'),
        fs_middle = $('.face-spinner-middle'),
        fs_bottom = $('.face-spinner-bottom'),
        flickitySettings = {
            wrapAround : true,
            pageDots : false,
            prevNextButtons : false,
        };
    
    function FScheckForMatch(){
        
        var top = $('.face-spinner-top .slice.is-selected').attr('data-slice-id'),
            middle = $('.face-spinner-middle .slice.is-selected').attr('data-slice-id'),
            bottom = $('.face-spinner-bottom .slice.is-selected').attr('data-slice-id'),
            post = $('.face-spinner-top .slice.is-selected').attr('data-post-id');
        
        if(top === middle && middle === bottom){
            $('.contact-face-spinner').addClass('match');
            
            $('.contact-spinner').addClass('show-article').on('click',function(e){
                if($(e.target).is('article.visible, article.visible *')){
                    $('.contact-spinner').removeClass('show-article');
                }
                
            });
            
            $('.contact-spinner article.visible').removeClass('visible').addClass('hidden');
            $('.contact-spinner article.post-'+post).removeClass('hidden').addClass('visible')
            
            // delay navigation 
            fs_nav_buffer = true;
            setTimeout(function(){
                fs_nav_buffer = false;
            },100);
        }
        
        else{
            $('.contact-face-spinner').removeClass('match');
        }
    }
    

    
    
    fs_top.flickity(flickitySettings).on('cellSelect',function(){FScheckForMatch()});
    
    //flickitySettings.initialIndex = 1;
    fs_middle.flickity(flickitySettings).on('cellSelect',function(){FScheckForMatch()});
    
    //flickitySettings.initialIndex = 2;
    fs_bottom.flickity(flickitySettings).on('cellSelect',function(){FScheckForMatch()});
    
    
    $('.face-spinner-controls').on('click',function(e){
        e.preventDefault();
        var t = $(e.target);
        
        if(t.is('.spin-top, .spin-top *')){
            fs_top.flickity('next');
        }
        
        if(t.is('.spin-middle, .spin-middle *')){
            fs_middle.flickity('next');
        }
        
        if(t.is('.spin-bottom, .spin-bottom *')){
            fs_bottom.flickity('next');
        }
        
    });
    
    $('.contact-face-spinner').on('click',function(e){
        if($(this).hasClass('match') && !fs_nav_buffer){
            var t = $(e.target);
            if(!t.is('.face-spinner-controls, .face-spinner-controls *')){
                
                var path = $(this).find('.slice.is-selected').attr('data-slice-url');
                window.location.href = path;
                
            }
        }
    });
}