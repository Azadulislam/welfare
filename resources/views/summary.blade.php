@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body text-primrayColor table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-title">{{ __('lang.summary_text') }}</p>
                        </div>
                        <div class="col-md-6 text-end d-flex justify-content-end align-items-center gap-2">
                            <button href="" id="print" onclick="printDiv('printContent')" title="Print Content"
                               class="text-decoration-none text-dark bg-theme border-0 py-1 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                <img class="d-block w-[30px] max-w-[30px] leading-[30px]"
                                     src="{{ asset('./images/print.svg') }}">
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <select name="showBy">
                                    <option value="years">{{ __('lang.years_text') }}</option>
                                    <option value="months">{{ __('lang.months_text') }}</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                @php
                                    $cyear = Carbon\Carbon::today()->format('Y');
                                    $start = $cyear - 5;
                                    $end = ($cyear) + (5)
                                @endphp
                                <select name="year" id="years">
                                    <option value="">{{ __('lang.select_year_text') }}</option>
                                    @for($start ; $start < $end; $start++)
                                        <option value="{{ $start }}"
                                                @if(old('years[]') == $start) selected @endif>{{ $start }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div id="printContent">
                            <div class="dt-row">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-10 mb-5 mt-3">
                                    <div class="col-md-6">
                                        <h5 class="mt-3">{{ __('lang.death_cases_text') }}</h5>
                                        <div class="row border border-bottom-0 m-0">
                                            <div class="col-6 border-right p-2">
                                                <span>{{ __('lang.year_text') }}</span>
                                            </div>
                                            <div class="col-6 p-2">
                                                <span>{{ __('lang.total_death_text') }}</span>
                                            </div>
                                        </div>
                                        <div class="death border">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="mt-3">{{ __('lang.total_asnaf_text') }}</h5>
                                        <div class="row border border-bottom-0 m-0">
                                            <div class="col-6 border-right p-2">
                                                <span>{{ __('lang.year_text') }}</span>
                                            </div>
                                            <div class="col-6 p-2">
                                                <span>{{ __('lang.total_asnaf_text') }}</span>
                                            </div>
                                        </div>
                                        <div class="asnaf border">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="mt-3">{{ __('lang.total_death_khairat_members_text') }} </h5>
                                        <div class="row border border-bottom-0 m-0">
                                            <div class="col-6 border-right p-2">
                                                <span>{{ __('lang.year_text') }}</span>
                                            </div>
                                            <div class="col-6 p-2">
                                                <span>{{ __('lang.total_member_text') }}</span>
                                            </div>
                                        </div>
                                        <div class="khairat border">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="mt-3">{{ __('lang.total_welfare_recipients_text') }}</h5>
                                        <div class="row border border-bottom-0 m-0">
                                            <div class="col-6 border-right p-2">
                                                <span>{{ __('lang.year_text') }}</span>
                                            </div>
                                            <div class="col-6 p-2">
                                                <span>{{ __('lang.total_recipient_text') }}</span>
                                            </div>
                                        </div>
                                        <div class="welfare border">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
    <script>
        let show_by = $('[name="showBy"]');
        let year_El = $('[name="year"]');
        show_by.change((e)=>{
            showBy()
        })

        year_El.change((e)=>{
            showBy()
        })
        showBy();

        function showBy() {
            let get = show_by.children(':selected').val();
            if(get === 'months'){
                year_El.show();
            }else{
                year_El.hide();
            }
            let year_no = year_El.children(':selected').val();
            console.log(year_no);
            $.ajax({
                type: "POST",
                url: "{{ route('summary') }}",
                data:  {
                    'get': get,
                    'year': year_no,
                },
                cache: false,
                dataType: "json",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    let div = $('.deathCases');
                    let deathTable = $('.deathTable');
                    var years = $("#year");
                    var presents = $("#present");
                    years.html('');
                    presents.html('');
                    $.each(response, function( attr, data ) {
                        $('.' + attr).html('');
                        $.each(response[attr], function( index, value ) {
                            $.each(value, function(key, item){

                                $('.' + attr).append(
                                    '<div class="row border-bottom m-0">' +
                                    '   <div class="col-6 p-2 border-right">' +
                                    '      <span>'+ key +'</span>' +
                                    '   </div>' +
                                    '   <div class="col-6 p-2">' +
                                    '      <span>'+ item +'</span>' +
                                    '   </div>'+
                                    '</div>'
                                )
                            })
                        })
                    });

                },
                error: function (error) {
                    console.log(error);
                },
            });
        }
    </script>
@endsection
