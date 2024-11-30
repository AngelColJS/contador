<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function showCounter()
    {
        $counter = session('counter', 0);
        return view('counter', compact('counter'));
    }

    public function increment(Request $request)
    {
        $counter = session('counter', 0);
        if ($counter < 25) {
            $counter++;
            session(['counter' => $counter]);
        }
        return response()->json(['counter' => $counter]);
    }

    public function decrement(Request $request)
    {
        $counter = session('counter', 0);
        if ($counter > -25) {
            $counter--;
            session(['counter' => $counter]);
        }
        return response()->json(['counter' => $counter]);
    }
}
