<h1><?php echo $item->name; ?></h1>
<div>Цена: <?php echo $item->price ?></div>
<div class="item-descr">
    <img src="/images/<?php echo $item->picture; ?>" class="item-img-big"/>

    <p>
        <?php echo $item->description; ?>
    </p>
</div>
