@extends('layouts.app')

@section('content')
    <form method="post" action="{{route('categories.store')}}">
        @csrf
        <div class="container">
            <div class="row g-3">

                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Адрес для выставления счета</font></font></h4>
                    <form class="needs-validation" novalidate="">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Имя</font></font></label>
                                <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                                <div class="invalid-feedback">
                                    يرجى إدخال اسم أول صحيح.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">фамилия</font></font></label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                                <div class="invalid-feedback">
                                    يرجى إدخال اسم عائلة صحيح.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="username" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">имя пользователя</font></font></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">@</font></font></span>
                                    <input type="text" class="form-control" id="username" placeholder="имя пользователя" required="">
                                    <div class="invalid-feedback">
                                        اسم المستخدم الخاص بك مطلوب.
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Электронная почта </font></font><span class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">(необязательно)</font></font></span></label>
                                <input type="email" class="form-control" id="email" placeholder="you@example.com">
                                <div class="invalid-feedback">
                                    يرجى إدخال عنوان بريد إلكتروني صحيح لتصلكم تحديثات الشحن.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">адрес</font></font></label>
                                <input type="text" class="form-control" id="address" placeholder="1234 1-я улица" required="">
                                <div class="invalid-feedback">
                                    يرجى إدخال عنوان الشحن الخاص بك.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="address2" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">адрес 2 </font></font><span class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">(необязательно)</font></font></span></label>
                                <input type="text" class="form-control" id="address2" placeholder="Квартира 24">
                            </div>

                            <div class="col-md-5">
                                <label for="country" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Страна</font></font></label>
                                <select class="form-select" id="country" required="">
                                    <option value=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Выбирать...</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Соединенные Штаты Америки</font></font></option>
                                </select>
                                <div class="invalid-feedback">
                                    يرجى اختيار بلد صحيح.
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="state" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Область</font></font></label>
                                <select class="form-select" id="state" required="">
                                    <option value=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Выбирать...</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Калифорния</font></font></option>
                                </select>
                                <div class="invalid-feedback">
                                    يرجى اختيار اسم منطقة صحيح.
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="zip" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Почтовый Код</font></font></label>
                                <input type="text" class="form-control" id="zip" placeholder="" required="">
                                <div class="invalid-feedback">
                                    الرمز البريدي مطلوب.
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="same-address">
                            <label class="form-check-label" for="same-address"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Адрес доставки совпадает с моим платежным адресом</font></font></label>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="save-info">
                            <label class="form-check-label" for="save-info"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Сохраните эту информацию для следующего раза</font></font></label>
                        </div>

                        <hr class="my-4">

                        <h4 class="mb-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Способ оплаты</font></font></h4>

                        <div class="my-3">
                            <div class="form-check">
                                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked="" required="">
                                <label class="form-check-label" for="credit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Кредитная карта</font></font></label>
                            </div>
                            <div class="form-check">
                                <input id="cash" name="paymentMethod" type="radio" class="form-check-input" required="">
                                <label class="form-check-label" for="cash"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Денежные средства</font></font></label>
                            </div>
                            <div class="form-check">
                                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required="">
                                <label class="form-check-label" for="paypal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PayPal</font></font></label>
                            </div>
                        </div>

                        <div class="row gy-3">
                            <div class="col-md-6">
                                <label for="cc-name" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Имя на карточке</font></font></label>
                                <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                                <small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Полное имя, как указано на карте</font></font></small>
                                <div class="invalid-feedback">
                                    الاسم على البطاقة مطلوب
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="cc-number" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">номер карты</font></font></label>
                                <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                                <div class="invalid-feedback">
                                    رقم بطاقة الائتمان مطلوب
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="cc-expiration" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Дата окончания срока</font></font></label>
                                <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                                <div class="invalid-feedback">
                                    تاريخ انتهاء الصلاحية مطلوب
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="cc-cvv" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Тройной код (CVV)</font></font></label>
                                <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                                <div class="invalid-feedback">
                                    رمز الحماية مطلوب
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">продолжай платить</font></font></button>
                    </form>
                </div>
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Корзина</font></font></span>
                        <span class="badge bg-secondary rounded-pill"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3</font></font></span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">наименование товара</font></font></h6>
                                <small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Краткое описание</font></font></small>
                            </div>
                            <span class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">12 долларов</font></font></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">второй продукт</font></font></h6>
                                <small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Краткое описание</font></font></small>
                            </div>
                            <span class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$8</font></font></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">третий пункт</font></font></h6>
                                <small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Краткое описание</font></font></small>
                            </div>
                            <span class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$5</font></font></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">промо код</font></font></h6>
                                <small><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ПРИМЕР КОДА</font></font></small>
                            </div>
                            <span class="text-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">-$5</font></font></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Всего (долл. США)</font></font></span>
                            <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">20 долларов</font></font></strong>
                        </li>
                    </ul>

                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="промо код">
                            <button type="submit" class="btn btn-secondary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Проверять</font></font></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
@endsection
