<?php
$locker = 1;
include_once('config/db.php');

session_start(); 
if (!isset($_SESSION['id'])) {
    header("Location:$loginPage");
}

$id = $_SESSION['id'];

$query = "SELECT * FROM $tableAdmin WHERE id = '$id'";
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) == 1){
    while ($row = mysqli_fetch_assoc($result)) {
       $id_database = $row['id']; 
       $uniqueid_datbase = $row['uniqueid'];
       $first_name_database = $row['first_name'];
       $last_name_database = $row['last_name'];
       $role_database = $row['role'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saj it Loud</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>
<body>
<header >
    <nav id="nav-links">
        <ul>
            <li><a href="main.php"><h2>Hem</h2></a></li>
            <li><a href="profile.php"><h2>Profil</h2></a></li>
        </ul>
    </nav>

    <div id="logo">
        <img src="img/logo.png" alt="Logo Image" class="logo-image">
    </div>

    <div id="profile">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Hej <?php echo $first_name_database . " " . $last_name_database; ?></h5>
                <p class="card-text">Din roll är <?php echo $role_database; ?></p>
                <a href="<?php echo $logoutPage; ?>" class="btn btn-primary">Logga ut</a>
            </div>
        </div>
    </div>
</header>

<main id="carousel">
    <div class="carousel">
        <div class="carousel-inner" role="region" aria-live="polite">
            <img src="img/coop.png" alt="Image 1 of the carousel">
            <img src="img/ica.png" alt="Image 2 of the carousel">
            <img src="img/lidl.png" alt="Image 3 of the carousel">
            <img src="img/hemkop.png" alt="Image 1 of the carousel">
            <img src="img/sg.png" alt="Image 2 of the carousel">
            <img src="img/willys.png" alt="Image 3 of the carousel">
            <!-- repeat -->
            <img src="img/coop.png" alt="Image 1 of the carousel">
            <img src="img/ica.png" alt="Image 2 of the carousel">
            <img src="img/lidl.png" alt="Image 3 of the carousel">
            <img src="img/hemkop.png" alt="Image 1 of the carousel">
            <img src="img/sg.png" alt="Image 2 of the carousel">
            <img src="img/willys.png" alt="Image 3 of the carousel">
        </div>
    </div>
</main>

<section id="greetings">
<br><h3>Välkommen till Saj it Loud där du kan lämna dina reviews på varor från olika butiker.</h3>
<br><p class="text-center">Här kan du utforska de nyaste reviews.</p>
</section>
<?php
include_once('config/db.php');

$query = "SELECT php_articles.*, php_users.first_name, php_users.last_name, php_users.avatar 
          FROM php_articles 
          JOIN php_users ON php_articles.user_id = php_users.id 
          ORDER BY php_articles.created_at DESC"; 
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<div class="container mt-4"><div class="row">';
    
    while ($article = mysqli_fetch_assoc($result)) {
        echo '<div class="col-md-4">';
        echo '<div class="card article-card">';

        echo '<div class="article-header d-flex align-items-center">';
        echo '<img src="' . htmlspecialchars($article['avatar']) . '" alt="User Avatar" class="user-avatar">';
        echo '<span class="user-name">' . htmlspecialchars($article['first_name'] . ' ' . $article['last_name']) . '</span>';
        echo '</div>';

        echo '<div class="card-body">';
        
        echo '<h5 class="article-category">Affär: ' . htmlspecialchars($article['category']) . '</h5>';
        echo '<p class="article-content">' . nl2br(htmlspecialchars($article['content'])) . '</p>';

        echo '</div>';

        if (!empty($article['image'])) {
            echo '<img src="' . htmlspecialchars($article['image']) . '" class="card-img-top article-image" alt="Article Image">';
        }

        echo '<div class="card-footer d-flex justify-content-between align-items-center">';
        echo '</div>';

        echo '</div></div>';
    }

    echo '</div></div>';
} else {
    echo '<p>No articles found.</p>';
}
?>



<h3 class="top-heading same-text">Varför Lita På Oss</h3>
<p class="centered-text">
Ditt välbefinnande är ovärderligt. Vi är engagerade i att guida dig genom en värld av hälsosamma och pålitliga val, inspirerade av gemenskapens visdom.
</p>

<div class="colored-box">
    <div class="column">
        <h1>2</h1>
        <p>Nya användare varje dag</p>
    </div>
    <div class="column">
        <h1>mer än 9-</h1>
        <p>Recensioner publicerade</p>
    </div>
    <div class="column">
        <h1>6</h1>
        <p>Topptjänster</p>
    </div>
</div>

<div class="colored-box second-box ">
    <div class="content-left">
        <h3>Vårt Uppdrag</h3>
        <p>På Saj it Loud strävar vi efter att stärka kloka konsumenter genom att erbjuda en dedikerad plats för att utbyta ärlig feedback om vardagliga nödvändigheter.</p>
        <div class="bullet-container">
            <div class="bullet-item">
                <img src="img/1.png" alt="Bullet 1">
                <div class="bullet-text">
                    <p>Ärlig Feedback</p>
                    <p class="under-text">Bedöm och diskutera kvaliteten på livsmedel med en community dedikerad till transparens och äkthet.</p>
                </div>
            </div>
            <div class="bullet-item">
                <img src="img/2.png" alt="Bullet 2">
                <div class="bullet-text">
                    <p>Dagliga Insikter</p>
                    <p class="under-text">Få dagliga insikter från vår gemenskap om de senaste tjänsterna och upplevelserna, vilket hjälper dig att fatta informerade beslut varje dag.</p>
                </div>
            </div>
            <div class="bullet-item">
                <img src="img/3.png" alt="Bullet 3">
                <div class="bullet-text">
                    <p>Communityns Val</p>
                    <p class="under-text">Upptäck högt betygsatta tjänster granskade av vår livliga gemenskap, vilket säkerställer att du får bara det bästa i din vardag.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="content-right">
        <img src="img/large_image.jpg" alt="Large Image">
    </div>
</div>

<div class="centered-text same-text">
    <h3>Upptäck Mer</h3>
    <p style="color: black;">Gräv djupare i våra funktioner och se hur Saj it Loud kan förvandla dina vardagliga upplevelser till en resa av gourmet-upptäckter.</p>
</div>

<div class="colored-box">
    <div class="column">
        <img src="img/4.png" alt="Image 1">
        <p>Hitta snabbt recensioner för de tjänster, varor eller upplevelser du överväger, vilket säkerställer att du fattar välgrundade beslut.</p>
    </div>
    <div class="column">
        <img src="img/5.png" alt="Image 2">
        <p>Bidra och tjäna en plats som en topprecensent, vilket ger förtroende och <br>inflytande inom gemenskapen.</p>
    </div>
    <div class="column">
        <img src="img/6.png" alt="Image 3">
        <p>Bläddra bland foton delade av vår gemenskap för visuell inblick i de tjänster, varor eller upplevelser du är intresserad av.</p>
    </div>
</div>

<h3 id="heading_1 same-text">Behöver du Hjälp?</h3>
<p id="smaller_text_1">Upptäck svar på vanliga frågor och lär dig hur du bäst använder vår plattform med dessa hjälpsamma tips.</p>

<div class="grid-section">
    <div class="grid-box">
        <h1>Hur recenserar jag en produkt?</h1>
        <p>För att recensera en produkt eller tjänst, skapa ett konto, välj affär eller företag, och dela din åsikt tillsammans med bilder. Dina insikter kommer att hjälpa andra att fatta informerade beslut baserade på din erfarenhet.</p>
    </div>
    <div class="grid-box">
        <h1>Kan jag redigera min recension?</h1>
        <p>Ja, du kan uppdatera eller ta bort din recension när som helst för att återspegla förändringar i din åsikt eller nya upplevelser. Att hålla dina recensioner uppdaterade hjälper till att behålla korrekt och hjälpsam information för communityn.</p>
    </div>
    <div class="grid-box">
        <h1>Hur hittar jag recensioner för en specifik produkt?</h1>
        <p>Du kan enkelt hitta recensioner för en specifik produkt genom att använda sökfältet på vår BUTIKS-sida. Ange bara produktnamnet, så ser du en lista med recensioner och betyg från andra användare. Detta hjälper dig att snabbt samla in information innan du gör ett köp.</p>
    </div>
    <div class="grid-box">
        <h1>Hur beräknas betygen?</h1>
        <p>Våra betyg beräknas utifrån genomsnittspoängen som användare ger. Varje recension bidrar till den övergripande bedömningen av ett företag eller en butik. Tjänster med högre betyg är vanligtvis de som konsekvent får positiv respons från gemenskapen. Användare bedömer företag/butiker från en lista och bedömer även inlägg från andra användare.</p>
    </div>
</div>

<div id="logo-footer">
    <img src="img/logo.png" alt="Logo">
</div>

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<hr class="footer-line">

<footer>
    <p>© 2025 Saj it Loud</p>
</footer>

<script src="index.js"></script>



</body>
</html>