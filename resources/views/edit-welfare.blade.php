@extends('layouts.app')

@section('content')
    @php $member = $welfare->member @endphp
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="card-title mb-3">Registration Of Welfare Help</h4>
                            </div>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="forms-sample" action="{{ route('welfare.update', $welfare->id) }}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group is-invalid">
                                <label>Help Category</label>
                                <div class="row">
                                    @foreach($help_categories as $category)
                                        <div class="col-lg-2 col-md-3 col-6">
                                            <div class="form-check form-check-warning">
                                                <label class="form-check-label">
                                                    {{ $category['name'] }}
                                                    <input type="radio" name="help_cat_id" value="{{ $category['id'] }}"
                                                           @if(old('help_cat_id', $welfare->help_cat_id) == $category['id']) checked
                                                           @endif
                                                           class="form-check-input rounded-0">
                                                </label>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @error('help_cat_id')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <input type="hidden" name="member_id" value="{{ old('member_id', $welfare->member_id) }}">
                            <div class="row">
                                    <label class="col-12 col-form-label" for=""><span>Select Member</span></label>
                                <div class="form-group col-12">
                                    <input type="text" class="form-control" value="{{ $member->name }}" readonly/>
                                </div>
                            </div>
                            <div class="row">
                                @foreach(array(
                                        array('label'=>'Applicant Mobile phone', 'name'=>'mobile_phone', 'value' => $member->mobile_phone),
                                        array('label'=>'Telephone (Home)', 'name'=>'telephone_one', 'value' => $member->telephone_one),
                                        array('label'=>'IC No', 'name'=>'ic_no', 'value' => $member->ic_no),
                                        array('label'=>'Marital Status', 'name'=>'marital_status', 'value' => $member->mobile_phone),
                                        array('label'=>'Jalan', 'name'=>'jalan', 'value' => $member->jalan),
                                        array('label'=>'Date Of Birth', 'name'=>'birth_date', 'value' => $member->birth_date),
                                        array('label'=>'Section', 'name'=>'section', 'value' => $member->section),
                                        array('label'=>'Date Starts of Stay', 'name'=>'start_of_stay', 'value' => $member->start_of_stay)) as $info)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label">{{ $info['label'] }}</label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly name="{{$info['name']}}"
                                                       value="{{ old($info['name'], $info['value']) }}"
                                                       class="form-control"/>
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
                            <div class="form-group">
                                <label>Years Received Zakat Previously</label>
                                <div class="row">
                                    @for($i=0;$i<5;$i++)
                                        @php
                                            $cyear = \Carbon\Carbon::today()->format('Y');
                                            $start = $cyear - 5;
                                            $end = ($cyear) + (5);

                                            $dbyears = json_decode($welfare->zakat_years) ?? [];
                                        @endphp
                                        <div class="col-lg-2 col-md-3 col-6">
                                            <select class="form-control" name="years[]">
                                                <option value="">Select Year</option>
                                                @for($start ; $start < $end; $start++)
                                                    <option value="{{ $start }}"
                                                            @if(old('years[]', isset($dbyears[$i])?$dbyears[$i]:'') == $start) selected @endif>{{ $start }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    @endfor
                                </div>
                                @error('years[]')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group required">
                                <label><span>Profession</span></label>
                                <div class="row">
                                    @foreach(array('Job', 'Un Employed') as $job)
                                        <div class="col-lg-2 col-md-3 col-6">
                                            <div class="form-check form-check-warning">
                                                <label class="form-check-label">
                                                    <input type="radio" name="current_job" value="{{ $job }}"
                                                           @if(old('current_job', $member->current_job) == $job) checked
                                                           @endif
                                                           class="form-check-input rounded-0">
                                                    {{ $job }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @error('current_job')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group row align-items-center unemployed collapsed">
                                <label class="col-12">Un Employed Reason</label>
                                <div class="col-12">
                                    <input type="text" name="unemployed_reason"
                                           value="{{ old('unemployed_reason', $member->unemployed_reason) }}"
                                           class="form-control"/>
                                </div>
                                @error('unemployed_reason')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group sector">
                                <label>Swctor</label>
                                <div class="row">
                                    @foreach($job_sectors as $sector)
                                        <div class="col-lg-2 col-md-3 col-6">
                                            <div class="form-check form-check-warning">
                                                <label class="form-check-label">
                                                    <input type="radio" name="job_sector_id" value="{{$sector['id']}}"
                                                           @if(old('job_sector_id', $member->current_job_sector_id) == $sector['id']) checked
                                                           @endif
                                                           class="form-check-input">
                                                    {{ $sector['name'] }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @error('job_sector')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group required">
                                <label><span>Status of Current Place Of Stay</span></label>
                                <div class="row">
                                    @foreach($home_types as $place)
                                        <div class="col-lg-2 col-md-3 col-6">
                                            <div class="form-check form-check-warning">
                                                <label class="form-check-label">
                                                    <input type="radio" name="home_status_id" value="{{ $place['id'] }}"
                                                           @if(old('home_status_id', $member->home_status_id) == $place['id']) checked
                                                           @endif
                                                           class="form-check-input">
                                                    {{ $place['name'] }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @error('home_status_id')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Summary</label>
                                <textarea class="form-control" name="summary" id="exampleTextarea1"
                                          rows="4">{{ old('summary', $welfare->remarks) }}</textarea>
                                @error('summary')
                                <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                            <div class="row">
                                @for($i=0;$i< 4; $i++)
                                    <div class="form-group mb-3 col-md-3 col-sm-4 col-6">
                                        <label for="exampleInputCity1">Image file</label>
                                        <input type="file" name="images[]" class="dropify"
                                               data-default-file="{{ asset('uploads/'. $welfare->{'attached_file'. $i+1}) }}"
                                               data-height="250"/>
                                        <input type="hidden" name="oldImages[]"
                                               value="{{ $welfare->{'attached_file'. $i+1} }}">
                                    </div>
                                @endfor
                            </div>
                            @error('images')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="row">
                                @foreach(array(
                                        array('label'=>'Name Of Complaint', 'name'=>'informer_name', 'type' => 'text', 'required'=> false, 'value' => $welfare->informer_name),
                                        array('label'=>'Date', 'name'=>'date_apply', 'type' => 'date', 'required'=> true, 'value' => formatDate($welfare->date_apply))) as $info)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group row align-items-center @if($info['required']) required @endif">
                                            <label class="col-sm-3 col-form-label"><span>{{ $info['label'] }}</span></label>
                                            <div class="col-sm-9">
                                                <input type="{{ $info['type'] }}" placeholder="{{ $info['label'] }}"
                                                       name="{{$info['name']}}"
                                                       value="{{ old($info['name'], $info['value']) }}"
                                                       class="form-control"/>
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
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a class="btn btn-light" id="back">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/dropify/dist/js/dropify.js') }}"></script>
    <script>
        let keywordEl = $('#search_key');
        $eventSelect = keywordEl.select2({
            placeholder: "Search Name/IC No",
            ajax: {
                method: 'POST',
                url: '/search-member',
                data: function (params) {
                    console.log(params)
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                },
                processResults: function (data) {
                    let items = [];
                    $(data).each((index, item) => {
                        items.push({id: item.id, text: item.name})
                    })
                    return {
                        results: items,
                    };
                }
            },
            change: (e) => {
                console.log(e)
            }

        });
        $eventSelect.on("change", function (e) {
            fetchData($(e.target).val())
        });

        function fetchData(id) {
            $.ajax({
                'url': '/member-data/' + id,
                'Method': 'POST',
                'content-type': 'json',
                'processData': false,
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: (response) => {
                    let names = [
                        {name: 'member_id', value: response.id},
                        {name: 'mobile_phone', value: response.mobile_phone},
                        {name: 'telephone_one', value: response.telephone},
                        {name: 'home_address1', value: response.home_address1},
                        {name: 'seksyen', value: response.seksyen},
                        {name: 'ic_no', value: response.ic_no},
                        {name: 'birth_date', value: response.birth_date},
                        {name: 'telephone', value: response.telephone},
                        {name: 'start_of_stay', value: response.start_of_stay},
                        {name: 'marital_status', value: response.marital_status}
                    ]
                    $(names).each((index, name) => {
                        $('[name="' + name.name + '"]').val(name.value)
                    })
                    $('[name="member_status_ids[]"]').each((index, checkbox) => {
                        let ids = JSON.parse(response.member_status_ids);
                        if (Array.isArray(ids)) {
                            if (ids.includes(checkbox.value)) {
                                $(checkbox).prop('checked', true)
                            }
                        } else {
                            $(checkbox).prop('checked', false)
                        }
                    })
                }
            })
        }

        let current_job = $("input[name='current_job']");
        current_job.click(() => {
            checkJOb();
        })
        checkJOb();


        $('.dropify').dropify();
    </script>
@endsection
