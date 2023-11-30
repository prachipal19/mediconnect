<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Doctor;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::with('doctor')->get();
        $doctors = Doctor::all();
    
        return view('admin.schedule', [
            'scheduleCount' => $schedules->count(),
            'schedules' => $schedules, // Update the variable name here
            'doctors' => $doctors,     // Also passing the doctors to the view
        ]);
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = Doctor::all(); 
        return view('admin.create_session',compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date',
            'time' => 'required',
            'nop' => 'required|numeric',
        ]);
    
        // Create a new schedule instance
        $schedule = new Schedule();
        $schedule->title = $validatedData['title'];
        $schedule->doctor_id = $validatedData['doctor_id'];
        $schedule->schedule_date = $validatedData['date'];
        $schedule->schedule_time = $validatedData['time'];
        $schedule->number_of_patients = $validatedData['nop'];
    
        // Save the schedule to the database
        $schedule->save();
    
        return 'Session added successfully!';
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect('adminschedule')->with('success', 'Doctor deleted successfully!');
    }


    
}
