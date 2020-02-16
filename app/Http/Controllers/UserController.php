<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Skill;
use DB;


class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        $skills=$users->skills();

        return view('index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user =User::find($id);
        $skills = $user->skills;
        return view('edit_profile',[
            'skills'=>$skills,
            'users'=>$user
        ], compact('user', 'skills'));
    }


    public function edit_skill($user_id, $skill_id)
    {
        $user =User::find($user_id);
        $skills = $user->skills;
        return view('edit_skills',[
            'skills'=>$skills,
            'users'=>$user,
            'user_id'=>$user_id,
            'skill_id'=>$skill_id
        ], compact('user', 'skills' ));
    }








    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request ->validate([
            'name'=>'required',
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
        ]);

        $user= User::find($id);
        $skills= $user->skills;
        $user->name=$request->get('name');
        $user->firstname=$request->get('firstname');
        $user->lastname=$request->get('lastname');
        $user->email=$request->get('email');
   
        // $user->skills[0]->pivot->level = $request->get('skill0');      
        // $user->skills[1]->pivot->level = $request->get('skill1');
        // $user->skills[2]->pivot->level = $request->get('skill2');
        // $user->skills[3]->pivot->level = $request->get('skill3');
        // $user->skills[0]->pivot->save();
        // $user->skills[1]->pivot->save();
        // $user->skills[2]->pivot->save();
        // $user->skills[3]->pivot->save();
        $user->save();


        return view('profile', compact('user'));
    }

    public function update_liste(Request $request, $id)
    {
        $request ->validate([
            'name'=>'required',
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
        ]);

        $user= User::find($id);
        $user->name=$request->get('name');
        $user->firstname=$request->get('firstname');
        $user->lastname=$request->get('lastname');
        $user->email=$request->get('email');

        $user->save();
        
        return view('users', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function user_profile(){
        $users=auth()->user();
        $skills=$users->skills();
        return view('profile', [
        'user'=>$users,
        'skills'=>$skills
    ]);
    }

    public function selected_profile($id){
        $users=User::find($id);
        $skills=$users->skills();
        return view('profile', [
        'user'=>$users,
        'skills'=>$skills
    ]);
    }

    public function users_liste()
    {
        $users=User::all();
        return view('users_liste', [
        'users'=>$users
    ]);
    }

    public  function skill_update(Request $request, $id,$skill_id)
    {

        $user=User::find($id);
        

            // $user->skills()->attach($skills->id, ['level' => 1]);
        
        $user->skills()->find($skill_id) ->pivot->update(['level' => $request->get('level')]);      
        

        

        return view('profile', compact('user'));
        
    }


    public  function nouvelle_competence(Request $req, $user_id)
    {
        
        
       

        //  $request ->validate([
        // //     'new_skill_name'=>'required',
        //      'new_skill_level'=>'required',

            
        //  ]);

        //  $user=User::find($user_id);
        //  $skill_id = $request->input('skills');


        //  $user->skills()->find($skill_id) -> pivot -> update(['level'=>$request->get('new_skill_lvl')]);

         return view('profile', compact('user_id'));

        // return view('profile');

    }


    public  function delete_skill($user_id,$skill_id)
    {
        $user=User::find($user_id);

        // $skill=$user->skills->where('id', $skill_id);
        $user->skills()->find($skill_id)->pivot->delete();
        return view('profile', compact('user'));





    }




}