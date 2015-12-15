<?php
$members = $params['members'];
if ($members)
{?>
<section class="page-content">
    <div class="container">
        <div class="title-wrap">
            <h2 class="title title-winners__left"><a href="/winners">Победители недели c 17-24 ноября</a></h2>
            <h2 class="title title-winners__right"><a href="#" class="active">Все участники</a></h2>
        </div>
<!--        <h2 class="title">Все участники</h2>-->
        <div class="members-list">
               <?php foreach ($members as $member) :?>
                    <a href="#member<?=$member['id']?>" rel="members-gallery1" class="member-item member-popup">
                        <div class="member-item__inner">
                            <div class="member-info">
                                <div class="member-info__text">
                                    <?=$member['Text']?>
                                </div>
                            </div>
                            <div class="customer__title">Заказчик: <span><?=$member['Social']?></span></div>
                            <div class="customer__img">
                                <img src="<?=$member['Image']?>" alt="">
                            </div>
                        </div>
                    </a>
                <?php endforeach;
           echo $params['pagination'];?>
        </div>
    </div>
</section>


<div class="dnone">
    <?php foreach ($members as $member) :?>
    <div id="member<?=$member['id']?>" class="member">
        <h4>Заказчик: <span><?=$member['Social']?></span></h4>
        <div class="member-item member-item--popup">
            <div class="member-item__inner">
                <div class="member-info">
                    <div class="member-info__text">
                        <?=$member['Text']?>
                    </div>
                </div>
                <div class="customer__img">
                    <img src="<?=$member['Image']?>" alt="">
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
        <h2 class="title">Участников еще нет. Станьте первым!</h2>
    </div>
</section>

<?php }
?>
