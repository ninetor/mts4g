<?php
$winners = $params['winners']['winners'];
if ($winners)
{?>
    <section class="page-content">
        <div class="container">
            <div class="title-wrap">
                <h2 class="title title-winners__left"><a href="#" class="active"><?=$params['winners']['Title']?></a></h2>
                <h2 class="title title-winners__right"><a href="/members">Все участники</a></h2>
            </div>
<!--            <h2 class="title">--><?php //$params['winners']['Title']?><!--</h2>-->
            <div class="members-list">
                <?php foreach ($winners as $winner) :?>
                    <a href="#member<?=$winner['id']?>" rel="members-gallery1" class="member-item member-popup">
                        <div class="member-item__inner">
                            <div class="member-info">
                                <div class="member-info__text">
                                    <?=$winner['Text']?>
                                </div>
                            </div>
                            <div class="customer__title">Заказчик: <span><?=$winner['Social']?></span></div>
                            <div class="customer__img">
                                <img src="<?=$winner['Image']?>" alt="">
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <div class="dnone">
        <?php foreach ($winners as $winner) :?>
            <div id="member<?=$winner['id']?>" class="member">
                <h4>Заказчик: <span><?=$winner['Social']?></span></h4>
                <div class="member-item member-item--popup">
                    <div class="member-item__inner">
                        <div class="member-info">
                            <div class="member-info__text">
                                <?=$winner['Text']?>
                            </div>
                        </div>
                        <div class="customer__img">
                            <img src="<?=$winner['Image']?>" alt="">
                        </div>
                    </div>
                </div>
                <a href="/#step1" class="btn step1">Оформить новый заказ</a>
            </div>
        <?php endforeach;?>
    </div>

    <?php
}
else
{ ?>
    <section class="page-content">
        <div class="container">
            <h2 class="title">Победителей пока нет. Станьте первым!</h2>
        </div>
    </section>

<?php }
?>
