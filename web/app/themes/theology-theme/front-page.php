<?php while (have_posts()) : the_post(); ?>
    <?php //get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 6,
    'tax_query' => array(
        array(
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array( 'post-format-gallery', 'post-format-link', 'post-format-quote', 'post-format-video', 'post-format-audio' ),
            'operator' => 'NOT IN'
        )
    )
);

$loop = new WP_Query( $args );
$count = 1;
$mod = 0;
?>

<div class="container">
    <h2>Recent Articles</h2>
    <?if($mod == 0):?>
        <div class="row">
    <?endif;?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <?$mod = $count % 3?>
    <div class="col-md-4">
            <?php if ( has_post_thumbnail() ) : ?>
                <?
                $size = 'medium';
                $attr = array(
                'class' => "img-responsive",
                );?>

        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php the_post_thumbnail($size, $attr ); ?>
                </a>

            <?php endif; ?>
            <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
            </h2>
            <?php the_excerpt(); ?>

    </div>
    <?$count++?>
        <?if($mod == 0):?>
            </div>
        <?endif;?>
<?php endwhile; ?>
        </div>
</div>