<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link rel="stylesheet" href="Css/Index.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Döner Corner</title>
</head>
<body>

<?php include "header.php" ?>

<header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h1 class="mb-5">Build a landing page for your business or project and generate more leads!</h1>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <form>
                    <div class="col-sm">
                            <a  href="producten.php" type="submit" class="btn btn-block btn-lg btn-warning">Bestel nu!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>

<br>

<div class="container animated fadeIn">

    <h1 class="header-title"> Contact </h1>
    <hr>
    <div class="row">
    <div class="col-sm-6">
        <form action="form.php" class="contact-form" method="post">

            <div class="form-group">
                <input type="text" class="form-control" id="name" name="nm" placeholder="Name" required="" autofocus="">
            </div>


            <div class="form-group form_left">
                <input type="email" class="form-control" id="email" name="em" placeholder="Email" required="">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="phone" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" placeholder="Mobile No." required="">
            </div>
            <div class="form-group">
                <textarea class="form-control textarea-contact" rows="5" id="comment" name="FB" placeholder="Type Your Message/Feedback here..." required=""></textarea>
                <br>
                <button class="btn btn-default btn-info"> <span class="glyphicon glyphicon-send"></span> Send </button>
            </div>
        </form>
    </div>

            <div class="col-sm-6">
                <iframe width="100%" height="320px;" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJtXhEji5SxkcRFWRm1uA4LOM&key=AIzaSyAf64FepFyUGZd3WFWhZzisswVx2K37RFY" allowfullscreen></iframe>
            </div>
</div>
</div>


<?php include "footer.php" ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

