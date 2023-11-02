<?php echo $this->extend('_config/Layout/mainLayout'); ?>
<?php echo $this->section('conteudo');
$a = !empty($this->data) ? $this->data[0] : null;
?>
<div class="md:mx-[210px] m-4">
  <p class="dark:text-meuBranco text-3xl text-center font-semibold pb-4">Cadastro - Tipo de Atividade</p>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

    <form class="bg-white dark:bg-meuTema-800 p-8" method="post" action="<?= empty($a) ? '/tp-atividade/novo' : "/tp-atividade/editar/$a->id" ?>">
      <div class="mb-6">
        <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo da atividade <span class="text-red-500">*</span></label>
        <input name="nome" value="<?= empty($a) ? '' : $a->nome ?>" type="text" id="nome" class="bg-meuTema-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-meuTema-500 focus:border-meuTema-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-meuTema-500 dark:focus:border-meuTema-500" required>
        <span class="text-red-500"><?= validation_show_error('nome'); ?></span>
      </div>
      <div class="mb-6">
        <label for="curricular" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">É atividade curricular? <span class="text-red-500">*</span></label>
        <select id="curricular" name="curricular" class="bg-meuTema-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-meuTema-500 focus:border-meuTema-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-meuTema-500 dark:focus:border-meuTema-500" required>
            <option value="">Selecione uma opção</option>
            <option value="t" <?php if(!empty($a) && $a->curricular == 't') echo 'selected' ?>>Sim</option>
            <option value="f" <?php if(!empty($a) && $a->curricular == 'f') echo 'selected' ?>>Não</option>
        </select>
        <span class="text-red-500"><?= validation_show_error('curricular'); ?></span>
      </div>
      <div class="mb-6">
        <label for="limite_hora" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Limite de horas <span class="text-red-500">*</span></label>
        <input name="limite_hora" value="<?= empty($a) ? '' : $a->limite_hora ?>" type="number" id="limite_hora" class="bg-meuTema-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-meuTema-500 focus:border-meuTema-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-meuTema-500 dark:focus:border-meuTema-500" required>
        <span class="text-red-500"><?= validation_show_error('limite_hora'); ?></span>
      </div>
      <button type="submit" class="text-white bg-meuTema-700 hover:bg-meuTema-800 focus:ring-4 focus:outline-none focus:ring-meuTema-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-meuTema-600 dark:hover:bg-meuTema-700 dark:focus:ring-meuTema-800">Salvar</button>
    </form>
  </div>
</div>
<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script>

</script>
<?php echo $this->endSection(); ?>