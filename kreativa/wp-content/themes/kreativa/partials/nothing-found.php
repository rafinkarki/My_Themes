<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} ?>

<article class="media well">

    <header class="media-body">
        <h2 class="media-heading">
            <?php _e('Nothing found', 'kreativa'); ?>
        </h2>
    </header>

    <div class="clearfix"></div>
    <br />

    <section>
        <?php _e('Ops! there is nothing here...', 'kreativa'); ?>
        <hr />
        <?php get_search_form(TRUE); ?>
    </section>

    <div class="clearfix"></div>
    <br />

    <a href="<?php echo get_site_url(); ?>" title="<?php _e('Home', 'kreativa'); ?>"><?php _e('Take me home', 'kreativa'); ?></a>

</article>