@extends("layouts.global")

@section("title") Create User @endsection

@section("content")

@section("pageTitle") Create User @endsection

    <div class="col-md-8">

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('users.store') }}" method="post" class="bg-white shadow-sm p-3" enctype="multipart/form-data">
            @csrf

            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control {{$errors->first('name') ? 'is-invalid' : ''}}" value="{{old('name')}}" placeholder="Full Name">
            <div class="invalid-feedback">
                {{$errors->first('name')}}
            </div>
            <br>

            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control {{$errors->first('username') ? 'is-invalid' : ''}}" value="{{old('username')}}" placeholder="username">
            <div class="invalid-feedback">
                {{$errors->first('username')}}
            </div>
            <br>

            <label for="">Roles</label>
            <br>
            <input type="checkbox" name="roles[]" class="form-control {{$errors->first('roles') ? 'is-invalid' : ''}}" id="ADMIN" value="ADMIN">
            <label for="ADMIN">Administrator</label>

            <input type="checkbox" name="roles[]" class="form-control {{$errors->first('roles') ? 'is-invalid' : ''}}" id="STAFF" value="STAFF">
            <label for="STAFF">Staff</label>

            <input type="checkbox" name="roles[]" class="form-control {{$errors->first('roles') ? 'is-invalid' : ''}}" id="CUSTOMER" value="CUSTOMER">
            <label for="CUSTOMER">Customer</label>

            <div class="invalid-feedback">
                {{$errors->first('roles')}}
            </div>

            <br>
            <label for="phone">Phone number</label>
            <br>
            <input type="text" name="phone" class="form-control {{$errors->first('phone') ? 'is-invalid' : ''}}" value="{{old('phone')}}">
            <div class="invalid-feedback">
                {{$errors->first('phone')}}
            </div>

            <br>
            <label for="address">Address</label>
            <textarea name="address" class="form-control {{$errors->first('address') ? 'is-invalid' : ''}}" id="address" cols="30" rows="10">{{old('address')}}</textarea>
            <div class="invalid-feedback">
                {{$errors->first('address')}}
            </div>

            <br>
            <label for="avatar">Avatar image</label>
            <br>
            <input type="file" name="avatar" id="avatar" class="form-control {{$errors->first('avatar') ? 'is-invalid' : ''}}">
            <div class="invalid-feedback">
                {{$errors->first('avatar')}}
            </div>

            <hr class="my-3">

            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control {{$errors->first('email') ? 'is-invalid' : ''}}" placeholder="user@mail.com">
            <div class="invalid-feedback">
                {{$errors->first('email')}}
            </div>
            <br>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control {{$errors->first('password') ? 'is-invalid' : ''}}" placeholder="password">
            <div class="invalid-feedback">
                {{$errors->first('password')}}
            </div>
            <br>

            <label for="password_confirmation">Password confirmation</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control {{$errors->first('password_confirmation') ? 'is-invalid' : ''}}" placeholder="password confirmation">
            <div class="invalid-feedback">
                {{$errors->first('password_confirmation')}}
            </div>
            <br>

            <input type="submit" value="Save" class="btn btn-primary">
        </form>
    </div>

@endsection