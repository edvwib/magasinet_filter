<?php
    get_header();

    $postTypes = ['post_type'=>['magazine', 'article']];
    query_posts($postTypes);

?>

<main role="main" class="home">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <article>
            <header>
                <a href=<?php the_permalink(); ?>><?php the_title(); ?></a>
            </header>

            <?php the_content(); ?>
        </article>
    <?php endwhile; else: ?>
        <article>
            <p>Nothing to see.</p>
        </article>
    <?php endif; ?>
</main>

<?php get_footer();
