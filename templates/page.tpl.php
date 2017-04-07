<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to main-menu administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>
<div id="page-wrapper">
  <div class="header-wrapper">
    <header id="header" class="clearfix header">
      <div class="inner-header">
        <div class="content">
          <?php if ($logo): ?><div id="logo" class="logo"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img alt="Logo" src="<?php print $logo; ?>"/></a></div><?php endif; ?>
          <?php if ($page['header']): ?>
              <?php print render($page['header']); ?>
          <?php endif; ?>
        </div>
      </div>
    </header>
  </div>
  <main class="general-layout content-inner" id="content">
    <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper"><?php print render($tabs); ?></div><?php endif; ?>
    <?php print $messages; ?>
    <?php print render($page['help']); ?>
    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>

    <?php if (!drupal_is_front_page()) { ?>
      <?php print render($page['content']); ?>
    <?php } ?>
    <?php if ($page['intro']): ?>
      <div class="intro">
          <?php print render($page['intro']); ?>
      </div>
    <?php endif; ?>
    <?php if ($page['event']): ?>
      <div class="event clearfix">
          <?php print render($page['event']); ?>
      </div>
    <?php endif; ?>
    <?php if ($page['involve']): ?>
      <div class="involve">
          <?php print render($page['involve']); ?>
      </div>
    <?php endif; ?>
    <?php if ($page['mission']): ?>
      <div class="mission" id="about">
          <?php print render($page['mission']); ?>
      </div>
    <?php endif; ?>
    <?php if ($page['members']): ?>
      <div class="members">
          <?php print render($page['members']); ?>
      </div>
    <?php endif; ?>
    <?php if ($page['blog']): ?>
      <div class="blog" id="blog">
          <?php print render($page['blog']); ?>
      </div>
    <?php endif; ?>

  </main>

  <footer id="footer" class="footer">
    <div class="general-layout clearfix footer-inner">
      <?php if ($page['footer']): ?>
         <?php print render($page['footer']) ?>
       <?php endif; ?>
    </div>
  </footer>
</div>
