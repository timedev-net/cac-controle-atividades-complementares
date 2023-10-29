<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>CAC - Controle de Atividades Complementares</title>
  <meta name="description" content="Sistema de Controle de Atividades Complementares">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>
  <style type="text/tailwindcss">
    @layer utilities {
        .content-auto {
            content-visibility: auto;
        }
        }
  </style>
  <link rel="shortcut icon" type="image/png" href="/favicon.ico">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</head>

<body class="bg-slate-400">
  <?php echo $this->include('_config/Layout/topBar'); ?>
  
    <?php echo $this->renderSection("conteudo"); ?>
  
  <footer class="mx-[300px] mt-2 text-center">
    <div class="environment">
      <p>Tempo de renderização da página: {elapsed_time} segundos</p>
      <p>Environment:
        <?= ENVIRONMENT ?>
      </p>
    </div>
    <div class="copyrights">
      <p>&copy;
        <?= date('Y') ?> Desenvolvido pelo acadêmico Daniel de Brito Frota.
      </p>
    </div>
  </footer>
  <?php echo $this->renderSection("scripts"); ?>
</body>

</html>