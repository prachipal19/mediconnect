<?php

namespace App\Http\Controllers;

use App\Models\Appointment;

use App\Models\Schedule;

use App\Models\Patient;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::with('schedule','patient')->get();
        $schedules = Schedule::all();
        $patients = Patient::all();
        return view('admin.appointment', [
            'appointmentCount' => $appointments->count(),
            'patients' => $patients, 
            'schedules' => $schedules,   
            'appointments' => $appointments,   
        ]);
    }


    public function bookAppointment(Request $request)
    {
       // Retrieve the schedule_id and patient_id from the form submission
    $scheduleId = $request->input('schedule_id');
    $patientId = $request->input('patient_id');

    // Create a new appointment record in the database
    $appointment = new Appointment();
    $appointment->schedule_id = $scheduleId;
    $appointment->patient_id = $patientId; // Set the patient ID associated with this appointment

    $appointment->appointment_date = now(); // Set the appointment date/time as needed
    $appointment->save();
    $appointment->appointment_number = $appointment->id;
    $appointment->save();

    // Redirect back or return a success response
    return redirect()->back()->with('success', 'Appointment booked successfully!');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect('adminappointment')->with('success', 'Appointment deleted successfully!');
    }
}
