<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style3d.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script type='text/javascript' src='https://www.x3dom.org/download/x3dom.js'> </script>
    <link rel='stylesheet' type='text/css' href='https://www.x3dom.org/download/x3dom.css' />

    <title>Small Statements</title>
</head>

<body>

    <header>
        <nav>
            <div class="nav-links">
                <ul>



                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./drink3D.php?id=1">Coke</a></li>
                    <a href="#" class="logoMini"><img margin-right="200px" width="290px" height="auto" src="./assets/whiteCokeLogo.png" alt="Logo"></a>
                    <li><a href="./drink3D.php?id=2">Sprite</a></li>
                    <li><a href="./drink3D.php?id=3">Dr.Pepper</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <section id="home" class="hero">
            <h1><?php echo htmlspecialchars($data['title']); ?></h1>
        </section>


        <section class="section-3D">
            <div class="container3D">
                <div class="colored-div" style="background-color: #f0f0f0; width: 66.66%;">

                    <!-- 3D content -->

                    <x3d id="x3dContent" width='100%' height='300px' showStat="false">
                        <scene id="x3dElement">
                            <inline nameSpaceName="model" mapDEFToID="true" id="x3dInline" url="./assets/3d/cokeCan.x3d"> </inline>
                        </scene>
                    </x3d>

                    <!-- Hidden input field for passing the specific 3d informaation to AJAX -->
                    <input type="hidden" id="x3dURL" value="<?php echo htmlspecialchars($data['3D']); ?>">




                    <div class="text-buttons3D">
                        <div class="text3D">
                            <p><?php echo htmlspecialchars($data['text']); ?></p>
                        </div>
                        <div class="buttons3D">
                            <button onclick="toggleWireframe()" id="wireframeButton">Wire-frame</button>
                            <button onclick="changeCam()"> Cam 1 </button>
                            <button onclick="changeCam2()"> Cam 2 </button>
                            <button onclick="changeCam3()"> Cam 3</button>
                            <button onclick="spin()" id="changeCameraButton">Spin</button>
                            <button onclick="headLight();" id="toggleLightButton">Toggle Light</button>
                            <button onclick="changeCan();" id="animateModelButton">Change Texture</button>
                        </div>

                    </div>
                </div>
        </section>


        <section id="contact" class="content">
            <div class="content-wrapper">
                <div class="text-box">
                    <h2>Contact Us</h2>
                    <p>If you have any questions or would like to place an order, please email us at: info@example.com</p>
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

        // Retrieve 3D
        $(document).ready(function() {
            const x3dURL = $('#x3dURL').val();
            $.ajax({
                url: x3dURL,
                success: function() {
                    $('#x3dInline').attr('url', x3dURL);
                }
            });
        });


        // Wireframe
        function toggleWireframe() {

            var e = document.getElementById("x3dContent")
            e.runtime.togglePoints(true);
            e.runtime.togglePoints(true);

        }
        var spinning = false;

        function spin() {
            spinning = !spinning;
            document.getElementById('model__RotationTimer').setAttribute('enabled', spinning.toString());
        }

        function changeCam() {

            document.getElementById('model__CA_Camera').setAttribute('bind', 'true');
        }

        function changeCam2() {

            document.getElementById('model__CA_Camera2').setAttribute('bind', 'true');
        }

        function changeCam3() {

            document.getElementById('model__CA_Camera3').setAttribute('bind', 'true');
        }

        var lightOn = true;

        function headLight() {
            lightOn = !lightOn;
            document.getElementById('model__headlight').setAttribute('headlight', lightOn.toString());
            console.log(lightOn);
        }

        function changeCan() {
            if (document.getElementById('model__texture').getAttribute('url') == 'can_texture2.jpg') {
                document.getElementById('model__texture').setAttribute('url', 'can_texture.jpg');
            } else if (document.getElementById('model__texture').getAttribute('url') == 'can_texture.jpg') {
                document.getElementById('model__texture').setAttribute('url', 'can_texture2.jpg');
            } else if (document.getElementById('model__texture').getAttribute('url') == 'sprite_Texture2.jpg') {
                document.getElementById('model__texture').setAttribute('url', 'sprite_Texture.jpg');
            } else if (document.getElementById('model__texture').getAttribute('url') == 'sprite_Texture.jpg') {
                document.getElementById('model__texture').setAttribute('url', 'sprite_Texture2.jpg');
            } else if (document.getElementById('model__texture').getAttribute('url') == 'SpriteCup.png') {
                document.getElementById('model__texture').setAttribute('url', 'SpriteCup2.png');
            } else if (document.getElementById('model__texture').getAttribute('url') == 'SpriteCup2.png') {
                document.getElementById('model__texture').setAttribute('url', 'SpriteCup.png');


            } else {
                document.getElementById('model__texture').setAttribute('url', 'sprite_Texture2.jpg');
            }
        }
    </script>

</body>

</html>