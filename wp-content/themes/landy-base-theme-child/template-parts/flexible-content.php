<?php

if (have_rows('flexible_content_sections')):

    while (have_rows('flexible_content_sections')): the_row();
        
        
        get_template_part('template-parts/fc-layouts/layout', 'flexible-loop');
        
            
    endwhile;

else: ?>
<!-- No Layouts Found -->

<?php endif; ?>