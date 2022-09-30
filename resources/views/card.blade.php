<form class="pay-form__form m-auto" method="get" action="/petrozavodsk/card/" id="order" role="form">

    <div class="form-group center-in-svd-input">
        <label for="">Номер договора</label>
        <input class="form-control" type="text" name="account" placeholder="Введите номер договора" value="" required="">
    </div>
    <div class="form-group center-in-svd-input">
        <label for="">Сумма</label>
        <input class="form-control sum-pay" type="number" name="sum" autocomplite="off" placeholder="Введите сумму платежа" value="" required="">
    </div>
    <div class="order-autopay">
        <div class="checkbox">
            <div class="order-desc-autopay" style="display: none;">
                <p>
                    При помощи «Автоплатежа» ваш счет в «Ситилинке» пополняется<br> с вашей
                    карты
                    автоматически. При посуточной тарификации счет<br> автоматически пополняется
                    на
                    сумму, которая нужна, чтобы ваш<br> Интернет (и ТВ) работали 30 дней, а при
                    помесячной тарификации<br> — месяц. Изменить настройки вашего автоплатежа
                    можно в
                    личном <br>кабинете.<br><br>
                </p>
            </div>
        </div>
    </div>
    <div class="flex-buttons ">
        <div class="fst-wrapper">
            <input type="button" id="new-order-btn" class="order-btn new-order-btn" name="rec" value="Оплачивать регулярно" onclick="yaCounter46310949.reachGoal('auto_p'); return true;">
            <span class="order-vopros new-order-vopros">?</span>

        </div>
        <input type="submit" id="old-order-btn" class="order-btn order-by-pay-new" value="Оплатить единоразово" style=" width: 195px!important">
        <!-- <input type="submit"  class="order-btn order-by-pay" value="Оплатить единоразово" style="opacity: 0.6; width: 230px!important"> -->
    </div>

    <input type="hidden" name="type" value="order"> <br><br>
    <label for="">
        <input id="auto_pay" type="checkbox" name="rec" value="" style="display: none">
        <a class="order-autoplay-link new-order-autoplay-link" href="">Не получилось
            оплатить?</a>
        <div class="order-hint new-order-hint">
            <p>
                Позвоните в Службу заботы о Клиентах
                <br>
                по телефону <a href="tel:89214555777">8 (921) 4-555-777</a> (круглосуточно)
                <br>
                или <a href="#" onclick="jivo_api.open();return false;">напишите</a>, чтобы мы могли вам помочь!
            </p>
        </div>
    </label>
</form>
