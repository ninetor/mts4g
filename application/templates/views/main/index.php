<script type="text/javascript" src="http://vk.com/js/api/share.js?90" charset="windows-1251"></script>
<script type="text/javascript" src="//vk.com/js/api/openapi.js?121"></script>
<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: '128132277556360',
            xfbml: true,
            version: 'v2.5'
        });
    };
    VK.init({
        apiId: 5189016 // id созданного вами приложения вконтакте
    });

</script>

<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.5&appId=128132277556360";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!--HEADER-->

<script>
    $(document).ready(function () {

        var croppicContaineroutputMinimal = {
            uploadUrl: '/uploadimage',
            cropUrl: '/cropimage',
            modal: false,
            doubleZoomControls: false,
            rotateControls: false,
            loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
            onBeforeImgUpload: function () {
                console.log('onBeforeImgUpload')
            },
            onAfterImgUpload: function () {
                console.log('onAfterImgUpload');
            },
            onImgDrag: function () {
                console.log('onImgDrag')
            },
            onImgZoom: function () {
                console.log('onImgZoom')
            },
            onBeforeImgCrop: function () {
                console.log('onBeforeImgCrop')
            },
            onAfterImgCrop: function () {
                console.log('onAfterImgCrop')
            },
            onReset: function () {
                console.log('onReset')
            },
            onError: function (errormessage) {
                console.log('onError:' + errormessage)
            }
        }
        var cropContaineroutput = new Croppic('cropContainerMinimal', croppicContaineroutputMinimal);
    })


</script>


<section class="phone-select" id="smartphone">
    <div class="container">
        <h2>Переходите на 4G-скорость &#8212; <br> выбирайте 4G-смартфон</h2>

        <div class="phone-slider-wrap">
            <div class="phone-slider">
                <?php foreach ($params['phones'] as $phone) : ?>
                    <div class="phone-slider__item">
                        <div class="phone-img">
                            <div class="phone-title">
                                <?= $phone['Title'] ?>
                            </div>
                            <div class="slide-img-wrap">
                                <img src="../uploads/<?= $phone['Image'] ?>" alt="">
                                <div class="phone-img__inner">
                                    <img src="../img/content/phone-icon1.png" alt="">
                                </div>
                            </div>
                        </div>
                        <?php
                        $countParams = count($phone['params']);
                        $countelems = ceil($countParams / 2);

                        echo '<ul class="advantages-list advantages-list__left">';
                        foreach (array_slice($phone['params'], 0, $countelems) as $param) { ?>
                            <li class="advantages-list__item">
											<span class="icon">
												<img src="../img/content/<?= $param['Image'] ?>" alt="">
											</span>
											<span class="advantages-list__text">
                                        <?= $param['Text'] ?>
											</span>
                            </li>
                        <?php }
                        echo '</ul>';

                        echo ' <ul class="advantages-list advantages-list__right">';
                        foreach (array_slice($phone['params'], $countelems, $countelems) as $param) { ?>
                            <li class="advantages-list__item">
											<span class="icon">
												<img src="../img/content/<?= $param['Image'] ?>" alt="">
											</span>
											<span class="advantages-list__text">
                                        <?= $param['Text'] ?>
											</span>
                            </li>
                        <?php }
                        echo '</ul>';

                        ?>
                        <div class="phone-message">
                            <?= $phone['FirstPay'] ?>
                        </div>
                        <div class="btn-wrap"><a href="<?= $phone['UrlShop'] ?>" target="blank" class="btn btn--phone">Купить
                                в интернет-магазине</a></div>

                    </div>
                <?php endforeach; ?>
            </div>
            <div class="phone-slider__arrows">
                <a href="#" class="phone-slider__prev"></a>
                <a href="#" class="phone-slider__next"></a>
            </div>
            <div id="phone-loader"></div>
        </div>
    </div>

</section>
<section class="questions" id="questions">
    <div class="container">
        <h2>У вас появились вопросы?<br>У нас уже готовы ответы!</h2>

        <div class="questions-accord questions-accord--short">
            <a href="#" class="questions-accord__item">
                <i class="icon"></i>
                Что такое LTE и 4G?
                <div class="button open">
                    <div class="line left"></div>
                    <div class="line right"></div>
                </div>
							<span class="answer">
								4G (от англ. 4th Generation) — четвёртое поколение мобильной связи.
