<?php echo $this->extend('_Layout/mainLayout'); ?>




<?php echo $this->section('conteudo');?>
    <div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-lg flex items-center space-x-4">
        <h1>teste</h1>
    <div class="shrink-0">
        <img class="h-12 w-12" src="/img/logo.svg" alt="ChitChat Logo">
    </div>
    <div>
        <div class="text-xl font-medium text-black">ChitChat</div>
        <p class="text-slate-500">You have a new message!</p>
    </div>
    </div>
<?php echo $this->endSection();?>




<?php echo $this->section('scripts');?>
    <script>
        
    </script>
<?php echo $this->endSection();?>