# 📦 Projeto Laravel 8 (Legacy) — Dockerizado

Este repositório contém um **projeto legado em Laravel 8**, configurado para rodar via **Docker**, utilizando **PHP 8.0.x**, banco de dados MySQL e dependências Node.js.

Este README foi escrito para que **qualquer pessoa consiga subir, manter e operar o projeto** mesmo sem conhecimento prévio do ambiente.

---

## 🧱 Stack do Projeto

* PHP 8.0.x
* Laravel 8
* MySQL
* Node.js / NPM
* Docker + Docker Compose

---

## 🚀 Subindo o projeto (Primeira vez)

### 1️⃣ Subir os containers

```bash
docker compose up -d
```

### 2️⃣ Acessar o container da aplicação

```bash
docker compose exec app bash
```

### 3️⃣ Instalar dependências PHP

```bash
composer install
```

### 4️⃣ Copiar e configurar variáveis de ambiente

```bash
cp .env.example .env
```

> ⚠️ Atenção: no Docker, o banco **NÃO é localhost**

```env
DB_HOST=db
```

### 5️⃣ Gerar a key do Laravel

```bash
php artisan key:generate
```

### 6️⃣ Rodar migrations

```bash
php artisan migrate
```

---

## 🟢 Comandos Docker (Essenciais)

### Subir containers

```bash
docker compose up -d
```

### Parar containers

```bash
docker compose down
```

### Rebuildar containers

```bash
docker compose up -d --build
```

### Ver logs

```bash
docker compose logs -f
```

### Acessar o container da aplicação

```bash
docker compose exec app bash
```

### Executar comandos direto no container

```bash
docker compose exec app php artisan migrate
```

---

## 🧩 Comandos Laravel (Artisan)

### Migrations

```bash
php artisan migrate
php artisan migrate:rollback
php artisan migrate:fresh --seed
```

### Cache e otimização

```bash
php artisan config:clear
php artisan config:cache
php artisan route:clear
php artisan route:cache
php artisan view:clear
php artisan optimize
```

### Filas

```bash
php artisan queue:work
php artisan queue:restart
```

---

## 📦 Composer (Dependências PHP)

### Instalar dependências

```bash
composer install
```

### Atualizar dependências

```bash
composer update
```

### Dump autoload

```bash
composer dump-autoload
```

---

## 🎨 Node.js / Frontend

> Usado para assets (Laravel Mix / Vite, dependendo do projeto)

### Instalar dependências

```bash
npm install
```

### Build para desenvolvimento

```bash
npm run dev
```

### Build para produção

```bash
npm run build
```

---

## 🗄️ Banco de Dados

### Acessar MySQL via container

```bash
docker compose exec db mysql -u root -p
```

### Conectar via DBeaver

* **Host:** localhost
* **Port:** 3306
* **Usuário:** definido no `.env`
* **Senha:** definida no `.env`

Se ocorrer o erro:

> `Public Key Retrieval is not allowed`

Habilite a opção:

```
Allow Public Key Retrieval = true
```

Ou adicione nos parâmetros da conexão:

```
allowPublicKeyRetrieval=true
```

---

## 🛠️ Troubleshooting Comum

### ❌ Erro: `No such file or directory`

Causa comum:

* `DB_HOST=localhost`

Solução:

```env
DB_HOST=db
```

---

### ❌ Banco não conecta no Docker

Checklist:

* Containers estão rodando?
* DB_HOST está como `db`?
* Usuário e senha conferem?
* Porta correta?

---

## 📂 Estrutura Importante

* `docker-compose.yml` → Orquestra containers
* `.env` → Variáveis de ambiente
* `artisan` → CLI do Laravel
* `package.json` → Dependências Node.js
* `composer.json` → Dependências PHP

---

## 🧭 Fluxo Padrão de Trabalho

```text
1. docker compose up -d
2. docker compose exec app bash
3. composer install
4. npm install
5. php artisan migrate
6. npm run dev
```

---

## 🔒 Observações Finais

* Repositório **privado**
* Projeto legado (Laravel 8)
* Evite atualizar dependências sem validação
* Sempre documentar mudanças relevantes

---

📌 **Em caso de dúvidas, consulte este README antes de qualquer alteração.**
