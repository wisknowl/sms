<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        return view('students.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    // Define a function to generate a matricule
    function generateMatricule($name, $specialty)
    {
        // Get the first letter of the name and specialty, and convert them to uppercase
        $name_letter = strtoupper(substr($name, 0, 1));
        $specialty_letter = strtoupper(substr($specialty, 0, 1));
        // Get the last two digits of the current year
        $year = date('y');
        // Get the next sequence number from the database, or start from 0001 if none exists
        $last_student = Student::orderBy('id', 'desc')->first();
        if ($last_student) {
            $sequence = str_pad($last_student->id + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $sequence = '0001';
        }
        // Concatenate the letters, year, and sequence to form the matricule
        $matricule = $name_letter . $specialty_letter . $year . $sequence;
        // Return the matricule
        return $matricule;
    }

    // Define a function to store a student with a matricule
    function storeStudent($name, $specialty)
    {
        // Generate a matricule for the student
        $matricule = StudentController::generateMatricule($name, $specialty);
        // Check if the matricule already exists in the database, and generate a new one if needed
        while (Student::where('matricule', $matricule)->exists()) {
            $matricule = StudentController::generateMatricule($name, $specialty);
        }
        // Create a new student with the name, specialty, and matricule
        $student = new Student();
        $student->name = $name;
        $student->specialty = $specialty;
        $student->matricule = $matricule;
        // Save the student to the database
        $student->save();
        // Return the student
        return $student;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    // Define the store method of the controller class
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'specialty' => 'required|string',
        ]);
        // Get the name and specialty from the request
        $name = $request->input('name');
        $specialty = $request->input('specialty');
        // Call the storeStudent function with the name and specialty
        $student = $this->storeStudent($name, $specialty);
        // Return a response with the student data and a success message
        return response()->json([
            'student' => $student,
            'message' => 'Student created successfully',
        ]);
    }

    // Define the storeStudent function as a private method of the controller class
    private function storeStudent($name, $specialty)
    {
        // Generate a matricule for the student
        $matricule = $this->generateMatricule($name, $specialty);
        // Check if the matricule already exists in the database, and generate a new one if needed
        while (Student::where('matricule', $matricule)->exists()) {
            $matricule = $this->generateMatricule($name, $specialty);
        }
        // Create a new student with the name, specialty, and matricule
        $student = new Student();
        $student->name = $name;
        $student->specialty = $specialty;
        $student->matricule = $matricule;
        // Save the student to the database
        $student->save();
        // Return the student
        return $student;
    }

    // Define the generateMatricule function as a private method of the controller class
    private function generateMatricule($name, $specialty)
    {
        // Get the first letter of the name and specialty, and convert them to uppercase
        $name_letter = strtoupper(substr($name, 0, 1));
        $specialty_letter = strtoupper(substr($specialty, 0, 1));
        // Get the last two digits of the current year
        $year = date('y');
        // Get the next sequence number from the database, or start from 0001 if none exists
        $last_student = Student::orderBy('id', 'desc')->first();
        if ($last_student) {
            $sequence = str_pad($last_student->id + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $sequence = '0001';
        }
        // Concatenate the letters, year, and sequence to form the matricule
        $matricule = $name_letter . $specialty_letter . $year . $sequence;
        // Return the matricule
        return $matricule;
    }


    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        //
    }
}
