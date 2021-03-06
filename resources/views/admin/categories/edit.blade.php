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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form method="post" action="{{route('categories.delete', [$category->slug])}}">
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
@endsection

@section('scripts')
    @include('admin.name_slug.name_slug_script')
@endsection
