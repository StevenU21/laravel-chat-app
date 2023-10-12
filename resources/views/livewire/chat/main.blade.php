<div class="flex flex-col sm:flex-row">
    <div class="w-full sm:w-1/4 lg:w-1/4">
        <div class="p-4 bg-gray-200">
            @livewire('chat.chat-list')
        </div>
    </div>
    <div class="w-full sm:w-3/4 lg:w-3/4">
        <div class="p-4 bg-white">
            @livewire('chat.chatbox')
            @livewire('chat.send-message')
        </div>
    </div>
</div>
<!-- Scripts para escuchar y despachar eventos con Livewire 3 -->
{{-- <script src="{{ asset('js/main.js')}}"></script> --}}
<script>
    document.addEventListener('livewire:initialized', () => {
        @this.on('chatSelected', (event) => {
            if (window.innerWidth < 768) {
                document.querySelector('.w-1/4').classList.add('hidden');
                document.querySelector('.w-3/4').classList.remove('hidden');
            }
            let chatboxBody = document.querySelector('.chatbox_body');
            chatboxBody.scrollTop = chatboxBody.scrollHeight;
            let height = chatboxBody.scrollHeight;
            @this.dispatch('updateHeight', {
                height: height
            });
        });
    });
</script>
<script>
    document.addEventListener('livewire:initialized', () => {
        @this.on('resize', (event) => {
            if (window.innerWidth > 768) {
                document.querySelector('.w-1/4').classList.remove('hidden');
                document.querySelector('.w-3/4').classList.remove('hidden');
            }
        });
    });
</script>
<script>
    document.addEventListener('livewire:initialized', () => {
        @this.on('clickReturn', (event) => {
            document.querySelector('.w-1/4').classList.remove('hidden');
            document.querySelector('.w-3/4').classList.add('hidden');
        });
    });
</script>

<script>
    window.Echo.channel('test-channel')
        .listen('TestEvent', (e) => {
            console.log('Evento de prueba recibido:', e);
        });
</script>
