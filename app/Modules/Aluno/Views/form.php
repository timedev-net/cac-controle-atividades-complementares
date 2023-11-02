<?php echo $this->extend('_config/Layout/mainLayout'); ?>
<?php echo $this->section('conteudo');
$a = !empty($this->data) ? $this->data[0] : null;
?>
<div class="md:mx-[210px] m-4">
  <p class="dark:text-meuBranco text-3xl text-center font-semibold pb-4">Cadastro de Aluno</p>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

    <form class="bg-white dark:bg-meuTema-800 p-8" method="post" action="<?= empty($a) ? '/aluno/novo' : "/aluno/editar/$a->id" ?>">
      <div class="mb-6">
        <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do Aluno</label>
        <input name="nome" value="<?= empty($a) ? '' : $a->nome ?>" type="text" id="nome" class="bg-meuTema-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        <span class="text-red-500"><?= validation_show_error('nome'); ?></span>
      </div>
      <div class="mb-6">
        <label for="matricula_suap" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matrícula SUAP</label>
        <input name="matricula_suap" value="<?= empty($a) ? '' : $a->matricula_suap ?>" type="text" id="matricula_suap" class="bg-meuTema-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        <span class="text-red-500"><?= validation_show_error('matricula_suap'); ?></span>
      </div>
      <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
        <input name="email" value="<?= empty($a) ? '' : $a->email ?>" type="email" id="email" class="bg-meuTema-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-meuTema-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        <span class="text-red-500"><?= validation_show_error('email'); ?></span>
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