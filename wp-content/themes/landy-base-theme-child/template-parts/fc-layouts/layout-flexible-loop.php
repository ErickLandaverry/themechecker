<?php
  # variables
  $id = get_sub_field('id');
  $classes = get_sub_field('classes');
  $disable_section = get_sub_field('disable_section');
  # $contain_wrapper = get_sub_field('contain_wrapper');
  $custom_stylescript = get_sub_field('custom_stylescript');
  $background_color = get_sub_field('background_color');
  $background_image = get_sub_field('background_image');
  $text_color = get_sub_field('text_color');
  $container_html = get_sub_field('container_fluid') ? '<div class="container-fluid">' : '<div class="container">';
  $container_html_end = '</div><!-- end container -->';

  # style conditional
  $wrapper_style = ''; // start string
  if ($background_color) {
      $wrapper_style .= 'background-color:'. $background_color . '; ';
  }
  if ($background_image) {
      $wrapper_style .= 'background-image:url('. $background_image['url'] . '); ';
  }
  if ($text_color) {
      $wrapper_style .= 'color:'. $text_color . ';';
  }
  $section_check = get_field('sections');
  if(  $section_check  ){
    $count = count($section_check) ;


  }else{$count = ' ';}
  # wrapper classes string
  $wrapper_classes = $classes . ' wrapper wrapper_' . get_row_layout() . ' wrapper_' . get_row_index() . ' ' .  ($count == get_row_index() ? 'last ' : '') . (1 == get_row_index() ? 'first ' : '');

  # end variable setup
?>

  
  
<?php if (!$disable_section): ?>

    <div class="<?php echo $wrapper_classes; ?>" id="<?php echo $id ?>" style="<?php echo $wrapper_style; ?>" >

      <?php if (get_row_layout() == 'html_block'): ?>

        <?php echo do_shortcode(get_sub_field('content')); ?>

      <?php elseif ( get_row_layout() == 'carousel_slider' ): ?>

        <?php get_template_part('template-parts/fc-layouts/layout', 'carousel'); ?>

      <?php elseif ( get_row_layout() == 'carousel' ): ?>

      <?php get_template_part('template-parts/fc-layouts/layout', 'carousel'); ?>

        <?php elseif ( get_row_layout() == 'accordion' ): ?>

<?php get_template_part('template-parts/fc-layouts/layout', 'accordion'); ?>



      <?php endif; // end get row layout?>

  </div><!-- end .wrapper -->

<?php endif; // $disable_section