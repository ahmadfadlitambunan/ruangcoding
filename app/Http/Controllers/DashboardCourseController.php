<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.courses.index', [
            'courses' => Course::all()
        ]);
        /*
            SELECET * FORM courses;
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.courses.create', [
            'courses' => Course::all()
        ]);
         /*
            SELECET * FORM courses;
        */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:courses',
            'desc' => 'required',
            'image' => 'required|image|file|max:2000'
        ]);
        
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('course-images');
        }

        $validatedData['desc'] = strip_tags($request->desc);
        Course::create($validatedData);

        /*
        INSERT INTO `courses` (`name`, `DESC`, `image`) VALUES (
                $validatedData->name,
                $validatedData->desc,
                $validatedData->image
                )
        */

        return redirect('/dashboard/courses')->with('success', "Kelas Baru Telah Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('dashboard.courses.show', [
            'course' => $course
        ]);
        /*
        SELECT * FROM `courses` WHERE `id` = int LIMIT 1
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('dashboard.courses.edit', [
            'course' => $course,
            'courses' => Course::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $rules = [
            'desc' => 'required',
            'image' => 'image|file|max:2000'
        ];

        if($request->name != $course->name) {
            $rules['name'] = 'required|max:255|unique:courses';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('course-images');
        }

        $validatedData['desc'] = strip_tags($request->desc);
        
        Course::where('id', $course->id)
            ->update($validatedData);

        /*
            UPDATE `courses` SET 
                `DESC` =  $validatedData->desc
                `image` = $validatedData->image 
                WHERE `id` = 7
        */
        return redirect('/dashboard/courses')->with('success', "Kelas Telah Diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        if($course->image) {
            Storage::delete($course->image);
        }
        Course::destroy($course->id);
        return redirect('/dashboard/courses')->with('success', "Kelas Telah Berhasil Dihapus");
    }
}
