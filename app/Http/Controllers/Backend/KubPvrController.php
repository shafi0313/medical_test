<?php

namespace App\Http\Controllers\Backend;

use App\Models\KubPvr;
use App\Models\PatientTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class KubPvrController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createId($id)
    {
        $patientTest = PatientTest::find($id);
        $kubPvr = KubPvr::where('patient_test_id',$id)->first();
        return view('admin.kub_pvr.create', compact('patientTest','kubPvr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patientTestID = $request->get('patient_test_id');
        $r_status = $request->get('r_status');
        $patient_id = $request->get('patient_id');
        $reportStatus = ['r_status' => 1];
        $seenById = auth()->user()->id;

        if($r_status==0)
        {
            $data = $request->validate([
                'patient_test_id' => 'required',
                'ref_by_id' => 'required',
                'seen_by_id' => 'required',
                'patient_id' => 'required',
                'test_cat_id' => 'required',
                'kidney' => 'required|integer',
                'kidney_left' => 'required|integer',
                'lk' => 'required|integer',
                'rk' => 'required|integer',
                'pvr' => 'required|integer',
                'interpretation' => 'required',
            ]);



            // $data = [
            //     'patient_test_id' => $request->get('patient_test_id'),
            //     'user_id' => $request->get('user_id'),
            //     'patient_id' => $request->get('patient_id'),
            //     'test_cat_id' => $request->get('test_cat_id'),
            //     'kidney' => $request->get('kidney'),
            //     'kidney_left' => $request->get('kidney_left'),
            //     'lk' => $request->get('lk'),
            //     'rk' => $request->get('rk'),
            //     'pvr' => $request->get('pvr'),
            //     'interpretation' => $request->get('interpretation'),
            // ];

            DB::beginTransaction();

            try{
                KubPvr::create($data);
                PatientTest::where('id', $patientTestID)->update($reportStatus);
                DB::commit();
                toast('Report Insert Sucessfully','success');
                return redirect()->route('patient_show_test',$patient_id);
            }catch(\Exception $ex) {
                DB::rollback();
                toast($ex->getMessage().'Report Insert Failed','error');
                return back();
            }
        }else{

            $dataUpdate = [
                'patient_test_id' => $request->get('patient_test_id'),
                'ref_by_id' => $request->get('ref_by_id'),
                'seen_by_id' => $seenById,
                'patient_id' => $request->get('patient_id'),
                'test_cat_id' => $request->get('test_cat_id'),
                'kidney' => $request->get('kidney'),
                'kidney_left' => $request->get('kidney_left'),
                'lk' => $request->get('lk'),
                'rk' => $request->get('rk'),
                'pvr' => $request->get('pvr'),
                'interpretation' => $request->get('interpretation'),
            ];
            try{
                KubPvr::where('id',$patientTestID)->update($dataUpdate);
                DB::commit();
                toast('Report Update Successfully','success');
                return redirect()->route('patient_show_test',$patient_id);
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
        $kubPvr = KubPvr::where('patient_test_id',$id)->first();
        return view('admin.kub_pvr.report', compact('kubPvr'));
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
