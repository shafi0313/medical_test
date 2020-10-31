<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Patient;
use App\Models\TestCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\PatientTest;

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
        $data = $request->validate([
            'name' => "required",
            'age' => "required",
            'gender' => "required",
            'email' => "sometimes",
            'phone' => "required|integer|unique:patients,phone",
            'address' => "sometimes",
            'add_by' => "sometimes",
            'mdical_history' => "sometimes",
        ]);

        DB::beginTransaction();


        try {
            $patient = Patient::create($data);
            foreach($request->test_cat_id as $key => $v){
                $patientTest=[
                    'user_id' => $user,
                    'patient_id' => $patient->id,
                    'test_cat_id' => $request->test_cat_id[$key],
                ];
                PatientTest::create($patientTest);
            }

            DB::commit();
            // toast('Pay Slip saved success!','success');
        } catch (\Exception $e) {
            DB::rollBack();
            // toast($e->getMessage(),'error');
        }
        return redirect()->route('patient.index');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
