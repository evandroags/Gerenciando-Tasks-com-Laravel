/*************************** msg notificação ***************************/
$(document).ready(function () {
    $("#notificacao").hide();
    $("#notificacao").slideDown(1000);
    setTimeout(function () {
        $('#notificacao').slideUp('slow');
    }, 6000);
});