<div>
    <ul class="bg-white shadow-md rounded-lg w-3/4 mx-auto mt-8">
        @foreach ($users as $user)
            <li
                class="border-b border-gray-200 p-4 hover:bg-gray-100 cursor-pointer transition duration-300 ease-in-out">
                {{ $user->name }}
                <button wire:click="checkConversation({{ $user->id }})">Iniciar una Conversación</button>
            </li>
        @endforeach
    </ul>

    @if (session()->has('message'))
        <div class="mt-4 text-green-600">
            {{ session('message') }}
        </div>
    @endif
</div>
