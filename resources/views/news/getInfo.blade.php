@extends('layouts.admin')
@section('title') Запрос новостей @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Запрос выгрузки новостей</h1>        
    </div>

    <div class="raw">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{ route('news.store') }}" >
        @csrf
            <div class="form-group">
                <label for="author">Ваше имя</label>
                <input type="text" class="form-control" name="author" id="author">
            </div> 

            <div class="form-group">
                <label for="email">Ваш email</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>
                       
            <div class="form-group">
                <label for="description">Дополнительная информация</label>
                <textarea class="form-control" name="description" id="description"></textarea>
            </div>

            <br><br>
            <button type="submit" class="btn btn-success">Отправить запрос</button>
        </form>
    </div>


@endsection