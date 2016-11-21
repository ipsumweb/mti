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
          <p><a class="btn btn-default pull-right top10 hidden-sm hidden-xs" href="section02-a.php" role="button">Next section »</a></p>
          <h3>Section 1: Corrosion Layer - <br>
Time Lapse Demonstration</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/X5G1R9X2avs" allowfullscreen></iframe>
            </div>


          <p><a class="btn btn-default pull-right" href="section02-a.php" role="button">Next section »</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>© 2016 PACE Oregon State in collaboration with <a href='http://www.mti-global.org' target="_blank">MTI Inc.</a></p>
      </footer>
    </div> <!-- /container -->


  

</body>

</html>
