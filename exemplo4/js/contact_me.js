$(function() {

    $("input,textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // Mensagens ou eventos de erro adicionais
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // Evitar comportamento de envio padrão
            // Obter valores do FORMULÁRIO
            var name = $("input#name").val();
            var email = $("input#email").val();
            var message = $("textarea#message").val();
            var firstName = name; // Para mensagem de sucesso / falha
            // Verifique se há espaço em branco no nome para mensagem de sucesso / falha
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: "././mail/contact_me.php",
                type: "POST",
                data: {
                    name: name,
                    email: email,
                    message: message
                },
                cache: false,
                success: function() {
                    // Mensagem de sucesso
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Sua mensagem foi enviada. </strong>");
                    $('#success > .alert-success')
                        .append('</div>');

                    //  Limpe todos os campos
                    $('#contactForm').trigger("reset");
                },
                error: function() {
                    // Mensagem de falha
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Sorry " + firstName + ", Parece que meu servidor de correio não está respondendo. Por favor, tente novamente mais tarde!");
                    $('#success > .alert-danger').append('</div>');
                    // limpe todos os campos
                    $('#contactForm').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});


/*Ao clicar em Caixas completas de falha / sucesso */
$('#name').focus(function() {
    $('#success').html('');
});
