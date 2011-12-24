<?php

/**
 * @file
 * Theme setting callbacks for the rootcandy theme.
 */

/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   The form.
 * @param $form_state
 *   The form state.
 */
function rootcandy_form_system_theme_settings_alter(&$form, &$form_state) {
  // Create the form widgets using Forms API
  $form['header'] = array(
    '#type' => 'fieldset',
    '#title' => t('Header'),
    '#weight' => 1,
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['header']['rootcandy_header_display'] = array(
    '#type' => 'checkbox',
    '#title' => t('Disable header'),
    '#default_value' => theme_get_setting('rootcandy_header_display'),
  );
  $form['header']['rootcandy_hide_panel'] = array(
    '#type' => 'checkbox',
    '#title' => t('Disable sliding panel'),
    '#default_value' => theme_get_setting('rootcandy_hide_panel'),
  );
  $form['navigation'] = array(
    '#type' => 'fieldset',
    '#title' => t('Navigation'),
    '#weight' => 1,
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  // Create the form widgets using Forms API
  $form['navigation']['rootcandy_navigation_icons'] = array(
    '#type' => 'checkbox',
    '#title' => t('Disable icons for main navigation'),
    '#default_value' => theme_get_setting('rootcandy_navigation_icons'),
  );


  $form['navigation']['rootcandy_navigation_icons_size'] = array(
    '#type' => 'select',
    '#options' => array(16 => 16, 24 => 24, 32 => 32),
    '#title' => t('Set icons size for main navigation'),
    '#default_value' => theme_get_setting('rootcandy_navigation_icons_size'),
  );

  $menu_options = array_merge(array('_rootcandy_default_navigation' => t('default navigation')), menu_get_menus());

  if (!$rootcandy_navigation_source_admin = theme_get_setting('rootcandy_navigation_source_admin')) {
    $rootcandy_navigation_source_admin = '_rootcandy_default_navigation';
  }

  $form['navigation']['rootcandy_superuser_menu'] = array(
    '#type' => 'fieldset',
    '#title' => t('Super user (uid 1) menu'),
    '#weight' => 1,
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );

  $form['navigation']['rootcandy_superuser_menu']['rootcandy_navigation_source_admin'] = array(
    '#type' => 'select',
    '#default_value' => theme_get_setting('rootcandy_navigation_source_admin'),
    '#options' => $menu_options,
    '#tree' => FALSE,
  );

  $primary_options = array(
    NULL => t('None'),
  );

  $primary_options = array_merge($primary_options, $menu_options);

  $form['navigation']['role-weights'] = array(
    '#type' => 'fieldset',
    '#title' => t('Menu by role and weights'),
    '#weight' => 2,
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );

  $roles = user_roles(FALSE);
  $max_weight = 0;
  foreach ($roles as $rid => $role) {

    $form['navigation']['nav-by-role']['rootcandy_navigation_source_'. $rid] = array(
      '#type' => 'select',
      '#default_value' => theme_get_setting('rootcandy_navigation_source_'. $rid),
      '#options' => $primary_options,
      '#tree' => FALSE,
    );

    // check the highest weight for later use
    if (theme_get_setting('role-weight-'. $rid)) {
      if ($max_weight < theme_get_setting('role-weight-'. $rid)) {
        $max_weight = theme_get_setting('role-weight-'. $rid);
      }
    }
  }

  // Return the additional form widgets
  return $form;
}

