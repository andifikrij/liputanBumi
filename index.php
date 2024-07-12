<?php
include 'db.php';

// Ambil data berita utama dari database
$sql_main = "SELECT * FROM articles WHERE category='Utama' ORDER BY published_date DESC LIMIT 1";
$result_main = $conn->query($sql_main);
$main_article = $result_main ? $result_main->fetch_assoc() : null;

// Ambil data berita dari kategori tertentu
$category = isset($_GET['category']) ? $_GET['category'] : 'Utama';
$sql = $conn->prepare("SELECT * FROM articles WHERE category=? ORDER BY published_date DESC");
$sql->bind_param("s", $category);
$sql->execute();
$result = $sql->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LiputanBumi - Berita Terkini</title>
    <style>
        :root {
            --bg-color: #f4f4f4;
            --text-color: #333;
            --header-bg-color: #4CAF50;
            --header-text-color: white;
            --article-bg-color: white;
            --ticker-bg-color: #111;
            --ticker-text-color: yellow;
        }
        .dark-mode {
            --bg-color: #333;
            --text-color: #f4f4f4;
            --header-bg-color: #222;
            --header-text-color: #f4f4f4;
            --article-bg-color: #444;
            --ticker-bg-color: #555;
            --ticker-text-color: #ff0;
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
            height: 60px; /* Adjusted height */
        }
        nav {
            display: flex;
            justify-content: center;
            background-color: #333;
            margin-bottom: 20px;
        }
        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }
        nav a:hover {
            background-color: #ddd;
            color: black;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        .main-article, .articles {
            background: var(--article-bg-color);
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .main-article img, .articles img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .main-article h2, .articles h2 {
            margin-top: 0;
        }
        .main-article p, .articles p {
            line-height: 1.6;
        }
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .article-preview {
            margin-bottom: 20px;
        }
        .article-preview img {
            float: left;
            margin-right: 20px;
            max-width: 150px;
        }
        .article-preview::after {
            content: "";
            display: table;
            clear: both;
        }
        .article-preview h3 {
            margin: 0 0 10px 0;
        }
        .article-preview p {
            margin: 0;
        }
        .read-more {
            display: block;
            margin-top: 10px;
            color: #4CAF50;
            text-decoration: none;
        }
        .read-more:hover {
            color: #45a049;
        }
        .theme-toggle {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            width: 30px; /* ukuran gambar yang disesuaikan */
        }
        .admin-login {
            position: absolute;
            right: 20px;
            top: 160%; /* Adjusted position to be below theme toggle */
            transform: translateY(-50%);
            cursor: pointer;
            color: orangered;
            /* color: var(--header-text-color); */
            text-decoration: none;
            font-weight: bold;
            z-index: 1000; /* Tambahkan z-index tinggi */
        }
        .admin-login:hover {
            text-decoration: underline;
        }
        .datetime {
            position: absolute;
            right: 60px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--header-text-color);
        }

        .highlight-liputan {
            color: blue;
        }

        .highlight-bumi {
            color: red;
        }

        .ticker {
            background-color: var(--ticker-bg-color);
            color: var(--ticker-text-color);
            padding: 10px 0;
            position: relative;
            overflow: hidden;
            white-space: nowrap;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .ticker span {
            display: inline-block;
            padding-left: 100%;
            animation: ticker 20s linear infinite;
        }

        @keyframes ticker {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
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
            const themeToggle = document.getElementById('theme-toggle');
            if (body.classList.toggle('dark-mode')) {
                themeToggle.src = 'light-mode-icon.png';
                localStorage.setItem('theme', 'dark');
            } else {
                themeToggle.src = 'dark-mode-icon.png';
                localStorage.setItem('theme', 'light');
            }
        }

        function updateDateTime() {
            const dateTimeElement = document.getElementById('datetime');
            const now = new Date();
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const day = days[now.getDay()];
            const date = now.toLocaleDateString('id-ID');
            const time = now.toLocaleTimeString('id-ID');
            dateTimeElement.textContent = `${day} ${date} ${time}`;
        }

        function getRandomMessages(messages, count) {
            const shuffled = messages.sort(() => 0.5 - Math.random());
            return shuffled.slice(0, count);
        }

        function updateTicker() {
            const messages = [
                'Breaking News: Hari ini cuaca cerah di sebagian besar wilayah Indonesia. Stay tuned for more updates...',
                'Pesan kedua untuk teks berjalan.',
                'Pesan ketiga untuk teks berjalan.',
                'Pesan keempat untuk teks berjalan.',
                'Pesan kelima untuk teks berjalan.'
            ];
            const selectedMessages = getRandomMessages(messages, 2).join(' | ');
            document.getElementById('tickerText').textContent = selectedMessages;
        }

        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme') || 'light';
            if (savedTheme === 'dark') {
                document.body.classList.add('dark-mode');
                document.getElementById('theme-toggle').src = 'light-mode-icon.png';
            } else {
                document.getElementById('theme-toggle').src = 'dark-mode-icon.png';
            }
            setInterval(updateDateTime, 1000);
            updateTicker();
            setInterval(updateTicker, 20000); // Update ticker every 20 seconds
        });
    </script>
