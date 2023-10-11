<div class="flex">
    <div class="w-1/4">
        <div class="p-4 bg-gray-200">
            @livewire('chat.chat-list')
        </div>
    </div>
    <div class="w-3/4">
        <div class="p-4 bg-white">
            @livewire('chat.chatbox')
            @livewire('chat.send-message')
        </div>
    </div>
</div>
<!-- Scripts para escuchar y despachar eventos con Livewire 3 -->

<script>
    document.addEventListener('livewire:initialized', () => {
        @this.on('chatSelected', (event) => {
            if (window.innerWidth < 768) {
                // Utiliza las clases de Tailwind para mostrar/ocultar elementos
                document.querySelector('.w-1/4').classList.add('hidden');
                document.querySelector('.w-3/4').classList.remove('hidden');
            }
            // Ajusta el scroll
            let chatboxBody = document.querySelector('.chatbox_body');
            chatboxBody.scrollTop = chatboxBody.scrollHeight;
            let height = chatboxBody.scrollHeight;
            @this.dispatch('updateHeight', { height: height });
        });
    });
</script>

<script>
    document.addEventListener('livewire:initialized', () => {
        @this.on('resize', (event) => {
            if (window.innerWidth > 768) {
                // Utiliza las clases de Tailwind para mostrar elementos
                document.querySelector('.w-1/4').classList.remove('hidden');
                document.querySelector('.w-3/4').classList.remove('hidden');
            }
        });
    });
</script>

<script>
    document.addEventListener('livewire:initialized', () => {
        @this.on('clickReturn', (event) => {
            // Utiliza las clases de Tailwind para mostrar/ocultar elementos
            document.querySelector('.w-1/4').classList.remove('hidden');
            document.querySelector('.w-3/4').classList.add('hidden');
        });
    });
</script>

