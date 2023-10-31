<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-4 col-md-5 col-12">
            @livewire('chat.chat-list')
        </div>

        <div class="col-lg-8 col-md-7 col-12">
            <!-- Contenedor de chatbox y send-message -->
            @livewire('chat.chatbox')
        </div>
        @livewire('chat.send-message')
    </div>
</div>

{{-- <div class="container mt-4">
    <div class="col-12 col-sm-4 col-lg-4">
        <div class="p-4 bg-indigo text-white">
            @livewire('chat.chat-list')
        </div>
        <div class="col-12 col-sm-8 col-lg-8">
            <div class="p-4 bg-white">
                @livewire('chat.chatbox')
                @livewire('chat.send-message')
            </div>
        </div>
    </div>
</div> --}}
