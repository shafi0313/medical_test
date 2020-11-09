<?php

namespace App\Http\Controllers\Backend;

use App\Models\PatientTest;
use Illuminate\Http\Request;
use App\Models\PregnancyProfile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PregnancyProfileController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createId($id)
    {
        $patientTest = PatientTest::find($id);
        $pregnancyProfile = PregnancyProfile::where('patient_test_id',$id)->first();
        return view('admin.pregnancy_profile.create', compact('patientTest','pregnancyProfile'));
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
                // 'patient_test_id' => 'required',
                // 'ref_by_id' => 'required',
                // 'seen_by_id' => 'required',
                // 'patient_id' => 'required',
                // 'test_cat_id' => 'required',
                // 'kidney' => 'required|integer',
                // 'kidney_left' => 'required|integer',
                // 'lk' => 'required|integer',
                // 'rk' => 'required|integer',
                // 'pvr' => 'required|integer',
                // 'interpretation' => 'required',
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

            'bpd' => $request->get('bpd'),
            'bpd_week' => $request->get('bpd_week'),
            'bpd_day' => $request->get('bpd_day'),
            'hc' => $request->get('hc'),
            'hc_week' => $request->get('hc_week'),
            'hc_day' => $request->get('hc_day'),
            'ac' => $request->get('ac'),
            'ac_week' => $request->get('ac_week'),
            'ac_day' => $request->get('ac_day'),
            'fl' => $request->get('fl'),
            'fl_week' => $request->get('fl_week'),
            'fl_day' => $request->get('fl_day'),
            'pregnency_week' => $request->get('pregnency_week'),
            'pregnency_day' => $request->get('pregnency_day'),
            'lmp_week' => $request->get('lmp_week'),
            'lmp_day' => $request->get('lmp_day'),
            'edd' => $request->get('edd'),
            'afi' => $request->get('afi'),
            'heart' => $request->get('heart'),
            'efw' => $request->get('efw'),
            'ri' => $request->get('ri'),
            'impression' => $request->get('impression'),
        ];

        DB::beginTransaction();


        if($r_status==0)
        {
            try{
                PregnancyProfile::create($data);
                PatientTest::where('id', $patientTestID)->update($reportStatus);
                DB::commit();
                toast('Report Insert Sucessfully','success');
                return redirect()->route('patient_show_test',$patient_id);
            }catch(\Exception $ex) {
                DB::rollback();
                toast($ex->getMessage(). 'Report Insert Failed','error');
                return back();
            }
        }else{
            try{
                PregnancyProfile::where('patient_test_id', $patientTestID)->update($data);
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
        $pregnancyProfile = PregnancyProfile::where('patient_test_id',$id)->first();
        return view('admin.pregnancy_profile.report', compact('pregnancyProfile'));
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
