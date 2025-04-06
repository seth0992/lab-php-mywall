$(function() {
    // Animación para los mensajes de alerta
    $('.alert').fadeIn('slow').delay(5000).fadeOut('slow');

        // Contador de caracteres para el área de texto
        $('#txt_post').on('input', function() {
            const maxLength = 500;
            const currentLength = $(this).val().length;
            
            if (!$('#char_counter').length) {
                $('#post_box').append('<div id="char_counter" class="char-counter"></div>');
            }
            
            const remaining = maxLength - currentLength;
            
            if (remaining <= 50) {
                $('#char_counter').addClass('warning');
            } else {
                $('#char_counter').removeClass('warning');
            }
            
            $('#char_counter').text(`Caracteres restantes: ${remaining}`);
            
            if (currentLength > maxLength) {
                $(this).val($(this).val().substring(0, maxLength));
            }
        });

    // Scroll automático al último post después de publicar
    if (window.location.href.indexOf('?posted=true') > -1) {
        $('#main_panel').scrollTop($('#main_panel')[0].scrollHeight);
    }
});