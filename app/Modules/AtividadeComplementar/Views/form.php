<?php echo $this->extend('_config/Layout/mainLayout'); ?>
<?php echo $this->section('conteudo');
$a = !empty($this->data) ? $this->data[0] : null;
?>
<div class="md:mx-[210px] m-4">
  <p class="dark:text-meuBranco text-3xl text-center font-semibold pb-4">Cadastro de Atividade Complementar</p>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

    <form class="bg-white dark:bg-meuTema-800 p-8" method="post" action="<?= empty($a) ? '/atividade-complementar/novo' : "/atividade-complementar/editar/$a->id" ?>">
      <div class="mb-6">
        <label for="nome_atividade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome da Atividade <span class="text-red-500">*</span></label>
        <input name="nome_atividade" value="<?= empty($a) ? '' : $a->nome_atividade ?>" type="text" id="nome_atividade" class="bg-meuTema-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        <span class="text-red-500"><?= validation_show_error('nome_atividade'); ?></span>
      </div>
      <div class="mb-6">
        <label for="curricular" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">É curricular? <span class="text-red-500">*</span></label>
        <input name="curricular" value="<?= empty($a) ? '' : $a->curricular ?>" type="text" id="curricular" class="bg-meuTema-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        <span class="text-red-500"><?= validation_show_error('curricular'); ?></span>
      </div>
      <div class="mb-6">
        <label for="aluno_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Aluno <span class="text-red-500">*</span></label>
        <input name="aluno_id" value="<?= empty($a) ? '' : $a->aluno_id ?>" type="text" id="aluno_id" class="bg-meuTema-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        <span class="text-red-500"><?= validation_show_error('aluno_id'); ?></span>
      </div>
      <div class="mb-6">
        <label for="periodo_letivo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Período Letivo <span class="text-red-500">*</span></label>
        <input name="periodo_letivo" value="<?= empty($a) ? '' : $a->periodo_letivo ?>" type="text" id="periodo_letivo" class="bg-meuTema-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        <span class="text-red-500"><?= validation_show_error('periodo_letivo'); ?></span>
      </div>
      <div class="mb-6">
        <label for="ano_letivo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ano Letivo <span class="text-red-500">*</span></label>
        <input name="ano_letivo" value="<?= empty($a) ? '' : $a->ano_letivo ?>" type="text" id="ano_letivo" class="bg-meuTema-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        <span class="text-red-500"><?= validation_show_error('ano_letivo'); ?></span>
      </div>
      <div class="mb-6">
        <label for="data_inicio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data Início <span class="text-red-500">*</span></label>
        <input name="data_inicio" value="<?= empty($a) ? '' : $a->data_inicio ?>" type="text" id="data_inicio" class="bg-meuTema-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        <span class="text-red-500"><?= validation_show_error('data_inicio'); ?></span>
      </div>
      <div class="mb-6">
        <label for="data_conclusao" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data Conclusão <span class="text-red-500">*</span></label>
        <input name="data_conclusao" value="<?= empty($a) ? '' : $a->data_conclusao ?>" type="text" id="data_conclusao" class="bg-meuTema-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        <span class="text-red-500"><?= validation_show_error('data_conclusao'); ?></span>
      </div>
      <div class="mb-6">
        <label for="carga_horaria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Carga Horária <span class="text-red-500">*</span></label>
        <input name="carga_horaria" value="<?= empty($a) ? '' : $a->carga_horaria ?>" type="text" id="carga_horaria" class="bg-meuTema-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        <span class="text-red-500"><?= validation_show_error('carga_horaria'); ?></span>
      </div>
      <div class="mb-6">
        <label for="obs_complementares" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Observações Complementares</label>
        <input name="obs_complementares" value="<?= empty($a) ? '' : $a->obs_complementares ?>" type="text" id="obs_complementares" class="bg-meuTema-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <span class="text-red-500"><?= validation_show_error('obs_complementares'); ?></span>
      </div>
      <div class="mb-6">
        <label for="razao_indeferimento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Razão do Indeferimento</label>
        <input name="razao_indeferimento" value="<?= empty($a) ? '' : $a->razao_indeferimento ?>" type="text" id="razao_indeferimento" class="bg-meuTema-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <span class="text-red-500"><?= validation_show_error('razao_indeferimento'); ?></span>
      </div>
      <div class="mb-6">
        <label for="deferida" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deferida?</label>
        <input name="deferida" value="<?= empty($a) ? '' : $a->deferida ?>" type="text" id="deferida" class="bg-meuTema-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <span class="text-red-500"><?= validation_show_error('deferida'); ?></span>
      </div>

      <button type="submit" class="text-white bg-meuTema-700 hover:bg-meuTema-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-meuTema-600 dark:hover:bg-meuTema-700 dark:focus:ring-blue-800">Salvar</button>
    </form>
  </div>
</div>
<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script>

</script>
<?php echo $this->endSection(); ?>