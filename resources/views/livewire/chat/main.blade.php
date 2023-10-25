<div class="container mt-4">
    <div class="row">
        <div class="col-12 col-sm-4 col-lg-4">
            <div class="p-4 bg-gray-200">
                @livewire('chat.chat-list')
            </div>
        </div>
        <div class="col-12 col-sm-8 col-lg-8">
            <div class="p-4 bg-white">
                @livewire('chat.chatbox')
                @livewire('chat.send-message')
            </div>
        </div>
    </div>
</div>

<!-- Scripts para escuchar y despachar eventos con Livewire 3 -->
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

        @this.on('resize', (event) => {
            if (window.innerWidth > 768) {
                document.querySelector('.w-1/4').classList.remove('hidden');
                document.querySelector('.w-3/4').classList.remove('hidden');
            }
        });

        @this.on('clickReturn', (event) => {
            document.querySelector('.w-1/4').classList.remove('hidden');
            document.querySelector('.w-3/4').classList.add('hidden');
        });
    });
</script>
