<?php

namespace App\Http\Controllers\Backend;

use App\Models\KubPvr;
use App\Models\PatientTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TestReportController extends Controller
{

    public function kubPrvIndex($id)
    {
        $kubPvr = KubPvr::where('patient_test_id',$id)->first();
        return view('admin.kub_pvr.index', compact('kubPvr'));
    }

    public function kubPrvCreate($id)
    {
        $patientTest = PatientTest::find($id);
        $kubPvr = KubPvr::where('id',$id)->first();
        return view('admin.kub_pvr.create', compact('patientTest','kubPvr'));
    }

    public function kubPrvStore(Request $request)
    {
        // return $request->get('patient_test_id');
        $patientTestID = $request->get('patient_test_id');
        $r_status = $request->get('r_status');


        if($r_status==0)
        {
            $data = $request->validate([
                'patient_test_id' => 'required',
                'user_id' => 'required',
                'patient_id' => 'required',
                'test_cat_id' => 'required',
                'kidney' => 'required|integer',
                'kidney_left' => 'required|integer',
                'lk' => 'required|integer',
                'rk' => 'required|integer',
                'pvr' => 'required|integer',
                'interpretation' => 'required',
            ]);

            $reportStatus = ['r_status' => 1];

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
            }catch(\Exception $ex) {
                DB::rollback();
            }
            return back();
        }else{
            $dataUpdate = [
                'patient_test_id' => $request->get('patient_test_id'),
                'user_id' => $request->get('user_id'),
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
            }catch(\Exception $ex) {
                DB::rollback();
            }
            return back();
        }
    }
}
