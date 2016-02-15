var smamoBooking = {};

$('.booking-show-form').on('click',function(e){
    e.preventDefault();
    $('body').addClass('show-form');
     $('input[name="form-active"]').val('true');
    
});