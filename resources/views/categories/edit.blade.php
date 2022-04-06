@extends("layouts.global")

@section("title") Edit Category @endsection

@section("content")

    @section("pageTitle") Edit Category @endsection

    <div class="col-md-8">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif        

        <form action="{{route('categories.update', [$category->id])}}" method="post" class="bg-white shadow-sm p-3" enctype="multipart/form-data">
            
            @csrf

            <input type="hidden" name="_method" value="put">

            <label>Category name</label>
            <input type="text" name="name" class="form-control {{$errors->first('name') ? 'is-invalid' : ''}}" value="{{old('name') ? old('name') : $category->name}}">
            <div class="invalid-feedback">
                {{$errors->first('name')}}
            </div>
            <br><br>

            <label>Category slug</label>
            <input type="text" name="slug" class="form-control {{$errors->first('slug') ? 'is-invalid' : ''}}" value="{{old('slug') ? old('slug') : $category->slug}}">
            <div class="invalid-feedback">
                {{$errors->first('slug')}}
            </div>
            <br><br>

            <label>Category image</label>
            @if($category->image)
                <span>Current image</span><br>
                <img src="{{asset('storage/' . $category->image)}}" width="120px">
                <br><br>
            @endif
            <input type="file" name="image" class="form-control {{$errors->first('image') ? 'is-invalid' : ''}}">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
            <div class="invalid-feedback">
                {{$errors->first('image')}}
            </div>
            <br><br>

            <input type="submit" value="Update" class="btn btn-primary">

        </form>
    </div>

@endsection