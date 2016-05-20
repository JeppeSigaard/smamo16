var bookingFlick,
    smamoBooking = {
        
        form : $('.booking-form'),
        
        validateEmail : function(email) {
            var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
            return re.test(email);
        },
        
        validateSlide : function(slide){
            
            var isValid = true;
            
            // Checkbox
            var check = slide.find('input[type="checkbox"]'),
                checked = slide.find('input:checked');
            
            if(check.length > 0 && checked.length === 0){
                isValid = false;
                check.addClass('error');
            }
            
            // empty required fields
            slide.find('input[type="text"], input[type="email"]').each(function(){
                if($(this).is(':required') && !$(this).val()){
                    isValid = false;
                    $(this).addClass('error');
                }
                if($(this).hasClass('required') && !$(this).val()){
                    isValid = false; 
                    $(this).addClass('error');
                }
            });
            
            // email
            slide.find('input[type="email"]').each(function(){
                var email = $(this).val();
                if(!smamoBooking.validateEmail(email)){
                    isValid = false;
                    $(this).addClass('error');
                }
            });
            
            return isValid;
        },
        
        stayup : function(elem){
            var t = elem.val();
            if(t.length > 0){
                elem.addClass('stayup');
            }
            else{
                elem.removeClass('stayup');
            }
        },
        
        send : function(){
            var data = smamoBooking.form.serialize(),
                target = smamoBooking.form.attr('action');
            
            $.ajax({
                url : target,
                type : 'POST',
                data : data,
                dataType : 'json',
                success : function(response){
                    smamoBooking.form.removeClass('loading').find('.send-animation-container').addClass('animate');
                    setTimeout(function(){
                        smamoBooking.form.find('.form-slide-sending .form-slide-header').fadeIn(200);
                        smamoBooking.form.find('.send-animation-container').removeClass('animate');
                    },2000);
                },
            });
            
        },
        
    };

smamoBooking.form.on('click',function(e){
    var t = $(e.target),
        slide = t.parents('.form-slide');
    
    if(t.is('input')){
        t.removeClass('error');
        
    }
    
    if(t.is('input[type="checkbox"]')){
        slide.find('input[type="checkbox"]').removeClass('error');
    }
    
    if(t.is('input[type="checkbox"].check-radio')){
        var c = t.prop('checked');

        if(c === true){
            slide.find('.check-radio').prop('checked',false);
            t.prop('checked',true);
        }
        if(c === false){ /// maybe?
            t.prop('checked',true);
        }
    }
});



$('.booking-show-form').on('click', function(e){
    e.preventDefault();
    smamoBooking.form.removeAttr('data-progress');
    
    $('body').addClass('show-form');
    $('input[name="form-active"]').val('true');

    bookingFlick = $('.booking-form').flickity({
        setGallerySize: false,
        cellSelector: '.form-slide',
        pageDots: false,
        prevNextButtons: false,
        draggable: false,
    });
    var flkty = bookingFlick.data('flickity');
    smamoBooking.form.attr('data-progress',flkty.selectedIndex);
    smamoBooking.form.find('.tf input').each(function(){
        if($(this).val().length){
            $(this).addClass('stayup');
        }
    });
});


$('.form-control-left').on('click', function(e){
    e.preventDefault();

    $('.form-control-right').removeClass('disabled');  
    var flkty = bookingFlick.data('flickity');

    if(!$(this).hasClass('disabled') && flkty.selectedIndex !== 0){
        bookingFlick.flickity('previous');

    }

    if (flkty.selectedIndex === 0){
        $(this).addClass('disabled');
    }
    smamoBooking.form.attr('data-progress',flkty.selectedIndex);
});


$('.form-control-right').on('click', function(e){
    e.preventDefault();
    $('.form-control-left').removeClass('disabled');  
    var flkty = bookingFlick.data('flickity'),
        index = parseInt(flkty.selectedIndex + 1),
        slide = $('.form-slide:nth-of-type('+index+')');
        
    
    smamoBooking.form.attr('data-progress',flkty.selectedIndex);

    
    if(flkty.cells.length !== flkty.selectedIndex + 2 && smamoBooking.validateSlide(slide)){
        
        
        bookingFlick.flickity('next');



    }


    else if( smamoBooking.validateSlide(slide) ){
        bookingFlick.flickity('next');
        smamoBooking.form.addClass('loading');
        smamoBooking.send();
        
    }
    smamoBooking.form.attr('data-progress',flkty.selectedIndex);
});


$('input[type="text"], input[type="email"]').on('blur',function(e){
    smamoBooking.stayup($(this));
});