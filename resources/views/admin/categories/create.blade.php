@extends('layouts.app')

@section('content')
    <form method="post" action="{{route('categories.store')}}">
        @csrf
        <div class="container mt-2 mb-2 pt-3 pb-3">
            <div class="justify-content-center">
                <div class="card mt-2 mb-2 pt-3 pb-3">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <h3 class="mb-3">Добавить категорию</h3>
                                        <div class="row g-3">
                                            <div class="row mt-2 pt-3">
                                                <div class="col-sm-6">
                                                    <label for="name" class="form-label">Название</label>
                                                    <input type="text" name="name" class="form-control name" id="name" placeholder="Название категории" required>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label for="parent_category_id" class="form-label">Родительская категория</label>
                                                    <select id="parent_category_id" name="parent_category_id" class="form-control" placeholder="Выберите категорию" required>
                                                        @foreach($categoryList as $category)
                                                            <option value="{{$category->id}}">
                                                                {{$category->id_name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mt-2 pt-3">
                                                <div class="col-4">
                                                    <label for="slug" class="form-label">Идентификатор<span class="text-muted">(необязательно)</span></label>
                                                    <div class="input-group has-validation">
                                                        <input type="text" name="slug" class="form-control slug" id="slug" placeholder="Идентификатор категории">
                                                    </div>
                                                </div>

                                                <div class="col-8">
                                                    <label for="description" class="form-label">Описание<span class="text-muted">(необязательно)</span></label>
                                                    <textarea type="textarea" name="description" class="form-control" id="description" placeholder="Описание категории" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="row mt-2 pt-2">
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                    <button class="btn btn-primary" type="submit">Сохранить</button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
            {{--                <div class="col-md-5 col-lg-4 order-md-last">--}}
            {{--                    <h4 class="d-flex justify-content-between align-items-center mb-3">--}}
            {{--                        <span class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Корзина</font></font></span>--}}
            {{--                        <span class="badge bg-secondary rounded-pill"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3</font></font></span>--}}
            {{--                    </h4>--}}
            {{--                    <ul class="list-group mb-3">--}}
            {{--                        <li class="list-group-item d-flex justify-content-between lh-sm">--}}
            {{--                            <div>--}}
            {{--                                <h6 class="my-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">наименование товара</font></font></h6>--}}
            {{--                                <small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Краткое описание</font></font></small>--}}
            {{--                            </div>--}}
            {{--                            <span class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">12 долларов</font></font></span>--}}
            {{--                        </li>--}}
            {{--                        <li class="list-group-item d-flex justify-content-between lh-sm">--}}
            {{--                            <div>--}}
            {{--                                <h6 class="my-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">второй продукт</font></font></h6>--}}
            {{--                                <small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Краткое описание</font></font></small>--}}
            {{--                            </div>--}}
            {{--                            <span class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$8</font></font></span>--}}
            {{--                        </li>--}}
            {{--                        <li class="list-group-item d-flex justify-content-between lh-sm">--}}
            {{--                            <div>--}}
            {{--                                <h6 class="my-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">третий пункт</font></font></h6>--}}
            {{--                                <small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Краткое описание</font></font></small>--}}
            {{--                            </div>--}}
            {{--                            <span class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$5</font></font></span>--}}
            {{--                        </li>--}}
            {{--                        <li class="list-group-item d-flex justify-content-between bg-light">--}}
            {{--                            <div class="text-success">--}}
            {{--                                <h6 class="my-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">промо код</font></font></h6>--}}
            {{--                                <small><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ПРИМЕР КОДА</font></font></small>--}}
            {{--                            </div>--}}
            {{--                            <span class="text-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">-$5</font></font></span>--}}
            {{--                        </li>--}}
            {{--                        <li class="list-group-item d-flex justify-content-between">--}}
            {{--                            <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Всего (долл. США)</font></font></span>--}}
            {{--                            <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">20 долларов</font></font></strong>--}}
            {{--                        </li>--}}
            {{--                    </ul>--}}

            {{--                    <form class="card p-2">--}}
            {{--                        <div class="input-group">--}}
            {{--                            <input type="text" class="form-control" placeholder="промо код">--}}
            {{--                            <button type="submit" class="btn btn-secondary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Проверять</font></font></button>--}}
            {{--                        </div>--}}
            {{--                    </form>--}}
            {{--                </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('scripts')
    @include('admin.name_slug.name_slug_script')
@endsection
