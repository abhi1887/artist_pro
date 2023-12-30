@extends('layouts.app')
@section('content')
   
    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-3">
        <h1 class="h3 mb-0 text-gray-800"> Edit Profile </h1>
    </div>

    <div class="card push-top m-3">
        <div class="card-header">
            Profile Details
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('profile.update', $user->id) }}" autocomplete="off"
                enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" autocomplete="off" name="name" disabled 
                        value="{{ old('name', $user->name) }}" />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" autocomplete="off" name="email" disabled 
                        value="{{ old('email', $user->email) }}" />
                </div>
                <div class="form-group">
                    <label for="bio">User Bio</label>
                    <textarea class="form-control" autocomplete="off" rows="4" name="bio" required>{{ old('bio', $user->bio) }} </textarea>
                    @if ($errors->has('bio'))
                        <div class="error-text">
                            {{ $errors->first('bio') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="image">User Image</label>
                    <input type="file" class="form-control" autocomplete="off" name="image" />
                    @if ($errors->has('image'))
                        <div class="error-text">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                    @if (isset($user->id) && $user->image)
                        <img src="{{ asset('/user_images/' . $user->image) }}" alt="{{ $user->image }}" class="image-item mt-3" width="200px" height="200px">
                    @endif
                </div>
                <button type="submit"
                    class="btn btn-primary">{{ __('Update user') }}</button>
            </form>
        </div>
    </div>
@endsection
