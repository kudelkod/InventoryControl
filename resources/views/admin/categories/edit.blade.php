@extends('layouts.app')

@section('content')
    <form method="post" action="{{route('categories.update', $category->slug)}}">
        @csrf
        <div class="container mt-2 mb-2 pt-3 pb-3">
            <div class="justify-content-center">
                <div class="card mt-2 mb-2 pt-3 pb-3">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <h3 class="mb-3">Редактировать категорию</h3>
                                    <div class="row g-3">
                                        <div class="row mt-2 pt-3">
                                            <div class="col-sm-6">
                                                <label for="name" class="form-label">Название</label>
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Название категории" required value="{{$category->name}}">
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="parent_category_id" class="form-label">Родительская категория</label>
                                                <select id="parent_category_id" name="parent_category_id" class="form-control" placeholder="Выберите категорию" required>
                                                    @foreach($categoryList as $categoryOption)
                                                        <option value="{{$categoryOption->id}}" @if($category->parent_category_id == $categoryOption->id) selected @endif>
{{--                                                            @if($category->parent_category_id == $categoryOption->parent_category_id)--}}
{{--                                                                continue;--}}
{{--                                                            @endif--}}
                                                            {{$categoryOption->id_name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mt-2 pt-3">
                                            <div class="col-4">
                                                <label for="slug" class="form-label">Идентификатор</label>
                                                <div class="input-group has-validation">
                                                    <input type="text" name="slug" class="form-control slug" id="slug" placeholder="Идентификатор категории" value="{{$category->slug}}">
                                                </div>
                                                <span class="text-muted">* Изменять если получаем ошибку "Данная категория уже существует"</span><br>
                                                <span class="text-muted">* Изменять не рекомендуется</span>
                                            </div>

                                            <div class="col-8">
                                                <label for="description" class="form-label">Описание<span class="text-muted">(необязательно)</span></label>
                                                <textarea type="textarea" name="description" class="form-control" id="description" placeholder="Описание категории" rows="5">{{$category->description}}</textarea>
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
    <form method="post" action="{{route('categories.delete', $category->slug)}}">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-block">
                    <div class="card-body ml-auto">
                        <button type="submit" class="btn btn-link">Удалить</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </form>
    <script>
        function translit(word){
            var answer = '';
            var converter = {
                'а': 'a',    'б': 'b',    'в': 'v',    'г': 'g',    'д': 'd',
                'е': 'e',    'ё': 'e',    'ж': 'zh',   'з': 'z',    'и': 'i',
                'й': 'y',    'к': 'k',    'л': 'l',    'м': 'm',    'н': 'n',
                'о': 'o',    'п': 'p',    'р': 'r',    'с': 's',    'т': 't',
                'у': 'u',    'ф': 'f',    'х': 'h',    'ц': 'c',    'ч': 'ch',
                'ш': 'sh',   'щ': 'sch',  'ь': '',     'ы': 'y',    'ъ': '',
                'э': 'e',    'ю': 'yu',   'я': 'ya',

                'А': 'A',    'Б': 'B',    'В': 'V',    'Г': 'G',    'Д': 'D',
                'Е': 'E',    'Ё': 'E',    'Ж': 'Zh',   'З': 'Z',    'И': 'I',
                'Й': 'Y',    'К': 'K',    'Л': 'L',    'М': 'M',    'Н': 'N',
                'О': 'O',    'П': 'P',    'Р': 'R',    'С': 'S',    'Т': 'T',
                'У': 'U',    'Ф': 'F',    'Х': 'H',    'Ц': 'C',    'Ч': 'Ch',
                'Ш': 'Sh',   'Щ': 'Sch',  'Ь': '',     'Ы': 'Y',    'Ъ': '',
                'Э': 'E',    'Ю': 'Yu',   'Я': 'Ya',   ' ': '-',    '/': '',
            };
            for (var i = 0; i < word.length; ++i ) {
                if (converter[word[i]] == undefined){
                    answer += word[i];
                } else {
                    answer += converter[word[i]];
                }
            }

            return answer;
        }

        let name = document.querySelector('#name');
        let slug = document.querySelector('#slug');

        window.onload = function() {
            name.addEventListener('input', function () {
                slug.value = translit(this.value);
            });
        }
    </script>
@endsection
