define(['jquery'], function($){
    "use strict";
    return function btnDisplay(btn,div)
    {
        $(btn).click(function(){
            $(div).slideToggle();
        });
    }
});
