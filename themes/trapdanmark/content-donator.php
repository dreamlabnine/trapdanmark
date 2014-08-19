<?php
$titan = TitanFramework::getInstance( 'trapdanmark' );

	function checkURL($urlStr) {
		$parsed = parse_url($urlStr);
		if (empty($parsed['scheme'])) {
		    $urlStr = 'http://' . ltrim($urlStr, '/');
		}
		return $urlStr;
	} 

for ($index=1; $index <=4; $index++) :
	$logo_normal = $titan->getOption('donator_logo_normal_' . $index);
	$logo_hover = $titan->getOption('donator_logo_hover_' . $index);
	$logo_link = $titan->getOption('donator_logo_link_' . $index) ? checkURL($titan->getOption('donator_logo_link_' . $index)) : '#' ;
?>
	<div class="col-xs-12 col-sm-6 col-md-3 donator-container">
		<a href="<?php echo $logo_link; ?>">
			<div class="donator-image">
				<img src="<?php echo $logo_normal; ?>">
			</div>
			<div class="donator-image-hover">
				<img src="<?php echo $logo_hover; ?>">
			</div>
		</a>
	</div>
<?php endfor ?>