<?php get_header(); ?>

    <section id="primary" class="content-area">
        <h2>Events index page</h2>
        <?php

        $args = [
            'post_type' => 'events',
            'meta_key' => 'start_date',
            'orderby' => 'meta_value',
            'order' => 'asc',
            'posts_per_page' => '5',
            'paged' => get_query_var('paged') ?: 1
        ];

        $the_query = new WP_Query($args);

        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post(); ?>

                <div class="event-block">
                    <a href="<?php echo get_permalink() ?>" class="title">
                        <?php echo get_the_title(); ?>
                    </a>
                    <div class="start-date">
                        <?php the_field('start_date'); ?>
                    </div>
                    <?php if (!empty(get_field('end_date'))) { ?>
                        <div class="end-date">
                            <?php the_field('end_date'); ?>
                        </div>
                    <?php } ?>
                    <div class="description">
                        <?php echo wp_trim_words(
                            get_field('description'), 20, FALSE
                        );
                        ?>
                    </div>
                    <?php if (!empty(get_field('external_link'))) { ?>
                        <a href="<?php the_field('external_link') ?>">More information</a>
                    <?php } else { ?>
                        <a href="<?php echo get_permalink(get_field('news_page')[0]->ID) ?>">More information</a>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php the_posts_pagination(); ?>
        <?php } else { ?>
            <h2>Not Found</h2>
        <?php } ?>
        <?php wp_reset_postdata(); ?>


    </section>

<?php get_footer(); ?>