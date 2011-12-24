<?php

/**
 * Override or insert variables into the page template for HTML output.
 */
function rootcandy_process_html(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_html_alter($variables);
  }
}

function rootcandy_preprocess_page(&$vars) {
  $vars['tabs2'] = array(
    '#theme' => 'menu_local_tasks',
    '#secondary' => $vars['tabs']['#secondary'],
  );
  unset($vars['tabs']['#secondary']);
  //set the links level in settings
  $rootcandy_navigation = menu_navigation_links('management', 1);
  $vars['rootcandy_navigation'] = theme('links__rc_main_navigation', array('links' => $rootcandy_navigation));

  $rootcandy_navigation_class = array();
  if (!theme_get_setting('rootcandy_header_display')) {
    $rootcandy_navigation_class[] = 'i' . theme_get_setting('rootcandy_navigation_icons_size');
  }
  if (!theme_get_setting('rootcandy_header_display')) {
    $rootcandy_navigation_class[] = 'header-on';
  }
  $vars['rootcandy_navigation_class'] = '';
  if ($rootcandy_navigation_class) {
    $vars['rootcandy_navigation_class'] .= ' '. implode(' ', $rootcandy_navigation_class);
  }
  // get admin links into the region
  $rootcandy_nav['menu'] = 'management';
  $rootcandy_nav['level'] = 2;
  $menu = menu_navigation_links($rootcandy_nav['menu'], $rootcandy_nav['level']);
  $menu_links = theme('links', array('links' => $menu, 'attributes' => array('id' => 'content-menu')));
  if ($vars['language']->direction) {
    $vars['page']['sidebar_second']['nav']['#markup'] = $menu_links;
  }
  else {
    $vars['page']['sidebar_first']['nav']['#markup'] = $menu_links;
    $vars['page']['sidebar_first']['nav']['#weight'] = -100;
    $vars['page']['sidebar_first']['#sorted'] = FALSE;
  }
}

function rootcandy_links__rc_main_navigation($variables) {
  global $language_url;
  $links = $variables['links'];
  $attributes = $variables['attributes'];
  $heading = $variables['heading'];
  $output = '';

  if (count($links) > 0) {
    $output = '';
    // Treat the heading first if it is present to prepend it to the
    // list of links.
    if (!empty($heading)) {
      if (is_string($heading)) {
        // Prepare the array that will be used when the passed heading
        // is a string.
        $heading = array(
          'text' => $heading,
          // Set the default level of the heading. 
          'level' => 'h2',
        );
      }
      $output .= '<' . $heading['level'];
      if (!empty($heading['class'])) {
        $output .= drupal_attributes(array('class' => $heading['class']));
      }
      $output .= '>' . check_plain($heading['text']) . '</' . $heading['level'] . '>';
    }

    $output .= '<ul' . drupal_attributes($attributes) . '>';

    $num_links = count($links);
    $i = 1;

    $size = theme_get_setting('rootcandy_navigation_icons_size');
    $icons_disabled = theme_get_setting('rootcandy_navigation_icons');
    $list_class = 'i' . $size;

    // custom icons
    $custom_icons = _rootcandy_custom_icons();
    if (!isset($custom_icons)) {
      $custom_icons = '';
    }
    $match = _rootcandy_besturlmatch($_GET['q'], $links);
    $items = array();

    foreach ($links as $key => $link) {
      $class = array($key);
      $id = '';
      $icon = '';
      $class= '';

      // icons
      if (!$icons_disabled) {
        $arg = explode("/", $link['href']);
        $icon = _rootcandy_icon($arg, $size, 'admin', $custom_icons);
        if ($icon) $icon = $icon . '<br />';
        $link['html'] = TRUE;
      }
      if ($key == $match) {
        $id = 'current';
        if (!$icons_disabled && $size) {
          $id = 'current-'. $size;
        }
      }
      // add a class to li
      if (is_array($arg)) {
        $class[] = implode($arg, '-');
      }

      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class[] = 'first';
      }
      if ($i == $num_links) {
        $class[] = 'last';
      }
      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))
           && (empty($link['language']) || $link['language']->language == $language_url->language)) {
        $class[] = 'active';
      }
      $output .= '<li' . drupal_attributes(array('class' => $class, 'id' => $id)) . '>';

      if (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
        $output .= l($icon . $link['title'], $link['href'], $link);
      }
      elseif (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes.
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span' . $span_attributes . '>' . $link['title'] . '</span>';
      }

      $i++;
      $output .= "</li>\n";
    }

    $output .= '</ul>';
  }

  return $output;
}

function _rootcandy_icon($name, $size = '16', $subdir = '', $icons = '') {
  $url = implode("/", $name);
  $alias = drupal_get_path_alias($url);
  $name = implode("-", $name);
  $path = path_to_theme();
  if ($subdir) {
    $subdir = $subdir . '/';
  }

  if (isset($icons[$url])) {
    $icon = $icons[$url];
  }
  else if (isset($icons[$alias])) {
    $icon = $icons[$alias];
  }
  else {
    $icon = $path . '/images/icons/i' . $size . '/' . $subdir . $name . '.png';
  }
  $output = theme('image', array('path' => $icon));

  if (!$output) {

    $icon = $path . '/images/icons/i' . $size . '/misc/unknown.png';
    $output = theme('image', array('path' => $icon));
  }

  return $output;
}

function _rootcandy_custom_icons() {
  $custom_icons = theme_get_setting('rootcandy_navigation_custom_icons');
  if (isset($custom_icons)) {
    $list = explode("\n", $custom_icons);
    $list = array_map('trim', $list);
    $list = array_filter($list, 'strlen');
    foreach ($list as $opt) {
      // Sanitize the user input with a permissive filter.
      $opt = _rootcandy_filter_xss($opt);
      if (strpos($opt, '|') !== FALSE) {
        list($key, $value) = explode('|', $opt);
        $icons[$key] = $value ? $value : $key;
      }
      else {
        $icons[$opt] = $opt;
      }
    }
  }
  if (isset($icons)) {
    return $icons;
  }
}

function _rootcandy_filter_xss($string) {
  return filter_xss($string);
}

function _rootcandy_besturlmatch($needle, $menuitems) {
  $needle = drupal_get_path_alias($needle);
  $lastmatch = NULL;
  $lastmatchlen = 0;
  $urlparts = explode('/', $needle);
  $partcount = count($urlparts);

  foreach ($menuitems as $key => $menuitem) {
    $href = $menuitem['href'];
    $menuurlparts = explode('/', $href);
    $matches = _rootcandy_countmatches($urlparts, $menuurlparts);
    if (($matches > $lastmatchlen) || (($matches == $lastmatchlen) && (($lastmatch && drupal_strlen($menuitems[$lastmatch]['href'])) > drupal_strlen($href)) )) {
      $lastmatchlen = $matches;
      $lastmatch = $key;
    }
  }
  return $lastmatch;
}

function _rootcandy_countmatches($arrayone, $arraytwo) {
  $matches = 0;
  foreach ($arraytwo as $i => $part) {
    if (!isset($arrayone[$i])) break;
    if ($arrayone[$i] == $part) $matches = $i+1;
  }
  return $matches;
}

