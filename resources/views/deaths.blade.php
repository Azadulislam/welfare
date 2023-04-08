@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body text-primrayColor table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-title">{{ __('lang.death_cases_text') }}</p>
                        </div>
                        <div class="col-md-6 text-end d-flex justify-content-end align-items-center gap-2">
                            <a href="{{ route('death.create') }}" title="Add Death"
                               class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                <i class="fa-solid fa-plus"></i>
                                <img src="{{ asset('./images/death.svg') }}">
                            </a>
                            <a href="" title="Print Content"
                               class="text-decoration-none text-dark bg-theme border-0 py-1 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                <img src="{{ asset('./images/print.svg') }}">
                            </a>
                        </div>
                    </div>
                    @include('layouts.errors')
                    <table id="example" class="table table-theme">
                        <thead>
                        <tr>
                            <th class="">{{ __('lang.name_text') }}</th>
                            <th class="">{{ __('lang.identification_no_text') }}</th>
                            <th class="">{{ __('lang.address_text') }}</th>
                            <th class="">{{ __('lang.date_of_death_text') }}</th>
                            <th class="">{{ __('lang.burial_place_text') }}</th>
                            <th class="">{{ __('lang.member_status_text') }}</th>
                            <th class=""><span class="sr-only">{{ __('lang.action_text') }}</span></th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
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
                    url: '/death-list',
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
                    { data: 'date_of_death' },
                    { data: 'burial_place' },
                    { data: 'member_status', orderable: false},
                    { data: function (data, row, type) {
                            return '<div class="flex flex-row gap-2">\n' +
                                '    <a href="{{ url('/death/') }}/'+ data.id+'" title="See Death Details"' +
                                '       class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">\n' +
                                '        <i class="fa-solid fa-eye w-[30px]  text-center leading-[30px]"></i>\n' +
                                '    </a>\n' +
                                '    <a href="{{ url('/death/') }}/'+ data.id+'/edit" title="Edit Death Record"' +
                                '       class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">\n' +
                                '        <i class="fa-solid fa-pencil w-[30px] text-center leading-[30px]"></i>\n' +
                                '    </a>\n' +
                                '    <form method="post"\n' +
                                '          action="{{ url('/death/') }}/'+ data.id+'">\n' +
                                '        @csrf' +
                                '        @method('DELETE')' +
                                '        <button type="submit" onclick="confirmDelete(event)" title="Delete Death Record"' +
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
