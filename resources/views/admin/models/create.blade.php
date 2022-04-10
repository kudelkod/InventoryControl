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
{{--                                                    <label for="manufacturer_id" class="form-label">Производитель</label>--}}
{{--                                                    <select id="manufacturer_id" name="manufacturer_id" class="form-control" placeholder="Выберите производителя" >--}}
{{--                                                        @foreach($categoryList as $category)--}}
{{--                                                            <option value="{{$category->id}}">--}}
{{--                                                                {{$category->id_name}}--}}
{{--                                                            </option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
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
                                                    <div id="name_place">

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="parameter_value">Значение параметра</label>
                                                    <div id="value_place">

                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row mt-2 pt-2">
                                                <div class="col d-grid gap-2 d-md-flex justify-content-md-start">
                                                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddParameter">Добавить параметр</a>
                                                </div>
                                                <div class="col d-grid gap-2 d-md-flex justify-content-md-center">
                                                    <a id="modalCreateParameter" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateParameter">Создать параметр</a>
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
        $('#modalCreateParameter').on('click', function (){

            $.ajax({
                type: 'GET',
                url: '{{route('parameters.getType')}}',
                success: function (response){
                    $('#parameter_type_place')
                        .html('<select id="create_parameter_type_modal" name="create_parameter_type_modal" class="form-select">'+
                              '</select>')
                }
            })
        })
    </script>

    <script>
        $('#add_parameter_modal').on('click', function (){
            $('<input class="form-control mt-2 pt-2 mb-2 pb-2" readonly>').val($('#parameter_name_modal option:selected').text()).appendTo('#name_place');
            $('<input class="form-control mt-2 pt-2 mb-2 pb-2" id="parameter_name" name="parameter_name[]" hidden>').val($('#parameter_name_modal').val()).appendTo('#name_place');
            $('<input class="form-control mt-2 pt-2 mb-2 pb-2" id="parameter_value" name="parameter_value[]" readonly>').val($('#parameter_value_modal').val()).appendTo('#value_place');
        })

    </script>

    <script>
        $('#parameter_name_modal').change(function (){
            let id = $('#parameter_name_modal').val();

            $.ajax({
                type: 'POST',
                url: '{{route(('models.getAjaxTypeId'))}}',
                data: {
                    "_token": "{{csrf_token()}}",
                    'id': id
                },
                success: function (response) {

                    if(response === '1')
                        $('#value_place_modal').html(
                            '<div class="form-check">'+
                                '<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">'+
                                    '<label class="form-check-label" for="flexRadioDefault1">'+
                                        'Default radio'+
                                '   </label>'+
                            '</div>'+
                            '<div class="form-check">'+
                                '<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>'+
                                    '<label class="form-check-label" for="flexRadioDefault2">'+
                                        'Default checked radio'+
                                    '</label>'+
                            '</div>');
                    else if(response === '2')
                        $('#value_place_modal').html('<input class="form-control" type="number" step="0.01" id="parameter_value_modal" name="parameter_value_modal[]" placeholder="Введите значение" required>')
                    else if(response === '3')
                        $('#value_place_modal').html('<input class="form-control" type="text" id="parameter_value_modal" name="parameter_value_modal[]" placeholder="Введите значение" required>')

                },
                error: function (xhr, textStatus) {
                    alert([xhr.status, textStatus]);
                }
            })
        })
    </script>
@endsection

<!-- Modal Create -->
<div class="modal fade" id="modalCreateParameter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Создать параметр</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <label for="create_parameter_name_modal">Название параметра</label>
                        <input class="form-control" type="text" id="create_parameter_name_modal" name="parameter_name[]" placeholder="Введите название">
                    </div>
                    <div class="col-md-4">
                        <label for="create_parameter_type_modal">Тип параметра</label>
                        <div id="parameter_type_place">

                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="create_parameter_value_modal">Значение параметра</label>
                        <div id="create_value_place_modal">

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalAddParameter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавить параметр</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <label for="parameter_name_modal">Название параметра</label>
                        <select name="parameter_name_modal" id="parameter_name_modal" class="form-select">
                            <option>param</option>
                            @foreach($parameters as $parameter)
                                <option value="{{$parameter->id}}">{{$parameter->name}}/{{$parameter->type_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-5">
                        <label for="parameter_value_modal">Значение параметра</label>
                        <div id="value_place_modal">

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="add_parameter_modal" type="button" class="btn btn-primary">Добавить параметр</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

