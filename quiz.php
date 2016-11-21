<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'header.php'; ?>
  </head>
  
  <body>

    <?php include 'topnav.php'; ?>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-sm-3">
          <?php include 'sidenav.php'; ?>
       </div>
        <div class="col-sm-9">
          <h3>Comprehension Quiz</h3>
          
          <p id='first-p'>Test your comprehension by answering 5 questions. </p>
          
          <div class='panel panel-default' id='q1'>
          	<div class='panel-heading'>
            1. What is the primary material used in FRP for corrosion resistance? Click the correct answer.
            </div>
            <div class='list-group'>
            	<div class='list-group-item'>
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios">
                    <p>Veil</p>
                  </label>
                </div>
                               
                <button class='btn btn-danger'>
                <i class='glyphicon glyphicon-remove'></i>
                </button>
                <span class='text-danger'>
                Veil is important to prevent cracking of the resin but using the correct resin is the most important to resist corrosion.</span>
                </div>
                <div class='list-group-item'>
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios">
                    <p>Resin</p>
                  </label>
                </div>                
                <button class='btn btn-success btn-sm'>
                <i class='glyphicon glyphicon-ok'></i>
                </button>
                <span class='text-success'>
                Using the correct resin is the most important to resist corrosion.</span>
                </div>
                <div class='list-group-item'>
                             
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios">
                    <p>Woven Roving</p>   
                  </label>
                </div>                
                <button class='btn btn-danger'>
                <i class='glyphicon glyphicon-remove'></i>
                </button>
                <span class='text-danger'>
                Woven Roving is critical for the strength not corrosion.</span>
                </div>
                <div class='list-group-item'>
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios">
                    <p>Corrosion Layer </p>   
                  </label>
                </div>                
                                
                <button class='btn btn-danger'>
                <i class='glyphicon glyphicon-remove'></i>
                </button>
                <span class='text-danger'>
                The corrosion layer is made up of Resin and Fiber. The most critical is resin to resist corrosion.</span>
                </div>               
            </div>
          </div>
          <!-- don't show til correct answer shows -->
          <p><span class="btn btn-default pull-right hidden" data-this-id='q1' data-next-id='q2' >Next question &raquo;</span></p>


          <div class='panel panel-default hidden' id='q2'>
          	<div class='panel-heading'>
            2. True or False: The Roller is used to make sure the surface of the resin is smooth. Click the correct answer.
            </div>
            <div class='list-group'>
            	<div class='list-group-item'>
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios2">
                    <p>True</p>
                  </label>
                </div>                
                <button class='btn btn-danger'>
                <i class='glyphicon glyphicon-remove'></i>
                </button>
                <span class='text-danger'>
                The roller can affect surface appearance but the most important reason is to make sure the Fiber layer is saturated with resin and there are no air bubbles.</span>
                </div>
                <div class='list-group-item'>
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios2">
                    <p>False</p>
                  </label>
                </div>                
                <button class='btn btn-success btn-sm'>
                <i class='glyphicon glyphicon-ok'></i>
                </button>
                <span class='text-success'>
                The most important reason is to make sure the Fiber layer is saturated with resin and there are no air bubbles.</span>
                </div>
            </div>
          </div>
          <!-- don't show til correct answer shows -->
          <p><span class="btn btn-default pull-right hidden" data-this-id='q2' data-next-id='q3' >Next question &raquo;</span></p>
          


          <div class='panel panel-default hidden' id='q3'>
          	<div class='panel-heading'>
            3. The most important material in the strength layer is ________. Click the correct answer.
            </div>
            <div class='list-group'>
            	<div class='list-group-item'>
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios3">
                    <p>Resin</p>
                  </label>
                </div>                
                <button class='btn btn-danger'>
                <i class='glyphicon glyphicon-remove'></i>
                </button>
                <span class='text-danger'>
                Resin ties the Fibers together but does not add much to strength by its self.</span>
                </div>
                <div class='list-group-item'>
                                
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios3">
                    <p>Veil or Low Density Chopped Strand Mat</p>
                  </label>
                </div>                
                <button class='btn btn-danger'>
                <i class='glyphicon glyphicon-remove'></i>
                </button>
                <span class='text-danger'>
                Fibers in these materials are small in diameter and there are not as many fibers.</span>
                </div>
                <div class='list-group-item'>
                                
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios3">
                    <p>Woven Roving and High Density Chopped Strand Mat</p>
                  </label>
                </div>                
                <button class='btn btn-success btn-sm'>
                <i class='glyphicon glyphicon-ok'></i>
                </button>
                <span class='text-success'>
                Woven Roving and Mat have large diameter fibers and there are many fibers in these heavy materials.</span>
                </div>
            </div>
          </div>
          <!-- don't show til correct answer shows -->
          <p><span class="btn btn-default pull-right hidden" data-this-id='q3' data-next-id='q4' >Next question &raquo;</span></p>



          <div class='panel panel-default hidden' id='q4'>
          	<div class='panel-heading'>
            4. Choose the correct label for each picture.
            </div>
			<div class='panel-body'>            
            
            	<div class='row'>
                	<div class='col-sm-4'>
                    	<img src='chopped-strand-mat.png' class='img img-responsive img-thumbnail' >
                        <div class='list-group'>
                        	<div class='list-group-item'>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsRadios4">
                                    <p>Veil</p>
                                  </label>
                                </div>                
                                <button class='btn btn-danger'>
                                <i class='glyphicon glyphicon-remove'></i>
                                </button>
                            </div>
                            <div class='list-group-item'>
                                                
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsRadios4">
                                    <p>Woven Roving (WR)</p>
                                  </label>
                                </div>                
                                <button class='btn btn-danger'>
                                <i class='glyphicon glyphicon-remove'></i>
                                </button>
                            </div>
                            <div class='list-group-item'>
                                                
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsRadios4">
                                    <p>Chopped Strand Mat</p>
                                  </label>
                                </div>                
                                <button class='btn btn-success btn-sm'>
                                <i class='glyphicon glyphicon-ok'></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-4'>
                    	<img src='veil-cloth.png' class='img img-responsive img-thumbnail' >
						<div class='list-group'>
                        	<div class='list-group-item'>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsRadios5">
                                    <p>Veil</p>
                                  </label>
                                </div>                
                                <button class='btn btn-success btn-sm'>
                                <i class='glyphicon glyphicon-ok'></i>
                                </button>
                            </div>
                            <div class='list-group-item'>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsRadios5">
                                    <p>Woven Roving (WR)</p>
                                  </label>
                                </div>                
                                <button class='btn btn-danger'>
                                <i class='glyphicon glyphicon-remove'></i>
                                </button>
                            </div>
                            <div class='list-group-item'>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsRadios5">
                                    <p>Chopped Strand Mat</p>
                                  </label>
                                </div>                
                                <button class='btn btn-danger'>
                                <i class='glyphicon glyphicon-remove'></i>
                                </button>
                            </div>
                        </div>
                    </div>
                	<div class='col-sm-4'>
                    	<img src='woven-roving.png' class='img img-responsive img-thumbnail' >
                    	<div class='list-group'>
                        	<div class='list-group-item'>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsRadios6">
                                    <p>Veil</p>
                                  </label>
                                </div>                
                                <button class='btn btn-danger'>
                                <i class='glyphicon glyphicon-remove'></i>
                                </button>
                            </div>
                            <div class='list-group-item'>
                                             
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsRadios6">
                                    <p>Woven Roving (WR)</p>   
                                  </label>
                                </div>                
                                <button class='btn btn-success btn-sm'>
                                <i class='glyphicon glyphicon-ok'></i>
                                </button>
                            </div>
                            <div class='list-group-item'>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="optionsRadios6">
                                    <p>Chopped Strand Mat</p>
                                  </label>
                                </div>                
                                <button class='btn btn-danger'>
                                <i class='glyphicon glyphicon-remove'></i>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </div><!-- end row -->
                
            </div>
          </div>
          <!-- don't show til correct answer shows -->
          <p><span class="btn btn-default pull-right hidden" data-this-id='q4' data-next-id='q5' >Next question &raquo;</span></p>


          <div class='panel panel-default hidden' id='q5'>
          	<div class='panel-heading'>
            5. True or False: Experience and quality of workmanship can affect the physical properties of the final laminate. Click the correct answer.
            </div>
            <div class='list-group'>
            	<div class='list-group-item'>
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios7">
                    <p>True</p>
                  </label>
                </div>                
                <button class='btn btn-success btn-sm'>
                <i class='glyphicon glyphicon-ok'></i>
                </button>
                <span class='text-success'>
                Physical properties of the final laminate depend on correct amount of catalyst, making sure the fiber layers are saturated with resin and bubbles have been eliminated. Proper use of the roller is critical.</span>
                </div>
                <div class='list-group-item'>
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios7">
                    <p>False</p>
                  </label>
                </div>                
                <button class='btn btn-danger'>
                <i class='glyphicon glyphicon-remove'></i>
                </button>
                <span class='text-danger'>
                Physical properties of the final laminate depend on correct amount of catalyst, making sure the fiber layers are saturated with resin and bubbles have been eliminated. Proper use of the roller is critical.</span>
                </div>
            </div>
          </div>
          <!-- don't show til correct answer shows -->
          <p><span class="btn btn-default pull-right hidden" data-this-id='q5' data-next-id='last' >Finish quiz &raquo;</span></p>


          <div class='panel panel-default hidden' id='last'>
            <div class='panel-body'>
            <p class='lead'>
            Great job on the quiz! Click below to go to the final page of the course.
            </p>
            <p>
            <a class="btn btn-default pull-left" href="interactive.php" role="button">&laquo; Previous page</a>
            <a class="btn btn-default pull-right" data-next-id='last' href="last.php" role="button">Conclusion &raquo;</a></p>
            </div>
          </div>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; <?php echo date('Y'); ?> PACE Oregon State in collaboration with <a href='http://www.mti-global.org' target="_blank">MTI Inc.</a></p>
      </footer>
    </div> <!-- /container -->

<script>

$(document).ready( function() {
	// on page load, hide all list group buttons and spans
	$(".list-group-item button, .list-group-item span").addClass("hidden");
	
	// on click of any list group item, show the response for it
	$(".list-group-item").click( function() {
		$(this).find("button, span").removeClass("hidden");
		
		// also activate the radio button in it
		$(this).find("input[type='radio']").prop("checked","true");
		
		// check if this was correct; show advancement button if so
		if( $(this).find("button").hasClass("btn-success") ) {
			var this_q = $(this).parents(".panel").attr("id");
			$("span[data-this-id='" + this_q + "']").removeClass("hidden");
			
		}
	});
	 
	// on click of any 'show next panel' things... hide current, show next
	$("span.pull-right").click( function() {
		var this_id = $(this).attr("data-this-id");
		var next_id = $(this).attr("data-next-id");
		
		$(this).parents("p").remove();
		$(".panel#" + this_id).addClass("hidden");
		$(".panel#" + next_id).removeClass("hidden");

		if(this_id == 'q1')
			$("p#first-p").remove(); // hide the instrux text for first success only
		
	});
});

</script>
</body>

</html>
