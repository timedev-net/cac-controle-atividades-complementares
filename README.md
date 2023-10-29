# Sistema de Calculo das Atividades Complementares
Desenvolvido com CodeIgniter 4

## Comandos para executar com docker compose

docker volume create db-atvd-complement --> cria o volume para o banco de dados
docker volume ls --> lista os volumes criados
docker compose up -d --> constroi a o ambiente e sobe a aplicação com o banco de dados
docker exec -it app_atvd_complement /bin/bash --> abre o terminal do container
php spark migrate --> executa as migrações
php spark migrate:rollback --> desfaz as migrações
php spark db:seed RunSeeder --> semeia o banco de dados

## Requerimentos

Apenas ter o Docker instalado
todo o ambiente é configurado pelos arquivos:
- Dockerfile
- docker-compose.yml
- todos os arquivos do diretório e subdiretórios de "./docker"