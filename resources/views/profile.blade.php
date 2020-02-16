@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-16">
                <div class="card">
                    <div class="card-header">Profile de {{$user -> name}} </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @csrf
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Username</td>
                                    <td>Firstname</td>
                                    <td>Lastname</td>
                                    <td>Email</td>
                                    <td><a href="{{route('users.edit', $user->id) }}" class="btn btn-primary">Éditer profile</a></td>

                                </tr>
                            </thead>
                            <tbody>
                                
                                    <tr>
                                        <td>{{$user -> id}}</td>
                                        <td>{{$user -> name}}</td>
                                        <td>{{$user -> firstname}}</td>
                                        <td>{{$user -> lastname}}</td>
                                        <td>{{$user -> email}}</td>
                                        

                                    </tr>
                            </tbody>
                            </table>

                            <div class="card">
                            
                            <div class="card-body">
                                <p class="card-text">
                                
                                @foreach($user->skills as $skill)

                                {{$skill -> name}} {{$skill -> pivot ->level}}


                                @endforeach

                                </p>
                            </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection