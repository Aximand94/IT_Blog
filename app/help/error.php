
    <?php if(count($errorMessage)>0):?>
        <ul>
            <?php foreach($errorMessage as $message):?>
                <li><?=$message?></li>
            <?php endforeach;?>
        </ul>
    <?php endif;?>

