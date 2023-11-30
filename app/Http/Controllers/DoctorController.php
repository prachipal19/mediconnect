<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Speciality;
use App\Models\Appointment;
use App\Models\Webuser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $doctors = Doctor::with('specialty')->get();
        
        return view('admin.doctors', [
            'doctorscount' => $doctors->count(),
            'doctors' => $doctors,
        ]);
    }

    public function doctorIndex()
    {
      
        $doctorEmail = request()->get('email');
    $doctor = Doctor::where('email', $doctorEmail)->first(); // Retrieve the doctor by email

    if ($doctor) {
        $schedules = $doctor->schedules; 
        $todaySessionsCount = $this->getTodaySessionsCount();
        $data = [
            'doctor'=> $doctor,
            'schedules' => $schedules ,
            'todaySessionsCount' => $todaySessionsCount,
        ];

        return view('doctor.index', $data)->with('menu', 'doctor.menu')->with('appointment', 'doctor.appointment');

    }
    }

    public function doctorSettings()
    {
      
        $doctorEmail = request()->get('email');
    $doctor = Doctor::where('email', $doctorEmail)->first(); // Retrieve the doctor by email

    if ($doctor) {
        $schedules = $doctor->schedules; 
        $todaySessionsCount = $this->getTodaySessionsCount();
        $data = [
            'doctor'=> $doctor,
            'schedules' => $schedules ,
            'todaySessionsCount' => $todaySessionsCount,
        ];

        return view('doctor.settings', $data)->with('menu', 'doctor.menu')->with('appointment', 'doctor.appointment');

    }
    }

    public function doctorPatients()
    {
        $doctorEmail = request()->get('email');
        $doctor = Doctor::where('email', $doctorEmail)->first(); // Retrieve the doctor by email
    
        if ($doctor) {
           
            $appointments = Appointment::with('schedule', 'patient')
                ->whereHas('schedule', function ($query) use ($doctor) {
                    $query->where('doctor_id', $doctor->id);
                })
                ->get();
    
                $patientCount = $appointments->unique('patient_id')->count();
    
            $data = [
                'patientCount' => $patientCount,
                'appointments' => $appointments,
                'doctor' => $doctor,
         
            ];
    
            return view('doctor.patients', $data);
        }
    }

    public function doctorSchedule()
    {
      
        $doctorEmail = request()->get('email');
    $doctor = Doctor::where('email', $doctorEmail)->first(); // Retrieve the doctor by email

    if ($doctor) {
        $schedules = $doctor->schedules; 
        $todaySessionsCount = $this->getTodaySessionsCount();
        $data = [
            'schedulecount' => $schedules->count(),
            'doctor'=> $doctor,
            'schedules' => $schedules ,
            'todaySessionsCount' => $todaySessionsCount,
        ];

        return view('doctor.schedule', $data);

    }
    }


    public function doctorAppointment()
    {
        $doctorEmail = request()->get('email');
        $doctor = Doctor::where('email', $doctorEmail)->first(); // Retrieve the doctor by email
    
        if ($doctor) {
            $appointments = Appointment::with('schedule', 'patient')
                ->whereHas('schedule', function ($query) use ($doctor) {
                    $query->where('doctor_id', $doctor->id);
                })
                ->get();
    
            $schedules = $doctor->schedules;
            $todaySessionsCount = $this->getTodaySessionsCount();
    
            $data = [
                'schedules' => $schedules,
                'appointments' => $appointments,
                'doctor' => $doctor,
                'todaySessionsCount' => $todaySessionsCount,
            ];
    
            return view('doctor.appointment', $data);
        }
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specialties = Speciality::all(); 
        return view('admin.create_doctor',compact('specialties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nic' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email',
            'telephone' => 'required|string|max:20',
            'password' => 'required|string|min:6',
            'confirm_password' => 'same:password',
            'specialty_id' => 'required|exists:specialties,id',
        ]);
    
        // Create a new Doctor instance and assign validated data
        $doctor = new Doctor();
        $doctor->name = $validatedData['name'];
        $doctor->nic = $validatedData['nic'];
        $doctor->email = $validatedData['email'];
        $doctor->telephone = $validatedData['telephone'];
        $doctor->password = Hash::make($validatedData['password']); 
        $doctor->specialty_id = $validatedData['specialty_id'];
    
        $doctor->save();
    
        // Create a new User instance for the doctor in the 'webusers' table
        Webuser::create([
            'email' => $doctor->email,
            'password' =>  $doctor->password,
            'user_type' => 'd', // Set user_type for doctors
        ]);
    
        return 'Doctor added successfully!';
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return view('admin.view_doctor', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        $specialties = Speciality::all(); 
        return view('admin.edit_doctor', compact('doctor', 'specialties'));
    }

    public function editdoc(Doctor $doctor)
    {
        $specialties = Speciality::all(); 
        return view('doctor.edit_doctor', compact('doctor', 'specialties'));
    }

    /**
     * Update the specified resource in storage.
     */

public function update(Request $request, Doctor $doctor)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'nic' => 'required|string|max:255',
        'email' => 'required|email|unique:doctors,email,' . $doctor->id,
        'telephone' => 'required|string|max:20',
        'password' => 'nullable|string|min:6',
        'confirm_password' => 'same:password',
        'specialty_id' => 'required|exists:specialties,id',
    ]);

    // Update Doctor model with validated data
    $doctor->name = $validatedData['name'];
    $doctor->nic = $validatedData['nic'];
    $doctor->email = $validatedData['email'];
    $doctor->telephone = $validatedData['telephone'];

    // Update password only if provided
    if ($validatedData['password']) {
        $doctor->password = $validatedData['password']; 
    }

    // Update specialty only if a new value is selected
    if ($request->has('specialty_id')) {
        $doctor->specialty_id = $validatedData['specialty_id'];
    }

    $doctor->save();
    return ('Doctor updated successfully!');
}


