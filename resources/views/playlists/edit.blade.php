@extends('layouts.master')

@section('title')
Editar playlist {{$playlist->name}}
@endsection

@section('content')
    <div class="container">
        <h2>Editar {{$playlist->name}}</h2>
    </div>
    <div class="container">
        {{-- boton para ocultar--}}
        <div class="btn-group" role="group">
        @if ($playlist->public)

            <form method="POST"
            action="{{action('PlaylistsController@hide',['user'=>$user,'playlist'=>$playlist]) }}">
                @method('PATCH')
                @csrf
                        <button type="submit" class="btn btn-light">
                            {{ __('Ocultar') }}
                        </button>
            </form>
        @endif
        <form method="POST" action="{{url('playlists',$playlist->id)}}">
                @method("DELETE")
                @csrf
                        <button type="submit" class="btn btn-danger">
                                {{ __('Eliminar') }}
                        </button>
            </form>
        </div>
        {{--formulario para edicion--}}
        <form method="POST" action="{{ url($user->id,$playlist->id) }}">
            @method("PATCH")
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? 'is-invalid' : '' }}"
                    name="name" value="{{ $playlist->name }}" required autofocus>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>
                <div class="col-md-6">
                    <textarea id="description" type="text-field" class="form-control text-align-left"
                    rows="3" name="description">@if ($errors->any()){{old('description')}}@else{{$playlist->description}}@endif</textarea>
                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-light">
                        {{ __('Guardar') }}
                    </button>
                </div>
            </div>
        </form><!-- form para editar-->
        {{-- boton para eliminar--}}

        @include('errors')
    </div>
@endsection
