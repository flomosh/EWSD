<?php

namespace App\Http\Controllers;

use App\Contribution;
use App\Faculty;
use App\User;
use Illuminate\Http\Request;

class SuperController extends Controller
{
    public function role(Request $request, $id)
    {
        $user = user::find($id);
        $user->type = $request->input('role');
        $user->save();
        return redirect()->back();
    }

    public function faculty(Request $request)
    {
        $faculty = new faculty();
        $faculty->faculty_name = $request->input('name');
        $faculty->save();
        return redirect()->back();
    }
}
