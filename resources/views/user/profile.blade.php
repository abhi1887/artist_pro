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

            {!! Form::open([
                'url' => route('profile.update', $user->id),
                'method' => 'post',
                'id' => 'profile',
                'role' => 'form',
                'class' => 'profile-form',
                'enctype' => 'multipart/form-data',
            ]) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', old('name', $user->name), ['class' => 'form-control', 'autocomplete' => 'off', 'disabled' => 'disabled']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', old('email', $user->email), ['class' => 'form-control', 'autocomplete' => 'off', 'disabled' => 'disabled']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('bio', 'User Bio') !!}
                    {!! Form::textarea('bio', old('bio', $user->bio), ['class' => 'form-control', 'autocomplete' => 'off', 'rows' => '4']) !!}
                    @if ($errors->has('bio'))
                        <div class="error-text">
                            {{ $errors->first('bio') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('image', 'User Image') !!}
                    {!! Form::file('image', ['class' => 'form-control']) !!}
                    @if ($errors->has('image'))
                        <div class="error-text">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                </div>

                @if (isset($user->id) && $user->image)
                    <div class="form-group">
                        {!! Form::image(asset('/user_images/' . $user->image), 'alt text', ['class' => 'image-item mt-3', 'width' => '200px', 'height' => '200px']) !!}
                    </div>
                @endif

                <div class="form-group">
                    {!! Form::submit(__('Update user'), ['class' => 'btn btn-primary']) !!}
                </div>
                
            {!! Form::close() !!}

        </div>
    </div>
@endsection
