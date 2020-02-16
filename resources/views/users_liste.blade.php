@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header">Liste utilisateurs</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @foreach($users as $user)

                        <div class="card">
                            <div class="card-header">
                                   <a href="{{route('selected_profile', $user->id)}}">{{$user -> name}}</a>
                            </div>
                            <div class="card-body">
                                <p class="card-text" style="width : 30rem;">
                                
                                @foreach($user->skills as $skill)

                                {{$skill -> name}} {{$skill -> pivot ->level}}


                                @endforeach

                                </p>
                                <a href="{{route('users.edit', $user->id) }}" class="btn btn-primary">Editer Profile</a>
                            </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection