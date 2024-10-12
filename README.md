
# Laravel Template

### Passo a passo
Clone Repositório criado a partir do template, entre na pasta e execute os comandos abaixo:

Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=Laravel
APP_URL=http://localhost:8080

DB_PASSWORD=root
```

Suba os containers do projeto
```sh
docker compose up -d
```

Acessar o container
```sh
docker compose exec app bash
```

Instalar as dependências do projeto
```sh
composer install
```

Gerar a key do projeto Laravel
```sh
php artisan key:generate
```

Instalar o Breeze
```sh
composer require laravel/breeze --dev

php artisan breeze:install
```

Instalar o Spatie
```sh
composer require spatie/laravel-permission

php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```

Arrumar Banco de Dados
```sh
php artisan optimize:clear

php artisan config:clear
```

Inicializar os Seeders
```sh
php artisan migrate

php artisan migrate:fresh --seed --seeder=DatabaseSeeder
```

Rodar o npm
```sh
npm install
npm run dev
```
