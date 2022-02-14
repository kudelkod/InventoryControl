@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggler navbar-light bg-gradient">
                    <a class="btn btn-primary" href="{{route('manufacturers.create')}}">Добавить</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Производитель</th>
                                <th>Адрес</th>
                                <th class="d-grid gap-2 d-md-flex justify-content-md-end me-3 pe-5">Управление</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($manufacturers as $manufacture)
                                <tr>
                                    <td>{{$manufacture->id}}</td>
                                    <td>{{$manufacture->name}}</td>
                                    <td>{{$manufacture->address}}</td>
                                    <td class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a class="btn btn-primary" href="{{route('manufacturers.edit', [$manufacture->slug])}}">Редактировать</a>
                                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal">Удалить</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="{{route('manufacturers.delete', [$manufacture->slug])}}">
        @method('DELETE')
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Вы действительно хотите удалить категорию: {{$manufacture->name}}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </div>
            </div>
        </div>
    </form>
</div>
