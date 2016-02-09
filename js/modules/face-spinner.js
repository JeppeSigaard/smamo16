if($('.contact-face-spinner').length){
    
    var fs_top = $('.face-spinner-top'),
        fs_middle = $('.face-spinner-middle'),
        fs_bottom = $('.face-spinner-bottom'),
        flickitySettings = {
            wrapAround : true,
            pageDots : false,
            prevNextButtons : false,
        },
        faceSpinnerData = {
            default : {
                title : $('.contact-spinner .contact-info .info-title').html(),
                description : $('.contact-spinner .contact-info .info-description').html(),
                email : $('.contact-spinner .contact-info .info-email').html(),
                phone : $('.contact-spinner .contact-info .info-phone').html(),
            }   
        };
    
    function FScacheData (id){
        $.ajax({
            url : ajaxURL,
            type : 'POST',
            data : {action: 'get_post', id: id},
            dataType : 'json',
            success : function(response){
                
                faceSpinnerData[id] = {
                    title : response.success.meta.name,
                    description : response.success.post.post_content,
                    email : response.success.meta.email,
                    phone : response.success.meta.phone,
                };
            },
        });
    }
    
    function FScheckForMatch(){
        
        var top = $('.face-spinner-top .slice.is-selected').attr('data-slice-id'),
            middle = $('.face-spinner-middle .slice.is-selected').attr('data-slice-id'),
            bottom = $('.face-spinner-bottom .slice.is-selected').attr('data-slice-id');
        
        if(top === middle && middle === bottom){
            $('.contact-face-spinner').addClass('match');
            FSfetcMatchInfo(top);
        }
        
        else{
            $('.contact-face-spinner').removeClass('match');
        }
    }
    
    function FSfetcMatchInfo(id){
        
        var container = $('.contact-spinner .contact-info');
        container.find('.info-title').html(faceSpinnerData[id].title);
        container.find('.info-email').attr('href','mailto:'+faceSpinnerData[id].email).html(faceSpinnerData[id].email);
        container.find('.info-phone').attr('href','tel:'+faceSpinnerData[id].phone).html(faceSpinnerData[id].phone);
    }
    
    
    fs_middle.html(fs_top.html());
    fs_bottom.html(fs_top.html());
    
    fs_top.flickity(flickitySettings).on('cellSelect',function(){FScheckForMatch()});
    
    flickitySettings.initialIndex = 1;
    fs_middle.flickity(flickitySettings).on('cellSelect',function(){FScheckForMatch()});
    
    flickitySettings.initialIndex = 2;
    fs_bottom.flickity(flickitySettings).on('cellSelect',function(){FScheckForMatch()});
    
    $('.contact-face-spinner .slice.is-selected').each(function(){
        FScacheData($(this).attr('data-slice-id'));
    });
    
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
        if($(this).hasClass('match')){
            var t = $(e.target);
            if(!t.is('.face-spinner-controls, .face-spinner-controls *')){
                
                var path = $(this).find('.slice.is-selected').attr('data-slice-url');
                window.location.href = path;
                
            }
        }
    });
}