LTE расшифровывается как Long-Term Evolution, «долгосрочное развитие» сотовых сетей третьего поколения.  Это стандарт беспроводной высокоскоростной передачи данных для мобильных телефонов и других терминалов, работающих с данными.
LTE позволяет достичь скорости загрузки до 326,4 мбит/с, скорости отдачи —  до 172,8 мбит/с, задержка в передаче данных может быть снижена до 5 миллисекунд. Скорость загрузки в реальных условиях обеспечивается на уровне 50-100 мбит/с.
                            </span>
            </a>
            <a href="#" class="questions-accord__item">
                <i class="icon"></i>
                Какова территория покрытия 4G?
                <div class="button open">
                    <div class="line left"></div>
                    <div class="line right"></div>
                </div>
							<span class="answer">
							На данный момент покрытие 4G охватывает часть территории Минска, но в дальнейшем его планируется расширять. Карту покрытия 4G вы можете посмотреть на сайте <a
                                    href="http://mts.by" target="_blank"></a>
                            </span>
            </a>
            <a href="#" class="questions-accord__item">
                <i class="icon"></i>
                Как узнать, поддерживает ли мой смартфон 4G?
                <div class="button open">
                    <div class="line left"></div>
                    <div class="line right"></div>
                </div>
							<span class="answer">
							Наберите на своём телефоне *464# <span class="tube"></span>
Для работы в сети LTE ваш смартфон или планшет должен поддерживать 4G для Европейских стран (диапазон1800 МГц, band 3).
Если вы купили свой телефон в Беларуси у официального поставщика, скорее всего, его технические параметры соответствуют требованиям. Все 4G оборудование, которое продаёт МТС, будет работать в сети LTE.
                            </span>
            </a>
            <a href="#" class="questions-accord__item">
                <i class="icon"></i>
                Как включить 4G?
                <div class="button open">
                    <div class="line left"></div>
                    <div class="line right"></div>
                </div>
							<span class="answer">
							Как правило, ваш девайс сам активирует 4G.
Если автоматически 4G не включился, в настройках мобильной сети активируйте режим 4G/LTE и перезагрузите смартфон. Либо при необходимости выполните поиск оператора в ручном режиме и выберите сеть 4G МТС. Если после этих действий 4G не активируется, обновите прошивку смартфона.
                            </span>
            </a>
            <a href="#" class="questions-accord__item">
                <i class="icon"></i>
                Нужно ли подключать какие-то услуги?
                <div class="button open">
                    <div class="line left"></div>
                    <div class="line right"></div>
                </div>
							<span class="answer">
						Никакие дополнительные услуги для 4G подсключать не нужно. После настройки телефон автоматически выберет наилучший доступ в интернет.
                            </span>
            </a>
            <a href="#" class="questions-accord__item">
                <i class="icon"></i>
                Нужно ли менять SIM-карту?
                <div class="button open">
                    <div class="line left"></div>
                    <div class="line right"></div>
                </div>
							<span class="answer">
						Если вы используете SIM-карту на протяжении длительного времени, ваше устройство поддерживает LTE, но зарегистрироваться в сети LTE не удаётся, обратитесь в салон МТС. Возможно, у вас SIM-карта старого образца. Вам заменят SIM-карту на новую совершенно бесплатно. Для замены SIM-карты не забудьте взять с собой паспорт.
						        </span>
            </a>
        </div>
        <div class="ask">
            <div class="ask__left">
                <h4>Появились еще вопросы?</h4>
                Напишите в нашу онлайн-поддержку <a href="http://help.mts.by" target="_blank">help.mts.by</a>
            </div>
            <a href="https://help.mts.by/hc/ru/requests/new " class="btn">Задать вопрос</a>
        </div>
    </div>
</section>

