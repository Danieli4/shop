@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Продукт {{$product->title}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex p-2">
                            <div class="mr-3">
                                <a href="{{route('product.edit', $product->id)}}"
                                   class="btn btn-primary">Редактировать</a>
                            </div>
                            <form action="{{route('product.delete', $product->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Удалить">
                            </form>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td> {{ $product->id}}</td>
                                </tr>
                                <tr>
                                    <td>Наименование</td>
                                    <td><a href="{{route('product.edit', $product->id)}}"> {{$product->title}}</a></td>
                                </tr>
                                <tr>
                                    <td>Описание</td>
                                    <td><a href="{{route('product.edit', $product->id)}}"> {{$product->description}}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Контент</td>
                                    <td><a href="{{route('product.edit', $product->id)}}"> {{$product->content}}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Цена</td>
                                    <td><a href="{{route('product.edit', $product->id)}}"> {{$product->price}}</a></td>
                                </tr>
                                <tr>
                                    <td>Количество</td>
                                    <td><a href="{{route('product.edit', $product->id)}}"> {{$product->count}}</a></td>
                                </tr>
                                <tr>
                                    <td>Категория</td>
                                    <td><a href="{{route('product.edit', $product->id)}}"> {{$category}}</a></td>
                                </tr>
                                <tr>
                                    <td>Теги</td>
                                    @if($tags)
                                        <td>
                                        @foreach($tags as $tag)
                                            <a href="{{route('product.edit', $product->id)}}"> {{(isset($tag->title))?$tag->title:"нет тегов"}}</a>
                                        @endforeach
                                        </td>
                                    @else
                                        <td><a href="{{route('product.edit', $product->id)}}"> {{"нет тегов"}}</a></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Цвета</td>
@if($colors->isEmpty())
                                        <td><a href="{{route('product.edit', $product->id)}}"> {{"нет цветов"}}</a></td>
@endif
                                        @foreach($colors as $color)
                                        <td><a href="{{route('product.edit', $product->id)}}"> {{$color->title}}</a></td>
                                        @endforeach

                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
