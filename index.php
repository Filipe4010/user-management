<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <h1>User Management</h1>
        <button id="addUserBtn">Add User</button>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="usersTable"></tbody>
        </table>
    </div>

    <!-- Modal -->
    <div id="userModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="modalTitle">Add User</h2>
            <form id="userForm">
                <input type="hidden" id="userId">
                <input type="text" id="name" placeholder="Name" required>
                <input type="email" id="email" placeholder="Email" required>
                <div id="formError" class="form-error"></div>
                <button type="submit">Save</button>
            </form>
        </div>
    </div>

    <script src="assets/js/app.js"></script>
</body>

</html>