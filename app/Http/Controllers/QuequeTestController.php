<?php

namespace App\Http\Controllers;

use App\Jobs\Queue;
use App\Model\Test;
use Illuminate\Http\Request;

class QuequeTestController extends Controller
{
    public function index()
    {
        $data = Test::query()->get();
        foreach ($data as $item) {
            $this->dispatch(new Queue($item));
        }
        return true;
        //return response()->json(['code'=>0, 'msg'=>"success"]);
    }

}
