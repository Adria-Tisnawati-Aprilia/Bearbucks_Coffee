<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<section>
        <div class="circle"></div>
        <header>
            <a href="#">
                    <img src="img/LOGOO.jpeg" alt="Starbucks" class="logo">
                </a>
            
            <ul>
                <li><a href="?page=dashboard">Home</a></li>
                <li><a href="?page=menu">Menu</a></li>
                <li><a href="#">Berita</a></li>
                <li><a href="login.php">xx</a></li>
            </ul>
        </header>

        <?php require "mod/halaman.php"; ?>
        
    </section>
    

<script type="text/javascript">
        function imgSlider(anything){
            document.querySelector('.starbucks').src = anything;
        }

        function changeCircleColor(color) {
            const circle = document.querySelector('.circle');
            circle.style.background = color;
        }
    </script>

</body>
</html>