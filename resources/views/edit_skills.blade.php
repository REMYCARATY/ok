@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card" style="width : 40rem;">
                <div class="card-header">{{ __('Édition compétences de ')  }}{{$user -> name}}</div>

                <div class="card-body">
                     <form method="POST" action="{{ route('skill_update', [$user->id, $skill_id]) }}">
                    
                        @method('PATCH')
                        @csrf

                        <table class="table">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Compétence</td>
                                    <td>Niveau</td>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>

                                {{$user->skills()->find($skill_id) -> name}} {{$user->skills()->find($skill_id) -> pivot ->level}}
                                    <tr>
                                        
                                        <td style="width : 10rem;">{{$user->skills()->find($skill_id) -> id}}</td>
                                        <td style="width : 10rem;">{{$user->skills()->find($skill_id) -> name}}</td>
                                        <td style="width : 10rem;"><input type="number" class="form-control" name="level" value="{{$user->skills()->find($skill_id) -> pivot-> level}}"></td>

                                       

                                    </tr>


                            </tbody>
                            
                        </table>
                               

                            

                        
                        <button type="submit" class="btn btn-primary">Valider</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection