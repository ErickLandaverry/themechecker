<div class="container py-4">

  <?php

  // check if the repeater field has rows of data
  if( have_rows('accordion_repeater') ):
    
    
    // loop through the rows of data for the tab header
      while ( have_rows('accordion_repeater') ) : the_row();
      
      $title = get_sub_field('title');
      $header = get_sub_field('header');
      $content = get_sub_field('text');

    ?>
    
      <button class="accordion"><?php echo $title; ?></button>
      <div class="panel px-5">
        <h3 class=""><?php echo $header; ?></h3>
        <p><?php echo $content; ?></p>
      </div>    
      <?php
    endwhile; //End the loop 

  else :

      // no rows found
      echo 'Come back tomorrow';

  endif;

  ?>
</div>
<!-- End ACCORDION -->



<script type='text/javascript'> 

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}

</script>