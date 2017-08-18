<?php
/**
 * Created by PhpStorm.
 * User: Yerman
 * Date: 17.08.2017
 * Time: 20:03
 */

namespace App\Http\Controllers\Api\v1;

use App\Models\Box;
use App\Models\Day;

class BoxesController extends ApiController
{
    public function run(){

        $data = Box::orderBy('id', 'ASC')->get();

        foreach ($data as $item) {
            if ($item->sum > 1) {
                $item->sum = $item->sum + 1;
                $item->save();
            }
        }

        foreach ($data as $item) {
            if ($item->sum < 2) {
                $max = Box::max('sum');
                $max_r = Box::where('sum',$max)->first();

                $max_r->sum = $max_r->sum - 1;
                $max_r->save();

                $item->sum = $item->sum + 1;
                $item->save();
            }
        }


        $data = Box::orderBy('id', 'ASC')->get();

        $this->response = $data;
        return $this->sendResponse();
    }

    public function incrementDay()
    {
        $day = Day::first();
        $day->value = $day->value + 1;
        $day->save();

        if ($day->value % 10 == 0) {
            $index = rand(1,4);
            $box = Box::where('id',$index)->first();
            $box->sum = $box->sum - 1;
            $box->save();
        }

        $this->response = $day->value;
        return $this->sendResponse();
    }

    public function getDay()
    {
        $day = Day::first();

        $this->response = $day->value;
        return $this->sendResponse();
    }

    public function getAll()
    {
        $all = Box::sum('sum');

        $this->response = $all;
        return $this->sendResponse();
    }

    public function getMax()
    {
        $max = Box::max('sum');
        $max_r = Box::where('sum',$max)->first();

        $this->response = $max_r->id;
        return $this->sendResponse();
    }

    public function getMin()
    {
        $min = Box::min('sum');
        $min_r = Box::where('sum',$min)->first();

        $this->response = $min_r->id;
        return $this->sendResponse();
    }

    public function stop()
    {
        $data = Box::orderBy('id', 'ASC')->get();

        $this->response = $data;
        return $this->sendResponse();
    }

    public function reset()
    {
        $day = Day::first();
        $day->value = 0;
        $day->save();


        $initial = 10;

        $boxes[0] = $boxes[1] = $boxes[2] = $boxes[3] = 1;
        $initial = $initial - 4;

        while($initial > 0)
        {
            $index = rand(0,3);
            if($boxes[$index] < 7) {
                $boxes[$index]++;
                --$initial;
            }
        }

        $data = Box::orderBy('id', 'ASC')->get();

        foreach ($data as $item) {
            $item->sum = $boxes[$item->id-1];
            $item->save();
        }

        $this->response = $data;
        return $this->sendResponse();
    }
}