@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="card-title mb-3">Registration for Dependants</h4>
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <label class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                                {{ $member['name'] }}
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label class="col-sm-3 col-form-label">IC No</label>
                            <div class="col-sm-9">
                                {{ $member['ic_no'] }}
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <label class="col-sm-3 col-form-label">Membership Status</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    @foreach($memberStatus as $status)
                                        <div class="col-lg-2 col-md-3 col-6">
                                            <div class="form-check form-check-warning">
                                                <label class="form-check-label" onclick="event.preventDefault()">
                                                    <input type="checkbox" name="place_status"
                                                           value="{{ $status['id'] }}"
                                                           {{ oldCheckBox($status['id'], $member['member_status_ids']) }}
                                                           class="form-check-input rounded-0">
                                                    {{ $status['name'] }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach(array(
                                    array('label'=>'Date Of Birth', 'name'=>'birth_date', 'value'=> $member['birth_date']),
                                    array('label'=>'Age', 'name'=>'age', 'value'=> age($member['birth_date'])),
                                    array('label'=>'Nationality', 'name'=>'citizenship', 'value'=> getName($member->citizenship)),
                                    array('label'=>'Gender', 'name'=>'gender', 'value'=> getName($member['gender'])),
                                    array('label'=>'Race', 'name'=>'race', 'value'=> $member['']),
                                    array('label'=>'Religion', 'name'=>'religion', 'value'=> $member['religion']),
                                    ) as $info)
                                <div class="col-md-6 col-12">
                                    <div class="form-group row align-items-center">
                                        <label class="col-sm-3 col-form-label">{{ $info['label'] }}</label>
                                        <div class="col-sm-9">
                                            {{$info['value']}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group row align-items-center">
                            <label class="col-sm-3 col-form-label">Marital Status</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    @foreach($maritalStatus as $mrStatus)
                                        <div class="col-lg-2 col-md-3 col-6">
                                            <div class="form-check form-check-warning">
                                                <label class="form-check-label" onclick="event.preventDefault()">
                                                    <input type="radio" name="place_status" value="{{ $mrStatus['id'] }}"
                                                           @if(old('marital_status_id', $member->marital_status_id) == $mrStatus['id']) checked
                                                           @endif
                                                           class="form-check-input rounded-0">
                                                    {{ $mrStatus->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="">
                                <span>Current Home Address</span>
                            </label>
                            <div class="row">
                                @foreach(array(
                                        array('label'=>'Address Line 1', 'name'=>'home_address1', 'required' => true, 'value' => $member->home_address1),
                                        array('label'=>'Address Line 2', 'name'=>'home_address2', 'required' => false, 'value' => $member->home_address3),
                                        array('label'=>'Address Line 3', 'name'=>'home_address3', 'required' => false, 'value' => $member->home_address2),
                                        ) as $info)
                                    <div class="col-md-12 col-12">
                                        <div
                                            class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label">
                                                <span>{{ $info['label'] }}</span>
                                            </label>
                                            <div class="col-sm-9">
                                                {{$info['value']}}
                                            </div>
                                            @error($info['name'])
                                            <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="row">
                                @foreach(array(
                                        array('label'=>'Postcode', 'name'=>'home_postcode', 'required' => false, 'value'=> $member->home_postcode),
                                        array('label'=>'Town', 'name'=>'home_city', 'required' => false, 'value' => $member->home_city),
                                        array('label'=>'District', 'name'=>'home_district', 'required' => false, 'value' => $member->home_district),
                                        array('label'=>'State', 'name'=>'home_state', 'required'=> false,'value' => getName($member->home_state)),
                                        ) as $data)
                                    <div class="col-md-3 col-6">
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
                            <div class="col-12">
                                <div class="form-group row align-items-center">
                                    <label class="col-sm-3 col-form-label">Current Home Status</label>
                                    <div class="col-sm-9">
                                        {{ $member->home_stuts }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach(array(
                                    array('label'=>'Telephone (House)', 'required' => false, 'value'=> $member->telephone_one),
                                    array('label'=>'Hand phone:', 'required' => false, 'value' => $member->mobile_phone),
                                    array('label'=>'Email', 'required' => false, 'value' => $member->email),
                                    array('label'=>'Date starts of Staying', 'required'=> false,'value' => $member->start_of_stay),
                                    array('label'=>'Job', 'required'=> false,'value' => $member->job),
                                    ) as $data)
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <label class="form-label">
                                            <span>{{$data['label']}}</span>
                                        </label>
                                        <div class="">
                                            {{$data['value']}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @include('layouts.errors')
                        <div class="row">
                            @include('layouts.dependents')
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#customRelationShip').css('display', 'none');
        $('#custom_name').css('display', 'none');
        $('#telephone').prop('readonly', true);

        function checkNew() {
            if ($('input[name="custom"]').prop("checked") == true) {
                $('#custom_name').css('display', 'block');
                $('#exiting_name').css('display', 'none');
                $('#telephone').prop('readonly', false);
                $('#ic_no').prop('readonly', false);
                $('select[name="member_id"]').children('option[value=""]').prop('selected', true);
                $('input[name="telephone"]').val('');
                $('input[name="ic_no"]').val('');
            } else if ($('input[name="custom"]').prop("checked") == false) {
                $('#telephone').prop('readonly', true);
                $('#ic_no').prop('readonly', false);
                $('#custom_name').css('display', 'none');
                $('#exiting_name').css('display', 'block');
                $('input[name="member_name"]').val('');
                $('input[name="ic_no"]').val('');
                $('input[name="telephone"]').val('');
            }
        }

        $('input[name="custom"]').click(function () {
            checkNew();
        });
        $('[data-get="member"]').change(function (e) {
            var id = $(this).children(":selected").val();
            $.ajax({
                type: "get",
                url: "/member-data/" + id,
                cache: false,
                dataType: "json",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    console.log(response)
                    $('#telephone').val(response.mobile_phone);
                    $('#ic_no').val(response.ic_no);
                },
                error: function (error) {
                    console.log(error);
                },
            });
        });
    </script>
@endsection
