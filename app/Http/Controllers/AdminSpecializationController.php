<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AdminSpecializationController extends Controller
{
    /**
     * Display a listing of the specializations.
     */
    public function index()
    {
        $specialization = Specialization::orderBy('id', 'desc')->get();
        return view('admin.sections.specializations.index', compact('specialization'));
    }

    /**
     * Show the form for creating a new specialization.
     */
    public function create()
    {
        return view('admin.sections.specializations.create');
    }

    /**
     * Store a newly created specialization in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'required|boolean',
            'icon' => 'nullable|image|mimes:png,jpg,jpeg|max:2048', // Validate icon
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('icons', 'public'); // Save icon
        }
    
        Specialization::create($data);
        return redirect()->route('admin.specializations')->with('success', 'Specialization created successfully!');
    }
    

    /**
     * Show the form for editing the specified specialization.
     */
    public function edit($id)
    {
        $specializations = Specialization::findOrFail($id);
        return view('admin.sections.specializations.edit', compact('specializations'));
    }

    /**
     * Update the specified specialization in the database.
     */
    public function update(Request $request, Specialization $specialization)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'is_active' => 'required|boolean',
        'icon' => 'nullable|image|mimes:png,jpg,jpeg|max:2048', // Validate icon
    ]);

    $data = $request->all();

    if ($request->hasFile('icon')) {
        if ($specialization->icon) {
            Storage::disk('public')->delete($specialization->icon); // Delete old icon
        }
        $data['icon'] = $request->file('icon')->store('icons', 'public'); // Save new icon
    }

    $specialization->update($data);
    return redirect()->route('admin.specializations')->with('success', 'Specialization updated successfully!');
}


    /**
     * Remove the specified specialization from the database.
     */
    public function destroy($id)
    {
        $specialization = Specialization::findOrFail($id);
        $specialization->delete();
        return redirect()->route('admin.specializations')->with('success', 'Specialization deleted successfully!');
    }
   
    
}
