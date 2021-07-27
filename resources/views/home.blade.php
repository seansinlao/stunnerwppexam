@extends('layouts.app')

@section('content')
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Songs</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Songs</li>
                        </ol>
                         @if(session('alert'))
                            <div class="alert alert-success alert-block">
                                @if(session('alert'))
                                    <strong>{{ session('alert') }}</strong>
                                @endif
                            </div>
                        @endif
                        <a href='{{ route('create_song') }}' class="btn btn-primary mb-3">+ Add Song</a>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Songs
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Artist</th>
                                            <th>Lyrics</th>
                                            <th>Start date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Artist</th>
                                            <th>Lyrics</th>
                                            <th>Start date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse($songs as $song)
                                        <tr>
                                            <td>{{$song->title}}</td>
                                            <td>{{$song->artist}}</td>
                                            <td>{{$song->lyrics}}</td>
                                            <td>{{$song->created_at}}</td>
                                            <td>
                                                <a href="{{route('edit_song',['song' => $song->id])}}" class="btn btn-secondary">
                                                    Edit
                                                </a>
                                                <form method="POST" action="{{route('delete_song',['song' => $song->id])}}">
                                                            @csrf
                                                            {{method_field('DELETE')}}
                                                            <button type="submit" class="btn btn-danger">
                                                                DELETE
                                                            </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                         <tr>
                                            EMPTY SONGS
                                         </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection



