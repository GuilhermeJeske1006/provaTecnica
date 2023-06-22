
## Prova Técnica

### Clonando o repositório

```
git clone https://github.com/GuilhermeJeske1006/provaTecnica.git
```

### Configurando a API (backend)

#### Requisitos necessários

- PHP instalado
- Servidor Apache
- Composer

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

### Configurando o Frontend

#### Sem Docker

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
   npm run dev
   ```

#### Com Docker

1. Execute o seguinte comando para iniciar o servidor de desenvolvimento do frontend:
   ```
   npm run serve
   ```
   ou
   ```
   npm run dev
   ```

Isso iniciará a API backend e o frontend, permitindo que você acesse o projeto através do navegador. Certifique-se de ter os requisitos necessários instalados antes de prosseguir com as etapas de configuração.
