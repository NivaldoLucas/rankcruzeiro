<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Navigator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminNavigatorController extends Controller
{
    public function index()
    {
        $navigators = Navigator::all();
        return view('admin.navigators.index', compact('navigators'));
    }

    public function create()
    {
        return view('admin.navigators.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'lions' => 'required|boolean',
        ]);

        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('navigators', 'public');
        }

        Navigator::create($validatedData);

        return redirect()->route('admin.navigators.index')->with('success', 'Navigator created successfully.');
    }

    public function show(Navigator $navigator)
    {
        return view('admin.navigators.show', compact('navigator'));
    }

    public function edit(Navigator $navigator)
    {
        return view('admin.navigators.edit', compact('navigator'));
    }

    public function update(Request $request, Navigator $navigator)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'lions' => 'required|boolean',
        ]);

        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('navigators', 'public');
        } else {
            unset($validatedData['photo']);
        }

        $navigator->update($validatedData);

        return redirect()->route('admin.navigators.index')->with('success', 'Navigator updated successfully.');
    }

    public function destroy(Navigator $navigator)
    {
        $navigator->delete();

        return redirect()->route('admin.navigators.index')->with('success', 'Navigator deleted successfully.');
    }
}