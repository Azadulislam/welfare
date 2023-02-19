@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body text-primrayColor table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-title">Khairat Membership</p>
                        </div>
                        <div class="col-md-6 text-end d-flex justify-content-end align-items-center gap-2">
                            <a href="{{ route('khairat.create') }}"
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
                                <th class="">Date Become Member</th>
                                <th class="">Telephone</th>
                                <th class="">Address</th>
                                <th class="action"><span class="sr-only">Action</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($members as $member)
                                <tr>
                                    <td>{{ $member->member['name'] }}</td>
                                    <td>{{ $member->member['ic_no'] }}</td>
                                    <td>{{ $member['member_start_date'] }}</td>
                                    <td>{{ $member->member['mobile_phone'] }}</td>
                                    <td>{{ $member->member['home_address1'] }}</td>
                                    <td class="action">
                                        <div class="flex flex-row gap-2">
                                            <a href="{{ route('khairat.show', $member->id) }}"
                                               class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                                <i class="fa-solid fa-eye w-[30px]  text-center leading-[30px]"></i>
                                            </a>
                                            <a href="{{ route('khairat.edit', $member->id) }}"
                                               class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                                <i class="fa-solid fa-pencil w-[30px] text-center leading-[30px]"></i>
                                            </a>
                                            <form class="d-inline-block mb-0" method="post"
                                                  action="{{ route('khairat.destroy', $member['id']) }}">
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
                }
            });
        });
    </script>
@endsection

