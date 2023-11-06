## CAC - Calculo das Atividades Complementares
Sistema de Calculo das Atividades Complementares
- Desenvolvido com CodeIgniter 4 :+1:

### Funcionalidades do sistema
- Cadastra alunos e atividades complementares
- Analisa as solicitações de atividades complementares
- Exibe relatórios de alunos e atividades complementares

### Requerimentos para execução do projeto

Apenas ter o Docker instalado,
todo o ambiente é configurado pelos arquivos:
- `Dockerfile`
- `docker-compose.yml`
- todos os arquivos do diretório e subdiretórios de `./docker`

### Comandos para executar com docker compose

- `docker volume create db-atvd-complement`
cria o volume para o banco de dados
- `docker volume ls`
lista os volumes criados
- `docker compose up -d`
constroi a o ambiente e sobe a aplicação com o banco de dados
- `docker exec -it app_atvd_complement /bin/bash`
abre o terminal do container
- `php spark migrate`
executa as migrações
- `php spark migrate:rollback`
desfaz as migrações
- `php spark db:seed RunSeeder`
semeia o banco de dados


### Coisas a fazer:

1ª Etapa
 [x] adicionar validação no formulário
 [X] exibir mensagens de feedback de cadastro, atualização e exclusão
 [X] personalização do sistema com temas
 [X] fazer o tratamento dos erros
 [X] mudar logo e favicon do sistema

2ª Etapa
 [X] fazer o CRUD de tipos de atividade
 [ ] Criar tela para inserção das atividades, novo botão na linha da lista de alunos
 [ ] Criar tela para analisar as solicitações, exibindo apenas as solicitações pendentes

3ª Etapa
 [ ] Criar uma tela para todos os relatórios de atividades completamentes
 [ ] Criar uma tela para todos os relatórios de alunos

4ª Etapa (atividades futuras)
 [ ] Fazer autenticação
 [ ] Documentar o uso do sistema


