/**
 * Created by Mayomi Dele on 04/06/2016.
 */
$(function(){
    $('#submit').click(function () {
        $('.error').remove();
        var fname = $('#fname').val();
        var fpass = $('#fpass').val();
        var error = false;

        if(fname=""){
            error = true;
            $('label[for=fname]').after('<span class="error">missing data</span>');
        }
        return false;
    })
})


// Show the first tab by default
$('.tabs-stage div').hide();
$('.tabs-stage div:first').show();
$('.tabs-nav li:first').addClass('tab-active');

// Change tab class and display content
$('.tabs-nav a').on('click', function(event){
event.preventDefault();
$('.tabs-nav li').removeClass('tab-active');
$(this).parent().addClass('tab-active');
$('.tabs-stage div').hide();
$($(this).attr('href')).show();
});

