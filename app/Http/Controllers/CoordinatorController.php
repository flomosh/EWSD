<?php

namespace App\Http\Controllers;
use App\Contribution;
use App\Faculty;
use App\User;
use Illuminate\Http\Request;

class CoordinatorController extends Controller
{
    public function review(Request $request, $id)
    {
        $contribution = contribution::find($id);
        $contribution->comment = $request->input('comment');
        $contribution->status = $request->input('status');
        $contribution->save();
        return redirect()->back();
    }
}
