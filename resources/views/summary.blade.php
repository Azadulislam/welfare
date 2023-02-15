@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body text-primrayColor table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-title">Summary</p>
                        </div>
                        <div class="col-md-6 text-end d-flex justify-content-end align-items-center gap-2">
                            <button href="" id="print" onclick="printDiv('printContent')"
                               class="text-decoration-none text-dark bg-theme border-0 py-1 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                <img class="d-block w-[30px] max-w-[30px] leading-[30px]"
                                     src="{{ asset('./images/print.svg') }}">
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <select name="showBy">
                                    <option value="years">Years</option>
                                    <option value="months">Months</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                @php
                                    $cyear = Carbon\Carbon::today()->format('Y');
                                    $start = $cyear - 5;
                                    $end = ($cyear) + (5)
                                @endphp
                                <select name="year" id="years">
                                    <option value="">Select Year</option>
                                    @for($start ; $start < $end; $start++)
                                        <option value="{{ $start }}"
                                                @if(old('years[]') == $start) selected @endif>{{ $start }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div id="printContent">
                            <div class="dt-row">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <h5 class="mt-3">Death Cases</h5>
                                        <div class="row border border-bottom-0 m-0">
                                            <div class="col-6 border-right p-2">
                                                <span>Year</span>
                                            </div>
                                            <div class="col-6 p-2">
                                                <span>Total Death</span>
                                            </div>
                                        </div>
                                        <div class="death border">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="mt-3">Total Asnaf</h5>
                                        <div class="row border border-bottom-0 m-0">
                                            <div class="col-6 border-right p-2">
                                                <span>Year</span>
                                            </div>
                                            <div class="col-6 p-2">
                                                <span>Total Asnaf</span>
                                            </div>
                                        </div>
                                        <div class="asnaf border">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="mt-3">Total Death Khairat Members</h5>
                                        <div class="row border border-bottom-0 m-0">
                                            <div class="col-6 border-right p-2">
                                                <span>Year</span>
                                            </div>
                                            <div class="col-6 p-2">
                                                <span>Total Member</span>
                                            </div>
                                        </div>
                                        <div class="khairat border">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="mt-3">Total Welfare Recipients</h5>
                                        <div class="row border border-bottom-0 m-0">
                                            <div class="col-6 border-right p-2">
                                                <span>Year</span>
                                            </div>
                                            <div class="col-6 p-2">
                                                <span>Total Recipient</span>
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
                        console.log(attr)
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
