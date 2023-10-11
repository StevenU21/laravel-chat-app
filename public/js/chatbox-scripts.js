document.addEventListener('livewire:load', function () {
    // Escuchar el evento de desplazamiento en el componente de Livewire
    Livewire.on('scrollToTop', function () {
        var top = document.querySelector('.chatbox_body').scrollTop;
        if (top === 0) {
            Livewire.dispatch('loadmore');
        }
    });

    // Escuchar el evento para actualizar la altura
    Livewire.on('updateHeight', function (newHeight) {
        var oldHeight = document.querySelector('.chatbox_body').scrollHeight;
        var chatboxBody = document.querySelector('.chatbox_body');
        chatboxBody.scrollTop = newHeight - oldHeight;
        Livewire.dispatch('updateHeight', { height: newHeight });
    });

    // Escuchar el evento para desplazar hacia abajo
    Livewire.on('scrollToBottom', function () {
        var chatboxBody = document.querySelector('.chatbox_body');
        chatboxBody.scrollTop = chatboxBody.scrollHeight;
    });

    // Escuchar el evento para reiniciar el componente
    Livewire.on('resetComponent', function () {
        Livewire.dispatch('resetComponent');
    });

    // Escuchar el evento para marcar mensajes como leídos
    Livewire.on('markMessageAsRead', function () {
        var statusTicks = document.querySelectorAll('.status_tick');
        statusTicks.forEach(function (element) {
            element.classList.remove('bi', 'bi-check2');
            element.classList.add('bi-check2-all', 'text-primary');
        });
    });
});
