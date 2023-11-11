# CAC - Cálculo de Atividades Complementares

## Tecnologias usadas no projeto:

### Linguagens
- PHP 8.2.12
- JavaScript ES-2021
- Plpgsql
### Framework
- CodeIgniter 4
- PhpUnit 9.1
### Libs JavaScript e CSS
- JQuery 3.7.1
- Flowbite 2.0.0
- Tailwind CSS 3.0
- Select2 4.1.0
### Infraestrutura
- PostgreSQL 16.0
- Docker 24.0.4
- Nginx
- Php-FPM
### Programas auxiliares
- VsCode
- DBeaver

### Home Page do Sistema
<img src="/public/assets/homePage.png" alt="Home Page">


### Principais Funcionalidades
- Cadastra alunos e atividades complementares
- Analisa as solicitações de atividades complementares
- Exibe relatórios de alunos e atividades complementares

### Requerimentos para execução do projeto

Apenas ter o Docker instalado, todo o ambiente é executado dentro de um container Docker com base na imagem do `php:fpm-bullseye` que roda em cima do Debian 11.0.
As configurações do ambiente estão dispostos nos seguintes arquivos:
configurado pelos arquivos:
- `Dockerfile`
- `docker-compose.yml`
Configurações específicas estão no diretório `./docker`

### Comandos para executar o projeto com o Docker

1. Cria o volume para o banco de dados
```
docker volume create db-atvd-complement
```
2. Verifica o volume criado
```
docker volume ls
```
3. Constroi todo o ambiente em containers e executa (aplicação e banco de dados)
```
docker compose up -d
```
4. Entra no terminal do container da aplicação para executar as _migrations_ e _seeders_
```
docker exec -it app_atvd_complement /bin/bash
```
5. Executa as migrações de dentro do container
```
php spark migrate
```
6. Semeia o banco de dados
```
php spark db:seed RunSeeder
```
### Outros comandos úteis
- Exibe o status das migrações
```
php spark migrate:status
```
- Desfaz as migrações
```
php spark migrate:rollback
```
- Atualiza as migrações, desfaz tudo e executa novamente
```
php spark migrate:refresh
```

## Diagrama Entidade Relacionamento - modelo físico
<img src="/public/assets/MER.png" alt="DER">

## O sistema apresenta tema claro e escuro

### Light
<img src="/public/assets/temaLight.png" alt="temaLight">

### Dark
<img src="/public/assets/temaDark.png" alt="temaDark">

### Atividades futuras:
- [ ] Fazer autenticação
- [ ] Documentar o uso do sistema
- [ ] Desmonstrar a mesma camada de domínio sendo usada em outro Framework (Laravel por exemplo)

## Tunelamento do WSL
O tunelamento é usado para expor a aplicação rodando dentro do WSL para a rede externa

[Local Tunnel](https://theboroer.github.io/localtunnel-www/)

[GitHub Local Tunnel](https://github.com/localtunnel/localtunnel)

Comando para expor a porta (é gerado um nome de domínio público aleatório)
```
lt --port 80
```

# Refatorando para Arquitetura Limpa
O objetivo de refatorar a aplicação para uso dos conceitos do _clean architecture_ é para que se possa separar a camada do __domínio__ das dependências externas (framework e demais bibliotecas).

O uso dessa abordagem contribui para a longevidade da aplicação, visto que a todo instante surgem novas tecnologias, e quando a camada de domínio é desacoplada da camada de externa, torna-se indolor qualquer atualização de tecnologia dentro do projeto, seja mudanças de framework, banco de dados ou qualquer biblioteca. Essa abordagem evita que o projeto se torne um grande sistema legado.

## Camada de Domínio
Localizada dentro da pasta `app/LayerDomain`
Contém todas as __entidades__, os __casos de uso__ e os __contratos de domínio__, não dependendo de nada que esteja fora desse próprio diretório, ou seja, todas as classes e interfaces utilizam apenas o PHP puro, sendo a camada de domínio o coração da aplicação.

## Camada Externa
Localizada dentro da pasta `app/LayerExternal`
É essa camada que depende da camada de domínio, nela ficam os __controladores__, classes que tem a responsabilidade de receber a requisição, decidir o que fazer (chamar porventura os casos de uso), e devolver a resposta ao cliente. Na camada também ficam os arquivos de visualização e qualquer outras classes que tenham ou não dependências externas (blibliotecas, api's de terceiros, etc.).

# Testes unitários da camada de domínio
comando para criar o link simbólico do phpunit
```console
ln -s ./vendor/bin/phpunit ./phpunit
```

comando para executar o teste
```
php phpunit tests/AlunoUseCaseTest.php
```
### Lista de Tarefas
- [ ] criação de um caso de uso para geração do uuid - lib ramsey/uuid
- [ ] injeta o uuid criado no caso de uso para a entidade