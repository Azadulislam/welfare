@extends('layouts.app')

@section('content')
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
                        <form class="forms-sample" action="{{ route('welfare.store') }}" enctype="multipart/form-data" method="post">
                            @csrf

                            <div class="form-group is-invalid">
                                <label>Help Category</label>
                                <div class="row">
                                    @foreach($help_categories as $category)
                                        <div class="col-lg-2 col-md-3 col-6">
                                            <div class="form-check form-check-warning">
                                                <label class="form-check-label">
                                                    {{ $category['name'] }}
                                                    <input type="radio" name="help_cat_id" value="{{ $category['id'] }}"  @if(old('help_cat_id') == $category['id']) checked @endif
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
                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-12 required">
                                    <label for=""><span>Select Member</span></label>
                                    <select class="form-control" id="search_key">
                                    </select>
                                    <input type="hidden" name="member_id" value="{{ old('member_id') }}">
                                    @error('member_id')
                                    <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                @foreach(array(
                                        array('label'=>'Applicant Mobile phone', 'name'=>'mobile_phone'),
                                        array('label'=>'Telephone (Home)', 'name'=>'telephone_one'),
                                        array('label'=>'IC No', 'name'=>'ic_no'),
                                        array('label'=>'Marital Status', 'name'=>'marital_status'),
                                        array('label'=>'Jalan', 'name'=>'jalan'),
                                        array('label'=>'Date Of Birth', 'name'=>'birth_date'),
                                        array('label'=>'Seksyen', 'name'=>'seksyen'),
                                        array('label'=>'Date Starts of Stay', 'name'=>'start_of_stay')) as $info)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label">{{ $info['label'] }}</label>
                                            <div class="col-sm-9">
                                                <input type="text" readonly name="{{$info['name']}}" value="{{ old($info['name']) }}" class="form-control"/>
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
                                <label>Pernah menerima bantuan dari institusi zakat</label>
                                <div class="row">
                                    @for($i=0;$i<5;$i++)
                                        @php
                                            $cyear = \Carbon\Carbon::today()->format('Y');
                                            $start = $cyear - 5;
                                            $end = ($cyear) + (5);
                                        @endphp
                                        <div class="col-lg-2 col-md-3 col-6">
                                            <select class="form-control" name="years[]">
                                                <option>Select Year</option>
                                                @for($start ; $start < $end; $start++)
                                                    <option value="{{ $start }}"  @if(old('years[]') == $start) selected @endif>{{ $start }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    @endfor
                                </div>
                                @error('years')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Profession</label>
                                <div class="row">
                                    @foreach(array('Job', 'Un Employed') as $job)
                                        <div class="col-lg-2 col-md-3 col-6">
                                            <div class="form-check form-check-warning">
                                                <label class="form-check-label">
                                                    <input type="radio" name="current_job"  value="{{ $job }}"  @if(old('current_job') == $job) checked @endif
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
                                <label class="">Un Employed Reason</label>
                                <div class="col-sm-9">
                                    <input type="text" name="unemployed_reason" class="form-control"/>
                                </div>
                                @error('unemployed_reason')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Swctor</label>
                                <div class="row">
                                    @foreach($job_sectors as $sector)
                                        <div class="col-lg-2 col-md-3 col-6">
                                            <div class="form-check form-check-warning">
                                                <label class="form-check-label">
                                                    <input type="radio" name="job_sector_id" value="{{$sector['id']}}"
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
                            <div class="form-group">
                                <label>Status of Current Place Of Stay</label>
                                <div class="row">
                                    @foreach($home_types as $place)
                                        <div class="col-lg-2 col-md-3 col-6">
                                            <div class="form-check form-check-warning">
                                                <label class="form-check-label">
                                                <input type="radio" name="home_status_id" value="{{ $place['id'] }}"  @if(old('home_status_id') == $place['id']) checked @endif
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
                                <textarea class="form-control" name="summary" id="exampleTextarea1" rows="4">{{ old('summary') }}</textarea>
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
                                        <input type="file" name="images[]" class="dropify" data-height="250"/>
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
                                        array('label'=>'Name Of Complaint', 'name'=>'informer_name', 'type' => 'text'),
                                        array('label'=>'Date', 'name'=>'date_apply', 'type' => 'date')) as $info)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label">{{ $info['label'] }}</label>
                                            <div class="col-sm-9">
                                                <input type="{{ $info['type'] }}" placeholder="{{ $info['label'] }}" name="{{$info['name']}}" value="{{ old($info['name']) }}" class="form-control"/>
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
                            <button class="btn btn-light">Cancel</button>
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
                    $(data).each((index, item)=>{
                        items.push({id: item.id, text: item.name})
                    })
                    return {
                        results:items,
                    };
                }
            },
            change: (e)=>{
                console.log(e)
            }

        });
        $eventSelect.on("change", function (e) { fetchData($(e.target).val()) });
        function fetchData(id){
            $.ajax({
                'url': '/member-data/'+id,
                'Method': 'POST',
                'content-type': 'json',
                'processData': false,
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success:(response)=> {
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
                    $('[name="member_status_ids[]"]').each((index, checkbox)=>{
                        let ids = JSON.parse(response.member_status_ids);
                        if(Array.isArray(ids)){
                            if(ids.includes(checkbox.value)){
                                $(checkbox).prop('checked', true)
                            }
                        }else{
                            $(checkbox).prop('checked', false)
                        }
                    })
                }
            })
        }

        let current_job = $("input[name='current_job']");
        current_job.click(()=>{
            checkJOb();
        })
        checkJOb();
        function checkJOb(){
            if($("input[name='current_job']:checked").val() === 'Un Employed'){
                $('.unemployed').show();
            }else{
                $('.unemployed').hide();
            }
        }

        $('.dropify').dropify();
    </script>
@endsection
