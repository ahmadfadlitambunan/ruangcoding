<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Course;
use Illuminate\Http\Request;

class DashboardPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.plans.index', [
            'plans' => Plan::all()
        ]);
        /*
            SELECT * FROM `plans`;
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.plans.create', [
            'courses' => Course::all()
        ]);
        /*
            SELECT * FROM `courses`
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
        $request->validate([
            'name' => 'required|max:255',
            'desc' => 'required',
            'price' => 'required|min:5',
            'durationMany' => 'required|max:2',
            'durationInform' => 'required'
        ]);

        $request['desc'] = strip_tags($request->desc);
        $request['duration'] = $request['durationMany'] . " ". $request['durationInform'] ;
        $result = Plan::create($request->except('courses', 'durationMany', 'durationInform'));

        /*
            INSERT INTO `plans` (`name`, `DESC`, `price`, `duration`) VALUES (
                                $request->name, 
                                $request->desc, 
                                $request->price, 
                                $request->duration         
                        );
        */

        foreach($request->courses as $course_id) :
            \DB::table('course_plan')->insert([
                'plan_id' => $result->id,
                'course_id' => $course_id,
            ]);

            /*
                INSERT INTO `course_plan` (`plan_id`, `course_id`) VALUES ($result->id, $course->id);
            */
        endforeach;
        
        return redirect('/dashboard/plans')->with('success', "Rencana Baru Telah Ditambahkan");
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        /*
            SELECT * FROM `plans` WHERE `id` = $plan->id LIMIT 1
        */
        return view('dashboard.plans.show', [
            'plan' => $plan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        $explode = explode(" ", $plan->duration);
        return view('dashboard.plans.edit', [
            'plan' => $plan,
            'courses' => Course::all(),
            'durationMany' => $explode[0],
            'durationInform' => $explode[1],
        ]);
        /*
            SELECT * FROM `plans` WHERE `id` = $plan->id LIMIT 1
            SELECT * FROM `courses`
        */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        $request->validate([
            'name' => 'required|max:255',
            'desc' => 'required',
            'price' => 'required|min:5',
            'durationMany' => 'required|max:2',
            'durationInform' => 'required'
        ]);

        $request['duration'] = $request['durationMany'] . " ". $request['durationInform'] ;
        Plan::where('id', $plan->id)->update($request->except('courses', 'durationMany', 'durationInform', '_method', '_token'));
        /*
            UPDATE `plans` SET 
                    `name` = $request->name, 
                    `DESC` = $request->desc, 
                    `price` = $request->price, 
                    `duration` = $request->duration,, 
                WHERE `id` = $plan->id
        */

        \DB::table('course_plan')->where('plan_id', $plan->id)->delete();
        foreach($request->courses as $course_id) :
            \DB::table('course_plan')->insert([
                'plan_id' => $plan->id,
                'course_id' => $course_id,
            ]);
        endforeach;
        
        return redirect('/dashboard/plans')->with('success', "Rencana Telah Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        Plan::destroy($plan->id);
        return redirect('/dashboard/plans')->with('success', "Rencana Telah Berhasil Dihapus");
        /*
            SELECT * FROM `plans` WHERE `id` = $plan->id LIMIT 1
            DELETE FROM `plans` WHERE `id` = $plan->id
        */
    }
}
