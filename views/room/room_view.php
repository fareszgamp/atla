<?php if (isset($roomContent) && count($roomContent)>1) : ?>
    <?php foreach ($roomContent as $bemutato) : ?>
        <p class="szoba">
            <h4><?php print $bemutato['id'].'-'.$bemutato['user']; echo '('.date("m/d H:i",$bemutato['date']).')';?></h4>
            <?php echo clean($bemutato['hsz']); ?>
            Küldve: <?php //echo date("m/d H:i",$bemutato['send_date']); ?>
        </p>

            <?php endforeach;?>
                <!-- Dinamikus tartalom vége: bemutatólista -->

                <div class="separator"></div>
                <?php for($i=1;$i<count($pages);$i++) : ?>
                <a href="<?php print URL;?>room/6/<?php print $pages[$i];?>"><?php print $pages[$i];?></a>
                <?php endfor;?>
<?php endif;?>

