<!-- <?php
include 'db.php';

echo '<pre>';
print_r($_POST);
print_r($_FILES);
echo '</pre>';



$title = $_POST['title'];
$author = $_POST['author'];
$category = $_POST['category'];
$content = $_POST['content'];
$published_date = date("Y-m-d H:i:s");

$target_dir = "uploads/";
$image = "";
if (!empty($_FILES["image"]["name"])) {
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image = $target_file;
    }
}

$sql = "INSERT INTO articles (title, author, category, content, published_date, image)
        VALUES ('$title', '$author', '$category', '$content', '$published_date', '$image')";

if ($conn->query($sql) === TRUE) {
    header("Location: index_admin.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simpan Artikel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: var(--bg-color, #f4f4f4);
            color: var(--text-color, #333);
            margin: 0;
            padding: 0;
        }
        header {
            background-color: var(--header-bg-color, #4CAF50);
            color: var(--header-text-color, white);
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
            background: var(--article-bg-color, white);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .theme-toggle {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
        .datetime {
            position: absolute;
            right: 60px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--header-text-color, white);
        }
    </style>
    <script>
        function toggleTheme() {
            const body = document.body;
            const themeToggle = document.getElementById('theme-toggle');
            if (body.classList.toggle('dark-mode')) {
                themeToggle.src = 'sun.png';
                localStorage.setItem('theme', 'dark');
            } else {
                themeToggle.src = 'moon.png';
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
                document.getElementById('theme-toggle').src = 'sun.png';
            } else {
                document.getElementById('theme-toggle').src = 'moon.png';
            }
            setInterval(updateDateTime, 1000);
        });
    </script>
</head>
<body>
    <header>
        <img src="logo.png" alt="LiputanBumi Logo" class="logo">
        <h1>Simpan Artikel</h1>
        <div class="datetime" id="datetime"></div>
        <img src="moon.png" id="theme-toggle" class="theme-toggle" onclick="toggleTheme()">
    </header>
    <div class="container">
        <h2>Artikel Anda berhasil disimpan!</h2>
        <p><a href="index_admin.php">Kembali ke Beranda</a></p>
    </div>
</body>
</html> -->


<?php
include 'db.php';

$title = $_POST['title'];
$content = $_POST['content'];
$author = $_POST['author'];
$category = $_POST['category'];
$image = $_FILES['image'];

// Direktori tujuan untuk upload gambar
$target_dir = "uploads/";
$target_file = $target_dir . basename($image["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
$check = getimagesize($image["tmp_name"]);
if($check === false) {
    die("File bukan gambar.");
}

// Check if file already exists
if (file_exists($target_file)) {
    die("File gambar sudah ada.");
}

// Check file size (5MB max)
if ($image["size"] > 5000000) {
    die("Ukuran file gambar terlalu besar.");
}

// Allow certain file formats
$allowed_types = array("jpg", "png", "jpeg", "gif");
if(!in_array($imageFileType, $allowed_types)) {
    die("Hanya format JPG, JPEG, PNG & GIF yang diperbolehkan.");
}

// Try to upload file
if (!move_uploaded_file($image["tmp_name"], $target_file)) {
    die("Maaf, terjadi kesalahan saat mengupload gambar.");
}

// SQL untuk menyimpan data
$sql = "INSERT INTO articles (title, content, author, category, image) VALUES ('$title', '$content', '$author', '$category', '$target_file')";

if ($conn->query($sql) === TRUE) {
    $message = "Artikel berhasil disimpan.";
} else {
    $message = "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Penyimpanan Artikel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
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
            text-align: center;
        }
        .message {
            font-size: 18px;
            margin-bottom: 20px;
        }
        a {
            text-decoration: none;
            color: #4CAF50;
            font-size: 16px;
        }
        a:hover {
            color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <p class="message"><?php echo $message; ?></p>
        <a href="index_admin.php">Kembali ke Beranda</a>
    </div>
</body>
</html>
