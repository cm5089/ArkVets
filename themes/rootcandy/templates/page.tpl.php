<!-- Layout -->
<div id="top-panel">
  <div id="panel" class="clearfix">
    <p>This panel has no content yet.</p>
    <div class="panel-opacity"></div>
  </div>
  <div id="top-panel-head">
    <div id="go-home">
      <a href="#" title="Go Back to Homepage">Go Back to Homepage</a>
    </div>
    <div id="admin-links">
      <a href="#" class="user-name" title="user account">administrator</a> | <a href="#" title="Logout">Logout</a>
    </div>
    <div id="header-title" class="clearfix">
    </div>
  </div>
</div>

<div id="page-wrapper"><div id="page-wrapper-content">
  <?php print render($page['header']); ?>
  <div id="navigation" class="clearfix<?php print $rootcandy_navigation_class; ?>">
    <?php print $rootcandy_navigation; ?>
    <?php if ($logo): ?>
      <img src="<?php print $logo; ?>" alt="<?php print t('Logo'); ?>" id="logo" />
    <?php endif; ?>
  </div>

  <div id="breadcrumb-title-wrapper">
    <?php print render($title_prefix); ?>
    <?php if ($title): ?>
      <h2 id="title"><?php print $title; ?></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <?php if ($breadcrumb): ?>
      <div id="breadcrumb"><?php print $breadcrumb; ?></div>
    <?php endif; ?>
  </div>

  <div id="content-wrap">
    <div id="inside">
      <?php if (isset($page['sidebar_first'])) { ?>
        <div id ="sidebar-left">
          <?php print render($page['sidebar_first']); ?>
        </div>
      <?php } ?>
      <?php if (isset($page['sidebar_second'])) { ?>
        <div id ="sidebar-right">
          <?php print render($page['sidebar_second']); ?>
        </div>
      <?php } ?>
      <div id="content">
        <div class="t"><div class="b"><div class="l"><div class="r"><div class="bl"><div class="br"><div class="tl"><div class="tr"><div class="content-in">
          <?php if (isset($tabs) && $tabs): print '<div id="tabs-primary"><ul class="tabs primary">'. render($tabs) .'</ul></div><div class="level-1 clearfix">'; endif; ?>
          <?php if (isset($tabs2) && $tabs2): print '<div id="tabs-secondary"><ul class="tabs secondary">'. render($tabs2) .'</ul></div><div class="level-2 clearfix">'; endif; ?>
          <?php if ($messages): ?>
            <div id="messages"><div class="section clearfix"><?php print $messages; ?></div></div> 
          <?php endif; ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?>
            <ul class="action-links">
              <?php print render($action_links); ?>
            </ul>
          <?php endif; ?>
          <?php print render($page['content']); ?>
          <?php if (isset($tabs2) && $tabs2): print '</div>'; endif; ?>
          <?php if (isset($tabs) && $tabs): print '</div>'; endif; ?>
          </div><br class="clear" /></div></div></div></div></div></div></div></div>
        </div>
      </div>
    </div>

    <?php if (isset($footer)) { ?>
      <div id="footer">
        <?php print $footer; ?>
      </div>
    <?php } ?>
  </div>
</div>
<!-- /layout -->
