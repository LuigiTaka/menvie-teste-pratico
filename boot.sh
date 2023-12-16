#!/usr/bin/env bash
#instala dependencias
composer install

FILE=./.env
#se o arquivo de  ambiente não existir copia o arquivo de exemplo
if ! test -f "$FILE"; then
    cp .env.example .env
fi

#remove caracteres de nova linha que quebram o comando "source .env"
#Monta imagem do container do banco de dados e executa
sed -i 's/\r$//' .env && source .env && docker compose build && docker compose up -d
#roda as migrações
php artisan migrate

#instala dependencias
npm install && npm run build
#popula o banco de dados
php artisan db:seed --class=PessoaSeeder

