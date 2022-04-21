@extends('layouts.app')
@section('content')
    <div class="row offset-2">
        <h2>Добро пожаловать, {{ Auth::user()->name }}</h2>
        <br>
        @if(Auth::user()->avatar)
            <img src="{{ Auth::user()->avatar }}" style="width:250px;">
        @endif
        <br>
        @if(Auth::user()->is_admin)
            <div class="btn-group me-2" style="margin-top:50px; width:200px;">
                <a href="{{ route('admin.index') }}" class="btn btn-sm btn-outline-secondary">В админку</a>
            </div>           
        @endif        
    </div>
@endsection