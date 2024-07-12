<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel</title>
    <style>
        :root {
            --bg-color: #f4f4f4;
            --text-color: #333;
            --header-bg-color: #4CAF50;
            --header-text-color: white;
            --footer-bg-color: #333;
            --footer-text-color: white;
            --input-bg-color: white;
            --input-text-color: #333;
            --button-bg-color: #4CAF50;
            --button-text-color: white;
            --popup-bg-color: rgba(0, 0, 0, 0.8);
            --popup-text-color: white;
            --popup-btn-bg-color: #4CAF50;
            --popup-btn-text-color: white;
        }

        .dark-mode {
            --bg-color: #333;
            --text-color: #f4f4f4;
            --header-bg-color: #111;
            --header-text-color: #f4f4f4;
            --footer-bg-color: #111;
            --footer-text-color: #f4f4f4;
            --input-bg-color: #555;
            --input-text-color: #f4f4f4;
            --button-bg-color: #111;
            --button-text-color: #f4f4f4;
            --popup-bg-color: rgba(255, 255, 255, 0.8);
            --popup-text-color: #333;
            --popup-btn-bg-color: #111;
            --popup-btn-text-color: #f4f4f4;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            padding: 0;
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
            height: 40px; /* Adjust the height as needed */
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: var(--input-bg-color);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
        }
        input, textarea, select {
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: var(--input-bg-color);
            color: var(--input-text-color);
        }
        button {
            margin-top: 20px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: var(--button-bg-color);
            color: var(--button-text-color);
            cursor: pointer;
        }
        .theme-toggle {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            width: 30px;
        }
        .datetime {
            position: absolute;
            right: 60px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--header-text-color);
        }

        /* Popup Styles */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: var(--popup-bg-color);
            color: var(--popup-text-color);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
            animation: fadeIn 0.5s ease-in-out;
        }
        .popup.show {
            display: block;
        }
        .popup button {
            background-color: var(--popup-btn-bg-color);
            color: var(--popup-btn-text-color);
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .popup button:hover {
            background-color: darken(var(--popup-btn-bg-color), 10%);
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

        function showPopup() {
            const popup = document.getElementById('success-popup');
            popup.classList.add('show');
            setTimeout(() => {
                hidePopup();
            }, 3000);
        }

        function hidePopup() {
            const popup = document.getElementById('success-popup');
            popup.classList.remove('show');
            window.location.href = 'index.php'; // Redirect to the main page after popup
        }

        document.addEventListener('DOMContentLoaded', () => {
            const form = document.querySelector('form');
            form.addEventListener('submit', (event) => {
                event.preventDefault(); // Prevent the default form submission
                // Add AJAX request to submit form data to the server here if needed
                showPopup(); // Show the popup after form submission
            });
        });
    </script>
</head>
<body>
    <header>
        <img src="logo.png" alt="LiputanBumi Logo" class="logo">
        <h1>Tambah Artikel</h1>
        <div class="datetime" id="datetime"></div>
        <img src="moon.png" id="theme-toggle" class="theme-toggle" onclick="toggleTheme()">
    </header>
    <div class="container">
        <form action="save_article.php" method="POST" enctype="multipart/form-data">
            <label for="title">Judul Artikel:</label>
            <input type="text" id="title" name="title" required>

            <label for="author">Penulis:</label>
            <input type="text" id="author" name="author" required>

            <label for="category">Kategori:</label>
            <select id="category" name="category" required>
                <option value="Utama">Utama</option>
                <option value="Olahraga">Olahraga</option>
                <option value="Teknologi">Teknologi</option>
                <option value="Makanan">Makanan</option>
                <option value="Bumi">Bumi</option>
            </select>

            <label for="content">Konten:</label>
            <textarea id="content" name="content" rows="10" required></textarea>

            <label for="image">Gambar:</label>
            <input type="file" id="image" name="image">

            <button type="submit">Simpan Artikel</button>
        </form>
    </div>

    <div class="popup" id="success-popup">
        <p>Artikel berhasil dibuat!</p>
        <button onclick="hidePopup()">Tutup</button>
    </div>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        .container {
            width: 50%;
            margin: auto;
            overflow: hidden;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
        }
        input[type="text"], textarea, select, input[type="file"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <h1>Tambah Artikel Baru</h1>
    </header>
    <div class="container">
        <form action="save_article.php" method="post" enctype="multipart/form-data">
            <label for="title">Judul:</label>
            <input type="text" id="title" name="title" required>
            
            <label for="content">Konten:</label>
            <textarea id="content" name="content" rows="10" required></textarea>
            
            <label for="author">Penulis:</label>
            <input type="text" id="author" name="author" required>
            
            <label for="category">Kategori:</label>
            <select id="category" name="category" required>
                <option value="Utama">Utama</option>
                <option value="Olahraga">Olahraga</option>
                <option value="Teknologi">Teknologi</option>
            </select>
            
            <label for="image">Gambar:</label>
            <input type="file" id="image" name="image" required>
            
            <input type="submit" value="Simpan">
        </form>
    </div>
</body>
</html>

