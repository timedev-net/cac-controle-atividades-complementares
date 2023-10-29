## CAC - Calculo das Atividades Complementares
Sistema de Calculo das Atividades Complementares
- Desenvolvido com CodeIgniter 4 :+1:

### Funcionalidades do sistema
- Cadastra alunos e atividades complementares
- Analisa as solicitações de atividades complementares
- Exibe relatórios de alunos e atividades complementares

### Requerimentos para execução do projeto

Apenas ter o Docker instalado
todo o ambiente é configurado pelos arquivos:
- Dockerfile
- docker-compose.yml
- todos os arquivos do diretório e subdiretórios de "./docker"

### Comandos para executar com docker compose

- `docker volume create db-atvd-complement`
> cria o volume para o banco de dados
- `docker volume ls`
> lista os volumes criados
- `docker compose up -d`
> constroi a o ambiente e sobe a aplicação com o banco de dados
- `docker exec -it app_atvd_complement /bin/bash`
> abre o terminal do container
- `php spark migrate`
> executa as migrações
- `php spark migrate:rollback`
> desfaz as migrações
- `php spark db:seed RunSeeder`
> semeia o banco de dados
