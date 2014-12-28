<?php
  
  if ($_POST["submit"]) {

    if (!$_POST['name']) {
      $error="<br />Please enter your name";
    }
    if (!$_POST['email']) {
      $error.="<br />Please enter your email address";
    }
    if (!$_POST['comment']) {
      $error.="<br />Please enter a comment";
    }
    if ($_POST['email']!="" AND !filter_var($_POST['email'], 
FILTER_VALIDATE_EMAIL)) {
      $error.="<br />Please enter a valid email address";
    }
    if ($_POST('opt') == "gigopt") {
      if ()
    }

    if ($error) {
      $result='<div class="alert alert-danger"><strong>There were error(s) 
in your form:</strong>'.$error.'</div>';
    } else {
      $emailTo="rishi.z.sinha@gmail.com";
      $subject="Azaad Contact-Us Submission";
      $body="Name: ".$_POST['name']."\r\nEmail: ".$_POST['email'];
      $headers="From: ".$_POST['email'];
      $mailStatus = mail($emailTo, $subject, $body, $headers);
      if ($mailStatus) {
        $result="<div class='alert alert-success'>Submitted!</div>";
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UC Berkeley Azaad</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>

      .carousel-inner >
       .item > 
        img { 
          margin: 0 auto; 
        }

      input[type="radio"] {
        margin-left: 20px;
        margin-right: 10px;
      }

    </style>

  </head>

  <body data-spy="scroll" data-target=".navbar-collapse">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="container">

        <div class="navbar-header">
          <!-- Navigation Button -->
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"> Toggle Navigation </span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="cover.html" style="padding: 0px 15px;">
            <img src="images/azaadlogoxxs.png" class="logo" />
          </a>
        </div>

        <div class="collapse navbar-collapse" id="main-nav">
          <ul class="nav navbar-nav">
            <li><a href="index.html">About Us</a></li>
            <li><a href="team.html">Team</a></li>
            <li><a href="competitions.html">Competitions</a></li>
            <li><a href="gigs.html">Gigs</a></li>
            <li><a href="alumni.html">Alumni</a></li>
            <li><a href="contact.php">Contact Us!</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->  
      </div>
       <!-- /.container -->
    </nav> 

    <div class="container">
      <h1> Contact Us! </h1>
      <p class="lead"> Send your info, we'll get back to you in a couple days </p>

      <?php
        echo $result;
      ?>

      <form role="form" method="post">
        <!-- Name -->
        <div class="form-group">
          <label for="inputName">Name</label>
          <input type="text" class="form-control" name="name" id="inputName" placeholder="Name" value="<?php echo $_POST['name']; ?>"/>
        </div>
        <!-- Email Address -->
        <div class="form-group">
          <label for="inputEmail1">Email address</label>
          <input type="email" class="form-control" name="email" id="inputEmail1" placeholder="Email Adress" value="<?php echo $_POST['email']; ?>"/>
        </div>
        <!-- Contact Options -->
        <div class="form-group">
          <label for="contactOptions">How can we help you?</label> </br>
          <input type="radio" name="opt" value="gigopt" id="gigopt">Gig Request </br>
          <input type="radio" name="opt" value="other" id="other">General </br>
        </div>
        <!-- Gig: Date -->
        <div class="form-group gig">
          <label for="gigDate">Date of Gig</label>
          <input type="date" class="form-control" name="gigDate" id="gigDate" placeholder="Date" value= >
        </div>
        <!-- Gig: Location-->
        <div class="form-group gig">
          <label for="loc">Location Name and Address</label>
          <input type="text" class="form-control" name="gigLoc" id="loc" placeholder="Location">
        </div>
        <!-- General Comment-->
        <div class="form-group">
          <label for="generalComment">Questions, Comments?</label>
          <textarea class="form-control" name="comment" id="generalComment" placeholder="Additional Comments">
            <?php echo $_POST['comment']; ?>
          </textarea>
        </div>

        <button type="submit" name="submit" class="btn btn-success" value="submit">
          Submit
        </button>
      </form>
    </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">

      $("#other").click(function() {
        $(".gig").hide();
      })

      $("#gigopt").click(function() {
        $(".gig").show();
      })
    </script>

  </body>
</html>