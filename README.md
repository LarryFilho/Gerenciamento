
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
php artisan migrate
npm install
npm run dev
```
### Como criar tela de login no Laravel (ATENÇÃO LER DESCERIÇÃO DOS VIDEOS):

- Criação login sem node: [https://youtu.be/V2s2toQNMG0](https://youtu.be/V2s2toQNMG0)
- Criação login com node: [https://youtu.be/UhOYeYoK3Bc](https://youtu.be/UhOYeYoK3Bc)