<form action="" id="form_step12" method="post" enctype="multipart/form-data">
    <!--POPUPS-->
    <div id="step1" class="steps">
        <h4><span>Шаг 1.</span>Выберите и дополните повод</h4>

        <div class="choose">
            <div class="radio-wrap">
                <input id="romantic" name="type" value="1" type="radio" checked="checked">
                <label for="romantic" class="romantic"><i></i>Романтический</label>
            </div>
            <div class="radio-wrap">
                <input id="real" name="type" value="2" type="radio">
                <label for="real" class="real"><i></i>Реальный</label>
            </div>
            <div class="radio-wrap">
                <input id="fantastic" name="type" value="3" type="radio">
                <label for="fantastic" class="fantastic"><i></i>Фантастический</label>
            </div>
            <div class="radio-wrap">
                <input id="solemn" name="type" value="4" type="radio">
                <label for="solemn" class="solemn"><i></i>Торжественный</label>
            </div>
        </div>
        <p>
            Авторы самых убедительных поводов смогут бесплатно прокатиться на #4GтаксиМТС!
        </p>

        <div>
            <div class="textarea-wrap">
                <textarea name="message" maxlength="70" id="textmessage"
                          placeholder="Например: Я хочу прокатить  любимую на 4Gтакси!"></textarea>
                <span class="warning">Максимум — 70 символов</span>
            </div>
        </div>
        <div>
            <input type="text" id="socialOrder" style="width: 500px;" name="social" placeholder="Имя и фамилия">
        </div>
        <a href="#" class="btn" onclick="StepOne()">Продолжить</a> <!--#step2-->
        <a href="#step2" class="step2" id="tostep2" style="display:none;">Продолжить</a>

    </div>


    <div id="step2" class="steps">
        <h4><span>Шаг 2.</span>Загрузите фото</h4>
        <input type="hidden" id="id_input_step2" value="">

        <div class="download">

            <div id="dropBox">
                <div class="dropBox-wrap">
                    <div class="download-anchor">Используйте стандартное фото для оформления или добавьте своё:<a
                            href="#">загрузите </a>его
                    </div>
                    <div id="cropContainerMinimal">

                    </div>
                </div>
            </div>


            <div class="download-info">
                <div class="download-info__text" id="step2-info__text">
                    Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех
                    живут они в буквенных домах
                </div>
            </div>
        </div>

        <a href="#step1" class="back step1">Назад</a>

        <a href="#" class="btn" onclick="createOrder()">Оформить заказ</a> <!--#step2-->
        <a href="#step3" class="step3" id="tostep3" style="display:none;">Оформить заказ</a>

        <!--<a href="#step3" class="btn step3">Оформить заказ</a>-->
    </div>

</form>

<div id="step3" class="steps">
    <div class="preloader-wrap" id="loadersoc">
        <div class="preloader">
            <div class="circ1"></div>
            <div class="circ2"></div>
            <div class="circ3"></div>
            <div class="circ4"></div>
        </div>
    </div>
    <h4><span>Шаг 3.</span>Поделитесь</h4>

    <p>
        Чтобы подтвердить заказ, отправьте его себе на стену в социальную сеть
    </p>
    <a class="btn vk" href="#" onclick="shareVK()">ВКонтакте</a>
    <span class="or">или</span>

    <a href="#" onclick="shareFB()"
       class="btn fb">Facebook</a>

    <a href="#step4" id="tostep4" style="display:none;">Далее</a>
</div>


<div id="step4" class="steps">
    <h4><span>Шаг 4.</span>Отлично, заказ отправлен!</h4>

    <p>
        Впишите номер телефона, чтобы мы могли связаться с вами:
    </p>
        <div class="input-wrap"><span class="code">+375</span><input type="text" id="phoneOrder" name="phone"></div>

    <p class="number-information">
        Указанный номер будет использован только в рамках данной акции для связи с победителями и не будет использован
        для рекламных SMS-рассылок.
    </p>
    <a href="#" class="btn" onclick="sendPhone()">Отправить номер</a>
    <a href="#step5" id="tostep5" style="display: none;">Отправить номер</a>
</div>


<div id="step5" class="steps">
    <h4 class="final">Присоединяйтесь к нам!</h4>

    <p>
        Присоединяйтесь к нам, чтобы следить за ходом проекта:
    </p>

    <div class="vidgets">
        <div class="vidgets__item vk">
            <div id="vk_groups"></div>
            <script>
                VK.Widgets.Group("vk_groups", {
                    mode: 1,
                    width: "220",
                    height: "200",
                    color1: 'FFFFFF',
                    color2: '2B587A',
                    color3: '5B7FA6'
                }, 17701463)
            </script>
        </div>
        <div class="vidgets__item fb">
            <div class="fb-page" data-href="https://www.facebook.com/mtsbelarus/" data-tabs="timeline" data-height="100"
                 data-small-header="false" data-adapt-container-width="false" data-hide-cover="false"
                 data-show-facepile="false">
                <div class="fb-xfbml-parse-ignore">
                    <blockquote cite="https://www.facebook.com/mtsbelarus/"><a
                            href="https://www.facebook.com/mtsbelarus/">МТС Беларусь</a></blockquote>
                </div>
            </div>
        </div>
    </div>
    <p class="final-phrase">
        Выбираем победителей каждую неделю!  
        Каждую неделю можно оформить новый заказ!
    </p>
</div>
