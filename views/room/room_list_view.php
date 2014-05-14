
					<h2>Állandó nyitott szobák</h2>
                                        <ul class="lista">
					<!-- Dinamikus tartalom kezdete: bemutatólista -->
				<?php if (isset($openRoom)) : ?>
					<?php foreach ($openRoom as $bemutato) : ?>
						<li>
									<h4><?php print $bemutato['id'].'-'.$bemutato['szoba_nev'].'-'.$bemutato['chek'];?></h4>
							
						</li>
					<?php endforeach;?>
					<!-- Dinamikus tartalom vége: bemutatólista -->
					</ul>
					<div class="separator"></div>
				<?php endif;?>
					<h2>Állabdó zárt szobák</h2>
					<ul class="lista">
				<?php if (isset($closedRoom)) : ?>
					<?php foreach ($closedRoom as $bemu) : ?>
						<li>
									<h4><?php print $bemu['id'].'-'.$bemu['szoba_nev'].'-'.$bemu['chek'];?></h4>
						
						</li>
					<?php endforeach;?>
					<!-- Dinamikus tartalom vége: bemutatólista -->
					</ul>
					<div class="separator"></div>
				<?php endif;?>
					<h2>Ideiglenes szobák</h2>
					<ul class="lista">
				<?php if (isset($tempRoom)) : ?>
					<?php foreach ($tempRoom as $bemutat) : ?>
						<li>
									<h4><?php print $bemutat['id'].'-'.$bemutat['szoba_nev'].'-'.$bemutat['chek'];?></h4>
					
						</li>
					<?php endforeach;?>
					<!-- Dinamikus tartalom vége: bemutatólista -->
					</ul>
					<div class="separator"></div>
				<?php endif;?>

