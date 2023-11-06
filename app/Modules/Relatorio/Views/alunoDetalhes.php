<?php echo $this->extend('_config/Layout/mainLayout'); ?>
<?php echo $this->section('conteudo');
$data = (object)$this->data['0'];
$payload = (object)$this->data['payload'];
$data->atividades = json_decode($data->atividades);
$a = !empty($this->data) ? $this->data : null; ?>
<div class="md:mx-[210px] m-4">
  <p class="dark:text-meuBranco text-3xl text-center font-semibold pb-4">Relatório Detalhado das Atividades do Aluno</p>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">


    <div class="bg-white dark:bg-meuTema-800 px-8 pt-8 pb-2">
      <label class="block mb-2 text-3xl font-medium text-meuTema-500 dark:text-meuTema-400"><?= $data->nome; ?></label>
      <label class="block mb-2 text-md text-meuCinza-900 dark:text-meuCinza-300">Matrícula SUAP: <span class="dark:text-white"><?= $data->matricula_suap; ?></span></label>
      <label class="block mb-2 text-md text-meuCinza-900 dark:text-meuCinza-300">E-mail: <span class="dark:text-white"><?= $data->email; ?></span></label>
      <label class="block mb-2 text-md text-meuCinza-900 dark:text-meuCinza-300">Acadêmico cadastrado em: <span class="dark:text-white"><?= date_format(date_create($data->created_at), 'd/m/Y'); ?></span></label>
    </div>
    <div class="dark:bg-meuTema-700">
      <label class="p-3 block text-2xl font-medium text-meuCinza-900 dark:text-white">Tipos de Atividades Concluídas</label>

      <div class="flex gap-4 flex-wrap justify-center bg-white dark:bg-meuTema-800 px-8 py-2">
        <?php foreach ($payload as $p) : ?>
        <div class="p-3 rounded-lg shadow dark:bg-meuTema-900">
          <label class="block mb-2 text-xl font-medium text-meuTema-500 dark:text-meuTema-400"><?= $p->nome_atividade; ?></label>
          <label class="block mb-2 text-md text-meuCinza-900 dark:text-meuCinza-300">Limite mínimo de horas: <span class="dark:text-white"><?= $p->limite_min_horas; ?></span></label>
          <label class="block mb-2 text-md text-meuCinza-900 dark:text-meuCinza-300">Quantidade de horas deferidas: <span class="dark:text-white"><?= $p->horas_deferidas; ?></span></label>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="dark:bg-meuTema-700">
      <label class="p-3 block text-2xl font-medium text-meuCinza-900 dark:text-white">Atividades Cadastradas</label>
      <div class="flex gap-4 flex-wrap justify-center bg-white dark:bg-meuTema-800 p-6">
        <?php foreach ($data->atividades as $a) : ?>
          <div class="max-w-sm p-6 bg-white border border-meuTema-200 rounded-lg shadow dark:bg-meuTema-900 dark:border-meuTema-700">
            <div class="flex justify-between gap-3">
              <div>
                <span class="mb-2 text-xl font-semibold tracking-tight text-meuTema-900 dark:text-white"><?= $a->atividade; ?></span>
                <p class="mb-2 text-md tracking-tight text-meuTema-900 dark:text-white opacity-50"><?= $a->tp_atividade; ?></p>
              </div>
              <?php if ($a->deferida == true) : ?>
                <svg class="w-6 h-6 text-meuTema-500 dark:text-meuTema-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                  <path d="M3 7H1a1 1 0 0 0-1 1v8a2 2 0 0 0 4 0V8a1 1 0 0 0-1-1Zm12.954 0H12l1.558-4.5a1.778 1.778 0 0 0-3.331-1.06A24.859 24.859 0 0 1 6 6.8v9.586h.114C8.223 16.969 11.015 18 13.6 18c1.4 0 1.592-.526 1.88-1.317l2.354-7A2 2 0 0 0 15.954 7Z" />
                </svg>
              <?php elseif ($a->deferida == false) : ?>
                <svg class="w-6 h-6 text-red-500 dark:text-red-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                  <path d="M11.955 2.117h-.114C9.732 1.535 6.941.5 4.356.5c-1.4 0-1.592.526-1.879 1.316l-2.355 7A2 2 0 0 0 2 11.5h3.956L4.4 16a1.779 1.779 0 0 0 3.332 1.061 24.8 24.8 0 0 1 4.226-5.36l-.003-9.584ZM15 11h2a1 1 0 0 0 1-1V2a2 2 0 1 0-4 0v8a1 1 0 0 0 1 1Z" />
                </svg>
              <?php else : ?>
                <svg class="w-6 h-6 text-amber-500 dark:text-amber-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 1H1m14 18H1m2 0v-4.333a2 2 0 0 1 .4-1.2L5.55 10.6a1 1 0 0 0 0-1.2L3.4 6.533a2 2 0 0 1-.4-1.2V1h10v4.333a2 2 0 0 1-.4 1.2L10.45 9.4a1 1 0 0 0 0 1.2l2.15 2.867a2 2 0 0 1 .4 1.2V19H3Z" />
                </svg>
              <?php endif; ?>

            </div>
            <p class="font-normal text-meuTema-500 dark:text-meuTema-400"><span class="opacity-60">Período Letivo: </span><?= $a->periodo_letivo; ?></p>
            <p class="font-normal text-meuTema-500 dark:text-meuTema-400"><span class="opacity-60">Carga Horária: </span><?= $a->carga_horaria; ?></p>
            <p class="font-normal text-meuTema-500 dark:text-meuTema-400"><span class="opacity-60">Inicio: </span><?= date_format(date_create($a->data_inicio), 'd/m/Y'); ?></p>
            <p class="font-normal text-meuTema-500 dark:text-meuTema-400"><span class="opacity-60">Conclusão: </span><?= date_format(date_create($a->data_conclusao), 'd/m/Y'); ?></p>
            <p class="font-normal text-meuTema-500 dark:text-meuTema-400"><span class="opacity-60">Curricular: </span><?= $a->curricular == '1' ? 'sim' : 'não'; ?></p>
            <p class="font-normal text-meuTema-500 dark:text-meuTema-400"><span class="opacity-60">Obs.: </span><?= $a->obs_complementares; ?></p>
            <?php if ($a->deferida == false) : ?>
              <p class="font-normal text-red-500 dark:text-red-400"><span class="opacity-60">Razão do Indeferimento: </span><?= $a->razao_indeferimento; ?></p>
            <?php endif; ?>
            <p class="font-normal text-meuTema-500 dark:text-meuTema-400"><span class="opacity-60">Data do Cadastro: </span><?= date_format(date_create($a->data_cadastro_atividade), 'd/m/Y'); ?></p>
          </div>

        <?php endforeach; ?>

      </div>
    </div>

  </div>
</div>
<?= $this->include('_config/alerts/messageToast'); ?>
<?php echo $this->endSection(); ?>