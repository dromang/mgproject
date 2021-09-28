define(['jquery'], function($){
    "use strict";
    return function alertHighestMark(btn)
    {
        $(btn).click(function(){
            alert('La nota mayor de la clase es: ' + hMark);
        })
    }
});
