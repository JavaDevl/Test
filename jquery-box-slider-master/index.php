<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Adaptor :: jQuery content slider</title>

  <link href='http://fonts.googleapis.com/css?family=Aldrich' rel='stylesheet'>
	<link href="css/screen.css" rel="stylesheet">
  <script src="js/lib/modernizr.min.js"></script>
</head>
	<body>
	  <div id="page">

      <section>
        <header>
          <hgroup>
            <h1><?php echo $_GET['region'] ?></h1>
            <h2>jQuery content slider</h2>
          </hgroup>
        </header>

        <div id="viewport-shadow">

          <a href="#" id="prev" title="go to the next slide"></a>
          <a href="#" id="next" title="go to the next slide"></a>
<?php
include '../db/dbConnector.php';
$db=new DbConnector();
$fm=$db->fetchmyArray("select images,title from  articles where confirmed>0");
?>
          
          <div id="viewport">
              
            <div id="box">
              <?php for($i=0;$i<count($fm);$i++){ ?>
              <figure class="slide">
                <img style="width:680px; height:460px" <?php echo $fm[$i]['images']; ?>>
                <div style="position:absolute; font-size: 18px; background-color: #000; opacity: 0.8; height: 80px; padding:20px 5px 0px 5px; margin-top: -90px; width:670px">
                    <?php echo $fm[$i]['title']; ?>
                    
                </div>
              </figure>
              <?php } ?>
            </div>
          </div>

          <div id="time-indicator"></div>
        </div>

        <footer>
          <nav class="slider-controls">
            <ul id="controls">
              <li><a class="goto-slide current" href="#" data-slideindex="0"></a></li>
              <li><a class="goto-slide" href="#" data-slideindex="1"></a></li>
              <li><a class="goto-slide" href="#" data-slideindex="2"></a></li>
              <li><a class="goto-slide" href="#" data-slideindex="3"></a></li>
              <li><a class="goto-slide" href="#" data-slideindex="4"></a></li>
              <li><a class="goto-slide" href="#" data-slideindex="5"></a></li>
            </ul>
          </nav>
        </footer>
      </section>



	  </div>
		<script src="//code.jquery.com/jquery-1.7.2.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/lib/jquery-1.7.2.min.js"><\/script>')</script>
		<script src="js/box-slider.jquery.js"></script>
		<script src="js/effects/box-slider-fx-scroll-3d.js"></script>
		<script>

		  $(function () {

        var $box = $('#box')
          , $indicators = $('.goto-slide')
          , $effects = $('.effect')
          , $timeIndicator = $('#time-indicator')
          , slideInterval = 5000
          , effectOptions = {
              'blindLeft': {blindCount: 15}
            , 'blindDown': {blindCount: 15}
            , 'tile3d': {tileRows: 6, rowOffset: 80}
            , 'tile': {tileRows: 6, rowOffset: 80}
          };

        // This function runs before the slide transition starts
        var switchIndicator = function ($c, $n, currIndex, nextIndex) {
          // kills the timeline by setting it's width to zero
          $timeIndicator.stop().css('width', 0);
          // Highlights the next slide pagination control
          $indicators.removeClass('current').eq(nextIndex).addClass('current');
        };

        // This function runs after the slide transition finishes
        var startTimeIndicator = function () {
          // start the timeline animation
          $timeIndicator.animate({width: '680px'}, slideInterval);
        };

        // initialize the plugin with the desired settings
        $box.boxSlider({
            speed: 1000
          , autoScroll: true
          , timeout: slideInterval
          , next: '#next'
          , prev: '#prev'
          , pause: '#pause'
          , effect: 'scrollVert3d'
          , onbefore: switchIndicator
          , onafter: startTimeIndicator
        });

        startTimeIndicator(); // start the time line for the first slide

        // Paginate the slides using the indicator controls
        $('#controls').on('click', '.goto-slide', function (ev) {
          $box.boxSlider('showSlide', $(this).data('slideindex'));
          ev.preventDefault();
        });

        // This is for demo purposes only, kills the plugin and resets it with 
        // the newly selected effect FIXME clean this up!
        $('#effect-list').on('click', '.effect', function (ev) {
          var $effect = $(this)
            , fx = $effect.data('fx')
            , extraOptions = effectOptions[fx];

          $effects.removeClass('current');
          $effect.addClass('current');
          switchIndicator(null, null, 0, 0);

          if (extraOptions) {
            $.each(extraOptions, function (opt, val) {
              $box.boxSlider('option', opt, val);
            });
          }

          $box.boxSlider('option', 'effect', $effect.data('fx'));

          ev.preventDefault();
        });

		  });

		</script>



    <!-- ---------------- do not copy below this line !! ------------------- -->
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-10142508-2']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
	</body>
</html>
