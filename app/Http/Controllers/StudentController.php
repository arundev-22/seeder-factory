<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function home()
    {
        $students = Student::all();
        return view('pages.index', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'marks' => 'required',
        ]);
        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'marks' => $request->marks,
        ]);

        return redirect('/')->with('success', 'New Student created Successfully');
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'marks' => 'required',
        ]);
        $student->update($request->all());
        return redirect('/')->with('success', 'Student Data Update successfully');
    }

    public function delete(Student $student)
    {
        $student->delete();
        return redirect('/')->with('success', 'This User Delete successfully');
    }

    public function product()
    {
        // $products = Product::all();
        // $products = DB::table('products')->paginate(10);
        $products = Product::oldest()->first()->paginate(10);
        return view('pages.product', compact('products'));
    }
}
