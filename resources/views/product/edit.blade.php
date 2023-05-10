@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать продукт</h1>
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
                <form action="{{route('product.update' ,$product->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{$product->title}}" name="title" id=""
                               placeholder="Наименование">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{$product->description}}" name="description"
                               id="" placeholder="Описание">
                    </div>
                    <div class="form-group">
                        <textarea name="content" class="form-control" placeholder="Контент">
{{$product->content}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{$product->price}}" name="price" id=""
                               placeholder="Цена">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{$product->count}}" name="count" id=""
                               placeholder="Количество на складе">
                    </div>
                    <div class="form-group">
                        <select name="category_id" class="form-control select2 " style="width: 100%;">

                            @foreach($categories as $category)
                                {{$category->id===$product->category_id ? 'selected' : ''}}
                                <option value="{{$category->id}}">{{$category->title}}</option>

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="group_id" class="form-control select2 " style="width: 100%;">

                            @foreach($groups as $group)
                                {{$group->id===$product->group_id ? 'selected' : ''}}
                                <option value="{{$group->id}}">{{$group->title}}</option>

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="tags[]" class="tags" multiple="" data-placeholder="Выберите теги"
                                style="width: 100%;">
                            @foreach($tags as $tag)
                                <option
                                    @foreach($product->tags as $productTags)
                                        {{$tag->id===$productTags->id ? 'selected' : ''}}
                                    @endforeach
                                    value="{{$tag->id}}">{{$tag->title}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group" >
                        <select name="colors[]" class="colors" multiple="" data-placeholder="Выберите цвета"
                                style="width: 100%;">
                            @foreach($colors as $color)
                                <option

                                @foreach($product->colors as $productColor)

                                    {{$color->id===$productColor->id ? 'selected' : ''}}
                                @endforeach
                                value="{{$color->id}}">{{$color->title}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Редактировать">
                    </div>
                </form>
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
