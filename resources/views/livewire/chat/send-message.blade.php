<div>
    @if ($selectedConversation)
        <form wire:submit.prevent="sendMessage" action="" class="p-4">
            <div class="flex items-center bg-white p-2 rounded-lg">
                <input wire:model.live="message" type="text" id="sendMessage"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                    placeholder="Escriba un Mensaje...">
                <button type="submit"
                    class="ml-2 py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300 focus:outline-none"
                    id="send-btn">Enviar</button>
            </div>
        </form>
    @endif
</div>

<script>
    function waitForButtonToBeAvailable(elementId, interval = 100, maxAttempts = 40) {
        return new Promise((resolve, reject) => {
            let attempts = 0;

            function checkElement() {
                const element = document.getElementById(elementId);
                if (element) {
                    resolve(element);

                } else {
                    attempts++;
                    if (attempts >= maxAttempts) {
                        reject(new Error(`Element with id '${elementId}' not found.`));

                    } else {
                        setTimeout(checkElement, interval);
                    }
                }
            }

            checkElement();
        });
    }

    waitForButtonToBeAvailable('send-btn')
        .then((sendBtn) => {
            sendBtn.addEventListener('click', () => {
                setTimeout(() => {
                    const inputMessage = document.getElementById('sendMessage');
                    inputMessage.value = '';
                }, 300);
            })
        })
        .catch((error) => {
            console.error(error);
        });
</script>
