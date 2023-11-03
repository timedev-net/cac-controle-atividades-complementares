<?php echo $this->extend('_config/Layout/mainLayout'); ?>
<?php echo $this->section('conteudo');
$a = !empty($this->data) ? $this->data : null; ?>
<div class="md:mx-[210px] m-4">
  <p class="dark:text-meuBranco text-3xl text-center font-semibold pb-4">Cadastro de Atividade Complementar</p>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

    <form class="bg-white dark:bg-meuTema-800 p-8" method="post" action="<?= empty($a['data']) ? '/atividade-complementar/novo' : "/atividade-complementar/editar/$a[id]" ?>">
      <div class="mb-6">
        <label for="aluno_id" class="block mb-2 text-sm font-medium text-meuCinza-900 dark:text-white">Aluno <span class="text-red-500">*</span></label>
        <select name="aluno_id" id="aluno_id" class="bg-meuTema-50 border border-meuCinza-300 text-meuCinza-900 text-sm rounded-lg focus:ring-meuTema-500 focus:border-meuTema-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-meuCinza-600 dark:placeholder-meuCinza-400 dark:text-white dark:focus:ring-meuTema-500 dark:focus:border-meuTema-500">
          <option value="">Selecione</option>
          <?php foreach ($a['alunos'] as $e) : ?>
            <option value="<?= $e->id ?>" <?php if (!empty($a['data']) && $e->id == $a['data']->aluno_id) echo "selected"; ?>>
              <?= $e->nome ?>
            </option>
          <?php endforeach; ?>
        </select>
        <span class="text-red-500"><?= validation_show_error('aluno_id'); ?></span>
      </div>
      <div class="mb-6">
        <label for="nome_atividade" class="block mb-2 text-sm font-medium text-meuCinza-900 dark:text-white">Nome da atividade <span class="text-red-500">*</span></label>
        <input name="nome_atividade" value="<?= empty($a['data']) ? '' : $a['data']->nome_atividade ?>" type="text" id="nome_atividade" class="bg-meuTema-50 border border-meuCinza-300 text-meuCinza-900 text-sm rounded-lg focus:ring-meuTema-500 focus:border-meuTema-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-meuCinza-600 dark:placeholder-meuCinza-400 dark:text-white dark:focus:ring-meuTema-500 dark:focus:border-meuTema-500" required>
        <span class="text-red-500"><?= validation_show_error('nome_atividade'); ?></span>
      </div>
      <div class="mb-6">
        <label for="tp_atividade_id" class="block mb-2 text-sm font-medium text-meuCinza-900 dark:text-white">Tipo de atividade <span class="text-red-500">*</span></label>
        <select name="tp_atividade_id" id="tp_atividade_id" class="bg-meuTema-50 border border-meuCinza-300 text-meuCinza-900 text-sm rounded-lg focus:ring-meuTema-500 focus:border-meuTema-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-meuCinza-600 dark:placeholder-meuCinza-400 dark:text-white dark:focus:ring-meuTema-500 dark:focus:border-meuTema-500">
          <option value="">Selecione</option>
          <?php foreach ($a['tp_atividades'] as $e) : ?>
            <option value="<?= $e->id ?>" <?php if (!empty($a['data']) && $e->id == $a['data']->tp_atividade_id) echo "selected"; ?>>
              <?= $e->nome ?>
            </option>
          <?php endforeach; ?>
        </select>
        <span class="text-red-500"><?= validation_show_error('tp_atividade_id'); ?></span>
      </div>
      <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-meuCinza-900 dark:text-white">É curricular? <span class="text-red-500">*</span></label>
        <fieldset class="flex gap-5 bg-meuTema-50 border border-meuCinza-300 text-meuCinza-900 text-sm rounded-lg focus:ring-meuTema-500 focus:border-meuTema-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-meuCinza-600 dark:placeholder-meuCinza-400 dark:text-white dark:focus:ring-meuTema-500 dark:focus:border-meuTema-500">
          <legend class="sr-only">É curricular?</legend>
          <div class="flex items-center">
            <input <?php if (!empty($a['data']) && $a['data']->curricular == 't') echo 'checked' ?> id="sim-curric" type="radio" name="curricular" value="t" class="w-4 h-4 border-meuCinza-300 focus:ring-2 focus:ring-meuTema-300 dark:focus:ring-meuTema-600 dark:focus:bg-meuTema-600 dark:bg-meuCinza-700 dark:border-meuCinza-600">
            <label for="sim-curric" class="block ml-2 text-sm font-medium text-meuCinza-900 dark:text-meuCinza-300">Sim</label>
          </div>
          <div class="flex items-center">
            <input <?php if (!empty($a['data']) && $a['data']->curricular == 'f') echo 'checked' ?> id="nao-curric" type="radio" name="curricular" value="f" class="w-4 h-4 border-meuCinza-300 focus:ring-2 focus:ring-meuTema-300 dark:focus:ring-meuTema-600 dark:focus:bg-meuTema-600 dark:bg-meuCinza-700 dark:border-meuCinza-600">
            <label for="nao-curric" class="block ml-2 text-sm font-medium text-meuCinza-900 dark:text-meuCinza-300">Não</label>
          </div>
        </fieldset>
        <span class="text-red-500"><?= validation_show_error('curricular'); ?></span>
      </div>
      <div class="mb-6">
        <label for="ano_letivo" class="block mb-2 text-sm font-medium text-meuCinza-900 dark:text-white">Ano letivo <span class="text-red-500">*</span></label>
        <input name="ano_letivo" value="<?= empty($a['data']) ? '' : $a['data']->ano_letivo ?>" type="number" min="1900" max="2099" step="1" id="ano_letivo" class="bg-meuTema-50 border border-meuCinza-300 text-meuCinza-900 text-sm rounded-lg focus:ring-meuTema-500 focus:border-meuTema-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-meuCinza-600 dark:placeholder-meuCinza-400 dark:text-white dark:focus:ring-meuTema-500 dark:focus:border-meuTema-500" required>
        <span class="text-red-500"><?= validation_show_error('ano_letivo'); ?></span>
      </div>
      <div class="mb-6">
        <label for="periodo_letivo" class="block mb-2 text-sm font-medium text-meuCinza-900 dark:text-white">Período letivo <span class="text-red-500">*</span></label>
        <input name="periodo_letivo" value="<?= empty($a['data']) ? '' : $a['data']->periodo_letivo ?>" type="text" id="periodo_letivo" class="bg-meuTema-50 border border-meuCinza-300 text-meuCinza-900 text-sm rounded-lg focus:ring-meuTema-500 focus:border-meuTema-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-meuCinza-600 dark:placeholder-meuCinza-400 dark:text-white dark:focus:ring-meuTema-500 dark:focus:border-meuTema-500" required>
        <span class="text-red-500"><?= validation_show_error('periodo_letivo'); ?></span>
      </div>
      <div class="mb-6">
        <label for="data_inicio" class="block mb-2 text-sm font-medium text-meuCinza-900 dark:text-white">Data de início da atividade <span class="text-red-500">*</span></label>
        <input name="data_inicio" value="<?= empty($a['data']) ? '' : $a['data']->data_inicio ?>" type="date" id="data_inicio" class="bg-meuTema-50 border border-meuCinza-300 text-meuCinza-900 text-sm rounded-lg focus:ring-meuTema-500 focus:border-meuTema-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-meuCinza-600 dark:placeholder-meuCinza-400 dark:text-white dark:focus:ring-meuTema-500 dark:focus:border-meuTema-500" required>
        <span class="text-red-500"><?= validation_show_error('data_inicio'); ?></span>
      </div>
      <div class="mb-6">
        <label for="data_conclusao" class="block mb-2 text-sm font-medium text-meuCinza-900 dark:text-white">Data da conclusão <span class="text-red-500">*</span></label>
        <input name="data_conclusao" value="<?= empty($a['data']) ? '' : $a['data']->data_conclusao ?>" type="date" id="data_conclusao" class="bg-meuTema-50 border border-meuCinza-300 text-meuCinza-900 text-sm rounded-lg focus:ring-meuTema-500 focus:border-meuTema-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-meuCinza-600 dark:placeholder-meuCinza-400 dark:text-white dark:focus:ring-meuTema-500 dark:focus:border-meuTema-500" required>
        <span class="text-red-500"><?= validation_show_error('data_conclusao'); ?></span>
      </div>
      <div class="mb-6">
        <label for="carga_horaria" class="block mb-2 text-sm font-medium text-meuCinza-900 dark:text-white">Carga horária <span class="text-red-500">*</span></label>
        <input name="carga_horaria" value="<?= empty($a['data']) ? '' : $a['data']->carga_horaria ?>" type="number" id="carga_horaria" class="bg-meuTema-50 border border-meuCinza-300 text-meuCinza-900 text-sm rounded-lg focus:ring-meuTema-500 focus:border-meuTema-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-meuCinza-600 dark:placeholder-meuCinza-400 dark:text-white dark:focus:ring-meuTema-500 dark:focus:border-meuTema-500" required>
        <span class="text-red-500"><?= validation_show_error('carga_horaria'); ?></span>
      </div>
      <div class="mb-6">
        <label for="obs_complementares" class="block mb-2 text-sm font-medium text-meuCinza-900 dark:text-white">Observações complementares</label>
        <textarea rows="4" name="obs_complementares" id="obs_complementares" class="bg-meuTema-50 border border-meuCinza-300 text-meuCinza-900 text-sm rounded-lg focus:ring-meuTema-500 focus:border-meuTema-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-meuCinza-600 dark:placeholder-meuCinza-400 dark:text-white dark:focus:ring-meuTema-500 dark:focus:border-meuTema-500"><?= empty($a['data']) ? '' : $a['data']->obs_complementares ?></textarea>
        <span class="text-red-500"><?= validation_show_error('obs_complementares'); ?></span>
      </div>
      <!-- <div class="mb-6">
        <label for="razao_indeferimento" class="block mb-2 text-sm font-medium text-meuCinza-900 dark:text-white">Razão do Indeferimento</label>
        <input name="razao_indeferimento" maxlength="200" value="<?= empty($a['data']) ? '' : $a['data']->razao_indeferimento ?>" type="text" id="razao_indeferimento" class="bg-meuTema-50 border border-meuCinza-300 text-meuCinza-900 text-sm rounded-lg focus:ring-meuTema-500 focus:border-meuTema-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-meuCinza-600 dark:placeholder-meuCinza-400 dark:text-white dark:focus:ring-meuTema-500 dark:focus:border-meuTema-500">
        <span class="text-red-500"><?= validation_show_error('razao_indeferimento'); ?></span>
      </div>
      <div class="mb-6">
        <label for="deferida" class="block mb-2 text-sm font-medium text-meuCinza-900 dark:text-white">Deferida?</label>
        <input name="deferida" value="<?= empty($a['data']) ? '' : $a['data']->deferida ?>" type="text" id="deferida" class="bg-meuTema-50 border border-meuCinza-300 text-meuCinza-900 text-sm rounded-lg focus:ring-meuTema-500 focus:border-meuTema-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-meuCinza-600 dark:placeholder-meuCinza-400 dark:text-white dark:focus:ring-meuTema-500 dark:focus:border-meuTema-500">
        <span class="text-red-500"><?= validation_show_error('deferida'); ?></span>
      </div> -->

      <button type="submit" class="text-white bg-meuTema-700 hover:bg-meuTema-800 focus:ring-4 focus:outline-none focus:ring-meuTema-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-meuTema-600 dark:hover:bg-meuTema-700 dark:focus:ring-meuTema-800">Salvar</button>
    </form>
  </div>
</div>


<script>
  $(document).ready(() => {
    $('#aluno_id').select2({theme: 'bootstrap4'});
    $('#tp_atividade_id').select2({theme: 'bootstrap4'});
  });
</script>

<?php echo $this->endSection(); ?>