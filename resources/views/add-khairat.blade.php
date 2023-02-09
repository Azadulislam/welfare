@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="card-title mb-3">Registration Death Khairat Member</h4>
                            </div>
                        </div>
                        <form class="forms-sample" action="{{ route('khairat.store') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-12">
                                    <select name="member_id" class="form-control" id="search_key">
                                    </select>
                                    <input type="hidden" name="member_id" value="{{ old('member_id') }}">
                                    @error('member_id')
                                    <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                @foreach(array(
                                        array('label'=>'Full Name', 'name'=>'name'),
                                        array('label'=>'IC No', 'name'=>'ic_no')) as $info)
                                    <div class="col-md-12 col-12">
                                        <div class="form-group row align-items-center required">
                                            <label class="col-sm-3 col-form-label">
                                                <span>{{ $info['label'] }}</span>
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="{{$info['name']}}" readonly
                                                       value="{{ old($info['name']) }}" class="form-control"/>
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
                            <div class="form-group is-invalid row required align-items-center">
                                <label class="col-md-3 col-6 mb-0">
                                    <span>Member Type</span>
                                </label>
                                <div class="col-md-9 col-6 row">
                                    @foreach($member_statuses as $job)
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="form-check form-check-warning">
                                                <label class="form-check-label">
                                                    {{ $job['name'] }}
                                                    <input type="checkbox" name="member_status_ids[]"
                                                           onclick="event.preventDefault()"
                                                           @if(is_array(old('member_status_ids'))) @if( in_array($job['id'], old('member_status_ids') )) checked
                                                           @endif @endif value="{{ $job['id'] }}"
                                                           class="form-check-input rounded-0">
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @error('member_status_ids')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="row">
                                @foreach(array(
                                        array('label'=>'Date of Birth', 'name'=>'birth_date', 'type' => 'date', 'required' => true),
                                        array('label'=>'Citizenship', 'name'=>'citizenship', 'type' => 'text', 'required'=> true),
                                        array('label'=>'Gender', 'name'=>'gender', 'type' => 'text', 'required' => false),
                                        array('label'=>'Race', 'name'=>'race', 'type' => 'text', 'required' => false),
                                        array('label'=>'Religion', 'name'=>'religion_id', 'type' => 'text', 'required' => false),
                                        ) as $data)
                                    <div class="col-md-3 col-6">
                                        <div class="form-group @if($data['required']) required @endif">
                                            <label class="form-label">
                                                <span>{{$data['label']}}</span>
                                            </label>
                                            @if($data['type'] == 'text' || $data['type'] == 'date')
                                                <input type="{{ $data['type'] }}" name="{{$data['name']}}"
                                                       value="{{ old($data['name']) }}" class="form-control" readonly/>
                                            @elseif($data['type'] == 'select')
                                                <select class="form-control" name="{{$data['name']}}" readonly>
                                                    <option value="">{{ $data['default'] }}</option>
                                                    @foreach($data['values'] as $value)
                                                        <option value="{{ $value['id'] ?? $value }}"
                                                                @if(old($data['name']) == $value['id'] ?? $value) selected @endif>{{ $value['name'] ?? $value }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                            @error($data['name'])
                                            <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group is-invalid row align-items-center required">
                                <label class="col-md-3 col-6 mb-0">
                                    <span>Marital Status</span>
                                </label>
                                <div class="col-md-9 col-6 row">
                                    @foreach($maritalStatuses as $status)
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="form-check form-check-warning">
                                                <label class="form-check-label" onclick="event.preventDefault()">
                                                    {{ $status['name'] }}
                                                    <input type="radio" name="marital_status_id"
                                                           @if(old('marital_status_id') == $status['id']) checked
                                                           @endif value="{{ $status['id'] }}"
                                                           class="form-check-input rounded-0">
                                                </label>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @error('member_status_id')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="row">
                                @foreach(array(
                                        array('label'=>'Membership Start Date', 'name'=>'member_start_date', 'type' => 'date', 'required' => false),
                                        array('label'=>'Approval Date', 'name'=>'approval_date', 'type' => 'date', 'required' => false),
                                        ) as $data)
                                    <div class="col-md-3 col-6">
                                        <div class="form-group @if($data['required']) required @endif">
                                            <label class="form-label">
                                                <span>{{$data['label']}}</span>
                                            </label>
                                            @if($data['type'] == 'text' || $data['type'] == 'date')
                                                <input type="{{ $data['type'] }}" name="{{$data['name']}}"
                                                       value="{{ old($data['name']) }}" class="form-control"/>
                                            @endif
                                            @error($data['name'])
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
                        {name: 'name', value: response.name},
                        {name: 'ic_no', value: response.ic_no},
                        {name: 'birth_date', value: response.birth_date},
                        {name: 'citizenship', value: response.citizenship},
                        {name: 'gender', value: response.gender},
                        {name: 'race', value: response.race},
                        {name: 'religion_id', value: response.religion},
                    ]
                    $(names).each((index, name) => {
                        let attr = name.name;
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
                    $('[name="marital_status_id"]').each((index, checkbox) => {
                        let ids = response.marital_status_id;
                        if (ids == checkbox.value) {
                            $(checkbox).prop('checked', true)
                        }

                    })
                }
            })
        }
    </script>
@endsection
