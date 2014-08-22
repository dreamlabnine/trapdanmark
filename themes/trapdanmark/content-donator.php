<?php
$titan = TitanFramework::getInstance( 'trapdanmark' );

	function checkURL($urlStr) {
		$parsed = parse_url($urlStr);
		if (empty($parsed['scheme'])) {
		    $urlStr = 'http://' . ltrim($urlStr, '/');
		}
		return $urlStr;
	} 
if ($titan->getOption('donator_logo_normal_5')) 
	{ $numberOfDonators = 5; $donatorContainerClass = 'col-xs-12 col-sm-15 col-md-15'; } 
else
	{ $numberOfDonators = 4; $donatorContainerClass = 'col-xs-12 col-sm-6 col-md-3'; }

for ($index=1; $index <=$numberOfDonators; $index++) :
	$logo_normal = $titan->getOption('donator_logo_normal_' . $index);
	$logo_hover = $titan->getOption('donator_logo_hover_' . $index);
	$logo_link = $titan->getOption('donator_logo_link_' . $index) ? checkURL($titan->getOption('donator_logo_link_' . $index)) : '#' ;
?>
	<div class="<?php echo $donatorContainerClass; ?> donator-container">
		<a href="<?php echo $logo_link; ?>">
			<div class="donator-image">
				<img src="<?php echo $logo_normal; ?>" style="max-width: 220px;">
			</div>
			<div class="donator-image-hover">
				<img src="<?php echo $logo_hover; ?>"  style="max-width: 220px;">
			</div>
		</a>
	</div>
<?php endfor ?>