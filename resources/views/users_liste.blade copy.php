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
                        <table class="table" >
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Username</td>
                                    <td>Firstname</td>
                                    <td>Lastname</td>
                                    <td>Email</td>

                                    @for($i=0; $i < 4; $i++)

                                    <td>Compétence </td>
                                    @endfor
                                    
                                    <td>Modifier</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user -> id}}</td>
                                        <td>{{$user -> name}}</td>
                                        <td>{{$user -> firstname}}</td>
                                        <td>{{$user -> lastname}}</td>
                                        <td>{{$user -> email}}</td>
                                        @for($i=0; $i < 4; $i++)
                                            @if($user->skills[$i]==null)
                                            <td> LVL : / </td>

                                            @else

                                            <td>{{$user->skills[$i] -> name}} -> LVL : {{$user->skills[$i] -> pivot -> level}}</td>
                                           @endif
                                        @endfor
                                        
                                        <td><a href="{{route('users.edit', $user->id) }}">Modifier</a></td>

                                    </tr>
                                    @endforeach

                            </tbody>
                            </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection