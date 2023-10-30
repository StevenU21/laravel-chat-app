<div class="card-footer d-block">
    @if ($selectedConversation)
        <form wire:submit.prevent="sendMessage" class="align-items-center">
            <div class="d-flex">
                <div class="input-group">
                    <input wire:model="message" type="text" id="sendMessage" class="form-control"
                        placeholder="Escribe Algo..." aria-label="Message example input">
                </div>
                <button type="submit" class="btn bg-gradient-primary mb-0 ms-2" id="send-btn">
                    <i class="ni ni-send"></i>
                </button>
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
