<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Currency;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['currencies']=Currency::all();
       return view('project.add-project',$data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function show($id)
    {
        $project = Project::find($id);
        return response()->json($project);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addProject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'currency' => 'required',
            'price' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->with('error', [$validator->errors()])->withInput();
        }

         try
        {
        $project =new Project();
        $project->project_name=$request->name;
        $project->description=$request->description;
        $project->currency=$request->currency;
        $project->price=$request->price;
        $project->save();

         Alert::success('Project Created', 'Project created Successfully');

        return redirect()->route('manage.project');

        } catch (\Exception $e) {
           // Handle the exception
            return redirect()->back()->with('error', 'Failed to create project. ' . $e->getMessage())->withInput();;
        }

    }

    /**
     * Display the specified resource.
     */
    public function manageProject ()
    {
            $data['projects']=Project::all();
            return view('project.manage-project',$data);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $currencies=Currency::all();

        return view('project.edit-project', ['project' => $project,'currencies'=>$currencies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $project=Project::find($id);
        try
        {
             $project->project_name=$request->name;
            $project->description=$request->description;
            $project->currency=$request->currency;
            $project->price=$request->price;
            $project->save();

            Alert::success('Project Updated', 'Project updated Successfully');

             return redirect()->route('manage.project');

        } catch (\Exception $e) {
           // Handle the exception
            return redirect()->back()->with('error', 'Failed to update project. ' . $e->getMessage())->withInput();;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
