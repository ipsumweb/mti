<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include 'header.php'; ?>
  <link rel="stylesheet" type="text/css" href="/mti/bs-prog/css/bootstrap-progressbar-3.3.4.css">
  <style type='text/css'>
.nav.nav-pills li {
	z-index: 100;
	min-width: 100px;
	text-align: center;
}
.nav.nav-pills li:hover {
	cursor: move;
}
.layer-label {
	text-align: center;
	font-size: 120%;
	height: 110px;
}
.well { margin: 0px; }
.well, .list-group-item:first-child, .list-group-item:last-child, .list-group {
	border-radius: 0px;
}
.list-group {
	margin-bottom: 0px;
}
.list-group-item {height: 17px; padding: 0px;}
.col-md-7.structure {padding-right: 0px;}
.layer-bar.gray, .list-group-item.disabled, .list-group-item.disabled:focus, .list-group-item.disabled:hover {
	background: #6b6b6b;
	color: #eae7d8;
}

/* classes for dropped stuff */
.resin-all {
	background: #fff url('resin-all2.png') no-repeat left;
}
.white#veil {
	background: #fff url('veil-white2.png') no-repeat left;
}
.white#csm {
	background: #fff url('csm-white2.png') no-repeat left;
}
.white#wr {
	background: #fff url('wr-white2.png') no-repeat left;
}
.yellow#veil {
	background: #fff url('veil-yellow2.png') no-repeat left;
}
.yellow#csm {
	background: #fff url('csm-yellow2.png') no-repeat left;
}
.yellow#wr {
	background: #fff url('wr-yellow2.png') no-repeat left;
}
.brown#veil {
	background: #fff url('veil-brown2.png') no-repeat left;
}
.brown#csm {
	background: #fff url('csm-brown2.png') no-repeat left;
}
.brown#wr {
	background: #fff url('wr-brown2.png') no-repeat left;
}

.add-margin {
	border-bottom: 1px solid black;
}
.withblue {
	background: #a5b4c7;
	margin-left: 0px;
	margin-right: 0px;
}
.withblue .col-md-5 {padding: 10px 0; }
.mold {
	height: 40px;
	text-align: center;
	padding: 10px;
}


/* states for interaction with boxes as dropped */
.ui-state-hover {
	background: #d8d8d8;
}
.progress.vertical {
	width: 80%;
	margin-left: 10%;
	height: 500px; /* gets reset on page load */
}
.prog-label {
	text-align: center;
	text-transform: uppercase;
	font-size: 70%;
}
</style>
  <script>

$(document).ready(function() {
	// deal with progress bar situation
    $('.progress .progress-bar').progressbar({display_text: 'fill'});
	
	// calc how tall they should be, based on height of the 3 blue rows
	var prog_height = $(".row.withblue:eq(1)").outerHeight()
					+ $(".row.withblue:eq(0)").outerHeight()
					+ $(".row.withblue:eq(2)").outerHeight();
		
	$(".progress.vertical").height( prog_height );
});  
  
// global that controls the roller check
var needs_roller = false;
$('#rollerModal').modal();

