@php use App\Models\Category; @endphp
@extends('layouts.index')

@section('title', 'Copy Star - Админ-панель')

@section('content')
    @if(session()->get('success'))
        <h1 class="mt-4">Админ-панель</h1>
        <section class="my-4">
            <h2>Заказы</h2>
        </section>
        <section class="my-4">
            <h2>Товары</h2>
        </section>
        <section class="my-4">
            <h2>Категории ({{count(Category::all())}})</h2>
            @if(count(Category::all()))
                <div class="d-flex flex-wrap gap-4 mt-4">
                    @foreach (Category::all() as $category)
                        <form method="POST" action="/category/{{$category->id}}">
                            @csrf
                            <article class="card">
                                <div class="card-body">
                                    <h6>{{$category->name}}</h6>
                                    <button type="submit" class="btn btn-danger mt-4">Удалить</button>
                                </div>
                            </article>
                        </form>
                    @endforeach
                </div>
            @else
                <h4 class="mt-4">Категорий пока-что нет</h4>
            @endif
            <h5 class="mt-4">Создать категорию</h5>
            <form class="my-4 py-4 border-top border-bottom" method="POST" action="/category">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Название</label>
                    <input required type="text" name="name" class="form-control" id="name">
                </div>
                <button type="submit" class="btn btn-primary">Создать</button>
            </form>
        </section>
    @else
        <h1 class="mt-4">Вход в админ-панель</h1>
        <form method="POST" action="/admin">
            @csrf
            <div class="mb-3">
                <label for="login" class="form-label">Логин</label>
                <input required type="text" name="login" class="form-control" id="login">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input required type="password" name="password" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
        @if(session()->get('error'))
            <div class="alert alert-danger mt-4" role="alert">
                Логин или пароль введены неверно!
            </div>
        @endif
    @endif
@endsection
