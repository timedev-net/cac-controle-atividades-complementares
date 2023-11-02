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
            
            meuBranco: '#f7fee7',
            meuCinza: {
              50: '#fafafa',
              100: '#f5f5f5',
              200: '#e5e5e5',
              300: '#d4d4d4',
              400: '#a3a3a3',
              500: '#737373',
              600: '#525252',
              700: '#404040',
              800: '#262626',
              900: '#171717',
              950: '#0a0a0a',
            },
            meuTema: {
              50: '#f7fee7',
              100: '#ecfccb',
              200: '#d9f99d',
              300: '#bef264',
              400: '#a1a1aa',
              500: '#84cc16',
              600: '#65a30d',
              700: '#4d7c0f',
              800: '#3f6212',
              900: '#1a2e05',
              950: '#0b1402',
            },
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

<body class="bg-meuTema-200 dark:bg-meuTema-900">
  <?php echo $this->include('_config/Layout/topBar'); ?>
  
  <?php echo $this->renderSection("conteudo"); ?>
  
  <footer class="text-center">
    <div class="copyrights">
      <p class="dark:text-meuCinza-400 text-meuCinza-500">&copy;
        <?= date('Y') ?> Desenvolvido pelo acadêmico Daniel de Brito Frota.
      </p>
    </div>
    <div class="environment">
      <p class="dark:text-meuCinza-400 text-meuCinza-500">Tempo de renderização da página: {elapsed_time} segundos</p>
      <p class="dark:text-meuCinza-400 text-meuCinza-500">Environment:
        <?= ENVIRONMENT ?>
      </p>
    </div>
  </footer>
</body>

</html>