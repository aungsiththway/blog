<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // dd($request);
        
        $users = User::create($request->all());


        //file upload
        $file_name = time() . '.' . $request->profile->extension(); //28971491827.jpg

        //folder ထဲကို upload လုပ်မယ်
        $upload = $request->profile->move(public_path('images/profiles/'), $file_name);

        if ($upload){
            $users->profile = "/images/profiles/" . $file_name;
        }
        $users->password =Hash::make($request->password);
        
        $users->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $user = User::find($id);
        $user->update($request->all());

        if ($request->hasFile('profile')) {
            $file_name = time() . '.' . $request->profile->extension(); //28971491827.jpg

            //folder ထဲကို upload လုပ်မယ်
            $upload = $request->profile->move(public_path('images/users/'), $file_name);

            if ($upload) {
                $user->profile = "/images/users/" . $file_name;
            }
        }else {
            $user->profile = $request->old_profile;
        }

        $user->save();
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
