# API para gerenciamento de usuários
![status](https://img.shields.io/badge/status-Em%20desenvolvimento-red)


# Descrição

API desenvolvida para um projeto de gerência de usuários

# Tecnologias utilizadas
- PHP v8.2
- Laravel v11.9
- Mysql v8.0
- Nginx v1.27

# Instalação via Docker Compose

Clonar repositório:

    git clone https://github.com/jdorres/user-management-api

Acessar projeto

    cd user-management-api/


Duplicar o .env
    
    cp .env.example .env

Faça o build do projeto

    docker compose build --no-cache

Inicie o container

    docker compose up -d

Acesse o container criado

    docker compose exec -it user_management_api bash

Dentro do container execute os comandos de instalação.

    composer install
    php artisan migrate:install
    php artisan migrate
    php artisan db:seed
    php artisan jwt:secret

Conceder permissões aos arquivos
    
    chmod 777 -R storage/framework 
    chmod 777 -R storage/logs
    chmod 777 -R storage/app
    chmod 777 -R bootstrap/cache

# Instruções de uso

Ainda dentro do container executar comando para gerar um usuário Admin do sistema

    php artisan app:create-admin-user  Admin 83959633009 admin@teste.com.br +5551999999999 qwe123
    

Importar collection e o enviroment no Postman

Logar pelo endpoint **Login**, utilizando o e-mail e senha criado

    admin@teste.com.br
    qwe123

Copie o token gerado e cole na variável **token** no ambiente importado no postman

O usuário **admin** tem acesso a todos os endpoints, porém, os usuários criados por ele recebem a permissão **user** que permite somente ver e listar outros usuários.

Os campos de endereço são cadastrados em um endpoint separado. É cadastrado um endereço diferente por requisição para ser utilizado como registro de endereços.

# Autor
Julio Dorres

https://www.linkedin.com/in/julio-d-moreira