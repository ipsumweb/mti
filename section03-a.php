<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'header.php'; ?>
  </head>
  
  <body>

    <?php include 'topnav.php'; ?>

    <?php //include 'jumbotron.php'; ?>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-sm-3">
          <?php include 'sidenav.php'; ?>
       </div>
        <div class="col-sm-9">
          <p><a class="btn btn-default pull-right top10 hidden-sm hidden-xs" href="slide20.php" role="button">Next page »</a></p>
          <h3>Section 3: Top Corrosion Layer</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/BChpwT6yLxc" allowfullscreen></iframe>
            </div>
          <p><a class="btn btn-default pull-right" href="slide20.php" role="button">Next page »</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; <?php echo date('Y'); ?> PACE Oregon State in collaboration with <a href='http://www.mti-global.org' target="_blank">MTI Inc.</a></p>
      </footer>
    </div> <!-- /container -->


  

</body>

</html>
