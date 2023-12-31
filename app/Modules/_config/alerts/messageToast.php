
<?php
// dd($this);
?>
<?php if(!empty($this->data['message'])) : ?>
    <span hidden id="message"><?= json_encode($this->data['message'], JSON_UNESCAPED_UNICODE); ?></span>
    <div class="fixed top-5 right-5 min-w-[300px]">
        <?php if(!empty($this->data['message']['success'])) : ?>
            <div id="toast-success" class="opacity-0 ease-in-out duration-700 flex gap-3 items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-green-300 rounded-lg shadow dark:text-gray-400 dark:bg-green-900" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-700 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal"><?= $this->data['message']['success'] ?></div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-meuBranco text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-meuBranco dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
            </div>
        <?php endif; ?>
        <?php if(!empty($this->data['message']['error'])) : ?>
            <div id="toast-danger" class="opacity-0 ease-in-out duration-700 flex gap-3 items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-red-300 rounded-lg shadow dark:text-gray-400 dark:bg-red-900" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-700 dark:text-red-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ml-3 text-sm font-normal"><?= $this->data['message']['error'] ?></div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-meuBranco text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-meuBranco dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
        <?php if(!empty($this->data['message']['info'])) : ?>
            <div id="toast-warning" class="opacity-0 ease-in-out duration-700 flex gap-3 items-center min-w-full max-w-xs p-4 text-gray-500 bg-orange-300 rounded-lg shadow dark:text-gray-400 dark:bg-orange-900" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                    </svg>
                    <span class="sr-only">Warning icon</span>
                </div>
                <div class="ml-3 text-sm font-normal"><?= $this->data['message']['info'] ?></div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-meuBranco text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-meuBranco dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>

<script>
    const messageEl = document.getElementById('message').innerText;

    const toastSuccess = document.getElementById('toast-success');
    const toastDanger = document.getElementById('toast-danger');
    const toastWarning = document.getElementById('toast-warning');

    const messagesArray = Object.entries(JSON.parse(messageEl))

    let temp = 3000
    for (const [key, value] of messagesArray) {
        if (key === 'success') {
            const tSuccess = new Dismiss(toastSuccess)
            setTimeout(() => toastSuccess.style.opacity = '1', 50)
            setTimeout(() => tSuccess.hide(), temp)
        }
        if (key === 'error') {
            const tDanger = new Dismiss(toastDanger);
            setTimeout(() => toastDanger.style.opacity = '1', 50)
            setTimeout(() => tDanger.hide(), temp)
        }
        if (key === 'info') {
            const tWarning = new Dismiss(toastWarning);
            setTimeout(() => toastWarning.style.opacity = '1', 50)
            setTimeout(() => tWarning.hide(), temp)
        }
        temp += 2000
    }

</script>
