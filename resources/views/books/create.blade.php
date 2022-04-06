@extends('layouts.global')

@section('title') Create Book @endsection

@section('content')

    @section('pageTitle') Create Book @endsection

    <div class="row">
        <div class="col-md-8">

            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif

            <form action="{{route('books.store')}}" method="post" class="shadow-sm p-3 bg-white" enctype="multipart/form-data">
                @csrf

                <label for="title">Title</label><br>
                <input type="text" name="title" class="form-control {{$errors->first('title') ? 'is-invalid' : ''}}" value="{{old('title')}}" placeholder="Book title">
                <div class="invalid-feedback">
                    {{$errors->first('title')}}
                </div>
                <br>

                <label for="cover">Cover</label>
                <input type="file" name="cover" class="form-control {{$errors->first('cover') ? 'is-invalid' : ''}}">
                <div class="invalid-feedback">
                    {{$errors->first('cover')}}
                </div>
                <br>

                <label for="description">Description</label><br>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control {{$errors->first('description') ? 'is-invalid' : ''}}" placeholder="Give a description about this book">{{old('description')}}</textarea>
                <div class="invalid-feedback">
                    {{$errors->first('description')}}
                </div>
                <br>

                <label for="categories">Categories</label>
                <select name="categories[]" id="categories" class="form-control" multiple></select>
                <br><br>

                <label for="stock">Stock</label><br>
                <input type="number" name="stock" id="stock" class="form-control {{$errors->first('stock') ? 'is-invalid' : ''}}" value="{{old('stock')}}" min=0 value=0>
                <div class="invalid-feedback">
                    {{$errors->first('stock')}}
                </div>
                <br>

                <label for="author">Author</label>
                <input type="text" name="author" id="author" class="form-control {{$errors->first('author') ? 'is-invalid' : ''}}" value="{{old('author')}}" placeholder="Book author">
                <div class="invalid-feedback">
                    {{$errors->first('author')}}
                </div>
                <br>

                <label for="publisher">Publisher</label><br>
                <input type="text" name="publisher" id="publisher" class="form-control {{$errors->first('publisher' ? 'is-invalid' : '')}}" value="{{old('publisher')}}" placeholder="Book publisher">
                <div class="invalid-feedback">
                    {{$errors->first('publisher')}}
                </div>
                <br>

                <label for="price">Price</label><br>
                <input type="number" name="price" id="price" class="form-control {{$errors->first('price') ? 'is-invalid' : ''}}" value="{{old('price')}}" placeholder="Book price">
                <div class="invalid-feedback">
                    {{$errors->first('price')}}
                </div>
                <br>

                <button class="btn btn-primary" name="save_action" value="PUBLISH">Publish</button>

                <button class="btn btn-secondary" name="save_action" value="DRAFT">Save as draft</button>
            </form>
        </div>
    </div>

@endsection

@section('footer-scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $('#categories').select2({
            ajax: {
                url: 'http://larashop.test:8000/ajax/categories/search',
                processResults: function(data) {
                    return {
                        results: data.map(function(item){
                            return {
                                id: item.id,
                                text: item.name
                            }
                        })
                    }
                }
            }
        });
    </script>
@endsection