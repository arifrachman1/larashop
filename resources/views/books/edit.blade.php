@extends('layouts.global')

@section('title') Edit Book @endsection

@section('content')
    @section('pageTitle') Edit Book @endsection

    <div class="row">
        <div class="col-md-8">

            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif

            <form action="{{route('books.update', [$book->id])}}" class="p-3 shadow-sm bg-white" method="post" enctype="multipart/form-data">
            @csrf

                <input type="hidden" name="_method" value="PUT">
            
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control {{$errors->first('title') ? 'is-invalid' : ''}}" value="{{old('title') ? old('title') : $book->title}}" placeholder="Book title">
                <div class="invalid-feedback">
                    {{$errors->first('title')}}
                </div>
                <br>

                <label for="cover">Cover</label><br>
                <small class="text-muted">Current cover</small><br>
                @if($book->cover)
                    <img src="{{asset('storage/' . $book->cover)}}" width="96px">
                @endif
                <br><br>
                <input type="file" name="cover" class="form-control {{$errors->first('cover') ? 'is-invalid' : ''}}">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah cover</small>
                <div class="invalid-feedback">
                    {{$errors->first('cover')}}
                </div>
                <br><br>

                <label for="slug">Slug</label><br>
                <input type="text" name="slug" class="form-control {{$errors->first('slug') ? 'is-invalid' : ''}}" value="{{old('slug') ? old('slug') : $book->slug}}" placeholder="enter-a-slug">
                <div class="invalid-feedback">
                    {{$errors->first('slug')}}
                </div>
                <br>

                <label for="description">Description</label><br>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control {{$errors->first('description') ? 'is-invalid' : ''}}">{{old('description') ? old('description') : $book->description}}</textarea>
                <div class="invalid-feedback">
                    {{$errors->first('description')}}
                </div>
                <br>

                <label for="categories">Categories</label>
                <select name="categories[]" id="categories" class="form-control" multiple></select>
                <br><br>

                <label for="stock">Stock</label><br>
                <input type="text" name="stock" id="stock" class="form-control {{$errors->first('stock') ? 'is-invalid' : ''}}" value="{{old('stock') ? old('stock') : $book->stock}}" placeholder="Stock">
                <div class="invalid-feedback">
                    {{$errors->first('stock')}}
                </div>
                <br>

                <label for="author">Author</label>
                <input type="text" name="author" id="author" class="form-control {{$errors->first('author') ? 'is-invalid' : ''}}" value="{{old('author') ? old('author') : $book->author}}" placeholder="Author">
                <div class="invalid-feedback">
                    {{$errors->first('author')}}
                </div>
                <br>

                <label for="publisher">Publisher</label>
                <input type="text" name="publisher" id="publisher" class="form-control {{$errors->first('publisher') ? 'is-invalid' : ''}}" value="{{old('publisher') ? old('publisher') : $book->publisher}}" placeholder="Publisher">
                <div class="invalid-feedback">
                    {{$errors->first('publisher')}}
                </div>
                <br>

                <label for="price">Price</label>
                <input type="text" name="price" id="price" class="form-control {{$errors->first('price') ? 'is-invalid' : ''}}" value="{{old('price') ? old('price') : $book->price}}" placeholder="Price">
                <div class="invalid-feedback">
                    {{$errors->first('price')}}
                </div>
                <br>

                <label for="">Status</label>
                <select name="status" id="status" class="form-control {{$errors->first('status') ? 'is-invalid' : ''}}">
                    <option value="PUBLISH" {{$book->status == 'PUBLISH' ? 'selected' : ''}}>PUBLISH</option>
                    <option value="DRAFT" {{$book->status == 'DRAFT' ? 'selected' : ''}}>DRAFT</option>
                </select>
                <div class="invalid-feedback">
                    {{$errors->first('status')}}
                </div>
                <br>

                <button class="btn btn-primary" value="PUBLISH">Update</button>

            </form>
        </div>
    </div>
@endsection

@section('footer-scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"></link>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $('#categories').select2({
            ajax: {
                url: 'http://larashop.test:8000/ajax/categories/search',
                processResults: function(data) {
                    return {
                        results: data.map(function(item) {
                            return { id: item.id, text: item.name }
                        })
                    }
                }
            }
        });

        var categories = {!! $book->categories !!};

        categories.forEach(function(category) {
            var option = new Option(category.name, category.id, true, true);
            $('#categories').append(option).trigger('change');
        });
    </script>
@endsection