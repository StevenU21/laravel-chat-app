<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-4 col-md-5 col-12">
            @livewire('chat.chat-list')
        </div>

        <div class="col-lg-8 col-md-7 col-12">
            <div class="card blur shadow-blur max-height-vh-70">
                <!-- Contenedor de chatbox y send-message -->
                @livewire('chat.chatbox')
                @livewire('chat.send-message')
            </div>
        </div>
    </div>
</div>
