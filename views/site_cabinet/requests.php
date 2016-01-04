<?php

/* @var $this yii\web\View */
/* @var $items array */

$this->title = 'Заказ';
?>



<!-- About Section -->
<section id="about" class="container content-section" style="margin-top: 50px;">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2 class="text-center">Мои заказы</h2>

            <table class="table" style="margin-bottom: 100px;">
                <?php
                $this->registerJs(<<<JS
    $('.rowButton').click(function() {
        window.location = '/requests/' + $(this).data('id');
    });
JS
);
                ?>
                <tr style="background-color: #0042ae;">
                    <th>
                        id
                    </th>
                    <th>
                        Наименования
                    </th>
                    <th>
                        Оплачен?
                    </th>
                    <th>
                        Ответ?
                    </th>
                </tr>
                <?php foreach($items as $item) {?>
                    <tr role="button" class="rowButton" data-id="<?= $item['id'] ?>">
                        <td>
                            <?= $item['id']?>
                        </td>
                        <td>
                            <?= $item['product_name']?>
                        </td>
                        <td>
                            <?php if (\yii\helpers\ArrayHelper::getValue($item, 'is_paid', 0) == 1) { ?>
                                Да
                            <?php } ?>
                        </td>
                        <td>
                            <?php if ($item['is_answer_from_shop'] == 1) { ?>
                                <span class="glyphicon glyphicon-envelope"></span>
                            <?php } ?>
                        </td>
                    </tr>
                <?php }?>
            </table>


        </div>
    </div>
</section>