$(function() {
		
    $( ".nav.nav-pills li" ).draggable({ 
		stack: "span.list-group-item",
		zIndex: 100,
		helper: "clone"	
	});
	
	$(" .list-group-item ").on("click",".glyphicon-remove", function() {
		$( this ).parents(" .list-group-item ")
			.removeClass("list-group-item-danger small")
			.empty();	
			
	});
		
	
	// most of the excitement happens when dropped onto the list box
    $( ".layer-box .list-group-item:not('.mold')" ).droppable({
    	hoverClass: "ui-state-hover",
		drop: function( event, ui ) {
			
			// very first check -- can only drop from the bottom up
			var is_from_base_up = isFromBaseUp( $(this) );
			if( ! is_from_base_up )
				return; // don't execute if this returns false -- didn't start at bottom up
			
			// is it the roller or not
			var is_roller = checkIsRoller( ui.draggable )			

			if( is_roller ) { // if this is the roller, 2 cases: they needed the roller now.. or not
				if( needs_roller ) {
					// this function handles whether to reset needs_roller - if they drop it correctly
					goodRoll( $(this) );	 // add text to this element saying it has been rolled	
				}
				
			}
			if( ! is_roller ) { // if this is NOT the roller, 2 cases: they needed it, or not...
				
				if( needs_roller ) {
					forgotRoller();
				}
				else { // don't need roller, free to do the next thing
					// first, check if the incoming is the right one or not
					var is_match = checkDrop( ui.draggable, $(this) );
				
					if( is_match ) { // they match, and it's not the roller -- let them drop it
						makeBar( ui.draggable, $(this) ); 
						//needs_roller = true; 
					} 
					else { // mismatch - wrong order - turn the space red
						addRed( ui.draggable, $(this) );
						needs_roller = false;
					}
				}
			}

		}	
    });
	
	
}); 

  // check if they are working their way up from the base - works b/c the lower layers collapse and lose the col-md-9 element of each row as the layer is completed
  function isFromBaseUp( $slot ) {
	  var flag = true; 
	  
	  // get  id of col-md-9 parent
	  var this_layer = $slot.parents(".col-md-7.structure").attr("id");
	  
	  // do logic to see if lower levels are still there
	  // there are 3 col-md-9's: #top-corrosion, #structural, #bottom-corrosion
	  if(this_layer == 'top-corrosion') {		  
		  
		  if( $("#structural").find(".list-group .list-group-item").length > 
		  	  $("#structural").find(".list-group .brown").length )
				flag = false; // oops, structural layer still on page
				
		  if( $("#bottom-corrosion").find(".list-group .list-group-item").length  >
		  	  $("#bottom-corrosion").find(".list-group .brown").length )
		  
		  		flag = false; // oops, bottom corrosion layer still on page
	  } 
	  else if (this_layer == 'structural') {
		  if( $("#bottom-corrosion").find(".list-group .list-group-item").length  >
		  	  $("#bottom-corrosion").find(".list-group .brown").length )
		  		
				flag = false; // oops, bottom corrosion layer still on page
	  } 
	  // and if this_layer == bottom-corrosion, that's fine. carry on

	  // if flag is true, show an alert
	  if( ! flag ) 
	  	alert( 'Be sure to work from the bottom level upwards.' );

	  return flag;	  
  }


  // check if the item being dragged is indeed the roller item
  function checkIsRoller( $item ) {
	  
	  if( $item.attr("id") == 'roller' )
	  	return true;
	  else 
	  	return false;
  }

  
  // if they are rolling something successfully
  function goodRoll( $slot ) {
	  // first, make sure they don't accidentally drop onto one that is already there
	  var has_roll_msg = $slot.hasClass("brown");
	  
	  // if the badge is not found -- ok, could be safe to drop it there...	  
	  // but, is there even a layer bar? if not, still don't drop it and don't clear the needs_roller var
	  var has_layer_bar = $slot.hasClass("layer-bar");

	  // this IF only executes if it's a good roll and the msg should appear, etc.
	  if( ! has_roll_msg && has_layer_bar ) {
		//$slot.append( "<span class='badge pull-right'>Good roll!</span> " );  
		$slot.siblings(".yellow")
			.addClass("brown")
			.removeClass("yellow")
			.append("<i class='glyphicon glyphicon-ok pull-right' style='margin-right: 7px;'></i>");
		
		// and do this for the slot itself
		$slot
			.addClass("brown")
			.removeClass("yellow")
			.append("<i class='glyphicon glyphicon-ok pull-right' style='margin-right: 7px;'></i>");

		needs_roller = false;
		
     	// also check if this is the time to collapse a section if all layers complete
	    check_layer_collapse( $slot );
	  }
	  
  }
  
  
  // show modal if they forgot to apply the roller
  function forgotRoller(  ) {
	// just activate the modal  
	$('#rollerModal').modal('show');
  }


  function checkDrop( $incoming, $slot ) {
	var inc_id = $incoming.attr("id");
	var rec_id = $slot.attr("id");
	
	if( inc_id == rec_id )
		return true;
	else
		return false;	  
  }

	// 2 incoming jQuery objects; happens on successful drop 
  function makeBar( $item, $slot ) {
	  // do this clear-out in case they had dragged incorrectly already
	  $slot.removeClass("list-group-item-danger small");
	  $slot.empty();
	  
	  // now change the look of it
	  
	  // the resin layers are special
	  // drop them - they're always brown, and they turn anything under them brown
	  var is_resin = $slot.attr("id");
	  if( is_resin == 'resin') {
	  	$slot.addClass("resin-all white");
		$slot
			.siblings(".white")
				.addClass("yellow")
				.removeClass("white");
	  }
	  
	  
	  
	  var has_yellow = $slot.hasClass("yellow");
	  var has_white = $slot.hasClass("white"); 
	  var has_brown = $slot.hasClass("brown");
	  
	  if( has_white ) {
	  	$slot
			.addClass("yellow")
			.removeClass("white");
	  }
	  else if( has_yellow ) {
	  	$slot
			.addClass("brown")
			.removeClass("yellow");
	  }
	  else if( ! has_brown ) { /* just sstarting out -- add white */
	  	$slot
			.addClass("white");
	  }
	  
		
	  $slot
	  	.addClass("layer-bar")
	  
	  
	  // important! set the global roller var to TRUE so they'll need to use the roller next
	  // but ONLY if the attribute is set... it doesn't happen on every layer basically.
	  if( $slot.attr( "data-roller" ) )
		  needs_roller = true;
		  
	  // also important! check if the strength or corrosion resistance bars need to be updated at this time
	  var this_cr = $slot.attr( "data-cr" );
	  if( this_cr ) {
		$(".progress-bar#cr").attr("data-transitiongoal", this_cr );
		$('.progress .progress-bar').progressbar();
	  }

	  var this_s = $slot.attr( "data-s" );
	  if( this_s ) {
		$(".progress-bar#s").attr("data-transitiongoal", this_s );
		$('.progress .progress-bar').progressbar();
	  }

  }
  
  // wrong drop; notify them as such
  function addRed( $item , $slot ) {
	  // first, this makes sure the slot isn't already correct
	  if( ! $slot.find("i.glyphicon-ok").length && 
	  	  ! $slot.hasClass("brown") &&
		  ! $slot.hasClass("yellow") &&
		  ! $slot.hasClass("white") ) {
		  $slot.addClass( 'list-group-item-danger small' );
		  var the_text = $item.text();
		  var the_icon = "<i class='glyphicon glyphicon-remove'></i> ";
		  $slot.html( the_icon + "Oops, wrong order for " + the_text + ". Please try again." );
	  }
  }
  
  function check_layer_collapse( $slot ) {
	// total # slots that need rolling
	var need = $slot.siblings(".list-group-item").length + 1 ; 
	
	// total # slots already rolled
	var done = $slot.parents(".list-group").find(".brown").length ; 

	// if the slots are full, show alert and close up that section
	if( done >= need ) {
		alert( "Great! This layer is complete. Please remember time has passed and the top layer of resin has hardened as you move on to the structural layer." );
		
//		var this_new_row_elem = $slot.parents(".col-md-7.structure").siblings(".col-md-5");

		// grab the text of the layers!
//		$slot.parents(".col-md-9").find(".list-group-item:not(.disabled)").each(function( index ) {
//		//	$( this ).find(".layer-bar").removeClass("layer-bar");
//			$( this ).find(".badge").remove();
//			$( this ).css("padding", "2px 10px");
//		});

		// get which layer this is
		// this can be 'bottom-corrosion' or 'structural' or 'top-corrosion'
//		var this_id = $slot.parents(".col-md-7.structure").attr("id");
//		var this_url = "h-" + this_id + ".png";
//
//		$slot.parents(".col-md-7.structure")
//			.empty()
//			.html("<img class='img img-responsive' src='" + this_url + "' />")
//			.height("150")
//			.css("background-repeat","no-repeat");
			
		
		// add "done" to the button and shrink it up
//		this_new_row_elem
//			//.addClass("col-md-12")
//			//.removeClass("col-md-3")
//			.find(".well")
//				.css("height","inherit")
//				.append(" - Done! ");
	}
	
  }
  
  </script>
  <script>
  /*!
 * jQuery UI Touch Punch 0.2.3
 *
 * Copyright 2011–2014, Dave Furfero
 * Dual licensed under the MIT or GPL Version 2 licenses.
 *
 * Depends:
 *  jquery.ui.widget.js
 *  jquery.ui.mouse.js
 */
