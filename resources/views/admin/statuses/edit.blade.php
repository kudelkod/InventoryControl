@extends('layouts.app')

@section('content')
    @if($statusList->count() < 1)
        <div class="container mt-2 mb-2 pt-3 pb-3">
            <div class="justify-content-center">
                <div class="card mt-2 mb-2 pt-3 pb-3">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <h3 class="mb-3">Нет статусов для редактирования</h3>
                                    <h3 class="mb-3"><a class="btn btn-primary" href="{{route('statuses.create')}}">Создать статус</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <form id="form" method="post" action="{{route('statuses.update')}}">
            @csrf
            <div class="container mt-2 mb-2 pt-3 pb-3">
                <div class="justify-content-center">
                    <div class="card mt-2 mb-2 pt-3 pb-3">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <h3 class="mb-3">Редактировать статус</h3>
                                        <div class="row g-3">
                                            <div class="row mt-2 pt-3">
                                                <div class="col-sm-4">
                                                    <label for="id" class="form-label">Название</label>
                                                    <select id="id" name="id" class="form-control" placeholder="Выберите название статуса" required data-target="#getStatus">
                                                        <option>Выберите название статуса</option>
                                                        @foreach($statusList as $statusOption)
                                                            <option class="option" value="{{$statusOption->id}}">
                                                                {{$statusOption->id_name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-sm-8">
                                                    <label for="about" class="form-label">Описание<span class="text-muted">(необязательно)</span></label>
                                                    <textarea type="textarea" name="about" class="form-control" id="about" placeholder="Описание статуса" rows="1"></textarea>
                                                </div>
                                            </div>
                                            <div class="row mt-2 pt-3">
                                                <div class="col-md-4">
                                                    <label class="form-label" for="name">Изменить имя</label>
                                                    <input class="form-control" type="text" placeholder="Изменить имя" name="name" id="name">
                                                </div>
                                            </div>
                                            <div class="row mt-2 pt-2">
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                    <button id="submit" class="btn btn-primary" type="submit">Сохранить</button>
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
    @endif
@endsection

@section('scripts')
@include('admin.statuses.ajax.ajax_requests')
@endsection
