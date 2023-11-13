<?php echo $this->extend('_config/Layout/mainLayout'); ?>
<?php echo $this->section('conteudo');
$a = !empty($this->data) ? $this->data : null; ?>
<div class="md:mx-[210px] m-4">
  <p class="dark:text-meuBranco text-3xl text-center font-semibold pb-4">Análise de Atividade Complementar</p>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">


    <div class="bg-white dark:bg-meuTema-800 px-8 pt-8 pb-2 mb-1">
      <label class="block mb-2 text-xl font-medium text-meuCinza-900 dark:text-white"><?= $a['data']->nome_atividade; ?></label>
      <label class="block mb-2 text-md text-meuCinza-900 dark:text-meuCinza-300">Tipo de Atividade: <span class="dark:text-white"><?= $a['tp_atividade']->nome; ?></span></label>
      <label class="block mb-2 text-md text-meuCinza-900 dark:text-meuCinza-300">Acadêmico(a): <span class="dark:text-white"><?= $a['aluno']->nome; ?></span></label>
      <label class="block mb-2 text-md text-meuCinza-900 dark:text-meuCinza-300">Período Letivo: <span class="dark:text-white"><?= $a['data']->ano_letivo . '/' . $a['data']->periodo_letivo; ?></span></label>
      <label class="block mb-2 text-md text-meuCinza-900 dark:text-meuCinza-300">Início da Atividade: <span class="dark:text-white"><?= date_format(date_create($a['data']->data_inicio), 'd/m/Y'); ?></span></label>
      <label class="block mb-2 text-md text-meuCinza-900 dark:text-meuCinza-300">Conclusão da Atividade: <span class="dark:text-white"><?= date_format(date_create($a['data']->data_conclusao), 'd/m/Y'); ?></span></label>
      <label class="block mb-2 text-md text-meuCinza-900 dark:text-meuCinza-300">Carga Horária: <span class="dark:text-white"><?= $a['data']->carga_horaria; ?> horas</span></label>

    </div>
    <form class="bg-white dark:bg-meuTema-800 px-8 pb-8 pt-2" method="post" action="/atividade-complementar/analisar/<?= $a['id'] ?>">
      <div class="mb-6">
        <label for="obs_complementares" class="block mb-2 text-sm font-medium text-meuCinza-900 dark:text-white">Observações complementares</label>
        <textarea rows="4" name="obs_complementares" id="obs_complementares" class="bg-meuTema-50 border border-meuCinza-300 text-meuCinza-900 text-sm rounded-lg focus:ring-meuTema-500 focus:border-meuTema-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-meuCinza-600 dark:placeholder-meuCinza-400 dark:text-white dark:focus:ring-meuTema-500 dark:focus:border-meuTema-500"><?= empty($a['data']) ? '' : $a['data']->obs_complementares ?></textarea>
        <span class="text-red-500"><?= validation_show_error('obs_complementares'); ?></span>
      </div>
      <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-meuCinza-900 dark:text-white">Deferir esta atividade complementar?</label>
        <fieldset class="flex gap-5 bg-meuTema-50 border border-meuCinza-300 text-meuCinza-900 text-sm rounded-lg focus:ring-meuTema-500 focus:border-meuTema-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-meuCinza-600 dark:placeholder-meuCinza-400 dark:text-white dark:focus:ring-meuTema-500 dark:focus:border-meuTema-500">
          <legend class="sr-only">Deferir?</legend>
          <div class="flex items-center">
            <input <?php if (!empty($a['data']) && $a['data']->deferida == 't') echo 'checked' ?> id="sim-defere" type="radio" name="deferida" value="t" class="w-4 h-4 border-meuCinza-300 focus:ring-2 focus:ring-meuTema-300 dark:focus:ring-meuTema-600 dark:focus:bg-meuTema-600 dark:bg-meuCinza-700 dark:border-meuCinza-600">
            <label for="sim-defere" class="block ml-2 text-sm font-medium text-meuCinza-900 dark:text-meuCinza-300">Sim</label>
          </div>
          <div class="flex items-center">
            <input <?php if (!empty($a['data']) && $a['data']->deferida == 'f') echo 'checked' ?> id="nao-defere" type="radio" name="deferida" value="f" class="w-4 h-4 border-meuCinza-300 focus:ring-2 focus:ring-meuTema-300 dark:focus:ring-meuTema-600 dark:focus:bg-meuTema-600 dark:bg-meuCinza-700 dark:border-meuCinza-600">
            <label for="nao-defere" class="block ml-2 text-sm font-medium text-meuCinza-900 dark:text-meuCinza-300">Não</label>
          </div>
          <div class="flex items-center">
            <input <?php if (!empty($a['data']) && empty($a['data']->deferida)) echo 'checked' ?> id="depois-defere" type="radio" name="deferida" value="" class="w-4 h-4 border-meuCinza-300 focus:ring-2 focus:ring-meuTema-300 dark:focus:ring-meuTema-600 dark:focus:bg-meuTema-600 dark:bg-meuCinza-700 dark:border-meuCinza-600">
            <label for="depois-defere" class="block ml-2 text-sm font-medium text-meuCinza-900 dark:text-meuCinza-300">Decidir depois</label>
          </div>
        </fieldset>
      </div>
      <div id="razao_indef" class="mb-6 <?php if(empty($a['data']->razao_indeferimento)) echo 'hidden' ?>">
        <label for="razao_indeferimento" class="block mb-2 text-sm font-medium text-meuCinza-900 dark:text-white">Razão do Indeferimento <span class="text-red-500">*</span></label>
        <input name="razao_indeferimento" maxlength="200" value="<?= empty($a['data']) ? '' : $a['data']->razao_indeferimento ?>" type="text" id="razao_indeferimento" class="bg-meuTema-50 border border-meuCinza-300 text-meuCinza-900 text-sm rounded-lg focus:ring-meuTema-500 focus:border-meuTema-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-meuCinza-600 dark:placeholder-meuCinza-400 dark:text-white dark:focus:ring-meuTema-500 dark:focus:border-meuTema-500">
        <span class="text-red-500"><?= validation_show_error('razao_indeferimento'); ?></span>
      </div>

      <button type="submit" class="text-white bg-meuTema-700 hover:bg-meuTema-800 focus:ring-4 focus:outline-none focus:ring-meuTema-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-meuTema-600 dark:hover:bg-meuTema-700 dark:focus:ring-meuTema-800">Salvar</button>
    </form>
  </div>
</div>
<?= $this->include('_config/alerts/messageToast'); ?>

<script>
  const elHidden = document.querySelector('#razao_indef')
  const radioSim = document.querySelector('#sim-defere')
  const radioNao = document.querySelector('#nao-defere')
  const inputIndeferimento = document.querySelector('#razao_indeferimento')
  const radioDepois = document.querySelector('#depois-defere')
  radioNao.addEventListener('change', () => elHidden.classList.remove('hidden'))
  radioSim.addEventListener('change', () => {
    elHidden.classList.add('hidden')
    inputIndeferimento.value = ''
  })
  radioDepois.addEventListener('change', () => elHidden.classList.add('hidden'))
</script>

<?php echo $this->endSection(); ?>