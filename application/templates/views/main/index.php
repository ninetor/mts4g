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
											<span class="icon icon--<?= $param['Image'] ?>">
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
											<span class="icon icon--<?= $param['Image'] ?>">
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
                        <div class="btn-wrap">
                            <a href="<?= $phone['UrlShop'] ?>" target="blank" class="btn btn--phone">Купить
                                <span>в интернет-магазине</span></a>
                        </div>


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

LTE позволяет достичь скорости загрузки до 326,4 мбит/с. Скорость загрузки в реальных условиях в сети МТС обеспечивается на уровне до 112 мбит/с.
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
							На данный момент покрытие 4G охватывает часть территории Минска, но в дальнейшем его планируется расширять. Карту покрытия 4G вы можете посмотреть на сайте
                                <span id="click4g">mts.by</span>
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
                      Если ваш смартфон не смог зарегистрироваться в сети LTE, в меню настроек проверьте параметры  точки доступа (APN). Для некоторых моделей телефонов точка доступа LTE (4G) настраивается отдельно от точки доступа 2G/3G.

Правильные значения: APN MTS (заглавными буквами), имя пользователя: mts, пароль: mts.

После применения новых настроек  перезагрузите смартфон. При первой регистрации в сети 4G может потребоваться несколько раз провести процедуру перезагрузки смартфона. Регистрация в сети LTE возможна только в зоне уверенного приема.
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
                <label for="romantic" class="romantic"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="22" height="19" viewBox="0 0 26 26">
                            <path d="M8.163,4.000 C6.522,4.000 5.075,4.495 3.871,5.710 C1.360,8.238 1.360,12.336 3.871,14.865 C4.587,15.588 12.000,22.000 12.000,22.000 C12.426,22.426 13.483,22.517 14.000,22.000 C14.000,22.000 22.023,15.110 22.104,15.027 C24.615,12.498 24.615,8.399 22.104,5.872 C20.859,4.616 19.466,3.993 17.769,3.993 C16.147,3.993 14.338,5.299 12.987,6.684 C11.594,5.299 9.841,4.000 8.163,4.000 L8.163,4.000 Z" class="cls-1"/>
                        </svg></i>Романтический</label>
            </div>
            <div class="radio-wrap">
                <input id="real" name="type" value="2" type="radio">
                <label for="real" class="real"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="22" height="22" viewBox="0 0 26 26">
                            <path d="M12.989,24.000 C6.914,24.000 1.989,19.075 1.989,13.000 C1.989,6.925 6.914,2.000 12.989,2.000 C19.065,2.000 23.989,6.925 23.989,13.000 C23.989,19.075 19.065,24.000 12.989,24.000 ZM9.511,9.004 C8.684,9.004 8.014,9.674 8.014,10.500 C8.014,11.326 8.684,11.996 9.511,11.996 C10.337,11.996 11.007,11.326 11.007,10.500 C11.007,9.674 10.337,9.004 9.511,9.004 ZM16.511,9.004 C15.684,9.004 15.014,9.674 15.014,10.500 C15.014,11.326 15.684,11.996 16.511,11.996 C17.337,11.996 18.007,11.326 18.007,10.500 C18.007,9.674 17.337,9.004 16.511,9.004 ZM18.600,15.076 C18.263,14.918 17.871,15.078 17.722,15.429 C17.709,15.460 16.348,18.566 12.954,18.608 C12.934,18.608 12.913,18.608 12.892,18.608 C9.699,18.608 8.322,15.554 8.264,15.423 C8.112,15.075 7.720,14.920 7.385,15.078 C7.051,15.236 6.902,15.648 7.053,15.999 C7.124,16.164 8.827,20.001 12.889,20.001 C12.916,20.001 12.943,20.000 12.970,20.000 C17.207,19.948 18.868,16.157 18.937,15.996 C19.087,15.644 18.935,15.233 18.600,15.076 Z" class="cls-1"/>
                        </svg></i>Реальный</label>
            </div>
            <div class="radio-wrap">
                <input id="fantastic" name="type" value="3" type="radio">
                <label for="fantastic" class="fantastic"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="24" height="25" viewBox="0 0 26 26">
                            <path d="M24.895,15.299 C24.731,15.621 24.405,15.829 24.042,15.842 L18.322,16.045 L14.783,20.601 C14.592,20.846 14.301,20.986 13.995,20.986 C13.945,20.986 13.893,20.982 13.843,20.974 C13.484,20.918 13.185,20.673 13.060,20.335 L11.399,15.799 C11.352,15.890 11.304,15.980 11.228,16.056 L2.662,24.712 C2.472,24.902 2.222,24.998 1.973,24.998 C1.723,24.998 1.474,24.902 1.283,24.712 C0.902,24.331 0.902,23.714 1.283,23.333 L9.814,14.642 C9.863,14.593 9.924,14.569 9.979,14.532 L5.633,12.982 C5.291,12.860 5.043,12.563 4.986,12.207 C4.929,11.851 5.069,11.491 5.355,11.268 L9.912,7.721 L10.084,1.964 C10.096,1.604 10.303,1.277 10.625,1.113 C10.946,0.946 11.333,0.970 11.635,1.173 L16.434,4.390 L21.987,2.776 C22.338,2.674 22.711,2.769 22.968,3.024 C23.226,3.279 23.323,3.652 23.224,4.000 L21.632,9.536 L24.829,14.294 C25.034,14.592 25.059,14.978 24.895,15.299 Z" class="cls-1"/>
                        </svg></i>Фантастический</label>
            </div>
            <div class="radio-wrap">
                <input id="solemn" name="type" value="4" type="radio">
                <label for="solemn" class="solemn"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="26" height="24" viewBox="0 0 26 26">
                            <path d="M18.201,7.719 L15.070,3.993 L19.582,3.993 L18.201,7.719 ZM17.349,10.016 L10.644,10.016 L10.465,9.535 L13.861,5.025 L17.565,9.433 L17.349,10.016 ZM8.407,3.993 L12.641,3.993 L9.805,7.759 L8.407,3.993 ZM8.105,10.016 L3.237,10.016 L6.107,4.602 C6.201,4.426 6.373,4.270 6.568,4.158 L8.527,9.455 L8.105,10.016 ZM13.036,21.647 L12.876,22.080 L3.733,12.023 L9.477,12.023 L13.036,21.647 ZM16.605,12.023 L13.999,19.052 L11.388,12.023 L16.605,12.023 ZM18.517,12.023 L24.337,12.023 L15.083,21.972 L14.962,21.647 L18.517,12.023 ZM19.764,10.016 L19.993,9.851 L19.525,9.294 L21.420,4.160 C21.614,4.272 21.783,4.428 21.874,4.604 L24.696,10.016 L19.764,10.016 Z" class="cls-1"/>
                        </svg></i>Торжественный</label>
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
            <input type="text" id="socialOrder" name="social" placeholder="Имя и фамилия">
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
