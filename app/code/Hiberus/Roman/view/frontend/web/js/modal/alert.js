define([
    'jquery',
    'Magento_Ui/js/modal/alert'
], function($, alert ) { // Variable that represents the `alert` function

    alert({
        title: $.mage.__('Mayor nota'),
        content: $.mage.__('mark'),
        actions: {
            always: function(){
                $('[id="alerta"]')
                    .on("click")
            }
        }
    });

});

$("#alerta").on('click',function(){
    $("#mark").alert("");
});
