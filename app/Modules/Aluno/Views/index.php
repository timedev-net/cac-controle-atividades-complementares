<?php echo $this->extend('_config/Layout/mainLayout'); ?>
<?php echo $this->section('conteudo');
extract($this->data);
?>
<div class="xl:mx-[210px] m-4">
    <p class=" text-3xl text-center font-semibold pb-4">Lista de Alunos</p>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="p-4 flex items-center justify-between pb-4 bg-white dark:bg-gray-900">
            <div>
                <a href="/aluno/novo" id="button1" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                    Cadastrar Novo Aluno
                </a>
            </div>
            <label for="table-search" class="sr-only">Pesquisa</label>
            <form action="?search=" class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input name="search" value="<?= empty($_GET['search'])? '': $_GET['search'] ?>" type="text" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pesquisar">
            </form>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nome do Aluno
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Matrícula SUAP
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $e) : ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4"><?= $e->id; ?></td>
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="pl-3">
                                <div class="text-base font-semibold"><?= $e->nome; ?></div>
                                <div class="font-normal text-gray-500"><?= $e->email; ?></div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            <?= $e->matricula_suap; ?>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Concluído
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <a href="/aluno/editar/<?= $e->id; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">23</td>
                    <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="pl-3">
                            <div class="text-base font-semibold">Leslie Livingston</div>
                            <div class="font-normal text-gray-500">leslie@flowbite.com</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        SEO Specialist
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> Pendente
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                    </td>
                </tr>
            </tbody>

        </table>
        <nav class="flex items-center justify-between p-4 pt-4 bg-white dark:bg-gray-900" aria-label="Table navigation">
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Exibindo a página <span class="font-semibold text-gray-900 dark:text-white"><?= $page; ?></span> de <span class="font-semibold text-gray-900 dark:text-white"><?= $totalPages; ?></span></span>
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Total de registros <span class="font-semibold text-gray-900 dark:text-white"><?= $totalItens; ?></span></span>
            <ul class="inline-flex -space-x-px text-sm h-8">
                <li>
                    <a href="?page=<?= $page > 1 ? $page-1 : 1; ?>" class="flex items-center justify-center px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Anterior</a>
                </li>
                <li>
                    <a href="?page=<?= $page+1; ?>" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Proxima</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script>

</script>
<?php echo $this->endSection(); ?>