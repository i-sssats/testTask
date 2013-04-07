<?php $sum = 0; ?>
    <div class="grid-view">
        <table class="items table">
            <thead>
            <tr>
                <th>Название</th>
                <th>Картика</th>
                <th>Цена</th>
                <th class="button-column">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($items): ?>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td><img src="/images/<?php echo $item['picture']; ?>" class="item-img-small"/></td>
                        <td><?php echo $item['price']; ?></td>
                        <td class="button-column">
                            <a class="delete" title="Delete" rel="tooltip"
                               href="/cart/delete/<?php echo $item['cart_id'] ?>"><i class="icon-trash"></i></a>
                        </td>
                    </tr>
                    <?php $sum = $sum + $item['price']; ?>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="pull-right">
        Итого цена: <b><?php echo $sum; ?></b>
    </div>
<?php if ($items != null): ?>
    <a href="/order/create" class="btn btn-primary btn-small">Сделать заказ</a>
<?php endif; ?>