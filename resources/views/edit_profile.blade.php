@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Édition profile de ')  }}{{$user -> name}}</div>

                <div class="card-body">
                     <form method="POST" action="{{ route('users.update', $user->id) }}">
                    
                        @method('PATCH')
                        @csrf
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Username</td>
                                    <td>Firstname</td>
                                    <td>Lastname</td>
                                    <td>Email</td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>{{$user -> id}}</td>
                                        <td><input type="text" class="form-control" name="name" value="{{$user -> name}}"></td>
                                        <td><input type="text" class="form-control" name="firstname" value="{{$user -> firstname}}"></td>
                                        <td><input type="text" class="form-control" name="lastname" value="{{$user -> lastname}}"></td>
                                        <td><input type="text" class="form-control" name="email" value="{{$user -> email}}"></td>
                                    </tr>
                            </tbody>
                            </table>
                            
                        <button type="submit" class="btn btn-primary">Valider</button>
                        
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Édition compétences de ')  }}{{$user -> name}}</div>

                <div class="card-body">
                    
                <form method="POST" action="{{ route('nouvelle_competence', $user_id=$user->id) }}" >
                    @method('PATCH')
                        
                    <table class="table">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Compétence</td>
                                <td>Niveau</td>
                                <td>Action</td>                                    
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($user->skills as $skill)

                                <tr>
                                    <td>{{$skill -> id}}</td>
                                    <td>{{$skill -> name}}</td>
                                    <td>{{$skill -> pivot-> level}}</td>
                                    <td><a href="{{route('edit_skill', [$user_id = $user->id, $skill_id = $skill->id]) }}" class="btn btn-primary">Modifier</a>

                                    <a href="{{route('delete_skill', [$user_id = $user->id, $skill_id= $skill->id]) }}" class="btn btn-primary">Supprimer</a></td>

                                </tr>

                            @endforeach

                            
                        
                        
                            <tr>
                    
                                    <td>Nouvelle compétence</td>
                                    <td><select class="form-control" name="skills" type="id">
                                        @foreach(App\Skill::all() as $skills)
                                        <option value="{{$skills->id}}">{{$skills->name}}</option>
                                        @endforeach
                                    </select></td>
                                    <td style="width : 5rem;"><input type="number" class="form-control" name="new_skill_lvl" value="Niveau compétence"></td>
                                    <td><button type="submit" class="btn btn-primary">Ajouter compétence</button></td>
                                    
                            </tr>  

                        
                        
                        
                        </tbody>
                        </table>
                        </form>
                        
                </div>
            </div>
        </div>
    </div>
</div>

@endsection