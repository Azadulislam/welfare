@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body text-primrayColor table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-title">{{ __('lang.lis_of_text') }} @if(!isset($category)) {{ __('lang.all_category_text') }}@else {{ $category }}{{ __('lang.s_text') }} @endif</p>
                        </div>
                        <div class="col-md-6 text-end d-flex justify-content-end align-items-center gap-2">
                            <a href="{{ route('service.create', $category_id ?? '') }}" title="Add Khairat"
                               class="text-decoration-none text-dark bg-theme border-0 py-1 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                <i class="fa-solid fa-plus me-2"></i>
                                @if(!isset($category))
                                    <img class="d-block w-[30px] max-w-[30px] h-[30px] leading-[30px]"
                                         src="{{ asset('./images/grid-view-icon.svg') }}">
                                @elseif($category == 'orphan')
                                    <img class="d-block w-[30px] max-w-[30px] h-[30px] leading-[30px]"
                                         src="{{ asset('./images/orphan.svg') }}">
                                @elseif($category == 'asnaf')
                                    <img class="d-block w-[30px] max-w-[30px] h-[30px] leading-[30px]"
                                         src="{{ asset('./images/asnaf.svg') }}">
                                @elseif($category == 'welfare')
                                    <img class="d-block w-[30px] max-w-[30px] h-[30px] leading-[30px]"
                                         src="{{ asset('./images/welfare.svg') }}">
                                @elseif($category == 'education')
                                    <img class="d-block w-[30px] max-w-[30px] h-[30px] leading-[30px]"
                                         src="{{ asset('./images/education.svg') }}">
                                @elseif($category == 'others')
                                    <img class="d-block w-[30px] max-w-[30px] h-[30px] leading-[30px]"
                                         src="{{ asset('./images/others.svg') }}">
                                @endif
                            </a>
                            <a href="" onclick="printDiv('printContent')" title="Print Table"
                               class="text-decoration-none text-dark bg-theme border-0 py-1 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                <img class="d-block w-[30px] max-w-[30px] leading-[30px]"
                                     src="{{ asset('./images/print.svg') }}">
                            </a>
                        </div>
                    </div>
                    @include('layouts.errors')
                    <div id="printContent">
                        <table id="example" class="table table-theme">
                            <thead>
                            <tr>
                                <th class="">{{ __('lang.name_text') }}</th>
                                <th class="">{{ __('lang.ic_no_text') }}</th>
                                <th class="">{{ __('lang.address_text') }}</th>
                                <th class="">{{ __('lang.member_status_text') }}</th>
                                <th class="action"><span class="sr-only">{{ __('lang.action_text') }}</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "language": {
                    "search": "{{ __('lang.search_text') }}:",
                    "lengthMenu": "{{ __('lang.show_text') }} _MENU_ {{ __('lang.entries_text') }}",

                    "info": "Showing _START_ to _END_ of _TOTAL_ entries (filtered from _MAX_ total entries)",
                    "paginate": {
                        "next": "{{ __('lang.next_text') }}",
                        "previous": "{{ __('lang.previous_text') }}"
                    },
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: '/welfare-list/'+ category,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    error:function (e) {
                        console.log(e.status)
                    }
                },
                columns: [
                    { data: 'name' },
                    { data: 'ic_no' },
                    { data: 'home_address1' },
                    { data: 'member_status', orderable: false},
                    { data: function (data, row, type) {
                            return '<div class="flex flex-row gap-2">\n' +
                                '    <a href="{{ url('/welfare-payment/') }}/'+data.id+'" title="Update Payment for welfare"\n' +
                                '       class="text-decoration-none text-dark bg-theme border-0 py-1 px-2 rounded text-xl flex flex-row gap-1 align-items-center">\n' +
                                '        <img class="d-block w-[30px] max-w-[30px] leading-[30px]"\n' +
                                '             src="{{ asset('./images/payment-icon.svg') }}">\n' +
                                '    </a>\n' +
                                '    <a href="{{ url('/welfare/') }}/'+ data.id+'" title="Welfare Details"\n' +
                                '       class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">\n' +
                                '        <i class="fa-solid fa-eye w-[30px]  text-center leading-[30px]"></i>\n' +
                                '    </a>\n' +
                                '    <a href="{{ url('/welfare/') }}/'+ data.id+'/edit" title="Edit Welfare"\n' +
                                '       class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">\n' +
                                '        <i class="fa-solid fa-pencil w-[30px] text-center leading-[30px]"></i>\n' +
                                '    </a>\n' +
                                '    <form class="d-none" method="post"\n' +
                                '          action="{{ url('/welfare/') }}/'+ data.id+'">\n' +
                                '        @csrf' +
                                '        @method('DELETE')' +
                                '        <button type="submit" onclick="confirmDelete(event)" title="Delete Welfare"\n' +
                                '                class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">\n' +
                                '            <i class="fa-solid fa-trash-can w-[30px] text-center leading-[30px]"></i>\n' +
                                '        </button>\n' +
                                '    </form>\n' +
                                '</div>'
                        }, orderable: false },
                ],
                responsive: {
                    details: false
                }
            });
        });
    </script>
@endsection
