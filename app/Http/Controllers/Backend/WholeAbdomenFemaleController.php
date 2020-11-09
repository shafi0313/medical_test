<?php

namespace App\Http\Controllers\Backend;

use App\Models\PatientTest;
use Illuminate\Http\Request;
use App\Models\WholeAbdomenFemale;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class WholeAbdomenFemaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function createId($id)
    {
        $patientTest = PatientTest::find($id);
        $wholeAbdomenFemale = WholeAbdomenFemale::where('patient_test_id', $id)->first();
        return view('admin.whole_abdomen_female.create', compact('patientTest', 'wholeAbdomenFemale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->$request->validate([
        //     'patient_test_id' => 'required',
        //     'ref_by_id' => 'required',
        //     'seen_by_id' => 'required',
        //     'patient_id' => 'required',
        //     'test_cat_id' => 'required',
        //     'kidney' => 'required|integer',
        //     'kidney_left' => 'required|integer',
        //     'lk' => 'required|integer',
        //     'rk' => 'required|integer',
        //     'interpretation' => 'required',
        // ]);

        $patientTestID = $request->get('patient_test_id');
        $r_status = $request->get('r_status');
        $reportStatus = ['r_status' => 1];
        $patient_id = $request->get('patient_id');

        $data = [
            'patient_test_id' => $request->get('patient_test_id'),
            'ref_by_id' => $request->get('ref_by_id'),
            'seen_by_id' => $request->get('seen_by_id'),
            'patient_id' => $request->get('patient_id'),
            'test_cat_id' => $request->get('test_cat_id'),

            'kidney' => $request->get('kidney'),
            'kidney_left' => $request->get('kidney_left'),
            'lk' => $request->get('lk'),
            'rk' => $request->get('rk'),
            'interpretation' => $request->get('interpretation'),
        ];
        
        DB::beginTransaction();

        if($r_status==0)
        {
            try{
                WholeAbdomenFemale::create($data);
                PatientTest::where('id', $patientTestID)->update($reportStatus);
                DB::commit();
                toast('Report Insert Sucessfully','success');
                return redirect()->route('patient_show_test', $patient_id);
            }catch(\Exception $ex) {
                DB::rollback();
                toast($ex->getMessage(). 'Report Insert Failed','error');
                return back();
            }
        }else{
            try{
                WholeAbdomenFemale::where('patient_test_id', $patientTestID)->update($data);
                DB::commit();
                toast('Report Update Successfully','success');
                return redirect()->route('patient_show_test', $patient_id);
            }catch(\Exception $ex) {
                DB::rollback();
                toast($ex->getMessage().'Update Failed','error');
                return back();
            }
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
        $wholeAbdomenFemale = WholeAbdomenFemale::where('patient_test_id',$id)->first();
        return view('admin.whole_abdomen_female.report', compact('wholeAbdomenFemale'));
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
