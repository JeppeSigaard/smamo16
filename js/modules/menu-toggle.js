$('.hamburger').on('click',function(e){
    e.preventDefault();
    var b = $('body');
    if(b.hasClass('show-menu')){
        b.removeClass('show-menu');
    }
    else if(b.hasClass('show-form')){
        b.removeClass('show-form');
        $('input[name="form-active"]').val('false');
    }
    else{
        b.addClass('show-menu');
    }
});