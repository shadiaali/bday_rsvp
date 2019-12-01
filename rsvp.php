<?php
require_once './admin/scripts/config.php';


$cat_tbl            = 'tbl_category';
$rsvp_categories = getAll($cat_tbl);

if (isset($_POST['submit'])) {

  $name    = $_POST['name'];
  $child    = $_POST['child'];
  $jumping   = $_POST['jumping'];
  $socks   = $_POST['socks'];
  $contact   = $_POST['contact'];

  $cat     = $_POST['catList'];

  if (empty($name) || empty($child) || empty($jumping) || empty($socks) || empty($contact) || empty($cat)) {
    $message = 'all fields required';
  } else {
    $result  = addRSVP($name, $child, $jumping, $socks, $contact, $cat);
    $message = $result;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ulric's Birthday Party</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.7/css/mdb.min.css" rel="stylesheet">
  <!-- CSS -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body style="height:100%;">


  <div class="container-fluid card card-image purple-gradient wow fadeInRight">
    <div class="form-group wow fadeInRight md-form md-bg form-lg">
      <div class="row ">
        <div class="col-sm-8 offset-sm-2">
          <h3 class="display-3 text-center font-weight-bold white-text mb-5">RSVP
          </h3>
          <form action="rsvp.php" method="post" enctype="multipart/form-data">

            <select required name="catList" id="catlist select" class="browser-default custom-select custom-select-lg mb-3">
              <option selected>Will your child be able to attend Ulric's birthday party?</option>
              <?php while ($rsvp_category = $rsvp_categories->fetch(PDO::FETCH_ASSOC)) : ?>
                <option value="<?php echo $rsvp_category['cat_id']; ?>">
                  <?php echo $rsvp_category['cat_name']; ?>
                </option>
              <?php endwhile; ?>
            </select>


            <div class="form-group">

              <input type="text" name="name" id="name" class="form-control" placeholder="Your Name">
            </div>
            <div class="form-group">
              <input type="text" id="child" name="child" class="form-control" required placeholder="Your Child's Name">
            </div>
            <div class="form-group">
              <select name="jumping" id="jumping" class="browser-default custom-select custom-select-lg">
                <option selected>Will you be jumping with your child?</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="form-group">
              <select name="socks" id="socks" class="browser-default custom-select custom-select-lg">
                <option selected>Will you/your child need trampoline socks?</option>
                <option value="Yes">Yes</option>
                <option value="No">No - we will bring our own</option>
              </select>
            </div>
            <div class="form-group">
              <input type="tel" name="contact" id="contact" class="form-control" placeholder="Your phone number">
            </div>

            <button type="submit" name="submit" class="btn dusty-grass-gradient" style="border-radius:50px;">Submit</button>
          </form><br>
          <hr>
          <div class="container justify-content-center text-center"><a href="index.php" class="text-white btn purple-gradient btn-lg"> Go back</a>
            <div>
            </div>



            <!-- SCRIPTS -->
            <!-- JQuery -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <!-- Bootstrap tooltips -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <!-- Bootstrap core JavaScript -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <!-- MDB core JavaScript -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.7/js/mdb.min.js"></script>
            <!--main javascript-->
            <script type="text/javascript" src="js/main.js"></script>
            <!-- Initializations -->
            <script type="text/javascript">
              // Animations initialization
              new WOW().init();
            </script>
</body>

</html>