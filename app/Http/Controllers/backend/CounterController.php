<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
public function index()
    {
        // ডাটাবেজ খালি থাকলে ৪টি ডিফল্ট রো তৈরি করে নিবে
        if (Counter::count() == 0) {
            $defaultData = [
                ['number' => '25', 'title_line_1' => 'Year', 'title_line_2' => 'Exciperince', 'is_active' => true],
                ['number' => '250', 'title_line_1' => 'Happy', 'title_line_2' => 'Customers', 'is_active' => false],
                ['number' => '2+', 'title_line_1' => 'Our', 'title_line_2' => 'Awards', 'is_active' => false],
                ['number' => '25', 'title_line_1' => 'Landscapeing', 'title_line_2' => 'Work done', 'is_active' => false],
            ];

            foreach ($defaultData as $data) {
                Counter::create($data);
            }
        }

        $counters = Counter::all();
        return view('backend.counter', compact('counters'));
    }

    public function update(Request $request)
    {
        // ফর্ম থেকে আসা প্রতিটা আইডির ডাটা লুপ করে আপডেট হবে
        foreach ($request->counters as $id => $data) {
            $counter = Counter::find($id);
            if ($counter) {
                $counter->update([
                    'number'       => $data['number'],
                    'title_line_1' => $data['title_line_1'],
                    'title_line_2' => $data['title_line_2'],
                    'is_active'    => isset($data['is_active']) ? true : false,
                ]);
            }
        }

        return redirect()->back()->with('success', 'All 4 Counter Columns Updated Successfully!');
    }
}