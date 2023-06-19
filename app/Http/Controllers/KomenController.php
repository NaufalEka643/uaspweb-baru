<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komen;
use Illuminate\Support\Facades\Auth;

class KomenController extends Controller
{
    public function store(Request $request)
    {
        $data = [
            'comment_body' => $request->comment_body,
            'artikel_id' => $request->artikel_id,
            'user_id' => Auth::id(),
        ];

        Komen::create($data);

        return redirect()->route('artikel.detail', $request->artikel_id);
    }

    public function delete($id)
    {
        $komen = Komen::where('id', $id)->delete();

        return redirect()->back();
    }
}
