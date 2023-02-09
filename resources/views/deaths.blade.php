@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body text-primrayColor table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-title">Death Cases</p>
                        </div>
                        <div class="col-md-6 text-end d-flex justify-content-end align-items-center gap-2">
                            <a href="{{ route('death.create') }}"
                               class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                <i class="fa-solid fa-plus"></i>
                                <img src="{{ asset('./images/death.svg') }}">
                            </a>
                            <a href=""
                               class="text-decoration-none text-dark bg-theme border-0 py-1 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                <img src="{{ asset('./images/print.svg') }}">
                            </a>
                        </div>
                    </div>
                    @include('layouts.errors')
                    <table id="example" class="table table-theme">
                        <thead>
                        <tr>
                            <th class="">Name</th>
                            <th class="">Identification No</th>
                            <th class="">Address</th>
                            <th class="">Date of Death</th>
                            <th class="">Burial Place</th>
                            <th class="">Member Status</th>
                            <th class=""><span class="sr-only">Action</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $member)
                            @php $all_member = $member->member @endphp
                            <tr>
                                <td>{{ $all_member['name'] }}</td>
                                <td>{{ $all_member['ic_no'] }}</td>
                                <td>{{ $all_member['home_address1'] }}</td>
                                <td>{{ $member['date_of_death'] }}</td>
                                <td>{{ $member['burial_place'] }}W</td>
                                <td>{{ memberStatus($all_member['member_status_ids']) }}</td>
                                <td>
                                    <div class="flex flex-row gap-2">
                                        <a href="{{ route('death.show', $member['id']) }}"
                                           class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                            <i class="fa-solid fa-eye w-[30px]  text-center leading-[30px]"></i>
                                        </a>
                                        <a href="{{ route('death.edit', $member['id']) }}"
                                           class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                                            <i class="fa-solid fa-pencil w-[30px] text-center leading-[30px]"></i>
                                        </a>
                                        <form class="d-inline-block" method="post"
                                              action="{{ route('death.destroy', $member['id']) }}">
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
