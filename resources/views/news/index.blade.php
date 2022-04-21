@extends('layouts.main')
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Список новостей</h1>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('news.getInfo') }}" class="btn btn-sm btn-outline-secondary">Запросить выгрузку новостей</a>
            </div>
        </div>
    </div>
    
@endsection
@include('inc.messages')
@section('content')   
    @forelse($newsList as $news)
       <div class="col">
         <div class="card shadow-sm">
             <img src="{{ $news->image }}">

           <div class="card-body">
              <strong>
                  <a href=" {{ route('news.show', [ 'id' => $news->id ]) }}">
                      {{ $news->title }}
                  </a>
              </strong>
              <p class="card-text">
                  {!! $news->description !!}
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href=" {{ route('news.show', ['id' => $news->id]) }}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                </div>
                  <small class="text-muted">Статус: <em>{{ $news->status }}</em></small>
                  <small class="text-muted">Автор: <em> {{ $news->author }}</em></small>
            </div>
        </div>
    </div>
</div>
    @empty
        <h2>Новостей нет</h2>
    @endforelse
@endsection