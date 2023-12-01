<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Webuser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('admin.patients', [
            'patientscount' => $patients->count(),
            'patients' => $patients,
        ]);
    }
    public function patientIndex()
    {
        $patientEmail = request()->get('email');
$patient = Patient::where('email', $patientEmail)->first(); 

if ($patient) {
    $appointments = $patient->appointments; 
    $todayAppointmentsCount = $this->getTodayAppointmentsCount(); 

    $data = [
        'patient' => $patient,
        'appointments' => $appointments,
        'todayAppointmentsCount' => $todayAppointmentsCount,
    ];

    return view('patient.index', $data)
        ->with('menu', 'patient.menu')
        ->with('appointment', 'patient.appointment')->with('menu', 'patient.menu');
}

    }


    public function patientSettings()
    {
        $patientEmail = request()->get('email');
$patient = Patient::where('email', $patientEmail)->first(); 

if ($patient) {
    $appointments = $patient->appointments; 
    $todayAppointmentsCount = $this->getTodayAppointmentsCount(); 

    $data = [
        'patient' => $patient,
        'appointments' => $appointments,
        'todayAppointmentsCount' => $todayAppointmentsCount,
    ];

    return view('patient.settings', $data)
        ->with('menu', 'patient.menu')
        ->with('appointment', 'patient.appointment')->with('menu', 'patient.menu');
}

    }


    public function patientdoctors()
    {
        $patientEmail = request()->get('email');
        $patient = Patient::where('email', $patientEmail)->first(); 
        
        // Fetch all doctors from the database
        $doctors = Doctor::all(); // You may apply additional filters or conditions as needed
        
        $data = [
            'patient' => $patient,
            'doctorcount' => $doctors->count(),
            'doctors' => $doctors, // Pass the doctors data to the view
        ];

        return view('patient.doctors', $data);
    }


    public function patientschedule()
    {
        $patientEmail = request()->get('email');
        $patient = Patient::where('email', $patientEmail)->first(); 
        $schedules = Schedule::with('doctor')->get();
        $doctors = Doctor::all();
    
        return view('patient.schedule', [
            'patient' => $patient,
            'scheduleCount' => $schedules->count(),
            'schedules' => $schedules, 
            'doctors' => $doctors,   
        ]);
    }


    public function patientbooking()
    {
        $patientEmail = request()->get('email');

        // Retrieve the patient by email
        $patient = Patient::where('email', $patientEmail)->first();

        if ($patient) {
            // Fetch the patient's appointments and related schedule information
            $appointments = Appointment::with('schedule')
                ->where('patient_id', $patient->id)
                ->get();

            // Return the appointments and related schedule information to a view
            return view('patient.appointment', compact('appointments', 'patient'));
        } 
        
    }

    public function destroyappointment(Appointment $appointment)
    {
        $patientEmail = request()->get('email');

        // Retrieve the patient by email
        $patient = Patient::where('email', $patientEmail)->first();
        $appointment->delete();

        return redirect()->route('patientbooking', ['email' => $patient->email])->with('success', 'Booking deleted successfully!');
    }
  


    public function getTodayAppointmentsCount()
{
    // Assuming today's appointments are stored in the 'appointments' table
    return Appointment::whereDate('appointment_date', today())->count();
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
        // Validate the incoming request
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'nic' => 'required|string|max:255',
            'dob' => 'required|date',
            'newemail' => 'required|email|unique:patients,email',
            'tele' => 'required|string|max:20',
            'newpassword' => 'required|string|min:6',
            'cpassword' => 'required|same:newpassword',
        ]);

        // Create a new Doctor instance and assign validated data
        $patient = new Patient();
        $patient->name = $validatedData['fname'];
        $patient->address = $validatedData['address'];
        $patient->nic = $validatedData['nic'];
        $patient->date_of_birth = $validatedData['dob'];
        $patient->email = $validatedData['newemail'];
        $patient->telephone = $validatedData['tele'];
        $patient->password = Hash::make($validatedData['newpassword']); 

    
        $patient->save();
    

        // Create a new entry in the webusers table for the patient
        Webuser::create([
            'email' =>  $patient->email,
            'password' =>  $patient->password,
            'user_type' => 'p', // Set user_type for doctors
        ]);

        // Redirect to a specific route or view after signup
        return redirect()->route('login')->with('success', 'Signup successful! Please login.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        
        return view('admin.view_patient', compact('patient'));
    }

    public function showDoctor($id){
        
        $doctor = Doctor::findOrFail($id);
       
        return view('patient.view_doctor', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patient.edit_patient', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nic' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email,' . $patient->id,
            'telephone' => 'required|string|max:20',
            'password' => 'nullable|string|min:6',
            'confirm_password' => 'same:password',
        ]);
    
        // Update Doctor model with validated data
        $patient->name = $validatedData['name'];
        $patient->nic = $validatedData['nic'];
        $patient->email = $validatedData['email'];
        $patient->telephone = $validatedData['telephone'];
    
        // Update password only if provided
        if ($validatedData['password']) {
            $patient->password = $validatedData['password']; 
        }

    
        $patient->save();
        return ('Deatails updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect('/')->with('success', 'Account deleted successfully!');
    }

   

    public function search(Request $request)
    {
        $searchTerm = $request->input('search'); // Get the search term from the request
        
        $doctors = Patient::where('name', 'like', '%' . $searchTerm . '%')
                         ->orWhere('email', 'like', '%' . $searchTerm . '%')
                         ->get();
        
        return response()->json(['doctors' => $doctors]);
    }

}
