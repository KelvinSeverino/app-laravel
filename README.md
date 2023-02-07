# App-Laravel

## ❓ Para que serve?
Este repositorio se trata de um projeto de web desenvolvido em laravel para aprendizado realizado pelo curso de Laravel 9 Gratuito da EspecializaTI.

## 💻 Pré-requisitos
Antes de começar, verifique se você atendeu aos seguintes requisitos:
* docker
* docker-compose
* npm

### 💻 Como executar

Baixar repositório
```sh
git clone https://github.com/KelvinSeverino/app-laravel.git
```

Acessar diretório do projeto
```sh
cd app-laravel/source/laravel/
```

Crie o arquivo .env
```sh
cp .env.example .env
```

Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:Q+AwjOPorLuxgtnfmAfHDYoKkTTXdCCtTtQEq+Zyi4g=
APP_DEBUG=true
APP_URL=http://localhost:8080

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=redis
FILESYSTEM_DISK=public
QUEUE_CONNECTION=sync
SESSION_DRIVER=redis
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

Iniciar os containers
```sh
docker-compose up -d
```

Acessar o container do projeto
```sh
docker-compose exec app bash
```

Executar comando composer para realizar download de arquivos necessários
```sh
composer update
```

Executar comando para gerar tabelas no banco
```sh
php artisan migrate --seed --seeder=UsersSeeder
```

Executar comando para gerar link da Storage/Public
```sh
php artisan storage:link
```

Sair do container
```sh
exit
```

Executar comando instalar dependencias do pacote Laravel/Breeze
```sh
npm install
```

Executar comando rodar scripts do arquivo package.json
```sh
npm run dev
```

Feito os processo acima, você poderá acessar o sistema pelo link em [http://localhost:8080/login](http://localhost:8080/login) com os dados:

* Login: kelvin@email.com
* Senha: 12345678
