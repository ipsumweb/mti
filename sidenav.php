<script>
$(document).ready( function() {
	
	$("li.navbar-text ").css("background","white"); // clear this on page load at first


	var this_path = window.location.pathname;
	this_path = this_path.replace(".php", "");
	this_path = this_path.replace("/mti/", "");
	
	if( ! this_path ) {
		this_path = 'index';
	}

	// determine if this is a main page...
	if( this_path == 'index' 
		|| this_path == 'last'
		|| this_path == 'interactive'
		|| this_path == 'quiz') {
			
		// assign active to the relevant <li> anyway
		$(".sidebar-nav li a#" + this_path).parents("li").addClass("active");
		
		// and add a glyphicon
		$(".sidebar-nav li.active a").append('<i class="glyphicon glyphicon-chevron-right pull-right"></i>');		
		
	}
	// or a sub page ...
	else {
	
		// for whether sidenav should be open or closed based on user last click 
		// wants_closed is null, and false, if they DON'T want it closed; else TRUE 
		var wants_closed = sessionStorage.getItem('wants_closed');
	
		// close all the left sidebar sub navs
		if(wants_closed == 1)  {
			var li_parents = $( "li.navbar-text" );
			var li_uls = $( "ul.sub-menu");
	
			li_uls.addClass("hidden");
			li_parents.find("span.my-toggle i.glyphicon-chevron-down")
					  .addClass("glyphicon-chevron-right")
					  .removeClass("glyphicon-chevron-down");	
			li_parents.css("background","white");
		}
		// didn't force left sidebar nav closed -- allow it open
		else {						
			// if so, change that one to have gray background
			$(".sub-menu li a#" + this_path).parents( "li.navbar-text" )
				.css("background","#e7e7e7"); // be sure the b/g of this element is gray
			$(".sub-menu li a#" + this_path).parents( "li").find( "span.my-toggle i.glyphicon")
					.removeClass("glyphicon-chevron-right")
					.addClass("glyphicon-chevron-down") ;		// and be sure it has a down pointing arrow
			
			// also add the right arrow to the active child element
			$(".sub-menu li a#" + this_path).append('<i class="glyphicon glyphicon-chevron-right pull-right"></i>');
			
			// also expand this parent submenu (unhide the ul.sub-menu)
			$(".sub-menu li a#" + this_path).parents("ul.sub-menu").removeClass("hidden");
		}
				
	}

		
	// k also..... custom drop down businezzz
	$("li.navbar-text").click( function() {
		var which_menu = $( this ).find(".my-toggle").attr("data-menu-id");
		var the_sub_menu = $( "ul.sub-menu[data-menu-id='" + which_menu + "']");
		
		// k so... is it showing or hiding submenu currently?
		var is_showing = !( the_sub_menu.hasClass("hidden") ); 
		
		// if is_showing, then they're clicking to hide it
		if( is_showing ) {
			the_sub_menu.addClass("hidden");
			$( this ).find("span.my-toggle i.glyphicon-chevron-down")
					.addClass("glyphicon-chevron-right")
					.removeClass("glyphicon-chevron-down");	
			$( this ).css("background","white");
			
			// ... nevermind -- just always keep it open
			sessionStorage.setItem('wants_closed', 0);
		}	
		// else it wasn't showing, and they want to show it
		else { 
			the_sub_menu.removeClass("hidden");
			$( this ).find("span.my-toggle i.glyphicon-chevron-right")
				.addClass("glyphicon-chevron-down")
				.removeClass("glyphicon-chevron-right");				
			$( this ).css("background","#e7e7e7");	
			
			// set session storage item - to keep menu open
			sessionStorage.setItem('wants_closed', 0);
	    }
		
	});
    
    // but also, if they click onto a sub-menu li (part of a bigger li.navbar-text), 
    // be sure to keep it open
    $("li.navbar-text ul.sub-menu li").click( function() {
        console.log( "clicked sub menu" );
        // set session storage item - to keep menu open
		sessionStorage.setItem('wants_closed', 0);
    });

	
});
</script>
		  <nav class="navbar navbar-default" style="height: 75px;">
		    <div class="container">
		      <div class="navbar-header">
		        <a class="img img-responsive navbar-brand" href='http://www.mti-global.org' target="_blank"><img src='mti-logo-50px.png' ></a>
		      </div>
		    </div>
		  </nav>
    <div class="sidebar-nav">
      <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse sidebar-navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href='index.php' id='index'>Welcome &amp; Introduction</a></li>

            <li role="separator" class="divider"></li>           

            <li class='navbar-text'>Section 1: Bottom Corrosion Layer <span data-menu-id='sub-menu-01' class='pull-right my-toggle'><i class='glyphicon glyphicon-chevron-right'></i> </span>
              <ul class="sub-menu hidden" data-menu-id='sub-menu-01' >
                <li><a href='frp-training-slide2.php' id='frp-training-slide2'>Page 1</a></li>
                <li><a href='frp-training-slide3.php' id='frp-training-slide3'>Page 2</a></li>
                <li><a href='frp-training-slide4.php' id='frp-training-slide4'>Page 3</a></li>
                <li><a href='frp-training-slide5.php' id='frp-training-slide5'>Page 4</a></li>
                <li><a href='frp-training-slide6.php' id='frp-training-slide6'>Page 5</a></li>
                <li><a href='frp-training-slide7.php' id='frp-training-slide7'>Page 6</a></li>
                <li><a href='frp-training-slide8.php' id='frp-training-slide8'>Page 7</a></li>
                <li><a href='frp-training-slide9.php' id='frp-training-slide9'>Page 8</a></li>
                <li><a href='frp-training-slide10.php' id='frp-training-slide10'>Page 9</a></li>
                <li><a href='frp-training-slide11.php' id='frp-training-slide11'>Page 10</a></li>
                <li><a href='frp-training-slide12.php' id='frp-training-slide12'>Page 11</a></li>
                <li><a href='frp-training-slide13.php' id='frp-training-slide13'>Page 12</a></li>
                <li><a href='frp-training-slide14.php' id='frp-training-slide14'>Page 13</a></li>
            	<li><a href='frp-training-slide14b.php' id='frp-training-slide14b'>Time Lapse Demonstration</a></li>
              </ul>
            </li>

            <li role="separator" class="divider"></li>

            <li class='navbar-text'>Section 2: Structural Layer <span data-menu-id='sub-menu-02' class='pull-right my-toggle'><i class='glyphicon glyphicon-chevron-right'></i> </span>
              <ul class="sub-menu hidden" data-menu-id='sub-menu-02' >
                <li><a href='frp-training-slide15.php' id='frp-training-slide15'>Page 14</a></li>
                <li><a href='frp-training-slide16.php' id='frp-training-slide16'>Page 15</a></li>
                <li><a href='frp-training-slide17.php' id='frp-training-slide17'>Page 16</a></li>
                <li><a href='frp-training-slide18.php' id='frp-training-slide18'>Page 17</a></li>
            	<li><a href='frp-training-slide18b.php' id='frp-training-slide18b'>Time Lapse Demonstration</a></li>
              </ul>
            </li>

            <li role="separator" class="divider"></li>
            
            <li class='navbar-text'>Section 3: Exterior Protective Layer <span data-menu-id='sub-menu-03' class='pull-right my-toggle'><i class='glyphicon glyphicon-chevron-right'></i> </span>
              <ul class="sub-menu hidden" data-menu-id='sub-menu-03' >
                <li><a href='frp-training-slide19.php' id='frp-training-slide19'>Page 18</a></li>
                <li><a href='frp-training-slide20.php' id='frp-training-slide20'>Page 19</a></li>
                <li><a href='frp-training-slide21.php' id='frp-training-slide21'>Page 20</a></li>
                <li><a href='frp-training-slide22.php' id='frp-training-slide22'>Page 21</a></li>
            	<li><a href='frp-training-slide22b.php' id='frp-training-slide22b'>Time Lapse Demonstration</a></li>
              </ul>
            </li>

            
            <li role="separator" class="divider"></li>
            <li><a href='interactive.php' id='interactive'>Interactive Review</a></li>

            <li role="separator" class="divider"></li>
            <li><a href='quiz.php' id='quiz'>Quiz</a></li>

            <li role="separator" class="divider"></li>
            <li><a href='last.php' id='last' >Conclusion</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
      
      <div id="interactive-audio"></div>
    </div>
