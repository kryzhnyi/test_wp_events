<?php
/*
Template Name: News page layout
Template Post Type: news
*/
the_post();
?>

<?php get_header(); ?>

<div class="news-block">
    <h2 class="title">
        <?php echo get_the_title(); ?>
    </h2>

    <div class="description">
        <?php echo the_content(); ?>
    </div>

    <h2 class="title">Events:</h2>
    <?php $events = new WP_Query(
        [
            'post_type' => 'events',
            'posts_per_page' => 5,
            'meta_query' => [
                [
                    'key' => 'news_page',
                    'value' => '"' . get_the_ID() . '"',
                    'compare' => 'LIKE',
                ],
            ],
        ]
    );

    ?>
    <?php if ($events->have_posts()) { ?>
        <?php the_field('news_page') ?>

        <?php set_query_var('events', $events); ?>
        <div id="events">
            <?php $posts = $events->get_posts(); ?>
            <?php foreach ($posts as $post) { ?>
                <div class="event-block">
                    <div class="title">
                        <?php echo $post->post_title ?>
                    </div>
                    <div class="description">
                        <?php echo get_field('description', $post->ID); ?>
                    </div>
                </div>

            <?php } ?>
        </div>
    <?php } ?>

</div>

<?php get_footer(); ?>