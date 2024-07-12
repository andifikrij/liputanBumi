<?php
include 'db.php';

if (!isset($_GET['id'])) {
    die('Artikel tidak ditemukan.');
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM articles WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die('Artikel tidak ditemukan.');
}

$article = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($article['title']); ?></title>
    <style>
        :root {
            --bg-color: #f4f4f4;
            --text-color: #333;
            --header-bg-color: #4CAF50;
            --header-text-color: white;
            --footer-bg-color: #333;
            --footer-text-color: white;
            --button-bg-color: #4CAF50;
            --button-text-color: white;
            --button-hover-bg-color: #45a049;
        }

        .dark-mode {
            --bg-color: #333;
            --text-color: #f4f4f4;
            --header-bg-color: #111;
            --header-text-color: #f4f4f4;
            --footer-bg-color: #111;
            --footer-text-color: #f4f4f4;
            --button-bg-color: #555;
            --button-text-color: #f4f4f4;
            --button-hover-bg-color: #666;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--bg-color);
            color: var(--text-color);
            animation: fadeIn 1s ease-in-out;
        }

        header {
            background-color: var(--header-bg-color);
            color: var(--header-text-color);
            padding: 10px 0;
            text-align: center;
            animation: slideInFromTop 0.5s ease-in-out;
            position: relative;
        }

        .theme-toggle {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            width: 30px;
            height: auto;
        }

        .date-info {
            position: absolute;
            right: 20px;
            top: 10px;
            color: var(--header-text-color);
            font-size: 12px;
            font-style: italic;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            background: var(--bg-color);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            max-height: 80vh;
            overflow-y: auto;
            animation: slideInFromBottom 0.5s ease-in-out;
            background-color: var(--bg-color);
            color: var(--text-color);
        }

        img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 20px;
            animation: fadeIn 2s ease-in-out;
        }

        h1 {
            margin-top: 0;
            margin-bottom: 10px;
            padding-top: 20px;
        }

        p {
            line-height: 1.6;
            animation: fadeIn 2s ease-in-out;
        }

        .footer {
            background-color: var(--footer-bg-color);
            color: var(--footer-text-color);
            text-align: center;
            padding: 10px 0;
            position: relative;
            width: 100%;
            margin-top: 20px;
            animation: slideInFromBottom 0.5s ease-in-out;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: var(--button-bg-color);
            color: var(--button-text-color);
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
            animation: fadeIn 2s ease-in-out;
        }

        .back-button:hover {
            background-color: var(--button-hover-bg-color);
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideInFromTop {
            from { transform: translateY(-100%); }
            to { transform: translateY(0); }
        }

        @keyframes slideInFromBottom {
            from { transform: translateY(100%); }
            to { transform: translateY(0); }
        }
    </style>
    <script>
        function toggleTheme() {
            const body = document.body;
            const themeToggle = document.getElementById('themeToggle');
            if (body.classList.toggle('dark-mode')) {
                themeToggle.src = 'light-mode-icon.png';
                localStorage.setItem('theme', 'dark');
            } else {
                themeToggle.src = 'dark-mode-icon.png';
                localStorage.setItem('theme', 'light');
            }
        }

        function updateDateTime() {
            const dateTimeElement = document.getElementById('dateTime');
            const now = new Date();
            const days = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
            const day = days[now.getDay()];
            const date = now.toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' });
            const time = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
            dateTimeElement.textContent = `${day}, ${date} ${time}`;
        }

        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme') || 'light';
            if (savedTheme === 'dark') {
                document.body.classList.add('dark-mode');
                document.getElementById('themeToggle').src = 'light-mode-icon.png';
            } else {
                document.getElementById('themeToggle').src = 'dark-mode-icon.png';
            }
            setInterval(updateDateTime, 1000);
        });

        function goBack() {
            window.history.back();
        }
    </script>
</head>
<body>
    <header>
        <span class="date-info" id="dateTime"></span>
        <h1><?php echo htmlspecialchars($article['title']); ?></h1>
        <img src="dark-mode-icon.png" class="theme-toggle" id="themeToggle" alt="Toggle Theme" title="Toggle Theme" onclick="toggleTheme()">
    </header>
    <div class="container">
        <a href="javascript:goBack();" class="back-button">Kembali</a>
        <?php
        if (!empty($article["image"])) {
            echo "<img src='" . htmlspecialchars($article["image"]) . "' alt='" . htmlspecialchars($article["title"]) . "'>";
        }
        echo "<p><i>Ditulis oleh: " . htmlspecialchars($article["author"]) . " pada " . htmlspecialchars($article["published_date"]) . "</i></p>";
        echo "<p>" . nl2br(htmlspecialchars($article["content"])) . "</p>";
        ?>
    </div>
    <div class="footer">
        <p>&copy; 2024 LiputanBumi. All rights reserved.</p>
    </div>
</body>
</html>
