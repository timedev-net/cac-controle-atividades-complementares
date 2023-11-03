<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <title>CAC - Controle de Atividades Complementares</title>
    <meta name="description" content="Sistema de Controle de Atividades Complementares">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?= base_url("/js/tailwind-plugins-form-typography.js"); ?>"></script>
    <script><?php include "tailwind.config.js"; ?></script>
    <style type="text/tailwindcss">
      @layer utilities {
        .content-auto {
            content-visibility: auto;
        }
      }
    </style>
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <script src="<?= base_url("/js/jquery-3.7.1.min.js"); ?>"></script>
    <link href="<?= base_url("/css/flowbite.min.css"); ?>" rel="stylesheet">
    <script src="<?= base_url("/js/flowbite.min.js"); ?>"></script>
    <link href="<?= base_url("/css/select2.min.css"); ?>" rel="stylesheet">
    <script src="<?= base_url("/js/select2.min.js"); ?>"></script>
    <link href="<?= base_url("/css/select2-bootstrap4.min.css"); ?>" rel="stylesheet">
  </head>

  <body class="bg-meuTema-200 dark:bg-meuTema-900">
    <?php echo $this->include('_config/Layout/topBar'); ?>
    <?php echo $this->renderSection("conteudo"); ?>
    <?php echo $this->include('_config/Layout/footer'); ?>
  </body>
</html>