</head>
<body>
    <header>
        <img src="logo.png" alt="LiputanBumi Logo" class="logo">
        <h1><span class="highlight-liputan">Liputan</span><span class="highlight-bumi">Bumi</span></h1>
        <div id="datetime" class="datetime"></div>
        <img src="dark-mode-icon.png" id="theme-toggle" class="theme-toggle" onclick="toggleTheme()">
        <a href="login.php" class="admin-login">Login Admin</a>
    </header>
    <div class="ticker">
        <span id="tickerText"></span>
    </div>
    <nav>
        <a href="index.php?category=Utama">Utama</a>
        <a href="index.php?category=Olahraga">Olahraga</a>
        <a href="index.php?category=Teknologi">Teknologi</a>
        <a href="index.php?category=Makanan">Makanan</a>
        <a href="index.php?category=Bumi">Bumi</a>
    </nav>
    <div class="container">
        <div class="main-article">
            <h2>Berita Utama</h2>
            <?php
            if ($main_article) {
                echo "<h2>" . htmlspecialchars($main_article["title"]) . "</h2>";
                if (!empty($main_article["image"])) {
                    echo "<img src='" . htmlspecialchars($main_article["image"]) . "' alt='" . htmlspecialchars($main_article["title"]) . "'>";
                }
                echo "<p>" . nl2br(htmlspecialchars($main_article["content"])) . "</p>";
                echo "<p><i>Ditulis oleh: " . htmlspecialchars($main_article["author"]) . " pada " . htmlspecialchars($main_article["published_date"]) . "</i></p>";
            } else {
                echo "<p>Tidak ada berita utama.</p>";
            }
            ?>
        </div>

        <div class="articles">
            <h2>Berita Kategori: <?php echo htmlspecialchars($category); ?></h2>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='article-preview'>";
                    if (!empty($row["image"])) {
                        echo "<img src='" . htmlspecialchars($row["image"]) . "' alt='" . htmlspecialchars($row["title"]) . "'>";
                    }
                    echo "<h3><a href='article.php?id=" . htmlspecialchars($row["id"]) . "'>" . htmlspecialchars($row["title"]) . "</a></h3>";
                    echo "<p>" . nl2br(htmlspecialchars(substr($row["content"], 0, 150))) . "...</p>";
                    echo "<a class='read-more' href='article.php?id=" . htmlspecialchars($row["id"]) . "'>Baca Selengkapnya</a>";
                    echo "<p><i>Ditulis oleh: " . htmlspecialchars($row["author"]) . " pada " . htmlspecialchars($row["published_date"]) . "</i></p>";
                    echo "</div>";
                }
            } else {
                echo "<p>Tidak ada artikel di kategori ini.</p>";
            }
            $conn->close();
            ?>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 LiputanBumi. All rights reserved.</p>
    </div>
</body>
</html>
