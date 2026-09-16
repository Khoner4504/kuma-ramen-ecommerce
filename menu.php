<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kuma Ramen Menu - Browse our authentic Japanese ramen selection including Tonkotsu, Miso, Shoyu, Shio, and Spicy Tantanmen.">
    <meta name="keywords" content="ramen menu, tonkotsu, miso, shoyu, japanese cuisine, flagstaff">
    <meta name="author" content="Kuma Ramen">
    <title>Kuma Ramen - Menu</title>
    <link rel="icon" type="image/png" href="images/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <nav>
        <div class="nav-logo">
            <img src="images/logo.png" alt="Kuma Ramen Logo">
            <span>KUMA RAMEN</span>
        </div>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="menu.php" class="active">Menu</a></li>
        </ul>
    </nav>

    <main>
        <h1>Our Delicious Menu</h1>
        <h2>Authentic Japanese Ramen</h2>

        <?php
        // Database credentials are read from environment variables so they are never committed to source control.
        // Set DB_HOST, DB_USER, DB_PASS, and DB_NAME on the server (see README).
        $servername = getenv('DB_HOST') ?: 'localhost';
        $username   = getenv('DB_USER');
        $password   = getenv('DB_PASS');
        $dbname     = getenv('DB_NAME') ?: 'kuma_ramen';

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            echo '<div class="error-message">';
            echo '<h3>Database Connection Issue</h3>';
            echo '<p><strong>Error:</strong> ' . htmlspecialchars($conn->connect_error) . '</p>';
            echo '</div>';
        } else {
            $sql = "SELECT RamenID, RamenName, price, rating FROM menu";
            $result = $conn->query($sql);

            $imageMap = array(
                'Tonkotsu Ramen' => 'images/tonkotsu.jpg',
                'Shoyu Ramen' => 'images/shoyu.jpg',
                'Miso Ramen' => 'images/miso.jpg',
                'Shio Ramen' => 'images/shio.jpg',
                'Spicy Tantanmen' => 'images/tantanmen.jpg'
            );

            $descriptions = array(
                'Tonkotsu Ramen' => 'Rich pork bone broth simmered for 18 hours with tender chashu pork',
                'Shoyu Ramen' => 'Classic soy sauce-based broth with traditional toppings',
                'Miso Ramen' => 'Hearty fermented soybean broth with butter and corn',
                'Shio Ramen' => 'Light and delicate salt-based broth with fresh ingredients',
                'Spicy Tantanmen' => 'Bold sesame paste with aromatic chili oil and ground pork'
            );

            if ($result->num_rows > 0) {
                echo '<div class="menu-grid">';

                while ($row = $result->fetch_assoc()) {
                    $ramenName = $row["RamenName"];
                    $imageSrc = isset($imageMap[$ramenName]) ? $imageMap[$ramenName] : 'images/tonkotsu.jpg';
                    $description = isset($descriptions[$ramenName]) ? $descriptions[$ramenName] : '';

                    echo '<div class="menu-card">';
                    echo '<div class="menu-card-image">';
                    echo '<img src="' . $imageSrc . '" alt="' . htmlspecialchars($ramenName) . '">';
                    echo '</div>';
                    echo '<div class="menu-card-content">';
                    echo '<h3>' . htmlspecialchars($ramenName) . '</h3>';
                    echo '<p class="menu-card-description">' . $description . '</p>';
                    echo '<div class="menu-card-details">';
                    echo '<span class="price">$' . number_format($row["price"], 2) . '</span>';
                    echo '<span class="rating">' . htmlspecialchars($row["rating"]) . '</span>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }

                echo '</div>';
            } else {
                echo '<div class="error-message">';
                echo '</div>';
            }

            $conn->close();
        }
        ?>
    </main>

    <button id="backToTop" class="back-to-top">↑</button>

    <footer>
        <img src="images/logo.png" alt="Kuma Logo" class="footer-logo">
        <p>&copy; 2025 Kuma Ramen. All rights reserved. | Contact us: <a href="mailto:support@kumaramen.com">support@kumaramen.com</a></p>
    </footer>

    <script>
        const backToTop = document.getElementById('backToTop');
        window.onscroll = function() {
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                backToTop.style.display = 'block';
            } else {
                backToTop.style.display = 'none';
            }
        };
        backToTop.onclick = function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        };
    </script>
</body>

</html>