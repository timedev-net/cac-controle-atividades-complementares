<?php echo $this->extend('_config/Layout/mainLayout'); ?>
<?php echo $this->section('conteudo'); ?>

<section class="mb-4 bg-center bg-no-repeat bg-[url('/assets/conference.jpg')] bg-gray-700 bg-blend-multiply">
    <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-meuBranco md:text-5xl lg:text-6xl">A melhor forma de manter o controle</h1>
        <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Com o uso da tecnologia o sistema CAC soluciona de uma vez por todas a dificuldade de análise das horas complementares, melhora o controle e otimiza o seu tempo.<br/>É a inovação agregando valor e impulsionar o crescimento.</p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
            <a href="/alunos" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-meuBranco rounded-lg bg-meuTema-700 hover:bg-meuTema-800 focus:ring-4 focus:ring-meuTema-300 dark:focus:ring-meuTema-900">
                Iniciar
                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
            <a href="/documentacao" class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 text-base font-medium text-center text-meuBranco rounded-lg border border-meuBranco hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                Saber mais
            </a>
        </div>
    </div>
</section>


<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script>

</script>
<?php echo $this->endSection(); ?>