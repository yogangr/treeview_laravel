<?php

namespace App\Http\Controllers;

use App\Models\DetailProfile;

use Illuminate\Http\Request;

class DetailProfileController extends Controller
{
    public function index()
    {
        return DetailProfile::all();
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $name = $user->name;
        $email = $user->email;

        $detailProfile = new DetailProfile();
        $detailProfile->name = $name;
        $detailProfile->email = $email;
        $detailProfile->fill($request->all());
        $detailProfile->save();

        return $detailProfile;
    }

    public function show(DetailProfile $detailProfile)
    {
        return $detailProfile;
    }

    public function update(Request $request, DetailProfile $detailProfile)
    {
        $detailProfile->fill($request->all());
        $detailProfile->save();

        return $detailProfile;
    }

    public function destroy(DetailProfile $detailProfile)
    {
        $detailProfile->delete();

        return response()->json(null, 204);
    }

    public function viewUpdate()
    {
        return view('content.profile');
    }
}
