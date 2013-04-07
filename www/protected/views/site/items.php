<?php foreach ($items as $key => $item): ?>
    <div class="item-view">
        <h4><a href="/site/itemview/<?php echo $item->id; ?>"><?php echo $item->name; ?></a></h4>
        <div class="item-descr">
            <img src="/images/<?php echo $item->picture; ?>" class="item-img"/>
            <p>
                <?php echo $item->description; ?>
            </p>
            <a class="btn btn-info btn-mini pull-left" href="/cart/add/<?php echo $item->id; ?>">В корзину</a>
            <div class="pull-right">Цена: <?php echo $item->price ?></div>
        </div>
    </div>
<?php endforeach; ?>
<div class="clearfix"></div>
<form class="form-inline">
    <select name="sort">
        <option value="a">Цена по возростанию</option>
        <option value="d">Цена по убыванию</option>
    </select>
    <button type="submit" class="btn btn-primary btn-small">Сортировать</button>
</form>