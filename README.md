# User Management System (Pure PHP)

This project implements a simple user management system (CRUD) using **pure PHP**, without frameworks or relational databases.  
Data persistence is handled through a **JSON file**.

---

##  Project Structure

```
user-management/
 index.php              # Modern frontend
 Main.php               # API / action router
 controllers/
    UsersController.php
 models/
    Users.php
 database/
    users.json         # Simulated "database"
 assets/
    css/style.css      # Frontend styles
 js/app.js          # Frontend scripts
    README.md
```

---

## How to Run

1. Install Xampp with  **PHP >= 8.0.30** installed.

2. Clone the repository in htdocs folder (Xampp):

   git clone https://github.com/Filipe4010/user-management

3. Start a local server with **XAMPP** (or any other PHP server).

4. Open the system in your browser: http://localhost/user-management/

---

## Features

1. **Add User**  
   - Name + Email (unique email validation)

2. **Edit User**  
   - Update name or email (ensures email uniqueness)

3. **Delete User**  
   - Physical removal (direct deletion from JSON file)

4. **List Users**  
   - Interactive table view in the frontend

---

## Requirements 

1. Pure PHP (no frameworks)  
2. Data persistence using only `users.json`  
3. Manual CRUD implementation  
4. Layered structure (simplified MVC)  

---
