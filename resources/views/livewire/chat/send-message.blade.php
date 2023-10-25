<div>
    @if ($selectedConversation)
        <form wire:submit.prevent="sendMessage" action="" class="p-4">
            <div class="d-flex align-items-center bg-white p-2 rounded-lg">
                <input wire:model="message" type="text" id="sendMessage"
                    class="w-100 p-2 border border-primary rounded-md focus-outline-none focus-border-primary"
                    placeholder="Escriba un Mensaje...">
                <button type="submit"
                    class="ms-2 py-2 px-4 bg-primary text-white rounded-md hover-bg-primary hover-text-white transition-300 focus-outline-none"
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
            });
        })
        .catch((error) => {
            console.error(error);
        });
</script>
