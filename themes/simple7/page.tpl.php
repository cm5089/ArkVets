<div id="wrapper">
  
 <header>
	
		<?php print render($page['header']) ?>
	
		<div id="header_bar" style="<?php
			print 'width:100%;';
			print 'height:150px;';
			print 'background-image: url(\'/'.$directory . '/images/banner.jpg\')';
		?>">
			<div id="logo_ark">
				<a href="/" title="Ark Veterinary Group">
					<img src="/<?php print $directory; ?>/images/ArkLogo.png" alt="Ark Veterinary Group" />
				</a>
			</div> <!-- /Ark Vets logo -->
		</div>
		<div id="block-bar">
		
		  <nav>
		
			<?php
				// id, direction, depth should have the values you want them to have.
				$menu = theme('nice_menus', array('id' => 0, 'direction' => 'down', 'depth' => 1, 'menu_name' => 'main-menu', 'menu' => NULL));
				print $menu['content'];
				
//				if ($main_menu):
//					print theme('links__system_main_menu', array('links' => $main_menu ));
//				endif;
			?>
		
		  </nav>
		  
		  <div id="search-form-wrap"></div>		
		
		</div>
		
		<div class="clear">&nbsp;</div>
	
  </header>
	
	<section id="main-stuff">
	
		<?php if($title): ?><h2><?php print $title ?></h2><?php endif ?>
		
    <?php if($tabs): ?><?php print render($tabs) ?><?php endif ?>
		
		<?php print render($page['help']) ?>
		
		<?php print $messages ?>
				
		<?php print render($page['content']) ?>

	</section>
	
	<asside>
	
		<?php print render($page['sidebar_first']) ?>
		
	</asside>
		
	<footer>
	
		<?php print render($page['footer']) ?>
		
		<nav>
		
			<?php if ($main_menu): ?>
			
		        <?php print theme('links__system_main_menu', array('links' => $main_menu )); ?>
	
		    <?php endif; ?>
		
		</nav>
	
	</footer>
	
</div>