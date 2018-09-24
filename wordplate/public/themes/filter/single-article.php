<?php /* Template Name: Article */

/*
 * This file is part of Filter.
 * (c) Magasinet Filter, Offside Press AB.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

$post = $wp_query->post;

get_header(); ?>

<main class="articlePost">
    <div class="headerImage">
        <?php $cover = get_field('introduction_cover');?>
        <img
            src="<?= $cover['url'] ?>"
            alt="<?= $cover['alt'] ?>"
        >
    </div>

    <article>
        <div class="metadata">
            <div class="title">
                <h1><?php the_title(); ?></h1>
            </div>
            <div class="author">
                <h2 class="text">
                    <span class="pre">Text: </span><?= get_field('metadata_author'); ?>
                </h2>
                <h2 class="image">
                    <span class="pre">Foto: </span><?= get_field('introduction_image_owner'); ?>
                </h2>
            </div>
            <div class="about">
                <h3 class="category">
                    <?= get_the_terms($post->ID, 'article_category')[0]->name; ?>
                </h3>
                <h4 class="published">
                    <?php $date = new DateTime(get_field('metadata_magazine')[0]->metadata_release); ?>
                    Publicerad i Filter #<?= get_field('metadata_magazine')[0]->metadata_number; ?> (<?= strftime("%d %B %Y", $date->getTimestamp()); ?>)
                </h4>
            </div>
        </div>
        <div class="articleContent">
            <?= get_field('content_article'); ?>
        </div>
        <div class="progress">Läst <span class="value">0</span>%</div>
    </article>
</main>

<?php get_footer();
