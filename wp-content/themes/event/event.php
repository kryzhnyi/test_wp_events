<?php
/*
Template Name: Event page layout
Template Post Type: events
*/
?>
<?php get_header(); ?>

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
        <?php the_field('description'); ?>
    </div>
    <?php if (!empty(get_field('external_link'))) { ?>
        <a href="<?php the_field('external_link') ?>">More information</a>
    <?php } else { ?>
        <a href="<?php echo get_permalink(get_field('news_page')[0]->ID) ?>">More information</a>
    <?php } ?>
</div>

<?php get_footer(); ?>