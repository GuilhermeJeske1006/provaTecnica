
## Prova Técnica

### Clonando o repositório

```
git clone https://github.com/GuilhermeJeske1006/provaTecnica.git
```

### Configurando a API (backend)

#### Requisitos necessários

- **Sem Docker**
  - PHP instalado
  - Servidor Apache
  - Composer

- **Com Docker**
  - Docker instalado
  - Distribuição Linux em execução

#### Configuração sem Docker

1. Navegue até o diretório `provatecnica/api`:
   ```
   cd provatecnica/api
   ```

2. Instale as dependências do projeto com o Composer:
   ```
   composer install
   ```

3. Copie o arquivo de exemplo de configuração `.envexemplo` para `.env`.

4. Inicie o servidor Apache.

5. Crie um banco de dados usando o MySQL.

6. Execute as migrações do banco de dados:
   ```
   php artisan migrate
   ```

7. Inicie o servidor Laravel:
   ```
   php artisan serve --port=80
   ```

#### Configuração com Docker

1. Navegue até o diretório raiz do projeto:
   ```
   cd provaTecnica
   ```

2. Execute o seguinte comando para instalar as dependências do pacote usando o Docker:
   ```bash
   docker run --rm \
       -u "$(id -u):$(id -g)" \
       -v "$(pwd)/api:/var/www/html" \
       -w /var/www/html \
       laravelsail/php82-composer:latest \
       composer install --ignore-platform-reqs
   ```

3. Inicie o container Docker:
   ```bash
   ./vendor/bin/sail up
   ```

#### Configuração do Arquivo .env

Copie o conteúdo do arquivo `.env` fornecido abaixo e substitua as variáveis relevantes, se necessário:

```plaintext
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:v3hqIaFthqNSUUFStz2wGmcUGQszR6bij/PqsaBnhpU=
APP_DEBUG=true
APP_URL=http://localhost

...

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=example_app
DB_USERNAME=sail
DB_PASSWORD=password

...

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

...

```

#### Configurando o Frontend

##### Requisitos necessários

- Node.js

1. Navegue até o diretório `provaTecnica/front-end`:
   ```
   cd provaTecnica/front-end
   ```

2. Instale as dependências do projeto com npm ou yarn:
   ```
   npm install
   ```
   ou
   ```
   yarn install
   ```

3. Execute o projeto em modo de desenvolvimento:
   ```
   npm run serve
   ```

##### Com Docker

1. Navegue até o diretório raiz do projeto:
   ```
   cd provaTecnica
   ```

2. Execute o seguinte comando para fazer o build do container docker:
   ```
   docker build -t frontend .
   ```
3. Execute o seguinte comando para rodar o docker:

   ```
   docker run -it -p 8080:8080 --rm --name vuejs-app-1 frontend
   ```

Agora você poderá acessar o projeto no seguinte link
 ```
http://localhost:8080/
 ```
