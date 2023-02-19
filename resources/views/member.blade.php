@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="card-title mb-3">Database List</h4>
                            </div>
                        </div>
                        <h4>{{ $member['name'] }}</h4>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 col-form-label">Full Name</label>
                                    <div class="col-sm-9 py-2">
                                        {{ $member['name'] }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 col-form-label">Other Name</label>
                                    <div class="col-sm-9 py-2">
                                        {{ $member['name2'] }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 col-form-label">Telephone</label>
                                    <div class="col-sm-9 py-2">
                                        {{ $member['telephone_one'] }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 col-form-label">Other Telephone</label>
                                    <div class="col-sm-9 py-2">
                                        {{ $member['telephone2'] }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9 py-2">
                                        {{ $member['home_address1'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach(array(
                                    array('label'=>'City', 'value'=> $member->home_city),
                                    array('label'=>'Postcode', 'value'=> $member->home_postcode),
                                    array('label'=>'District', 'value' => $member->home_district),
                                    array('label'=>'State','value' => getName($member->home_state)),
                                    array('label'=>'Birth Date','value' => $member->bitth_date),
                                    array('label'=>'IC','value' => $member->ic_no),
                                    array('label'=>'Job','value' => $member->current_job),
                                    array('label'=>'Guardian','value' => guardian($relationships)),
                                    array('label'=>'Asnaf Status','value' => memberStatus($member['member_status_ids'])),
                                    array('label'=>'Beneficiary Name','value' => $member->beneficiary_name),
                                    array('label'=>'Beneficiary IC','value' => $member->beneficiary_ic),
                                    ) as $data)
                                <div class="col-md-6 col-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">
                                            <span>{{$data['label']}}</span>
                                        </label>
                                        <div class="col-sm-9 py-2">
                                            {{$data['value']}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            @foreach(
                                array(
                                    array('src' => $member->attache_file1),
                                    array('src' => $member->attache_file2),
                                    array('src' => $member->attache_file3),
                                    array('src' => $member->attache_file4)
                                )
                                 as $src)
                                <div class="form-group mb-3 col-md-3 col-sm-4 col-6">
                                    <label for="exampleInputCity1">Image file</label>
                                    <img style="width: 100%;height: calc(100px + 5vw)"
                                         src="{{ asset("uploads/".$src['src'] ) }}" alt="">
                                </div>
                            @endforeach
                        </div>
                        @include('layouts.errors')
                        <div class="row">
                            @include('layouts.member-dependents')
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
