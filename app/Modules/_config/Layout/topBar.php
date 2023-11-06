<nav class="bg-topBar-claro border-meuCinza-200 dark:bg-topBar-escuro dark:border-meuCinza-700">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="#" class="flex items-center">
      <img src="/assets/logo2.png" class="h-10 mr-3" alt="CAC Logo" />
      <img src="/assets/text.png" class="hidden lg:block md:w-[370px] mr-3" alt="text" />
    </a>
    <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-meuCinza-500 rounded-lg md:hidden hover:bg-meuTema-100 focus:outline-none focus:ring-2 focus:ring-meuCinza-200 dark:text-meuCinza-400 dark:hover:bg-meuTema-700 dark:focus:ring-meuCinza-600" aria-controls="navbar-dropdown" aria-expanded="false">
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-meuCinza-100 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-topBar-claro dark:bg-meuTema-800 md:dark:bg-topBar-escuro dark:border-meuCinza-700">
        <li>
          <a href="/" class="block py-2 pl-3 pr-4 text-meuCinza-950 rounded hover:bg-meuTema-100 md:hover:bg-transparent md:border-0 md:hover:text-meuTema-700 md:p-0 dark:text-meuBranco md:dark:hover:text-meuTema-500 dark:hover:bg-meuTema-700 dark:hover:text-meuBranco md:dark:hover:bg-transparent">Home</a>
        </li>
        <li>
          <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-meuCinza-900 rounded hover:bg-meuTema-100 md:hover:bg-transparent md:border-0 md:hover:text-meuTema-700 md:p-0 md:w-auto dark:text-meuBranco md:dark:hover:text-meuTema-500 dark:focus:text-meuBranco dark:border-meuCinza-700 dark:hover:bg-meuTema-700 md:dark:hover:bg-transparent">
            Administração <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg></button>
          <div id="dropdownNavbar" class="z-10 hidden font-normal bg-menuDrop-claro divide-y divide-meuCinza-100 rounded-lg shadow w-44 dark:bg-meuTema-700 dark:divide-meuCinza-600">
            <ul class="py-2 text-sm text-meuCinza-700 dark:text-meuCinza-400" aria-labelledby="dropdownLargeButton">
              <li>
                <a href="/alunos" class="dark:text-meuTexto-menuEscuro block px-4 py-2 hover:bg-meuTema-100 dark:hover:bg-meuTema-600 dark:hover:text-meuBranco">Alunos Cadastrados</a>
              </li>
              <li>
                <a href="/aluno/novo" class="dark:text-meuTexto-menuEscuro block px-4 py-2 hover:bg-meuTema-100 dark:hover:bg-meuTema-600 dark:hover:text-meuBranco">Novo aluno</a>
              </li>
              <li>
                <a href="/atividade-complementar/novo" class="dark:text-meuTexto-menuEscuro block px-4 py-2 hover:bg-meuTema-100 dark:hover:bg-meuTema-600 dark:hover:text-meuBranco">Nova atividade</a>
              </li>
              <li>
                <a href="/atividades-complementares?search=analise" class="dark:text-meuTexto-menuEscuro block px-4 py-2 hover:bg-meuTema-100 dark:hover:bg-meuTema-600 dark:hover:text-meuBranco">Analisar solicitações</a>
              </li>
              <li>
                <a href="/atividades-complementares" class="dark:text-meuTexto-menuEscuro block px-4 py-2 hover:bg-meuTema-100 dark:hover:bg-meuTema-600 dark:hover:text-meuBranco">Atividades complementares</a>
              </li>
              <li>
                <a href="/tp-atividades" class="dark:text-meuTexto-menuEscuro block px-4 py-2 hover:bg-meuTema-100 dark:hover:bg-meuTema-600 dark:hover:text-meuBranco">Tipos de atividade</a>
              </li>
            </ul>
          </div>
        </li>
        <li>
          <button id="dropdownNavbarLink2" data-dropdown-toggle="dropdownNavbar2" class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-meuCinza-900 rounded hover:bg-meuTema-100 md:hover:bg-transparent md:border-0 md:hover:text-meuTema-700 md:p-0 md:w-auto dark:text-meuBranco md:dark:hover:text-meuTema-500 dark:focus:text-meuBranco dark:border-meuCinza-700 dark:hover:bg-meuTema-700 md:dark:hover:bg-transparent">
            Relatórios <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg></button>
          <div id="dropdownNavbar2" class="z-10 hidden font-normal bg-menuDrop-claro divide-y divide-meuCinza-100 rounded-lg shadow w-44 dark:bg-meuTema-700 dark:divide-meuCinza-600">
            <ul class="py-2 text-sm text-meuCinza-700 dark:text-meuCinza-400" aria-labelledby="dropdownLargeButton">
              <li>
                <a href="/relatorios/atividades?search=deferida" class="dark:text-meuTexto-menuEscuro block px-4 py-2 hover:bg-meuTema-100 dark:hover:bg-meuTema-600 dark:hover:text-meuBranco">Atividades Deferidas</a>
              </li>
              <li>
                <a href="/relatorios/atividades?search=indeferida" class="dark:text-meuTexto-menuEscuro block px-4 py-2 hover:bg-meuTema-100 dark:hover:bg-meuTema-600 dark:hover:text-meuBranco">Atividades Indeferidas</a>
              </li>
              <li>
                <a href="/relatorios/atividades?search=analise" class="dark:text-meuTexto-menuEscuro block px-4 py-2 hover:bg-meuTema-100 dark:hover:bg-meuTema-600 dark:hover:text-meuBranco">Atividades para Análise</a>
              </li>
              <li>
                <a href="/relatorios/alunos" class="dark:text-meuTexto-menuEscuro block px-4 py-2 hover:bg-meuTema-100 dark:hover:bg-meuTema-600 dark:hover:text-meuBranco">Atividades dos Alunos</a>
              </li>
            </ul>
          </div>
        </li>
        <li>
          <a href="https://github.com/timedev-net/cac-controle-atividades-complementares#readme" target="_blank" class="block py-2 pl-3 pr-4 text-meuCinza-900 rounded hover:bg-meuTema-100 md:hover:bg-transparent md:border-0 md:hover:text-meuTema-700 md:p-0 dark:text-meuBranco md:dark:hover:text-meuTema-500 dark:hover:bg-meuTema-700 dark:hover:text-meuBranco md:dark:hover:bg-transparent">Documentação</a>
        </li>
      </ul>
    </div>
  </div>
</nav>