<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Patient;
use App\Models\TestCat;
use App\Models\PatientTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();
        return view('admin.patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $testCats = TestCat::all();
        return view('admin.patient.create', compact('testCats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user()->id;
        $status = 1;
        $data = $request->validate([
            'name' => "required",
            'age' => "required",
            'gender' => "required",
            'email' => "sometimes",
            'phone' => "required|numeric|unique:patients,phone",
            'address' => "sometimes",
            'add_by' => "sometimes",
            'mdical_history' => "sometimes",
        ]);

        DB::beginTransaction();

        try {
            $patient = Patient::create($data);
            if($request->get('iftest') == 1)
            {
                foreach($request->test_cat_id as $key => $v){
                    $patientTest=[
                        'ref_by_id' => $user,
                        'patient_id' => $patient->id,
                        'test_cat_id' => $request->test_cat_id[$key],
                        'status' => $status--,
                    ];
                    PatientTest::create($patientTest);
                }
            }

            DB::commit();
            toast('Patient Successfully Inserted','success');
            return redirect()->route('patient.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            toast($ex->getMessage(),'error');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);
        $testCats = TestCat::all();
        return view('admin.patient.edit', compact('patient','testCats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = auth()->user()->id;
        $status = 1;
        $data = $request->validate([
            'name' => "required",
            'age' => "required",
            'gender' => "required",
            'email' => "sometimes",
            'phone' => "required",
            'address' => "sometimes",
            'add_by' => "sometimes",
            'mdical_history' => "sometimes",
        ]);

        DB::beginTransaction();

        try {
            $update  = Patient::find($id);
            $update->update($data);
            if($request->get('iftest') == 1)
            {
                foreach($request->test_cat_id as $key => $v){
                    $patientTest=[
                        'ref_by_id' => $user,
                        'patient_id' => $update->id,
                        'test_cat_id' => $request->test_cat_id[$key],
                        'status' => $status--,
                    ];
                    PatientTest::where('patient_id', $id)->update($patientTest);
                }
            }

            DB::commit();
            toast('Patient Successfully Inserted','success');
            return redirect()->route('patient.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            toast($ex->getMessage(),'error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Patient::find($id)->delete();
        return redirect()->back();
    }
}
