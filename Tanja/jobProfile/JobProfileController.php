<?php

namespace App\Http\Controllers;

use App\JobProfile;
use Illuminate\Http\Request;

class JobProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = JobProfile::get();

        return view('jobProfiles/index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profiles = JobProfile::get();

        return view('jobProfiles/create', compact('profiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         JobProfile::create([
            'name' => $request['name'],
            'importance' => $request['importance'],
        ]);

         return redirect()->route('jobProfiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobProfile  $jobProfile
     * @return \Illuminate\Http\Response
     */
    public function show($profile)
    {
        $profile = JobProfile::find($profile);

        return view('jobProfiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobProfile  $jobProfile
     * @return \Illuminate\Http\Response
     */
    public function edit($profile)
    {
        $profile = JobProfile::find($profile);

        return view('jobProfiles/edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobProfile  $jobProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        JobProfile::where('id', $id)->update($request->except(['_token','_method']));

        return redirect()->route('jobProfiles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobProfile  $jobProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (JobProfile::destroy($id)) {
            return redirect('jobProfiles');
        } else {
            return redirect('jobProfiles');
        }
    }
}
