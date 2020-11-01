@extends('admin.layout.master')
@section('title', 'Patient')
@section('content')
<?php $p = 'patients'; ?>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs">
                    <li class="nav-home"><a href="{{ route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item"><a href="{{ route('patient.index')}}">Show Patient</a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Create Patient</li>
                </ul>
            </div>
            <div class="divider1"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{-- Page Content Start --}}
                        {{-- <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Patient</h4>
                            </div>
                        </div> --}}
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="text-center">
                                <h1>{{$patientTest->patient->name}}</h1>
                                <h3>
                                    {{$patientTest->patient->age}} <br>
                                    {{$patientTest->patient->phone}} <br>
                                    {{$patientTest->patient->address}} <br>
                                    Ref.By: {{$patientTest->user->name}}
                                </h3>
                            </div>
                            <form action="{{ route('kub-Prv.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="patient_test_id" value="{{$patientTest->id}}">
                                    <input type="hidden" name="ref_by_id" value="{{$patientTest->ref_by_id}}">
                                    <input type="hidden" name="patient_id" value="{{$patientTest->patient_id }}">
                                    <input type="hidden" name="test_cat_id" value="{{$patientTest->test_cat_id  }}">
                                    <input type="hidden" name="r_status" value="{{$patientTest->r_status  }}">
                                    <input type="hidden" name="seen_by_id" value="{{auth()->user()->id}}">
                                    @php
                                        if(isset($kubPvr->kidney)){
                                            $kidney = $kubPvr->kidney;
                                        }else{$kidney = old('kidney');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="kidney">kidney<span class="t_r">*</span></label>
                                        <input type="text" name="kidney" class="form-control" value="{{$kidney}}"
                                            placeholder="Enter Name" required>
                                    </div>
                                    @php
                                        if(isset($kubPvr->kidney_left)){
                                        $kidney_left = $kubPvr->kidney_left;
                                        }else{$kidney_left = old('kidney_left');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="kidney_left">kidney Left<span class="t_r">*</span></label>
                                        <input type="text" name="kidney_left" class="form-control"
                                            value="{{$kidney_left}}" placeholder="Enter Contact No" required>
                                    </div>
                                    @php
                                        if(isset($kubPvr->rk)){
                                        $rk = $kubPvr->rk;
                                        }else{$rk = old('rk');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="rk">RK<span class="t_r">*</span></label>
                                        <input type="text" name="rk" class="form-control" value="{{$rk}}"
                                            placeholder="Enter Name">
                                    </div>
                                    @php
                                        if(isset($kubPvr->lk)){
                                        $lk = $kubPvr->lk;
                                        }else{$lk = old('lk');}
                                    @endphp

                                    <div class="form-group col">
                                        <label for="lk">LK<span class="t_r">*</span></label>
                                        <input type="text" name="lk" class="form-control" value="{{$lk}}"
                                            placeholder="Enter Name">
                                    </div>
                                    @php
                                        if(isset($kubPvr->pvr)){
                                        $pvr = $kubPvr->pvr;
                                        }else{$pvr = old('pvr');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="pvr">PVR<span class="t_r">*</span></label>
                                        <input type="text" name="pvr" class="form-control" value="{{$pvr}}"
                                            placeholder="Enter Name">
                                    </div>
                                    @php
                                        if(isset($kubPvr->interpretation)){
                                            $interpretation = $kubPvr->interpretation;
                                        }else{$interpretation = "Normal findings at USG.";}
                                    @endphp
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="interpretation">Interpretation<span class="t_r">*</span></label>
                                        <input type="text" name="interpretation" class="form-control"
                                            value="{{$interpretation}}" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div align="center" class="mr-auto card-action">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </form>
                        </div>
                        {{-- Page Content End --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('custom_scripts')


@endpush

@endsection
