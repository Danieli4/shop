@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Продукты</h1>
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
                        <div class="card-header">
                            <a href="{{route('product.create')}}" class="btn btn-primary">Добавить</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap mw-100">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                    <th>Описание</th>
                                    <th>Контент</th>
                                    <th>Цена</th>
                                    <th>Количество</th>
                                    <th>Категория</th>
                                    <th>Теги</th>
                                    <th>Цвета</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td><a href="{{route('product.show', $product->id)}}">{{$product->title}}</a>
                                        </td>
                                        <td>
                                            <a href="{{route('product.show', $product->id)}}">{{$product->description}}</a>
                                        </td>
                                        <td><a href="{{route('product.show', $product->id)}}">{{$product->content}}</a>
                                        </td>
                                        <td><a href="{{route('product.show', $product->id)}}">{{$product->price}}</a>
                                        </td>
                                        <td><a href="{{route('product.show', $product->id)}}">{{$product->count}}</a>
                                        </td>
                                        <td>
                                            <a href="{{route('product.show', $product->id)}}">{{$categories->find($product->category_id)->title}}</a>
                                        </td>


                                        @if(!($tags->isEmpty()))
                                            <td>
                                                <a>
                                                    @foreach($product->tags as $productTags)
                                                        {{$productTags->title." "}}
                                                    @endforeach
                                                </a>
                                            </td>
                                        @else
                                            <td>
                                                <a href="{{route('product.show', $product->id)}}"></a>
                                            </td>
                                        @endif
                                        @php
                                            $colorProducts = \App\Models\ColorProduct::where('product_id', '=', $product->id)->get();
                                        @endphp
                                        @if(!($colorProducts->isEmpty()))
                                            <td ><div  style="width: 16px; height: 16px; background-color:

                                                    @foreach($colorProducts as $colorProduct)
                                                        {{"#".$colors->find($colorProduct->color_id)['title']}}"></div>
                                                    @endforeach
                                            </td>
                                        @else
                                            <td>
                                                <a href="{{route('product.show', $product->id)}}">{{""}}</a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
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
