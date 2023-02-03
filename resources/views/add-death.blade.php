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
                        <form class="forms-sample" action="{{ route('death.store') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
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
                                        array('label'=>'Full Name', 'name'=>'full_name'),
                                        array('label'=>'IC No', 'name'=>'ic_no'),
                                        array('label'=>'Address Line 1', 'name'=>'home_address1'),
                                        array('label'=>'Seksyen', 'name'=>'fafdsaf'),
                                        array('label'=>'City', 'name'=>'city'),
                                        array('label'=>'District', 'name'=>'district'),
                                        array('label'=>'State', 'name'=>'state'),
                                        array('label'=>'Date Of Birth', 'name'=>'birth_date'),
                                        array('label'=>'Home Telephone', 'name'=>'telephone'),
                                        array('label'=>'Other Name', 'name'=>'name2'),
                                        array('label'=>'Martial Status', 'name'=>'marital_status'),
                                        ) as $info)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group row align-items-center">
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
                            <div class="row">
                                @foreach(array(
                                        array('label'=>'Burial Contact Person:', 'name'=>'burial_contact_person', 'type' => 'text'),
                                        array('label'=>'Person Telephone', 'name'=>'burial_contact_person_tel', 'type' => 'text'),
                                        array('label'=>'Date of Death', 'name'=>'date_of_death', 'type' => 'date'),
                                        array('label'=>'Causes of Death', 'name'=>'cause_of_death', 'type' => 'textarea'),
                                        array('label'=>'Buiral Location', 'name'=>'burial_place', 'type' => 'text'),
                                        ) as $info)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group row @if($info['type'] != 'textarea') align-items-center @endif required">
                                            <label class="col-sm-3 col-form-label">
                                                <span>{{ $info['label'] }}</span>
                                            </label>
                                            <div class="col-sm-9">
                                            @if($info['type'] == 'text' || $info['type'] == 'date')
                                                <input type="{{ $info['type'] }}" name="{{$info['name']}}" placeholder="{{ $info['label'] }}"
                                                       value="{{ old($info['name']) }}" class="form-control"/>
                                            @elseif($info['type'] == 'textarea')
                                                <textarea class="form-control" name="{{$info['name']}}" id="{{$info['name']}}" placeholder="{{ $info['label'] }}" cols="30" rows="3">{{ old($info['name']) }}</textarea>
                                            @endif
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
                                @for($i=0;$i< 4; $i++)
                                    <div class="form-group mb-3 col-md-3 col-sm-4 col-6">
                                        <label for="exampleInputCity1">Image file</label>
                                        <input type="file" name="images[]" class="dropify" data-height="250"/>
                                    </div>
                                @endfor
                            </div>
                            <div class="row form-group required">
                                <label class="col-sm-3 col-form-label">
                                    <span>Memorial Service done by mosque?</span>
                                </label>
                                <div class="col-sm-9 flex-row flex-row">
                                    <div class="form-check form-check-warning me-4 d-inline-block">
                                        <label class="form-check-label">
                                            Yes
                                            <input type="radio" name="done_by_mosque"
                                                   @if(old('done_by_mosque') == '1') checked
                                                   @endif value="1"
                                                   class="form-check-input rounded-0">
                                        </label>
                                    </div>
                                    <div class="form-check form-check-warning d-inline-block">
                                        <label class="form-check-label">
                                            No
                                            <input type="radio" name="done_by_mosque"
                                                   @if(old('done_by_mosque') == '0') checked
                                                   @endif value="0"
                                                   class="form-check-input rounded-0">
                                        </label>
                                    </div>
                                </div>
                                @error('done_by_mosque')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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
                        {name: 'full_name', value: response.name},
                        {name: 'home_address1', value: response.home_address1},
                        {name: 'seksyen', value: response.seksyen},
                        {name: 'city', value: response.city},
                        {name: 'district', value: response.district},
                        {name: 'state', value: response.state},
                        {name: 'ic_no', value: response.ic_no},
                        {name: 'birth_date', value: response.birth_date},
                        {name: 'telephone', value: response.telephone},
                        {name: 'name', value: response.name2},
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
                    $('[name="marital_status_id"]').each((index, checkbox)=>{
                        let ids = response.marital_status_id;
                        if(ids == checkbox.value){
                            $(checkbox).prop('checked', true)
                        }

                    })
                }
            })
        }

        $('.dropify').dropify();
    </script>
@endsection
