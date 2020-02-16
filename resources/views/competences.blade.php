@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header">Liste des compétence</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @foreach(App\Skill::all() as $skills)

                        <div class="card " >
                            <div class="card-header">
                                   <a href="">{{$skills -> name}}</a>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                
                                
                                <table style="width : 50rem">
                                <thead>
                                    <tr>
                                        <td>Utilisateurs</td>
                                        <td>Niveau</td>
                                        


                                    </tr>
                                    <tr>
                                        <td><p>__________________</p></td>
                                        </tr>
                                </thead>
                                <tbody>
                                @foreach($skills->users as $user)

                                <tr>
                                    <td style="width : 45rem"><a href="{{route('selected_profile', $user->id)}}">{{$user->name}}</a></td>
                                    <td >{{$user->pivot->level}}</td>
                                    @endforeach
                                </tr>
                                </tbody>
                                </table>
                                

                                </p>
                            </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection