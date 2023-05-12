<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/style copy.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>3D Web Apps.</title>
</head>

<body>
    <header>

        <nav>
            <div class="nav-links">
                <ul>



                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <a href="#" class="logoMini"><img margin-right="100px" width="240px" height="auto" src="./assets/whiteCokeLogo.png" alt="Logo"></a>
                    <li><a href="#products">Products</a></li>
                    <li><a href="#contact">Contact</a></li>

                </ul>
            </div>
        </nav>

    </header>
    <main>
        <section id="home" class="hero">
            <div class="hero-images">
                <img src="./assets/CompanyLogo.png" alt="Sample Image 2">
                <img src="./assets/CompanyLogo.png" alt="Sample Image 2">
            </div>
        </section>



        <div class="line">
        </div>

        <section id="about" class="content">

            <div class="content-wrapperV">
                <iframe class="video-box" width="100%" height="420px" src="https://www.youtube.com/embed/JlBex2H7lAA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                <div class="text-box2">
                    <br>
                    <h3> About Us </h3>

                    <p>As one of the world's largest beverage companies, Coca-Cola is dedicated to creating refreshing and delicious drinks that bring people together. From classic Coca-Cola to Fanta, Sprite, and more, our portfolio of brands is beloved by millions of consumers around the world.</p>
                </div>
            </div>
        </section>





        <section id="products" class="content">
            <h2>Our Products</h2>
            <?php foreach ($products as $product) : ?>

                <div class="content-wrapper reverse">
                    <div class="text-box">
                        <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p><?php echo htmlspecialchars($product['description']); ?></p>

                        <?php $index = $product['Id'] ?>
                        <a href="<?php echo htmlspecialchars($product['btnLink']) . '?id=' . urlencode($index); ?>" class="btn" style="background-color: <?php echo htmlspecialchars($product['btnCol']); ?>;">Click Here!</a>

                    </div>
                    <div class="stacked-images">
                        <!-- <img class='rotating' src="./assets/flower.jpeg" alt="Sample Image 7"> -->
                        <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">

                    </div>
                </div>
            <?php endforeach; ?>
        </section>


        <section id="contact" class="content">
            <div class="content-wrapper">
                <div class="text-box">
                    <h2>Links</h2>
                    <p>To the right you will notice a Cat Image API! Enjoy :)</p>
                    <p>For acknowledgements, please visit our <a href="views/stmnt.html">Statement of Originality, Acknowledgements, References</a> page.</p>

                    <p>Access to my source code is available at this <a href="https://github.com/CraemEeg/3D-Web-Apps">Github</a></p>
                    <p>Access to my X3D Models are availble at this <a href="https://github.com/CraemEeg/X3D-Models-3D-Web-Apps">Github</a></p>

                </div>
                <div class="">
                    <img class="cats" src="https://cataas.com/cat/says/Hope%20You%20Enjoyed%20My%20Web%203D%20Assignment?size=250&color=white" alt="Sample Image 9">
                </div>
            </div>
        </section>

    </main>

    <script>
        // Smooth scrolling
        $('a[href*="#"]').on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({
                    scrollTop: $($(this).attr('href')).offset().top - 60,
                },
                600,
                'linear'
            );
        });
    </script>
</body>

</html>