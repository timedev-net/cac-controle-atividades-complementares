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
        <input name="search" value="<?= empty($_GET['search']) ? '' : $_GET['search'] ?>" type="text" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pesquisar">
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
        <?php foreach ($data as $i => $e) : ?>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="w-4 px-4"><?= $e->id; ?></td>
            <td scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
              <div class="pl-3">
                <div class="text-base font-semibold"><?= $e->nome; ?></div>
                <div class="font-normal text-gray-500"><?= $e->email; ?></div>
              </div>
            </td>
            <td class="px-6 py-4">
              <?= $e->matricula_suap; ?>
            </td>
            <td class="px-6 py-4">
              <div class="flex items-center">
                <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Concluído
              </div>
            </td>
            <td class="px-6 py-4">
              <div class="flex gap-x-4">
                <a href="/aluno/editar/<?= $e->id; ?>" data-tooltip-target="editar" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><svg class="w-[18px] h-[18px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.109 17H1v-2a4 4 0 0 1 4-4h.87M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm7.95 2.55a2 2 0 0 1 0 2.829l-6.364 6.364-3.536.707.707-3.536 6.364-6.364a2 2 0 0 1 2.829 0Z" />
                  </svg></a>
                <div id="editar" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                  Editar Aluno
                  <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <a onclick="excluir(<?= $e->id; ?>)" data-tooltip-target="excluir" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><svg class="w-[18px] h-[18px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                  </svg></a>
                <div id="excluir" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                  Excluir Aluno
                  <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
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
            <div class="flex">
              <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><svg class="w-[15px] h-[15px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                  <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                  <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                </svg></a>

              <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><svg class="w-[15px] h-[15px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                </svg></a>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <nav class="flex items-center justify-between p-4 pt-4 bg-white dark:bg-gray-900" aria-label="Table navigation">
      <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Exibindo a página <span class="font-semibold text-gray-900 dark:text-white"><?= $page; ?></span> de <span class="font-semibold text-gray-900 dark:text-white"><?= $totalPages; ?></span></span>
      <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Total de registros <span class="font-semibold text-gray-900 dark:text-white"><?= $totalItens; ?></span></span>
      <ul class="inline-flex -space-x-px text-sm h-8">
        <li>
          <a href="?page=<?= $page > 1 ? $page - 1 : 1; ?>" class="flex items-center justify-center px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Anterior</a>
        </li>
        <li>
          <a href="?page=<?= $page + 1; ?>" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Proxima</a>
        </li>
      </ul>
    </nav>
  </div>
</div>

<div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-md max-h-full">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
      </button>
      <div class="p-6 text-center">
        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Tem certeza de que deseja excluir este registro?</h3>
        <button onclick="confirmExclusao()" data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
          Excluir
        </button>
        <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script>
  let idAluno;

  function excluir(id) {
    idAluno = id
  }

  function confirmExclusao() {
    window.open(`/aluno/deletar/${idAluno}`,"_self")
  }
</script>
<?php echo $this->endSection(); ?>