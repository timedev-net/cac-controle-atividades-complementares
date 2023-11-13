<?= $this->extend('_config/Layout/mainLayout'); ?>
<?= $this->section('conteudo'); ?>

  <div class="xl:mx-[20px] m-4 overflow-hidden">
    <p class="dark:text-meuBranco text-3xl text-center font-semibold pb-4">Relatório de Alunos</p>
    <div class="relative shadow-md sm:rounded-lg">
      <div class="p-3 md:p-4 flex flex-wrap gap-3 items-center justify-center pb-4 bg-meuBranco dark:bg-meuTema-800">
        <label for="table-search" class="sr-only">Pesquisa</label>
        <form action="?search=" class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-meuCinza-400 dark:text-meuCinza-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
          </div>
          <input name="search" value="<?= empty($_GET['search']) ? '' : $_GET['search'] ?>" type="text" class="block p-2 pl-10 text-sm text-meuCinza-900 border border-meuCinza-300 rounded-lg w-80 bg-meuTema-50 focus:ring-meuTema-500 focus:border-meuTema-500 dark:bg-meuTema-700 dark:border-meuCinza-600 dark:placeholder-meuCinza-400 dark:text-meuBranco dark:focus:ring-meuTema-500 dark:focus:border-meuTema-500" placeholder="Pesquisar">
        </form>
      </div>
      <div class="overflow-x-auto ">
        <table class="w-full text-sm text-left text-meuCinza-400 dark:text-meuCinza-400">
          <thead class="text-xs text-meuCinza-700 uppercase bg-meuTema-50 dark:bg-meuTema-700 dark:text-meuCinza-400">
            <tr>
              <th scope="col" class="px-6 py-3 text-meuTexto-tdClaro dark:text-meuTexto-tdEscuro">#</th>
              <th scope="col" class="px-6 py-3 text-meuTexto-tdClaro dark:text-meuTexto-tdEscuro">Nome do Aluno</th>
              <th scope="col" class="px-6 py-3 text-meuTexto-tdClaro dark:text-meuTexto-tdEscuro">Matrícula SUAP</th>
              <th scope="col" class="px-6 py-3 text-meuTexto-tdClaro dark:text-meuTexto-tdEscuro">Horas Cadastradas</th>
              <th scope="col" class="px-6 py-3 text-meuTexto-tdClaro dark:text-meuTexto-tdEscuro">Ativ. Cadastradas</th>
              <th scope="col" class="px-6 py-3 text-meuTexto-tdClaro dark:text-meuTexto-tdEscuro">Total Deferidas</th>
              <th scope="col" class="px-6 py-3 text-meuTexto-tdClaro dark:text-meuTexto-tdEscuro">Tipos Curriculares Conclusos</th>
              <th scope="col" class="px-6 py-3 text-meuTexto-tdClaro dark:text-meuTexto-tdEscuro">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->data['data'] as $i => $e) : ?>

              <tr onclick="verDatalhes(<?= $e->id; ?>)" class="cursor-pointer bg-meuBranco border-b dark:bg-meuTema-800 dark:border-meuCinza-700 hover:bg-meuTema-50 dark:hover:bg-meuTema-600">
                <span id="payload-<?= $e->id; ?>" hidden class="w-4 px-4 text-meuTexto-tdClaro dark:text-meuTexto-tdEscuro"><?= isset($e->atividades_concluidas)? json_encode($e->atividades_concluidas) :''; ?></span>
                <td class="w-4 px-4 text-meuTexto-tdClaro dark:text-meuTexto-tdEscuro"><?= $e->id; ?></td>
                <td scope="row" class="flex items-center px-6 py-4 text-meuCinza-900 meuBrancospace-nowrap dark:text-meuBranco">
                  <div class="pl-3">
                    <div class="text-base font-semibold"><?= $e->nome; ?></div>
                    <div class="font-normal text-meuCinza-400"><?= $e->email; ?></div>
                  </div>
                </td>
                <td class="px-6 py-4 text-meuTexto-tdClaro dark:text-meuTexto-tdEscuro"><?= $e->matricula_suap; ?></td>
                <td class="px-6 py-4">
                  <span class="text-meuTexto-tdClaro dark:text-meuTexto-tdEscuro text-sm font-medium inline-flex items-center px-2.5 py-0.5 mr-2">
                    <svg class="w-3 h-3 mr-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                    </svg>
                    <?= $e->qtd_horas_total; ?>
                  </span>
                </td>
                <td class="px-6 py-4 text-meuTexto-tdClaro dark:text-meuTexto-tdEscuro"><?= $e->qtd_atvs_total; ?></td>
                <td class="px-6 py-4 text-meuTexto-tdClaro dark:text-meuTexto-tdEscuro"><?= $e->qtd_atvs_deferida; ?></td>
                <td class="px-6 py-4 text-meuTexto-tdClaro dark:text-meuTexto-tdEscuro"><?= isset($e->atividades_concluidas)? count($e->atividades_concluidas)."/3": "0/3"; ?></td>
                <td class="px-6 py-4">
                <div class="flex items-center">
                  <?php if(isset($e->atividades_concluidas) && count($e->atividades_concluidas) >= 3) : ?>
                    <span class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300 whitespace-pre">Concluído</span>
                  <?php else : ?>
                    <span class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300 whitespace-pre">Pendente</span>
                  <?php endif; ?>
                </div>
              </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <nav class="flex flex-wrap gap-2 items-center justify-between p-4 pt-4 bg-meuBranco dark:bg-meuTema-900" aria-label="Table navigation">
        <span class="text-sm font-normal text-meuCinza-400 dark:text-meuCinza-400">Exibindo a página <span class="font-semibold text-meuCinza-900 dark:text-meuBranco"><?= $page; ?></span> de <span class="font-semibold text-meuCinza-900 dark:text-meuBranco"><?= $totalPages; ?></span></span>
        <span class="text-sm font-normal text-meuCinza-400 dark:text-meuCinza-400">Total de registros <span class="font-semibold text-meuCinza-900 dark:text-meuBranco"><?= $totalItens; ?></span></span>
        <ul class="inline-flex -space-x-px text-sm h-8">
        <li>
          <a <?php if($page > 1) echo 'href="?page='.($page-1).'"' ?> class="<?php if($page <= 1) echo 'opacity-70 cursor-not-allowed'; else echo 'dark:hover:bg-meuTema-700 dark:hover:text-meuBranco hover:bg-meuTema-100 hover:text-meuCinza-700' ?> flex items-center justify-center px-3 h-8 ml-0 leading-tight text-meuCinza-400 bg-meuBranco border border-meuCinza-300 rounded-l-lg dark:bg-meuTema-800 dark:border-meuCinza-700 dark:text-meuCinza-400">Anterior</a>
        </li>
        <li>
          <a <?php if($page < $totalPages) echo 'href="?page='.($page+1).'"' ?> class="<?php if($page >= $totalPages) echo 'opacity-70 cursor-not-allowed'; else echo 'dark:hover:bg-meuTema-700 dark:hover:text-meuBranco hover:bg-meuTema-100 hover:text-meuCinza-700' ?> flex items-center justify-center px-3 h-8 leading-tight text-meuCinza-400 bg-meuBranco border border-meuCinza-300 rounded-r-lg dark:bg-meuTema-800 dark:border-meuCinza-700 dark:text-meuCinza-400 ">Proxima</a>
        </li>
      </ul>
      </nav>
    </div>
  </div>

  <?= $this->include('_config/alerts/messageToast'); ?>
  <?= $this->include('_config/alerts/confirmDeleteModal'); ?>

  <script>
    let idAluno;

    function excluir(id) {
      idAluno = id
    }

    function confirmDelete() {
      window.open(`/aluno/deletar/${idAluno}`, "_self")
    }

    function verDatalhes(id) {
      const payload = document.querySelector('#payload-' + id).innerText
      // console.log(id, payload)
      window.open(`/relatorios/aluno/${id}/detalhes?payload=${payload}`, "_self")
    }
  </script>

<?= $this->endSection(); ?>