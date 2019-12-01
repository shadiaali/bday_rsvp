<?php
require_once('scripts/config.php');
confirm_logged_in();

if (isset($_GET['filter'])) {
  $tbl = 'tbl_rsvp';
  $tbl_2 = 'tbl_category';
  $tbl_3 = 'tbl_rsvp_category';
  $col = 'rsvp_id';
  $col_2 = 'cat_id';
  $col_3 = 'cat_name';
  $filter = $_GET['filter'];
  $results = filterResults($tbl, $tbl_2, $tbl_3, $col, $col_2, $col_3, $filter);
} else {
  $results = getAll('tbl_rsvp');
  $headerr = "Welcome!";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>RSVP Responses</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.7/css/mdb.min.css" rel="stylesheet">
  <!-- CSS -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>


  <div class="container-fluid card card-image purple-gradient wow fadeIn" style="height:100vh;">

    <div class="row">
      <div class="col-12 text-center mt-3 mb-3">
        <a href="index.php?filter=Yes" style="border-radius:50px;" class="text-dark btn dusty-grass-gradient">
          Yes Responses
        </a>

        <a href="index.php?filter=No" style="border-radius:50px;" class="text-dark btn dusty-grass-gradient">
          No Responses
        </a>

        <a href="scripts/caller.php?caller_id=logout" style="border-radius:50px;" class="text-dark btn dusty-grass-gradient">
          Logout
        </a>

      </div>
    </div>
    <table class="cloudy-knoxville-gradient table table-striped table-responsive-md">
      <thead>
        <tr>
          <th scope="row">Parent's Name</th>
          <th scope="row">Child's Name</th>
          <th scope="row">Jumping with child?</th>
          <th scope="row">Socks needed?</th>
          <th scope="row">Phone</th>
        </tr>
      </thead>

      <tbody>
        <?php while ($row = $results->fetch(PDO::FETCH_ASSOC)) : ?>
          <tr>
            <td class="wow fadeIn"><?php echo $row['rsvp_name']; ?></td>
            <td class="wow fadeIn"><?php echo $row['rsvp_child']; ?></td>
            <td class="wow fadeIn"><?php echo $row['rsvp_jumping']; ?></td>
            <td class="wow fadeIn"><?php echo $row['rsvp_socks']; ?></td>
            <td class="wow fadeIn"><?php echo $row['rsvp_contact']; ?></td>


          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

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