  <!-- .carousel id gets handled in the jQuery -->
	<?php
		$i = true;
  		if( have_rows('carousel_slides') ): ?>
		  <div class="carousel slide" data-ride="carousel">
  			  <div class="carousel-inner">
			<?php while( have_rows('carousel_slides') ): the_row();

        $carousel_code_field = get_sub_field('slide_code_field');

        $carousel_custom_stylescript = get_sub_field('custom_stylescript');
        $slide_background_color = get_sub_field('background_color');
        $slide_background_image = get_sub_field('background_image');
        $slide_text_color = get_sub_field('text_color');
				$slide_interval = get_sub_field('slide_interval');

        // style conditional
        $carousel_style = ''; // start string
        if ($slide_background_color) {
          $carousel_style .= 'background-color:' . $slide_background_color . ';';
        }
        if ($slide_background_image) {
          $carousel_style .= 'background-image:url('. $slide_background_image['url'] . ');';
        }
        if ($slide_text_color) {
          $carousel_style .= 'color:' . $slide_text_color . ';';
        }
				if ($slide_interval) {
					$slide_interval .= '000'; // automatically sets user-input interval in milliseconds
				}
        $disable_carousel_section = get_sub_field('disable_section');
        $slide_classes = get_sub_field('classes');
	    //use get_row_index() for row counter
	    //$carousel_first_slide++;
		$active = 'active';
      ?>
      <?php if (!$disable_carousel_section): ?>
	<div class="<?php echo $slide_classes; ?> carousel-item <?php if ($i) {echo $active;$i=false;} ?>" style="<?php echo $carousel_style; ?> height: 500px; background-repeat: no-repeat; background-size: cover;" data-interval="<?php echo $slide_interval;?>">
        <?php echo $carousel_code_field; ?>
      </div><!-- carousel-item -->
      <?php endif; ?> <!-- !disable -->

    <?php endwhile; ?>
    </div><!-- carousel-inner -->
    <!-- carousel controls -->
    <!-- control href attributes get handled in the jQuery to match parent element -->
    <a class="carousel-control carousel-control-prev noscroll" href="" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control carousel-control-next noscroll" href="" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div><!-- carousel slide -->


	<?php else :?>
    <!-- no layouts found -->
<?php endif; ?>


