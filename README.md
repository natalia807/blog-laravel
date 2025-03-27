# Nome do Projeto

Blog feito para estudos.

## Tecnologias Utilizadas

* Laravel 10
* PHP 8.1
* MySQL
* Tailwind CSS

## Pré-requisitos

* PHP 8.1+
* Composer
* MySQL
* Node.js e npm

## Instalação

1.  Clone o repositório 
2.  Navegue até o diretório: 
3.  Instale as dependências: `composer install`
4.  Copie o `.env.example`: `cp .env.example .env`
5.  Gere a chave: `php artisan key:generate`

## Configuração do Banco de Dados

1.  Crie um banco de dados no MySQL.
2.  Configure o `.env`.
3.  Execute as migrações: `php artisan migrate`

## Execução

1.  Inicie o servidor: `php artisan serve`
2.  Acesse: `http://127.0.0.1:8000`

## Funcionalidades

* Criação de posts
* Comentários
* Busca
