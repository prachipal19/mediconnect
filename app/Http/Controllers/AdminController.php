<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Schedule;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patientsCount = $this->getPatientsCount();
        $newBookingCount = $this->getNewBookingCount();
        $todaySessionsCount = $this->getTodaySessionsCount();
        $upcomingData = $this->getUpcomingAppointmentsAndSessions();
    
        return view('admin.index', [
            'doctorsCount' => Doctor::Count(),
            'patientsCount' => $patientsCount,
            'newBookingCount' => $newBookingCount,
            'todaySessionsCount' => $todaySessionsCount,
            'upcomingAppointments' => $upcomingData['upcomingAppointments'],
            'upcomingSessions' => $upcomingData['upcomingSessions'],
        ]);
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
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function getPatientsCount()
    {
        return Patient::count();
    }

    public function getNewBookingCount()
    {
        // Assuming new bookings are stored in the 'appointments' table
        return Appointment::whereDate('appointment_date', today())->count();
    }

    public function getTodaySessionsCount()
    {
        // Assuming today's sessions are stored in the 'schedules' table
        return Schedule::whereDate('schedule_date', today())->count();
    }


    public function getUpcomingAppointmentsAndSessions()
{
    $today = now()->toDateString();
    $nextWeek = now()->addWeek()->toDateString();

    $upcomingAppointments = Appointment::select(
        'appointments.appointment_number AS apponum',
        'patients.name AS pname',
        'doctors.name AS docname',
        'schedules.title',
        'schedules.schedule_date AS scheduledate',
        'schedules.schedule_time AS scheduletime'
    )
    ->join('schedules', 'schedules.id', '=', 'appointments.schedule_id')
    ->join('patients', 'patients.id', '=', 'appointments.patient_id')
    ->join('doctors', 'schedules.doctor_id', '=', 'doctors.id')
    ->where('schedules.schedule_date', '>=', $today)
    ->where('schedules.schedule_date', '<=', $nextWeek)
    ->orderBy('schedules.schedule_date', 'DESC')
    ->get();

    $upcomingSessions = Schedule::select(
        'schedules.title AS session_title',
        'doctors.name AS docname',
        'schedules.schedule_date AS scheduledate',
        'schedules.schedule_time AS scheduletime'
    )
    ->join('doctors', 'schedules.doctor_id', '=', 'doctors.id')
    ->where('schedules.schedule_date', '>=', $today)
    ->where('schedules.schedule_date', '<=', $nextWeek)
    ->orderBy('schedules.schedule_date', 'DESC')
    ->get();

    return [
        'upcomingAppointments' => $upcomingAppointments,
        'upcomingSessions' => $upcomingSessions,
    ];
}



}



