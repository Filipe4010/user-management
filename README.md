# User Management System (PHP puro)

Este projeto implementa um sistema simples de gerenciamento de usuários (CRUD) em PHP puro, sem frameworks e sem banco de dados relacional, utilizando apenas um arquivo JSON como persistência de dados.

## ?? Estrutura

user-management/
??? index.php # Frontend moderno
??? Main.php # API / router de ações
??? controllers/
? ??? UsersController.php
??? models/
? ??? Users.php
??? database/
? ??? users.json # "Banco de dados" simulado
??? assets/
? ??? css/style.css # Estilos do frontend
? ??? js/app.js # Scripts do frontend
??? README.md

## ?? Como executar

1. Clone o repositório ou extraia o zip: git clone https://github.com/seu-usuario/user-management.git

2. Certifique-se de ter o PHP >= 8.0.30 instalado.

3. Suba um servidor local com xampp 

4. Acesse no navegador: http://localhost:8000/index.php

## ?? Funcionalidades

1. Adicionar Usuário

Nome + Email (verificação de email único)

2. Editar Usuário

Atualização de nome ou email (email único garantido)

3. Excluir Usuário

Exclusão física (remoção direta do arquivo JSON)

4. Listar Usuários

Exibe todos em uma tabela interativa no frontend

## ?? Restrições atendidas

1. PHP puro, sem frameworks

2. Persistência apenas em users.json

3. CRUD implementado manualmente

4. Estrutura em camadas (MVC simplificado)