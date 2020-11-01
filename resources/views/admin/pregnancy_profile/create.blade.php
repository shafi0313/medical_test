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
                    <li class="nav-item"><a href="{{ route('patient.index')}}"></a></li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item active">Create Pregnancy Profile Report</li>
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
                            {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif --}}
                            <div class="text-center">
                                <h1>{{$patientTest->patient->name}}</h1>
                                <h3>
                                    {{$patientTest->patient->age}} <br>
                                    {{$patientTest->patient->phone}} <br>
                                    {{$patientTest->patient->address}} <br>
                                    Ref.By: {{$patientTest->user->name}}
                                </h3>
                            </div>
                            <form action="{{ route('pregnancy-profile.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="patient_test_id" value="{{$patientTest->id}}">
                                    <input type="hidden" name="ref_by_id" value="{{$patientTest->ref_by_id}}">
                                    <input type="hidden" name="patient_id" value="{{$patientTest->patient_id }}">
                                    <input type="hidden" name="test_cat_id" value="{{$patientTest->test_cat_id  }}">
                                    <input type="hidden" name="r_status" value="{{$patientTest->r_status  }}">
                                    <input type="hidden" name="seen_by_id" value="{{auth()->user()->id}}">
                                    @php
                                        if(isset($pregnancyProfile->bpd)){
                                            $bpd = $pregnancyProfile->bpd;
                                        }else{$bpd = old('bpd');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="bpd">BPD<span class="t_r">*</span></label>
                                        <input type="text" name="bpd" class="form-control @error('bpd') is-invalid @enderror" value="{{$bpd}}"
                                            placeholder="Enter Name" required>
                                        @error('bpd')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @php
                                        if(isset($pregnancyProfile->bpd_week)){
                                        $bpd_week = $pregnancyProfile->bpd_week;
                                        }else{$bpd_week = old('bpd_week');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="bpd_week">BPD Weeks<span class="t_r">*</span></label>
                                        <input type="text" name="bpd_week" class="form-control @error('bpd_week') is-invalid @enderror"
                                            value="{{$bpd_week}}" placeholder="Enter Contact No" required>
                                        @error('bpd_week')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @php
                                        if(isset($pregnancyProfile->bpd_day)){
                                        $bpd_day = $pregnancyProfile->bpd_day;
                                        }else{$bpd_day = old('bpd_day');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="bpd_day">BPD Deys<span class="t_r">*</span></label>
                                        <input type="text" name="bpd_day" class="form-control @error('bpd_day') is-invalid @enderror" value="{{$bpd_day}}"
                                            placeholder="Enter Name">
                                            @error('bpd_day')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                {{-- </div> --}}

                                {{--------------- HC ------------------------}}
                                {{-- <div class="row"> --}}
                                    @php
                                        if(isset($pregnancyProfile->hc)){
                                            $hc = $pregnancyProfile->hc;
                                        }else{$hc = old('hc');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="hc">HC<span class="t_r">*</span></label>
                                        <input type="text" name="hc" class="form-control @error('hc') is-invalid @enderror" value="{{$hc}}"
                                            placeholder="Enter Name" required>
                                        @error('hc')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @php
                                        if(isset($pregnancyProfile->hc_week)){
                                        $hc_week = $pregnancyProfile->hc_week;
                                        }else{$hc_week = old('hc_week');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="hc_week">HC Weeks<span class="t_r">*</span></label>
                                        <input type="text" name="hc_week" class="form-control @error('hc_week') is-invalid @enderror"
                                            value="{{$hc_week}}" placeholder="Enter Contact No" required>
                                        @error('hc_week')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @php
                                        if(isset($pregnancyProfile->hc_day)){
                                        $hc_day = $pregnancyProfile->hc_day;
                                        }else{$hc_day = old('hc_day');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="hc_day">HC Deys<span class="t_r">*</span></label>
                                        <input type="text" name="hc_day" class="form-control @error('hc_day') is-invalid @enderror" value="{{$hc_day}}"
                                            placeholder="Enter Name">
                                            @error('hc_day')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{--------------- AC ------------------------}}
                                <div class="row">
                                    @php
                                        if(isset($pregnancyProfile->ac)){
                                            $ac = $pregnancyProfile->ac;
                                        }else{$ac = old('ac');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="ac">AC<span class="t_r">*</span></label>
                                        <input type="text" name="ac" class="form-control @error('ac') is-invalid @enderror" value="{{$ac}}"
                                            placeholder="Enter Name" required>
                                        @error('ac')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @php
                                        if(isset($pregnancyProfile->ac_week)){
                                        $ac_week = $pregnancyProfile->ac_week;
                                        }else{$ac_week = old('ac_week');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="ac_week">AC Weeks<span class="t_r">*</span></label>
                                        <input type="text" name="ac_week" class="form-control @error('ac_week') is-invalid @enderror"
                                            value="{{$ac_week}}" placeholder="Enter Contact No" required>
                                        @error('ac_week')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @php
                                        if(isset($pregnancyProfile->ac_day)){
                                        $ac_day = $pregnancyProfile->ac_day;
                                        }else{$ac_day = old('ac_day');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="ac_day">AC Deys<span class="t_r">*</span></label>
                                        <input type="text" name="ac_day" class="form-control @error('ac_day') is-invalid @enderror" value="{{$ac_day}}"
                                            placeholder="Enter Name">
                                            @error('ac_day')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                {{-- </div> --}}

                                {{--------------- FL ------------------------}}
                                {{-- <div class="row"> --}}
                                    @php
                                        if(isset($pregnancyProfile->fl)){
                                            $fl = $pregnancyProfile->fl;
                                        }else{$fl = old('fl');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="fl">FL<span class="t_r">*</span></label>
                                        <input type="text" name="fl" class="form-control @error('fl') is-invalid @enderror" value="{{$fl}}"
                                            placeholder="Enter Name" required>
                                        @error('fl')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @php
                                        if(isset($pregnancyProfile->fl_week)){
                                        $fl_week = $pregnancyProfile->fl_week;
                                        }else{$fl_week = old('fl_week');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="fl_week">FL Weeks<span class="t_r">*</span></label>
                                        <input type="text" name="fl_week" class="form-control @error('fl_week') is-invalid @enderror"
                                            value="{{$fl_week}}" placeholder="Enter Contflt No" required>
                                        @error('fl_week')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @php
                                        if(isset($pregnancyProfile->fl_day)){
                                        $fl_day = $pregnancyProfile->fl_day;
                                        }else{$fl_day = old('fl_day');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="fl_day">FL Deys<span class="t_r">*</span></label>
                                        <input type="text" name="fl_day" class="form-control @error('fl_day') is-invalid @enderror" value="{{$fl_day}}"
                                            placeholder="Enter Name">
                                            @error('fl_day')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


             {{----------------- pregnancyProfile -----------}}
                                <div class="row">
                                    @php
                                        if(isset($pregnancyProfile->pregnency_week)){
                                        $pregnency_week = $pregnancyProfile->pregnency_week;
                                        }else{$pregnency_week = old('pregnency_week');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="pregnency_week">Pregnency weeks<span class="t_r">*</span></label>
                                        <input type="text" name="pregnency_week" class="form-control @error('pregnency_week') is-invalid @enderror"
                                            value="{{$pregnency_week}}" placeholder="Enter Contflt No" required>
                                        @error('pregnency_week')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @php
                                        if(isset($pregnancyProfile->pregnency_day)){
                                        $pregnency_day = $pregnancyProfile->pregnency_day;
                                        }else{$pregnency_day = old('pregnency_day');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="pregnency_day">Pregnency Deys<span class="t_r">*</span></label>
                                        <input type="text" name="pregnency_day" class="form-control @error('pregnency_day') is-invalid @enderror" value="{{$pregnency_day}}"
                                            placeholder="Enter Name">
                                            @error('pregnency_day')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                {{-- </div>


                                pregnancyProfile
                                <div class="row"> --}}
                                    @php
                                        if(isset($pregnancyProfile->lmp_week)){
                                        $lmp_week = $pregnancyProfile->lmp_week;
                                        }else{$lmp_week = old('lmp_week');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="lmp_week">The gestational age is about weeks<span class="t_r">*</span></label>
                                        <input type="text" name="lmp_week" class="form-control @error('lmp_week') is-invalid @enderror"
                                            value="{{$lmp_week}}" placeholder="Enter Contflt No" required>
                                        @error('lmp_week')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @php
                                        if(isset($pregnancyProfile->lmp_day)){
                                        $lmp_day = $pregnancyProfile->lmp_day;
                                        }else{$lmp_day = old('lmp_day');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="lmp_day">The gestational age is about Deys<span class="t_r">*</span></label>
                                        <input type="text" name="lmp_day" class="form-control @error('lmp_day') is-invalid @enderror" value="{{$lmp_day}}"
                                            placeholder="Enter Name">
                                            @error('lmp_day')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    @php
                                        if(isset($pregnancyProfile->edd)){
                                        $edd = $pregnancyProfile->edd;
                                        }else{$edd = old('edd');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="edd">EDD<span class="t_r">*</span></label>
                                        <input type="text" name="edd" class="form-control @error('edd') is-invalid @enderror" value="{{$edd}}"
                                            placeholder="Enter Name">
                                            @error('edd')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @php
                                        if(isset($pregnancyProfile->afi)){
                                        $afi = $pregnancyProfile->afi;
                                        }else{$afi = old('afi');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="afi">AFI<span class="t_r">*</span></label>
                                        <input type="text" name="afi" class="form-control @error('afi') is-invalid @enderror" value="{{$afi}}"
                                            placeholder="Enter Name">
                                            @error('afi')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @php
                                        if(isset($pregnancyProfile->heart)){
                                        $heart = $pregnancyProfile->heart;
                                        }else{$heart = old('heart');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="heart">Heart<span class="t_r">*</span></label>
                                        <input type="text" name="heart" class="form-control @error('heart') is-invalid @enderror" value="{{$heart}}"
                                            placeholder="Enter Name">
                                            @error('heart')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @php
                                        if(isset($pregnancyProfile->efw)){
                                        $efw = $pregnancyProfile->efw;
                                        }else{$efw = old('efw');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="efw">EFW<span class="t_r">*</span></label>
                                        <input type="text" name="efw" class="form-control @error('efw') is-invalid @enderror" value="{{$efw}}"
                                            placeholder="Enter Name">
                                            @error('efw')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    @php
                                        if(isset($pregnancyProfile->ri)){
                                        $ri = $pregnancyProfile->ri;
                                        }else{$ri = old('ri');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="ri">RI<span class="t_r">*</span></label>
                                        <input type="text" name="ri" class="form-control @error('ri') is-invalid @enderror" value="{{$ri}}"
                                            placeholder="Enter Name">
                                            @error('ri')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @php
                                        if(isset($pregnancyProfile->impression)){
                                        $impression = $pregnancyProfile->impression;
                                        }else{$impression = old('impression');}
                                    @endphp
                                    <div class="form-group col">
                                        <label for="impression">Impression<span class="t_r">*</span></label>
                                        <input type="text" name="impression" class="form-control @error('impression') is-invalid @enderror" value="{{$impression}}"
                                            placeholder="Enter Name">
                                            @error('impression')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