public function updatedoc(Request $request, Doctor $doctor)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'nic' => 'required|string|max:255',
        'email' => 'required|email|unique:doctors,email,' . $doctor->id,
        'telephone' => 'required|string|max:20',
        'password' => 'nullable|string|min:6',
        'confirm_password' => 'same:password',
        'specialty_id' => 'required|exists:specialties,id',
    ]);

    // Update Doctor model with validated data
    $doctor->name = $validatedData['name'];
    $doctor->nic = $validatedData['nic'];
    $doctor->email = $validatedData['email'];
    $doctor->telephone = $validatedData['telephone'];

    // Update password only if provided
    if ($validatedData['password']) {
        $doctor->password = $validatedData['password']; 
    }

    // Update specialty only if a new value is selected
    if ($request->has('specialty_id')) {
        $doctor->specialty_id = $validatedData['specialty_id'];
    }

    $doctor->save();
    return ('Doctor updated successfully!');
}

     

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        // Logic to delete the specific doctor
        $doctor->delete();

        return redirect('admindoctors')->with('success', 'Doctor deleted successfully!');
    }

    public function destroydoc(Doctor $doctor)
    {
        // Logic to delete the specific doctor
        $doctor->delete();

        return redirect('/')->with('success', 'Account deleted successfully!');
    }


    public function search(Request $request)
{
    $searchTerm = $request->input('search'); // Get the search term from the request
    
    $doctors = Doctor::where('name', 'like', '%' . $searchTerm . '%')
                     ->orWhere('email', 'like', '%' . $searchTerm . '%')
                     ->with('specialty')
                     ->get();
    
    return response()->json(['doctors' => $doctors]);
}

public function getTodaySessionsCount()
    {
        // Assuming today's sessions are stored in the 'schedules' table
        return Schedule::whereDate('schedule_date', today())->count();
    }

    public function destroyappointment(Appointment $appointment)
    {
        $doctorEmail = request()->get('email');
        $doctor = Doctor::where('email', $doctorEmail)->first(); // Retrieve the doctor by email
        $appointment->delete();

        return redirect()->route('doctorappointment', ['email' => $doctor->email])->with('success', 'Appointment deleted successfully!');
    }
  

    public function destroyschedule(Schedule $schedule)
    {
        $doctorEmail = request()->get('email');
        $doctor = Doctor::where('email', $doctorEmail)->first(); // Retrieve the doctor by email
        $schedule->delete();

        return redirect()->route('doctorschedule', ['email' => $doctor->email])->with('success', 'Schedule deleted successfully!');
    }
  
}