!function(a){function f(a,b){if(!(a.originalEvent.touches.length>1)){a.preventDefault();var c=a.originalEvent.changedTouches[0],d=document.createEvent("MouseEvents");d.initMouseEvent(b,!0,!0,window,1,c.screenX,c.screenY,c.clientX,c.clientY,!1,!1,!1,!1,0,null),a.target.dispatchEvent(d)}}if(a.support.touch="ontouchend"in document,a.support.touch){var e,b=a.ui.mouse.prototype,c=b._mouseInit,d=b._mouseDestroy;b._touchStart=function(a){var b=this;!e&&b._mouseCapture(a.originalEvent.changedTouches[0])&&(e=!0,b._touchMoved=!1,f(a,"mouseover"),f(a,"mousemove"),f(a,"mousedown"))},b._touchMove=function(a){e&&(this._touchMoved=!0,f(a,"mousemove"))},b._touchEnd=function(a){e&&(f(a,"mouseup"),f(a,"mouseout"),this._touchMoved||f(a,"click"),e=!1)},b._mouseInit=function(){var b=this;b.element.bind({touchstart:a.proxy(b,"_touchStart"),touchmove:a.proxy(b,"_touchMove"),touchend:a.proxy(b,"_touchEnd")}),c.call(b)},b._mouseDestroy=function(){var b=this;b.element.unbind({touchstart:a.proxy(b,"_touchStart"),touchmove:a.proxy(b,"_touchMove"),touchend:a.proxy(b,"_touchEnd")}),d.call(b)}}}(jQuery);
  </script>
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
    <div class="row">
    <div class='col-md-12'>
        <p><a class="btn btn-default pull-right" href="quiz.php" role="button">Take quiz »</a></p>
        <h3>Interactive Review</h3>
        <p>Use the buttons below to create your own FRP, starting with the bottom layer. Make sure to roll the material when appropriate. You can proceed to the quiz whenever you are ready by selecting "Take Quiz," on the right or on the bottom of the screen.</p>
        <ul class="nav nav-pills" style='margin-bottom: 20px;'>
        <li class="active" id='resin'><a><img src='resin.png'> Resin</a></li>
        <li class="active" id='veil'><a><img src='veil.png'> Veil</a></li>
        <li class="active" id='csm'><a><img src='chopped strand.png'> Chopped Strand Mat</a></li>
        <li class="active" id='wr'><a><img src='WR.png'> Woven Roving (WR)</a></li>
        <li class="list-group-item-info" id='roller'><a><img src='roller.png'> Roller</a></li>
      </ul>
      </div>
    <!-- end col md 12 --> 
  </div>
    <!-- end row -->
    
    <div class='row'>
    <div class='col-md-10'>
        <div class='row add-margin withblue' style='background: #6d829f;'>
        <div class='col-md-5'>
            <img src='layer-3.png' class='img img-responsive'/>
          </div>
        <div class='col-md-7 structure' id='top-corrosion'>
            <div class='list-group layer-box' style='margin-top: 35px;'> 
            	<span class='list-group-item' id='resin' data-roller='true'> </span> 
                <span class='list-group-item' id='veil'> </span> 
                <span class='list-group-item' id='resin' data-roller='true'> </span> 
                <span class='list-group-item' id='csm'> </span> </div>
          </div>
      </div>
        <!-- end first row -->
        
        <div class='row add-margin withblue' style='background: #8899b1; ' >
        <div class='col-md-5'>
            <img src='layer-2.png' class='img img-responsive'/>
          </div>
        <div class='col-md-7 structure' id='structural'>
            <div class='list-group layer-box' > 
            <span class='list-group-item' id='resin' data-roller='true' data-s='100'> </span> 
            <span class='list-group-item' id='csm' data-s='95'> </span> 
            <span class='list-group-item' id='resin' data-roller='true' data-s='75'> </span> 
            <span class='list-group-item' id='wr' data-s='70'> </span> 
            <span class='list-group-item' id='resin' data-roller='true' data-s='30'> </span> 
            <span class='list-group-item' id='csm' data-s='25'> </span> 
            <span class='list-group-item' id='resin' data-s='5'> </span> </div>
          </div>
      </div>
        <!-- end 2nd row -->
        
        <div class='row withblue'>
        <div class='col-md-5'>
            <img src='layer-1.png' class='img img-responsive'/>
          </div>
        <div class='col-md-7 structure' id='bottom-corrosion'>
            <div class='list-group layer-box' > 
            	<span class='list-group-item' data-roller='true' id='resin' data-cr='100'> </span> 
                <span class='list-group-item' id='csm' data-cr='95'> </span> 
                <span class='list-group-item' data-roller='true' id='resin' data-cr='65'> </span> 
                <span class='list-group-item' id='csm' data-cr='60'> </span> 
                <span class='list-group-item' data-roller='true' data-cr='30' id='resin'> </span> 
                <span class='list-group-item' id='veil' data-cr='25'> </span> 
                <span class='list-group-item' id='resin' data-cr='5'> </span> 
            </div>
          </div>
      </div>
        <!-- end 3rd row --> 
        <div class='row withblue' style='background: none;'>
        <div class='col-md-5'>
            &nbsp;
          </div>
        <div class='col-md-7 structure' >
            <div class='list-group layer-box' data-color='offwhite'> 
                <span class='list-group-item disabled mold layer-bar gray'> Mold/Form </span> 
            </div>
          </div>
      </div>
        <!-- end 3rd row --> 
       
      </div>
    <!-- end col md 8 -->
    
    <div class='col-sm-1'>
        <div class="progress  vertical bottom">
        	<div class="progress-bar progress-bar-warning " id='s' role="progressbar" data-transitiongoal="0"> </div>
        </div>
        <p class='prog-label'>strength</p>
    </div>
    <div class='col-sm-1'>
        <div class="progress vertical bottom">
        <div class="progress-bar progress-bar-danger " id='cr' role="progressbar" data-transitiongoal="0"> </div>
      </div>
        <p class='prog-label'>corrosion<br>
        resistance</p>
      </div>
  </div>
    <!-- end row -->
    
    <div class='row'>
        <div class='col-md-3'> 
            <a class="btn btn-default btn-sm pull-left" href="frp-training-slide22b.php" role="button">&laquo; Previous page</a>
            
        </div>
                <div class='col-md-3' style="text-align: center;">
        
            <audio style="width:100%;     margin-top: 10px;" controls preload="auto" tabindex="0" autoplay ><source src="interactive-instructions.mp3" type="audio/mpeg" /></audio>
        </div>
        <div class='col-md-3' style="text-align: center;">   
            <a type="button" class="btn btn-default btn-sm" onClick="window.location.reload();">Reset Interaction</a>
        </div>

        <div class="col-md-3">
            <a class="btn btn-default btn-sm pull-right" href="quiz.php" role="button">Take quiz &raquo;</a>
        </div>
  </div>
  <div class="row">
  	<div class="col-md-12">
  	<p>We'd like you to test your knowledge and create your own FRP Laminate! Using the buttons at the top of the screen, drag the materials used in developing fiberglass onto the mold structure at the bottom of the screen. You also have a roller tool on the top, right-hand side of the screen that should be utilized throughout the process. The example you are creating mirrors the example discussed in the course. Assume time has passed since the corrosion layer was rolled and the resin in the corrosion layer is hard. You may move on to the quiz whenever you are ready by selecting, "Take Quiz" at the bottom of the page, or by selecting "Quiz" on the left side of the screen.</p>
  	</div>
  </div>
  
</div><!-- end col sm 9 -->
</div> <!-- end big row -->

    <hr>

  <footer>
    <p>&copy; <?php echo date('Y'); ?> PACE Oregon State in collaboration with <a href='http://www.mti-global.org' target="_blank">MTI Inc.</a></p>
  </footer>

  </div>
<!-- /container --> 

<!-- modal for if forrgot to roll -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"  id="rollerModal">
    <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header"> <span class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></span> </div>
        <div class="modal-body"> Don’t forget to use the roller when necessary... </div>
        <div class="modal-footer"> <span type="button" class="btn btn-default pull-right" data-dismiss="modal">ok</span> </div>
      </div>
  </div>
  </div>

</body>
</html>
