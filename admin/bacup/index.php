<?php include("backend/db.php"); ?>
<!DOCTYPE html>
<html lang="hi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Swarnim Bharat Manch</title>
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>

<!-- TOP BAR -->
<div class="topbar">
    📞 संपर्क: 9827501268
    <a href="#">दान करें</a>
</div>

<!-- NAVBAR -->
<header>
    <div class="logo-box">
        <img src="images/logo.png" alt="logo">
        <h1>स्वर्णिम भारत मंच</h1>
    </div>

    <nav>
        <a href="#">होम</a>
        <a href="#">हमारे बारे में</a>
        <a href="#">कार्यक्रम</a>
        <a href="#">गैलरी</a>
        <a href="#">संपर्क</a>
    </nav>
</header>

<!-- SLIDER -->
<section class="slider">

    <!-- Slide 1 -->
    <div class="slide active">
        <img src="images/slide1.jpg">
     </div>

    <!-- Slide 2 -->
    <div class="slide">
        <img src="images/banner2.jpg">
        <div class="text">
            <h2>सेवा ही धर्म</h2>
            <p>मानवता की सेवा</p>
        </div>
    </div>

    <!-- Slide 3 -->
    <div class="slide">
        <img src="images/banner3.jpg">
        <div class="text">
            <h2>स्वर्णिम भारत</h2>
            <p>समाज सेवा हमारा लक्ष्य</p>
        </div>
    </div>

    <!-- Slide 4 -->
    <div class="slide">
        <img src="images/slide2.jpg">
        <div class="text">
            <h2>स्वर्णिम भारत</h2>
            <p>समाज सेवा हमारा लक्ष्य</p>
        </div>
    </div>

    <!-- Slide 5 -->
    <div class="slide">
        <img src="images/slide3.jpg">
        <div class="text">
            <h2>स्वर्णिम भारत</h2>
            <p>समाज सेवा हमारा लक्ष्य</p>
        </div>
    </div>
<!-- ARROWS -->
<button class="prev">&#10094;</button>
<button class="next">&#10095;</button>
</section>

<!-- ABOUT -->
<section class="about">
    <h2>हमारे बारे में</h2>
    <p>
    स्वर्णिम भारत मंच उज्जैन का एक सामाजिक और धार्मिक संगठन है,
    जो शहर के मुद्दों को उठाता है और विभिन्न कार्यक्रम आयोजित करता है।
    </p>
    <p><b>अध्यक्ष:</b> दिनेश श्रीवास्तव</p>
</section>

<section class="services">
    <h2>हम क्या करते हैं</h2>

    <div class="services-grid">

        <div class="service-card">
            <img src="images/s1.jpg">
            <div class="service-content">
                <h3>धार्मिक आयोजन</h3>
                <p>भागवत कथा और धार्मिक कार्यक्रम</p>
            </div>
        </div>

        <div class="service-card">
            <img src="images/s2.jpg">
            <div class="service-content">
                <h3>अन्न एक्सप्रेस</h3>
                <p>सैकड़ों लोगों को निःशुल्क भोजन</p>
            </div>
        </div>

        <div class="service-card">
            <img src="images/s3.jpg">
            <div class="service-content">
                <h3>देशभक्ति कार्यक्रम</h3>
                <p>समाज जागरूकता कार्यक्रम</p>
            </div>
        </div>

    </div>
</section>

<!-- ANN EXPRESS -->
<section class="ann">
    <h2>अन्न एक्सप्रेस सेवा</h2>
    <p>
    समाज के हर जरूरतमंद व्यक्ति तक समय पर, स्वच्छ, पौष्टिक और सम्मानपूर्वक
    निशुल्क भोजन पहुँचाना हमारा संकल्प है।
    </p>
</section>

<!-- DONATION -->
<section class="donation">
    <h2>आपका सहयोग जरूरी है</h2>
    <p>₹10 से भी किसी को भोजन मिल सकता है</p>
    <a href="#" class="btn">Donate Now</a>
</section>

<section class="gallery">
    <h2>हमारी गतिविधियाँ</h2>

    <div class="gallery-grid" id="galleryData">

        <?php
        $sql = "SELECT * FROM gallery ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)) {
        ?>

        <div class="gallery-item">
            <img src="uploads/<?php echo $row['image']; ?>">

            <div class="overlay">
                <h3><?php echo $row['title']; ?></h3>
                <p><?php echo $row['description']; ?></p>
            </div>
        </div>

        <?php } ?>

    </div>
</section>
<!-- TARGET -->
<section class="targets">
    <h2>सेवा किनके लिए</h2>
    <ul>
        <li>तीर्थ यात्री</li>
        <li>वृद्धजन</li>
        <li>अस्पताल अटेंडर</li>
        <li>बेघर लोग</li>
        <li>निर्धन बच्चे</li>
    </ul>
</section>

<section class="contact">
    <h2>Contact Us</h2>

    <div class="contact-box">
        
        <!-- LEFT INFO -->
        <div class="contact-info">
            <h3>Get In Touch</h3>
            <p>📍 Address: Your City, India</p>
            <p>📞 Phone: +91 9876543210</p>
            <p>📧 Email: info@ngo.org</p>
        </div>

        <!-- RIGHT FORM -->
        <form class="contact-form">
            <input type="text" placeholder="Your Name" required>
            <input type="email" placeholder="Your Email" required>
            <input type="text" placeholder="Subject">
            <textarea placeholder="Your Message" rows="5"></textarea>

            <button type="submit">Send Message</button>
        </form>

    </div>
</section>

<!-- FOOTER -->
<footer>
    <p>© 2026 स्वर्णिम भारत मंच</p>
</footer>

<!-- JS SLIDER -->
<script>
let slides = document.querySelectorAll('.slide');
let index = 0;

// show slide
function showSlide(i) {
    slides.forEach(slide => slide.classList.remove('active'));
    slides[i].classList.add('active');
}

// next
document.querySelector('.next').onclick = () => {
    index = (index + 1) % slides.length;
    showSlide(index);
}

// prev
document.querySelector('.prev').onclick = () => {
    index = (index - 1 + slides.length) % slides.length;
    showSlide(index);
}

// auto slider
setInterval(() => {
    index = (index + 1) % slides.length;
    showSlide(index);
}, 3000);
</script>
<script src="js/slider.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function(){

    const gallery = document.getElementById("galleryData");

    if(!gallery) return;

    let items = gallery.children.length;

    if(items <= 4) return;

    //gallery.innerHTML += gallery.innerHTML;

    let scrollAmount = 0;

    function autoScroll(){
        scrollAmount += 0.5;
        gallery.scrollLeft = scrollAmount;

        if(scrollAmount >= gallery.scrollWidth / 2){
            scrollAmount = 0;
        }
    }

    setInterval(autoScroll, 20);

});
</script>
</body>
</html>