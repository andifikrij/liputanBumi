<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM articles WHERE id='$id'";
$result = $conn->query($sql);
$article = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $image = mysqli_real_escape_string($conn, $_POST['image']);

    $sql = "UPDATE articles SET title='$title', content='$content', author='$author', category='$category', image='$image' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: index_admin.php');
        exit; // Pastikan untuk menghentikan eksekusi script setelah redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel - LiputanBumi</title>
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
        .datetime {
            position: absolute;
            right: 60px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--header-text-color);
        }
        .theme-toggle {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            width: 30px; /* ukuran gambar yang disesuaikan */
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        .form-container {
            background: var(--article-bg-color);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 70px; /* Add margin-bottom to avoid footer overlap */
            
        }
        .form-container h2 {
            margin-top: 0;
        }
        .form-container form {
            display: flex;
            flex-direction: column;
        }
        .form-container label {
            margin: 10px 0 5px;
        }
        .form-container input[type="text"], .form-container textarea {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }
        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
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
    </style>
</head>
<body>
    <header>
        <img src="logo.png" alt="LiputanBumi Logo" class="logo">
        <h1><span class="highlight-liputan">Liputan</span><span class="highlight-bumi">Bumi</span></h1>
        <div class="datetime" id="datetime"></div>
        <img src="dark-mode-icon.png" id="theme-toggle" class="theme-toggle" onclick="toggleTheme()">
        <a href="index.php" class="admin-logout">Logout Admin</a>
    </header>
    <nav>
        <a href="index_admin.php?category=Utama">Utama</a>
        <a href="index_admin.php?category=Olahraga">Olahraga</a>
        <a href="index_admin.php?category=Teknologi">Teknologi</a>
        <a href="index_admin.php?category=Makanan">Makanan</a>
        <a href="index_admin.php?category=Bumi">Bumi</a>
    </nav>
    <div class="container">
        <div class="form-container">
            <h2>Edit Artikel</h2>
            <form method="post" action="edit.php?id=<?php echo htmlspecialchars($id); ?>">
                <label for="title">Judul</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($article['title']); ?>" required>
                <label for="content">Konten</label>
                <textarea id="content" name="content" rows="10" required><?php echo htmlspecialchars($article['content']); ?></textarea>
                <label for="author">Penulis</label>
                <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($article['author']); ?>" required>
                <label for="category">Kategori</label>
                <input type="text" id="category" name="category" value="<?php echo htmlspecialchars($article['category']); ?>" required>
                <label for="image">Gambar (URL)</label>
                <input type="text" id="image" name="image" value="<?php echo htmlspecialchars($article['image']); ?>">
                <input type="submit" value="Update Artikel">
            </form>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2024 LiputanBumi. All rights reserved.</p>
    </div>
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
            dateTimeElement.textContent = `${day}, ${date} ${time}`;
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
        });
    </script>
</body>
</html>
