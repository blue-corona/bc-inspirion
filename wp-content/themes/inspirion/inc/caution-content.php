<?php if(get_field('caution_content')) { ?>
    <div class="caution-content">

        <?php if(get_field('show_caution_header')) { ?>

            <div class="caution-header">
                <h2>CAUTION:</h2>
                <h4>Not For The Faint Of Heart.</h4>
            </div>
                
        <?php } ?>

        <?php the_field('caution_content'); ?>
    </div>
<?php } ?>