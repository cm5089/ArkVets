<?php

$info = array(
  // Available colors and color labels used in theme.
  'fields' => array(
    'bg' => t('Main background'),
    'link' => t('Link color'),
    'top' => t('Header top'),
    'bottom' => t('Header bottom'),
    'text' => t('Text color'),
  ),
  // Pre-defined color schemes.
  'schemes' => array(
    'default' => array(
      'title' => t('Glass (default)'),
      'colors' => array(
        'bg' => '#b2c8d3',
        'link' => '#027ac6',
        'top' => '#313332',
        'bottom' => '#424446',
        'text' => '#494949',
      ),
    ),
    'firehouse' => array(
      'title' => t('Ash'),
      'colors' => array(
        'bg' => '#464849',
        'link' => '#2f415f',
        'top' => '#2a2b2d',
        'bottom' => '#5d6779',
        'text' => '#494949',
      ),
    ),
  ),

  // CSS files (excluding @import) to rewrite with new color scheme.
  'css' => array(
    'css/default.css',
  ),

  // Files to copy.
  'copy' => array(
    'logo.png',
  ),

  // Gradient definitions.
  'gradients' => array(
    array(
      // (x, y, width, height).
      'dimension' => array(0, 0, 900, 28),
      // Direction of gradient ('vertical' or 'horizontal').
      'direction' => 'vertical',
      // Keys of colors to use for the gradient.
      'colors' => array('top', 'bottom'),
    ),
  ),

  // Color areas to fill (x, y, width, height).
  'fill' => array(
    'base' => array(0, 29, 900, 472),
    'link' => array(97, 210, 371, 56),
  ),

  // Coordinates of all the theme slices (x, y, width, height)
  // with their filename as used in the stylesheet.
  'slices' => array(
    'images/header_bg.png'                      => array(40, 0, 1, 28),
    'images/navigation_bg.png'                    => array(10, 29, 1, 64),
    'images/tabs/tableft.png'                    => array(61, 31, 5, 62),
    'images/tabs/tabright.png'                    => array(65, 31, 125, 62),
    'images/buttons/blue-button.png'          => array(97, 236, 369, 80),
    'images/oxygen/signout.png'                    => array(860, 4, 35, 23),
    'images/oxygen/gohome.png'                    => array(5, 5, 22, 18),
    'images/window/tl.gif'                    => array(246, 133, 10, 10),
    'images/window/tr.gif'                    => array(256, 133, 10, 10),
    'images/window/bl.gif'                    => array(246, 143, 10, 10),
    'images/window/br.gif'                    => array(256, 143, 10, 10),
    'images/window/b.gif'                    => array(256, 143, 1, 10),
    'images/window/t.gif'                    => array(256, 133, 1, 10),
    'images/window/l.gif'                    => array(246, 143, 10, 1),
    'images/window/r.gif'                    => array(256, 143, 10, 1),
    'images/content_bg.gif'                    => array(255, 142, 1, 1),
    'screenshot.png'                       => array(0, 37, 400, 240),
  ),

  // Reference color used for blending. Matches the base.png's colors.
  'blend_target' => '#ffffff',

  // Preview files.
  'preview_css' => 'color/preview.css',
  'preview_image' => 'color/preview.png',

  // Base file for image generation.
  'base_image' => 'color/base.png',
);

