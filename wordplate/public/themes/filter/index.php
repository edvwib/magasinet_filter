<?php get_header(); ?>

<main role="main" class="home">
    <div class="latestMagazine">
        <h1>SENASTE NUMMRET</h1>
        <div class="featured">
            <?php
                $post = get_posts([
                    'numberposts' => 1,
                    'post_type' => 'article',
                    'orderBy' => 'date',
                ])[0];
                $magazineID = field('metadata_magazine', $post->ID)[0]->ID;
            ?>
            <a href="<?= get_permalink($post->id); ?>" class="article" data-img="<?= field('introduction_cover', $post->id)['sizes']['large']; ?>">
                <div>
                    <h3 class="genre"><?= get_the_terms($post->id, 'article_category')[0]->name; ?></h3>
                    <h1><?= $post->post_title; ?></h1>
                    <?= field('introduction_summary', $post->ID); ?>
                    <p class="metadata">Datum: <span><?= field('metadata_release', $magazineID); ?></span></p>
                </div>
            </a>
            <a href="https://magasinetfilter.se/category/filterbubblan/" class="filterBubblan">
                <div>
                    <h1>Filter&shy;bubblan</h1>
                    <p class="ingress">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </a>
        </div>
    </div>

</main>

<?php get_footer();
