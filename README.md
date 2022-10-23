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
cd app-laravel
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

Executar comando rodar scripts do arquivo package.json
```sh
npm run dev
```

Feito os processo acima, você poderá acessar o sistema pelo link em [http://localhost:8080/login](http://localhost:8080/login) com os dados:

* Login: kelvin@email.com
* Senha: 12345678