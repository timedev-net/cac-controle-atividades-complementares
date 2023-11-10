# CAC - Cálculo de Atividades Complementares

## Tecnologias usadas no projeto:

### Linguagens
- PHP 8.2.12
- JavaScript ES-2021
- Plpgsql
### Framework
- CodeIgniter 4
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

1. `docker volume create db-atvd-complement` cria o volume para o banco de dados
2. `docker volume ls` verifica o volume criado
3. `docker compose up -d` constroi todo o ambiente e sobe a aplicação com o banco de dados
4. `docker exec -it app_atvd_complement /bin/bash` entra no terminal do container para executar as migrations e seeders
5. `php spark migrate` executa as migrações de dentro do container
6. `php spark db:seed RunSeeder` semeia o banco de dados
### Outros comandos úteis
- `php spark migrate:status` exibe o status das migrações
- `php spark migrate:rollback` desfaz as migrações
- `php spark migrate:refresh` desfaz e executa novamente as migrações

## Diagrama Entidade Relacionamento - modelo físico
<img src="/public/assets/MER.png" alt="DER">

## O sistema apresenta tema claro e escuro

### Light
<img src="/public/assets/temaLight.png" alt="temaLight">

### Dark
<img src="/public/assets/temaDark.png" alt="temaDark">

### Coisas a fazer:

1ª Etapa
- [x] adicionar validação no formulário
- [x] exibir mensagens de feedback de cadastro, atualização e exclusão
- [x] personalização do sistema com temas
- [x] fazer o tratamento dos erros
- [x] mudar logo e favicon do sistema

2ª Etapa
- [x] fazer o CRUD de tipos de atividade
- [x] Criar tela para inserção das atividades, novo botão na linha da lista de alunos
- [x] Criar tela para analisar as solicitações

3ª Etapa
- [x] Criar uma tela para os relatórios de atividades completamentes
- [x] Criar uma tela para os relatórios de alunos
- [x] Criar trigger para registro de logs de auditoria no banco

4ª Etapa (atividades futuras)
- [ ] Fazer autenticação
- [ ] Documentar o uso do sistema

## Tunelamento do WSL

https://theboroer.github.io/localtunnel-www/
https://github.com/localtunnel/localtunnel

- `lt --port 80`


# Refatorando para Arquitetura Limpa

- [ ] criação de um caso de uso para geração do uuid - lib ramsey/uuid
- [ ] injeta o uuid criado no caso de uso para a entidade

## Camada de Domínio
Não depende de nada externo, nada de infra (framework, libs, banco de dados, serviços externos, etc.)

## Camada de Infra
Depende da camada de domínio e itens externos