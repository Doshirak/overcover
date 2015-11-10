$(document).ready(function(){
    $('.dateForm').each(function(index, form){
        new Pikaday({field : form, format: "YYYY-MM-DD", minDate: new Date()});
    });
});
