/*************************** msg notificação ***************************/
$(document).ready(function () {
    $("#notificacao").hide();
    $("#notificacao").slideDown(1000);
    setTimeout(function () {
        $('#notificacao').slideUp('slow');
    }, 6000);
});


/*************************** Checagem task ***************************/
$(document).on('click', '.checkTask', function (event) {
    var idTask = $(this).attr('id');

    if ($(this).is(':checked')) {
        idTask = idTask + '_' + 2;
    } else {
        idTask = idTask + '_' + 1;
    }
    ;

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: '',
        data: {'idTask': idTask},
        success: function (data) {
            location.reload();
        },
        error: function () {
            console.log('Erro ao gravar');
        }
    });
});

/*************************** Checagem delete ***************************/
$(document).on('click', '.verificaDelete', function (event) {
    var url = $(this).attr('id');
    var resposta = confirm("Deseja realmente deletar esta task?!");
    if (resposta == true) {
        window.location.href = url;
    }
});

