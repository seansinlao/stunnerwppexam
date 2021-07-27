@extends('layouts.app')

@section('content')
    @if(session('alert'))
        <div class="alert alert-success alert-block">
             @if(session('alert'))
                <strong>{{ session('alert') }} HAHAHAHAH</strong>
            @endif
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">{{  isset($song) ? __('Update Song') : __('Create Song')}}</h3></div>
                    <div class="card-body">
                       <form method="POST" action="{{ isset($song) ? route('update_song',['song' => $song->id]) : route('save_song') }}">
                       @csrf
                       {{method_field($method)}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="title" name='title' type="text" placeholder="Song Title" value="{{isset($song) ? $song->title : ''}}" required/>
                                        <label for="title">Song Title</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" id="artist" name='artist' type="text" placeholder="Artist" value="{{isset($song) ? $song->artist : ''}}" required />
                                        <label for="artist">Artist</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="lyrics" name="lyrics" placeholder="Lyrics" required>{{isset($song) ? $song->lyrics : ''}}</textarea>
                                <label for="lyrics">Lyrics</label>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



