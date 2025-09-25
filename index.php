<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Management System</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <h1>User Management</h1>
    <button id="addUserBtn">Adicionar Usuário</button>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="usersTable"></tbody>
    </table>
</div>

<!-- Modal -->
<div id="userModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2 id="modalTitle">Adicionar Usuário</h2>
        <form id="userForm">
            <input type="hidden" id="userId">
            <input type="text" id="name" placeholder="Nome" required>
            <input type="email" id="email" placeholder="Email" required>
            <button type="submit">Salvar</button>
        </form>
    </div>
</div>

<script src="assets/js/app.js"></script>
</body>
</html>
