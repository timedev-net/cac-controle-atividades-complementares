<?= $this->extend('_config/Layout/mainLayout'); ?>
<?= $this->section('conteudo'); ?>

  <div class="xl:mx-[210px] m-4">
    <p class="dark:text-meuBranco text-3xl text-center font-semibold pb-4">Tipos de Atividade</p>
    <div class="relative shadow-md sm:rounded-lg">
      <div class="p-4 flex items-center justify-between pb-4 bg-meuBranco dark:bg-meuTema-800">
        <div>
          <a href="/tp-atividade/novo" id="button1" class="inline-flex items-center text-meuCinza-400 bg-meuBranco border border-meuCinza-300 focus:outline-none hover:bg-meuTema-100 focus:ring-4 focus:ring-meuCinza-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-meuTema-700 dark:text-meuCinza-400 dark:border-meuCinza-600 dark:hover:bg-meuTema-600 dark:hover:border-meuCinza-600 dark:focus:ring-meuCinza-700" type="button">
            Cadastrar Novo Tipo
          </a>
        </div>
        <label for="table-search" class="sr-only">Pesquisa</label>
        <form action="?search=" class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-meuCinza-400 dark:text-meuCinza-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
          </div>
          <input name="search" value="<?= empty($_GET['search']) ? '' : $_GET['search'] ?>" type="text" class="block p-2 pl-10 text-sm text-meuCinza-900 border border-meuCinza-300 rounded-lg w-80 bg-meuTema-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-meuTema-700 dark:border-meuCinza-600 dark:placeholder-meuCinza-400 dark:text-meuBranco dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pesquisar">
        </form>
      </div>
      <div class="overflow-x-auto ">
        <table class="w-full text-sm text-left text-meuCinza-400 dark:text-meuCinza-400">
          <thead class="text-xs text-meuCinza-700 uppercase bg-meuTema-50 dark:bg-meuTema-700 dark:text-meuCinza-400">
            <tr>
              <th scope="col" class="px-6 py-3">
                #
              </th>
              <th scope="col" class="px-6 py-3">
                Tipo da Atividade
              </th>
              <th scope="col" class="px-6 py-3">
                Curricular
              </th>
              <th scope="col" class="px-6 py-3">
                Limite de Horas
              </th>
              <th scope="col" class="px-6 py-3">
                Ações
              </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->data['data'] as $i => $e) : ?>
              <tr class="bg-meuBranco border-b dark:bg-meuTema-800 dark:border-meuCinza-700 hover:bg-meuTema-50 dark:hover:bg-meuTema-600">
                <td class="w-4 px-4"><?= $e->id; ?></td>
                <td scope="row" class="flex items-center px-6 py-4 text-meuCinza-900 meuBrancospace-nowrap dark:text-meuBranco">
                  <div class="pl-3">
                    <div class="text-base font-semibold"><?= $e->nome; ?></div>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <?= $e->curricular == "t"? "sim":"não"; ?>
                </td>
                <td class="px-6 py-4">
                    <?= $e->limite_hora; ?>
                </td>
                <td class="px-6 py-4">
                  <div class="flex gap-x-4">
                    <a href="/tp-atividade/editar/<?= $e->id; ?>" data-tooltip-target="editar" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><svg class="w-[18px] h-[18px] text-meuCinza-800 dark:text-meuBranco" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.109 17H1v-2a4 4 0 0 1 4-4h.87M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm7.95 2.55a2 2 0 0 1 0 2.829l-6.364 6.364-3.536.707.707-3.536 6.364-6.364a2 2 0 0 1 2.829 0Z" />
                      </svg></a>
                    <div id="editar" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-meuBranco transition-opacity duration-300 bg-meuTema-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-meuTema-700">
                      Editar
                      <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <a onclick="excluir(<?= $e->id; ?>)" data-tooltip-target="excluir" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><svg class="w-[18px] h-[18px] text-meuCinza-800 dark:text-meuBranco" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                      </svg></a>
                    <div id="excluir" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-meuBranco transition-opacity duration-300 bg-meuTema-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-meuTema-700">
                      Excluir
                      <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </td>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>
      <nav class="flex items-center justify-between p-4 pt-4 bg-meuBranco dark:bg-meuTema-900" aria-label="Table navigation">
        <span class="text-sm font-normal text-meuCinza-400 dark:text-meuCinza-400">Exibindo a página <span class="font-semibold text-meuCinza-900 dark:text-meuBranco"><?= $page; ?></span> de <span class="font-semibold text-meuCinza-900 dark:text-meuBranco"><?= $totalPages; ?></span></span>
        <span class="text-sm font-normal text-meuCinza-400 dark:text-meuCinza-400">Total de registros <span class="font-semibold text-meuCinza-900 dark:text-meuBranco"><?= $totalItens; ?></span></span>
        <ul class="inline-flex -space-x-px text-sm h-8">
          <li>
            <a href="?page=<?= $page > 1 ? $page - 1 : 1; ?>" class="flex items-center justify-center px-3 h-8 ml-0 leading-tight text-meuCinza-400 bg-meuBranco border border-meuCinza-300 rounded-l-lg hover:bg-meuTema-100 hover:text-meuCinza-700 dark:bg-meuTema-800 dark:border-meuCinza-700 dark:text-meuCinza-400 dark:hover:bg-meuTema-700 dark:hover:text-meuBranco">Anterior</a>
          </li>
          <li>
            <a href="?page=<?= $page + 1; ?>" class="flex items-center justify-center px-3 h-8 leading-tight text-meuCinza-400 bg-meuBranco border border-meuCinza-300 rounded-r-lg hover:bg-meuTema-100 hover:text-meuCinza-700 dark:bg-meuTema-800 dark:border-meuCinza-700 dark:text-meuCinza-400 dark:hover:bg-meuTema-700 dark:hover:text-meuBranco">Proxima</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>

  <?= $this->include('_config/alerts/messageToast'); ?>
  <?= $this->include('_config/alerts/confirmDeleteModal'); ?>

  <script>
    let id;
    function excluir(param) {
      id = param
    }
    function confirmDelete() {
      window.open(`/tp-atividade/deletar/${id}`, "_self")
    }
  </script>

<?= $this->endSection(); ?>