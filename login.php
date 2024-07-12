<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <style>
        :root {
            --bg-color: #f4f4f4;
            --text-color: #333;
            --header-bg-color: #4CAF50;
            --header-text-color: white;
            --form-bg-color: white;
        }
        .dark-mode {
            --bg-color: #333;
            --text-color: #f4f4f4;
            --header-bg-color: #222;
            --header-text-color: #f4f4f4;
            --form-bg-color: #444;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--bg-color);
            color: var(--text-color);
        }
        header {
            background-color: var(--header-bg-color);
            color: var(--header-text-color);
            padding: 10px 0;
            text-align: center;
            position: relative;
        }
        header img.logo {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            height: 60px;
        }
        .theme-toggle {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            width: 30px;
        }
        .login-container {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            background-color: var(--form-bg-color);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s;
        }
        .login-container h2 {
            text-align: center;
        }
        .login-container form {
            display: flex;
            flex-direction: column;
        }
        .login-container input {
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .login-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            text-align: center;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
    <script>
        function toggleTheme() {
            const body = document.body;
            const themeToggle = document.getElementById('theme-toggle');
            if (body.classList.toggle('dark-mode')) {
                themeToggle.src = 'light-mode-icon.png';
                localStorage.setItem('theme', 'dark');
            } else {
                themeToggle.src = 'dark-mode-icon.png';
                localStorage.setItem('theme', 'light');
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme') || 'light';
            if (savedTheme === 'dark') {
                document.body.classList.add('dark-mode');
                document.getElementById('theme-toggle').src = 'light-mode-icon.png';
            } else {
                document.getElementById('theme-toggle').src = 'dark-mode-icon.png';
            }
        });
    </script>
</head>
<body>
    <header>
        <img src="logo.png" alt="LiputanBumi Logo" class="logo">
        <h1>Login Admin</h1>
        <img src="dark-mode-icon.png" id="theme-toggle" class="theme-toggle" onclick="toggleTheme()">
    </header>
    <div class="login-container">
        <h2>Login</h2>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">' . htmlspecialchars($_GET['error']) . '</p>';
        }
        ?>
        <form action="process_login.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
