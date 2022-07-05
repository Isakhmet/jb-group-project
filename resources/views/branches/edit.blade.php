@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Обновление филиала') }}</div>
                    <div class="card-body">
                        <div class="text-center mt-5">
                            <form method="post" action="{{url('/branches/'.$branch->id)}}" class="login-form">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Что-то пошло не так!</strong> Заполните корректно данные.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @csrf
                                @method('PUT')
                                    <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Код валюты"
                                           autocomplete required value="{{$branch->name}}">
                                    <input type="text" class="form-control mb-3" id="name" name="address" placeholder="Описание"
                                           autocomplete required value="{{$branch->address}}">
                                    <button class="btn btn-lg btn-success col-12">Обновить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
