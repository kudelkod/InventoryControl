@extends('layouts.app')

@section('content')
    <form method="post" action="{{route('models.store')}}">
        @csrf
        <div class="container mt-2 mb-2 pt-3 pb-3">
            <div class="justify-content-center">
                <div class="card mt-2 mb-2 pt-3 pb-3">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <h3 class="mb-3">Добавить модель</h3>
                                        <div class="row g-3">
                                            <div class="row mt-2 pt-3">
                                                <div class="col-sm-6">
                                                    <label for="name" class="form-label">Название</label>
                                                    <input type="text" name="name" class="form-control name" id="name" placeholder="Название модели" required>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label for="manufacturer_id" class="form-label">Производитель</label>
                                                    <select id="manufacturer_id" name="manufacturer_id" class="form-control" placeholder="Выберите производителя" >
{{--                                                        @foreach($categoryList as $category)--}}
{{--                                                            <option value="{{$category->id}}">--}}
{{--                                                                {{$category->id_name}}--}}
{{--                                                            </option>--}}
{{--                                                        @endforeach--}}
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mt-2 pt-3">
                                                <div class="col-4">
                                                    <label for="year" class="form-label">Год выпуска</label>
                                                    <div class="input-group has-validation">
                                                        <input type="date" name="year" class="form-control" id="year" placeholder="Год выпуска">
                                                    </div>
                                                </div>

                                                <div class="col-8">
                                                    <label for="description" class="form-label">Описание<span class="text-muted">(необязательно)</span></label>
                                                    <textarea type="textarea" name="description" class="form-control" id="description" placeholder="Описание модели" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div id="for_parameters">
                                                <div class="row mt-2 pt-3">
                                                <div class="col-4">
                                                    <label for="parameter_name">Название параметра</label>
                                                    <select name="parameter_name[]" id="parameter_name" class="form-select">
                                                        <option>param</option>
                                                        @foreach($parameters as $parameter)
                                                            <option value="{{$parameter->id}}">{{$parameter->name}}/{{$parameter->type_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <label for="parameter_value">Значение параметра</label>
                                                    <div id="value_place">

                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row mt-2 pt-2">
                                                <div class=" col-md -2  d-grid gap-2 d-md-flex justify-content-md-start">
                                                    <a class="btn btn-primary" id="add_parameter">Добавить параметр</a>
                                                </div>
                                                <div class="col-md-2 d-grid gap-2 d-md-flex justify-content-md-end">
                                                    <button class="btn btn-primary" type="submit">Сохранить</button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        //////////////////////////////////////////////////////////////////////////////////////////////////

        $('#add_parameter').on('click', function (){

            $(  '<div class="row mt-2 pt-3">'+
                '<div class="col-4">'+
                '<label for="parameter_name">Название параметра</label>'+
                '<input type="text" name="parameter_name[]" id="parameter_name" class="form-control" placeholder="Название параметра">'+
                '</div>'+
                '<div class="col-4">'+
                '<label for="parameter_value">Значение параметра</label>'+
                '<div id="value_place">'+

                '</div>'+
                '</div>'+
                '</div>').appendTo('#for_parameters')

        })

    </script>

    <script>
        $('#parameter_name').change(function (){
            let id = $('#parameter_name').val();

            $.ajax({
                type: 'POST',
                url: '{{route(('models.getAjaxTypeId'))}}',
                data: {
                    "_token": "{{csrf_token()}}",
                    'id': id
                },
                success: function (response) {
                    alert(response)
                    if(response === '1')
                        $('#value_place').html('<div class="form-check">'+
                            '<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">'+
                                '<label class="form-check-label" for="flexRadioDefault1">'+
                                    'Default radio'+
                                '</label>'+
                        '</div>'+
                    '<div class="form-check">'+
                        '<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>'+
                            '<label class="form-check-label" for="flexRadioDefault2">'+
                                'Default checked radio'+
                            '</label>'+
                    '</div>');
                    else if(response === '2')
                        $('#value_place').html('<input class="form-control" type="number" step="0.01" id="parameter_value" name="parameter_value[]" placeholder="Введите значение" required>')
                    else if(response === '3')
                        $('#value_place').html('<input class="form-control" type="text" id="parameter_value" name="parameter_value[]" placeholder="Введите значение" required>')

                },
                error: function (xhr, textStatus) {
                    alert([xhr.status, textStatus]);
                }
            })
        })
    </script>
@endsection

