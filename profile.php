<?php
session_start();
include_once('config/db.php');

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

$userId = $_SESSION['id'];
$query = "SELECT * FROM php_users WHERE id = $userId";
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['avatar'])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES['avatar']['name']);
    $targetFilePath = $targetDir . $userId . "_" . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array(strtolower($fileType), $allowedTypes)) {
        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $targetFilePath)) {
            $updateQuery = "UPDATE php_users SET avatar = '$targetFilePath' WHERE id = $userId";
            mysqli_query($con, $updateQuery);
            header("Location: profile.php");
            exit();
        } else {
            $error = "Gick inte att ladda up filen.";
        }
    } else {
        $error = "Dålig format på bilden. Använd bara JPG, JPEG och PNG.";
    }
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['article_content'])) {

    if (empty($_POST['article_content'])) {
        $error = "Article content is required.";
    } elseif (!isset($_FILES['article_image']) || $_FILES['article_image']['error'] != 0) {
        $error = "An image is required for article submission.";
    } else {

        $category = mysqli_real_escape_string($con, $_POST['magazine']);
        $content = mysqli_real_escape_string($con, $_POST['article_content']);
        
        $imageName = basename($_FILES['article_image']['name']);
        $imageTargetPath = "uploads/articles/" . $imageName;
        $imageType = pathinfo($imageTargetPath, PATHINFO_EXTENSION);
        
        $uploadDir = "uploads/articles/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        $allowedImageTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array(strtolower($imageType), $allowedImageTypes)) {
            $error = "Invalid image format. Only JPG, JPEG, PNG & GIF allowed.";
        } elseif (!move_uploaded_file($_FILES['article_image']['tmp_name'], $imageTargetPath)) {
            $error = "Error uploading article image.";
        } else {
        
            $insertQuery = "INSERT INTO php_articles (user_id, category, content, image) VALUES ('$userId', '$category', '$content', '$imageTargetPath')";
            if (mysqli_query($con, $insertQuery)) {
                header("Location: profile.php");
                exit();
            } else {
                $error = "Error submitting article: " . mysqli_error($con);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saj it Loud - Profil</title>
    <link rel="stylesheet" href="profile_css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Välkommen, <?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></h2>
    <img src="<?php echo $user['avatar']; ?>" class="rounded-circle" width="150" height="150" alt="Avatar">
    
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="avatar" class="form-control mt-3">
        <button type="submit" class="btn btn-primary mt-2">Ladda up en avatarbild</button>
    </form>

    <p class="mt-3"><a href="logout.php" class="btn btn-danger">Logga ut</a></p>
    <a href="main.php" class="btn btn-secondary">Tillbacks</a>
</div>

<!-- articles submit -->
<div class="article-box mt-4">
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    
    <form action="profile.php" method="POST" enctype="multipart/form-data">
        
        <select name="magazine" class="form-select mb-3" required>
            <option value="coop">coop</option>
            <option value="ika">ica</option>
            <option value="lidl">lidl</option>
            <option value="hemkop">hemkop</option>
            <option value="supergrossen">supergrossen</option>
            <option value="willys">willys</option>
        </select>

        <textarea name="article_content" class="form-control mb-3" placeholder="Skriv din review" required></textarea>
        
        <div class="mb-3">
            <label class="form-label">Review bild</label>
            <input type="file" name="article_image" class="form-control" required>
            <small class="text-muted">Du måste ladda up en bild</small>
        </div>
        
        <button type="submit" class="btn btn-primary">Lämna in</button>
    </form>
</div>

</body>
</html>