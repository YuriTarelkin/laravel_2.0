@extends('layouts.main')
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Список категорий</h1>
        </div>
    </div>
@endsection
@include('inc.messages')
@section('content')
    @forelse($categories as $category)
       <div class="col">
         <div class="card shadow-sm">           

           <div class="card-body">
              <strong>
                  <a href=" {{ route('category.show', ['id' => $category->id]) }}">
                      {{ $category->title }}
                  </a>
              </strong>
              <p class="card-text">
                  {!! $category->description !!}
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href=" {{ route('category.show', ['id' => $category->id]) }}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                </div>
                  
            </div>
        </div>
    </div>
</div>
    @empty
        <h2>Категорий нет</h2>
    @endforelse
@endsection