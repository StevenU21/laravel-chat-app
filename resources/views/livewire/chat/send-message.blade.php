<div>
    @if ($selectedConversation)
        <form wire:submit.prevent="sendMessage" action="" class="p-4">
            <div class="flex items-center bg-white p-2 rounded-lg">
                <input wire:model="message" type="text" id="sendMessage" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" placeholder="Escriba un Mensaje...">
                <button type="submit" class="ml-2 py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300 focus:outline-none">Enviar</button>
            </div>
        </form>
    @endif
</div>
