@extends('layouts.app')

@section('content')
    <form method="post" action="{{route('statuses.store')}}">
        @csrf
        <div class="container mt-2 mb-2 pt-3 pb-3">
            <div class="justify-content-center">
                <div class="card mt-2 mb-2 pt-3 pb-3">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <h3 class="mb-3">Добавить статус</h3>
                                    <div class="row g-3">
                                        <div class="row mt-2 pt-3">
                                            <div class="col-sm-4">
                                                <label for="name" class="form-label">Название</label>
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Название статуса" required>
                                            </div>

                                            <div class="col-sm-8">
                                                <label for="about" class="form-label">Описание<span class="text-muted">(необязательно)</span></label>
                                                <textarea type="textarea" name="about" class="form-control" id="about" placeholder="Описание статуса" rows="5"></textarea>
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
@endsection
