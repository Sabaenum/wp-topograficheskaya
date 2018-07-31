<footer>
    <div class="in-container">
        <div class="row">
            <div class="make-call col-12 col-sm-7 col-lg-3">
                <p>Позвоните по телефону</p>
                <a href="tel:+74959262618"><p id="telephone_number"> + 7 (495) <span>926-26-18</span></p></a>
                <p>Вас соединят со специалистом для предоставления исчерпывающей информации</p>
            </div>

            <div class="request-call col-12 col-sm-5 col-lg-3">
                <p>Закажите звонок на удобное время</p>
                <p>Нужна консультация? Готовы сделать заказ?</p>
                <button name="call"><span>Заказать звонок</span></button>
            </div>

            <div class="write-us col-12 col-sm-7 col-lg-3">
                <p>Напишите нам</p>
                <p><a id="email" href="mailto:zakaz@kadgeoburo.ru"><span>zakaz@kadgeoburo.ru</span></a></p>
                <p>опишите задачу, прикрепите необходимые документы и получите смету и коммерческое предложение</p>
            </div>

            <div class="invite col-12 col-sm-5 col-lg-3">
                <p>Выберете ближайший к Вам офис и запишитесь на очную консультацию</p>
                <p class="address">г. Москва, ул. Барклая, д.6, 39 <br>
                    <a href="#" data-toggle="tooltip" data-placement="top" data-trigger="click" data-html="true"
                                                                      data-title="<br><a href='#'>Балашиха, проспект Ленина, д. 25</a>
                    <br><a href='#'>Видное, Заводская ул., д. 2А</a>
                    <br><a href='#'>Волоколамск, Революционная ул., д. 3</a>
                    <br><a href='#'>Дмитров, ул. Профессиональная, д. 3</a>
                    <br><a href='#'>Домодедово, Каширское шоссе, д. 49</a>
                    <br><a href='#'>Звенигород, ул. Комарова, 13</a>
                    <br><a href='#'>Истра, ул. Ленина д. 75 а</a>
                    <br><a href='#'>Клин, ул. Захватаева, д. 4</a>
                    <br><a href='#'>Королев, ул. Калинина, д. 6Б</a>
                    <br><a href='#'>Красногорск, Ильинское ш., д. 1А</a>">
                        Другие офисы
                    </a></p>
                <p class="address">Московская область, г. Истра, ул. Ленина, д. 75</p>

            </div>
        </div>
    </div>
    <script>
        // инициализация всплывающих подсказок
        $('[data-toggle="tooltip"]').tooltip();
        // отмена для ссылок с атрибутом data-trigger="click" стандартного поведения
        $('a[data-trigger="click"]').click(function (e) {
            e.preventDefault();
        })
    </script>
    </div>

    <?php wp_footer(); ?>
</footer>
