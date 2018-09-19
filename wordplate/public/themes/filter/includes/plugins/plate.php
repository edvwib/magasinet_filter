<?php

/*
 * This file is part of Filter.
 * (c) Magasinet Filter, Offside Press AB.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

// Disable sidebar menu items.
add_theme_support('plate-disable-menu', [
    'edit-comments.php', // comments
    // 'index.php', // dashboard
    'upload.php', // media
]);

// Disable meta boxes in editor.
add_theme_support('plate-disable-editor', [
    'commentsdiv',
    'commentstatusdiv',
    'linkadvanceddiv',
    'linktargetdiv',
    'linkxfndiv',
    'postcustom',
    'postexcerpt',
    'revisionsdiv',
    'slugdiv',
    'sqpt-meta-tags',
    'trackbacksdiv',
    //'categorydiv',
    //'tagsdiv-post_tag',
]);

// Disable dashboard widgets.
add_theme_support('plate-disable-dashboard', [
    'dashboard_activity',
    'dashboard_incoming_links',
    'dashboard_plugins',
    'dashboard_recent_comments',
    'dashboard_primary',
    'dashboard_quick_press',
    'dashboard_recent_drafts',
    'dashboard_secondary',
    //'dashboard_right_now',
]);

// Disable links from admin toolbar.
add_theme_support('plate-disable-toolbar', [
    'comments',
    'wp-logo',
    'edit',
    'appearance',
    'view',
    'new-content',
    'updates',
    'search',
]);

// Disable dashboard tabs.
add_theme_support('plate-disable-tabs', ['help', 'screen-options']);

// Set custom permalink structure.
add_theme_support('plate-permalink', '/%postname%/');

// Set custom login logo.
add_theme_support('plate-login-logo', asset('assets/images/logo.png'));

// Set custom footer text.
add_theme_support('plate-footer-text', '');
