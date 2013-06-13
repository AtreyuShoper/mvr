jQuery(document).ready(function($){
    
});

function getCaptchaImage(){
    jQuery.ajax({
       type: 'POST',
       url: '/instant-mvr/system/business/newcaptcha',
       success: function(data) {
           jQuery('#imgco img').first().attr('src',jQuery(data).attr('src'));
           //alert($(data).attr('src'));
       },
       error: function(data) {
        jQuery('#imgco img').before('<span style="color:red">'+jQuery(data).attr('src')+'</span>');
       }
    });
}
