<div class="col-xs-12 separator">
	<div class="separator-text">VORES DONATORER</div>
</div>
<?php for ($index=1; $index <=4; $index++) : ?>
	<div class="col-xs-12 col-sm-6 col-md-3 donator-container">
		<a href="#">
			<div class="donator-image">
				<img src="<?php echo get_template_directory_uri() . '/images/logos/ap_moeller_fonden.png'; ?>">
			</div>
			<div class="donator-image-hover">
				<img src="<?php echo get_template_directory_uri() . '/images/logos/ap_moeller_fonden-hover.png'; ?>">
			</div>
		</a>
	</div>
<?php endfor ?>