@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body text-primrayColor table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-title">Database</p>
                        </div>
                        <div class="col-md-6 text-end d-flex justify-content-end align-items-center gap-2">
                            <a href="{{ route('member.create') }}"
                               class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                <i class="fa-solid fa-plus"></i>
                                <img src="{{ asset('./images/add-user.svg') }}">
                            </a>
                            <button href="javascript:" onclick="printDiv('printContent')"
                               class="text-decoration-none text-dark bg-theme border-0 py-1 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                <img src="{{ asset('./images/print.svg') }}">
                            </button>
                        </div>
                    </div>
                    @include('layouts.errors')
                    <div id="printContent">
                        <table id="example" class="table table-theme">
                            <thead>
                            <tr>
                                <th class="">Name</th>
                                <th class="">Identification No</th>
                                <th class="">Address</th>
                                <th class="">Member Status</th>
                                <th class="">Checking Status</th>
                                <th class="action"><span class="sr-only">Action</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($members as $member)
                                <tr>
                                    <td>{{ $member['name'] }}</td>
                                    <td>{{ $member['ic_no'] }}</td>
                                    <td>{{ $member['home_address1'] }}</td>
                                    <td>{{ memberStatus($member['member_status_ids']) }}</td>
                                    <td>2011-04-25</td>
                                    <td class="action">
                                        <div class="flex flex-row gap-2 hide-print">
                                            <a href="{{ route('member.family', $member['id']) }}"
                                               class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                                <img class="d-block w-[30px] max-w-[30px] leading-[30px]"
                                                     src="{{ asset('./images/add-user.svg') }}">
                                            </a>
                                            <a href="{{ route('member.show', $member['id']) }}"
                                               class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                                <i class="fa-solid fa-eye w-[30px]  text-center leading-[30px]"></i>
                                            </a>
                                            <a href="{{ route('member.edit', $member['id']) }}"
                                               class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                                <i class="fa-solid fa-pencil w-[30px] text-center leading-[30px]"></i>
                                            </a>
                                            <form class="d-inline-block" method="post"
                                                  action="{{ route('member.destroy', $member['id']) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                                    <i class="fa-solid fa-trash-can w-[30px] text-center leading-[30px]"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
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
                responsive: {
                    details: false
                },
                "columnDefs": [ {
                    "targets": -1,
                    "orderable": false
                } ]

            });
        });
    </script>
@endsection
