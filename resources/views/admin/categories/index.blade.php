@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggler navbar-light bg-gradient">
                    <a class="btn btn-primary" href="{{route('categories.create')}}">Добавить</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Категория</th>
                                <th>Родительская категория</th>
                                <th>Управление</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td @if($category->parent_category_id === 1) style="color: #ccc" @endif>
                                        {{$category->parentCategoryName  }}
                                    </td>
                                    <td>
                                        @if($category->id === 1)
                                            <button class="btn btn-primary" hidden href="{{route('categories.edit', [$category->slug])}}">Редактировать</button>
                                            <button class="btn btn-danger" hidden href="{{route('categories.delete', [$category->slug])}}">Удалить</button>
                                        @else
                                            <a class="btn btn-primary" href="{{route('categories.edit', [$category->slug])}}">Редактировать</a>
                                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal">Удалить</a>
                                        @endif
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
    <form method="post" action="{{route('categories.delete', [$category->slug])}}">
        @method('DELETE')
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Вы действительно хотите удалить категорию: {{$category->name}}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </div>
            </div>
        </div>
    </form>
</div>
