document.addEventListener('DOMContentLoaded', () => {
    const usersTable = document.getElementById('usersTable');
    const modal = document.getElementById('userModal');
    const closeModal = document.querySelector('.close');
    const addUserBtn = document.getElementById('addUserBtn');
    const userForm = document.getElementById('userForm');
    const userIdInput = document.getElementById('userId');
    const modalTitle = document.getElementById('modalTitle');

    const fetchUsers = async () => {
        const res = await fetch('Main.php?action=list');
        const users = await res.json();
        usersTable.innerHTML = '';
        users.forEach(u => {
            usersTable.innerHTML += `<tr>
                <td>${u.id}</td>
                <td>${u.name}</td>
                <td>${u.email}</td>
                <td>
                    <button onclick="editUser(${u.id}, '${u.name}', '${u.email}')">Edit</button>
                    <button onclick="deleteUser(${u.id})">Delete</button>
                </td>
            </tr>`;
        });
    };

    addUserBtn.onclick = () => {
        modal.style.display = 'flex';
        modalTitle.textContent = 'Add User';
        userForm.reset();
        userIdInput.value = '';
    };

    closeModal.onclick = () => modal.style.display = 'none';
    window.onclick = e => { if (e.target === modal) modal.style.display = 'none'; };

    userForm.addEventListener('submit', async e => {
        e.preventDefault();
        const id = userIdInput.value;
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const action = id ? 'update' : 'create';
        const res = await fetch(`Main.php?action=${action}`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `id=${id}&name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}`
        });
        const data = await res.json();
        if (data.success) {
            modal.style.display = 'none';
            fetchUsers();
        } else {
            alert('Error: Email already exists!');
        }
    });

    window.editUser = (id, name, email) => {
        modal.style.display = 'flex';
        modalTitle.textContent = 'Edit User';
        userIdInput.value = id;
        document.getElementById('name').value = name;
        document.getElementById('email').value = email;
    };

    window.deleteUser = async (id) => {
        if (confirm('Are you sure you want to delete this user?')) {
            const res = await fetch('Main.php?action=delete', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `id=${id}`
            });
            const data = await res.json();
            if (data.success) fetchUsers();
        }
    };

    fetchUsers();
});
