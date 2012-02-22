<div id="wrapper">  
	<header>
	
		<?php print render($page['header']) ?>
	
		<div id="header_bar" style="width:100%;">
			<div id="banner_contact_us">
				Burgess Hill: 01444 233472<br />
				Hassocks: 01273 844399
			</div>
			<div id="logo_ark">
				<a href="/" title="Ark Veterinary Group">
					<img src="/<?php print $directory; ?>/images/ArkLogo.png" alt="Ark Veterinary Group" />
				</a>
			</div> <!-- /Ark Vets logo -->
			<div id="banner_bar">
				<img src="/<?php print $directory; ?>/images/Header-rott.jpg">
				<img src="/<?php print $directory; ?>/images/Header-guinea-pig.jpg">
				<img src="/<?php print $directory; ?>/images/Header-rabbit.jpg">
				<img src="/<?php print $directory; ?>/images/Header-dog.jpg">
				<img src="/<?php print $directory; ?>/images/Header-cat.jpg" class="last">
			</div>
		</div>
		<div class="clear">&nbsp;</div>
	</header>
	<asside>
		<?php print render($page['sidebar_first']); ?>
	</asside>
	<section id="main-stuff">
		<?php if($title): ?><h2><?php print $title; ?></h2><?php endif; ?>
		<?php if($tabs): ?><?php print render($tabs); ?><?php endif; ?>
		<?php print render($page['help']); ?>
		<?php print $messages; ?>
		<?php print render($page['content']); ?>
	</section>
	
	<!--	
		<footer>
		
			<?php print render($page['footer']) ?>
			
			<nav>
			
				<?php if ($main_menu): ?>
				
			        <?php print theme('links__system_main_menu', array('links' => $main_menu )); ?>
		
			    <?php endif; ?>
			
			</nav>
		
		</footer>
	-->
</div>