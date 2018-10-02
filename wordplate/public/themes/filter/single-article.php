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
        <button class="settingsButton"></button>
        <div class="settings">
            <div class="menu">
                <div class="settingsIcon"></div>
                <h1 class="fontOptions button active">Typsnitt</h1>
                <h1 class="textLayout button">Sida</h1>
                <h1 class="colorMode button">Färgläge</h1>
                <button class="close"></button>
            </div>
            <div class="fontOptions view active">
                <div class="fonts">
                    <div class="font">
                        <label for="fontHarriet">Harriet Display</label>
                        <input type="radio" name="font"
                        id="fontHarriet" value="harriet" checked>
                    </div>
                    <div class="font">
                        <label for="fontPlayfair">Playfair Display</label>
                        <input type="radio" name="font"
                        id="fontPlayfair" value="playfair">
                    </div>
                    <div class="font">
                        <label for="fontMerriweather">Merriweather</label>
                        <input type="radio" name="font"
                        id="fontMerriweather" value="merriweather">
                    </div>
                    <div class="font">
                        <label for="fontOpenSans">Open Sans</label>
                        <input type="radio" name="font"
                        id="fontOpenSans" value="opensans">
                    </div>
                    <div class="font">
                        <label for="fontMontserrat">Montserrat</label>
                        <input type="radio" name="font"
                        id="fontMontserrat" value="montserrat">
                    </div>
                    <div class="font">
                        <label for="fontOpenDyslexic">OpenDyslexic</label>
                        <input type="radio" name="font"
                        id="fontOpenDyslexic" value="opendyslexic">
                    </div>
                </div>
                <div class="size">
                    <label for="size">Storlek:</label>
                    <div class="input" data-size="21">
                        <span class="minus">−</span>
                        <div class="options">
                            <span data-size="13" class="rect filled"></span>
                            <span data-size="15" class="rect filled"></span>
                            <span data-size="17" class="rect filled"></span>
                            <span data-size="19" class="rect filled"></span>
                            <span data-size="21" class="rect filled"></span>
                            <span data-size="23" class="rect"></span>
                            <span data-size="25" class="rect"></span>
                            <span data-size="27" class="rect"></span>
                            <span data-size="29" class="rect"></span>
                            <span data-size="31" class="rect"></span>
                        </div>
                        <span class="plus">+</span>
                    </div>
                </div>
            </div>
            <div class="textLayout view">
                <div class="lineHeight">
                    <h2>Radavstånd</h2>
                    <div class="buttons">
                        <button class="tight" data-value="22"></button>
                        <button class="regular" data-value="32"></button>
                        <button class="loose" data-value="42"></button>
                    </div>
                </div>
                <div class="margin">
                    <h2>Marginal</h2>
                    <div class="buttons">
                        <button class="tight" data-value="50"></button>
                        <button class="regular" data-value="75"></button>
                        <button class="loose" data-value="100"></button>
                    </div>
                </div>
            </div>
            <div class="colorMode view">
                <div class="color white">
                    <label for="white">Vit</label>
                    <label for="white" class="image"></label>
                    <input type="radio" name="color" id="white" checked>
                </div>
                <div class="color sepia">
                    <label for="sepia">Sepia</label>
                    <label for="sepia" class="image"></label>
                    <input type="radio" name="color" id="sepia">
                </div>
                <div class="color black">
                    <label for="black">Svart</label>
                    <label for="black" class="image"></label>
                    <input type="radio" name="color" id="black">
                </div>
            </div>
        </div>
    </article>
</main>

<?php get_footer();
