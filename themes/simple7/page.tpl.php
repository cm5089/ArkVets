<div id="wrapper">  
	<div id="header">
	
		<?php print render($page['header']) ?>
	
		<div id="header_bar" style="width:100%;">
			<div id="banner_contact_us">
				<a href="/contact-us#loc_burgess_hill">Burgess Hill: 01444 233472</a><br />
				<a href="/contact-us#loc_hassocks">Hassocks: 01273 844399</a>
			</div>
			<div id="logo_ark">
				<a href="/" title="Ark Veterinary Group">
					<img src="/<?php print $directory; ?>/images/ArkLogo.png" alt="Ark Veterinary Group" />
				</a>
			</div> <!-- /Ark Vets logo -->
			<div id="banner_bar">
				<img src="/<?php print $directory; ?>/images/Header-goldpaw.jpg" style="width:120px">
				<img src="/<?php print $directory; ?>/images/Header-rott.jpg">
				<img src="/<?php print $directory; ?>/images/Header-guinea-pig.jpg">
				<img src="/<?php print $directory; ?>/images/Header-rabbit.jpg">
				<img src="/<?php print $directory; ?>/images/Header-dog.jpg">
				<img src="/<?php print $directory; ?>/images/Header-cat.jpg" class="last">
			</div>
		</div>
		<div class="clear">&nbsp;</div>
	</div>
	<div id="asside">
		<?php print render($page['sidebar_first']); ?>
		<div id="rcvs_cred">
			<a href="/">
				<img src="/<?php print $directory; ?>/images/RCVS-cred.jpg" alt="RCVS Accredited Practice - Small Animal Practice">
			</a>
		</div>
	</div>
	<div id="main-stuff">
		<?php if($title): ?><h2><?php print $title; ?></h2><?php endif; ?>
		<?php if($tabs): ?><?php print render($tabs); ?><?php endif; ?>
		<?php print render($page['help']); ?>
		<?php print $messages; ?>
		<?php print render($page['content']); ?>
	</div>
	
	<div id="footer">
		<div id="foot_menu">
			<?php print render($page['footer']); ?>
		</div>
	</div>
	
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