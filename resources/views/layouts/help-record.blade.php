<div class="helpRecord col-12 mb-4">
    <div class="row mt-3">
        <div class="col-12">
            <h5>Help Record</h5>
        </div>
    </div>

    <table id="example" class="table table-theme">
        <thead>
        <tr>
            <th class="">Date</th>
            <th class="">Help Category</th>
            <th class="">Help Type</th>
            <th class="">Remarks</th>
            <th class="">Value RM</th>
            <th class=""><span class="sr-only">Action</span></th>
        </tr>
        </thead>
        <tbody>
        @foreach($welfare->helps as $help)
            <tr>
                <td>{{ $help['created_at'] }}</td>
                <td>{{ $help->category->name }}</td>
                <td>{{ $help->type->name }}</td>
                <td>{{ $help->remarks }}</td>
                <td>{{ $help->service_cost }}</td>
                <td>
                    <div class="flex flex-row gap-2">
                        <a href="{{ route('welfare.show', $member['id']) }}"
                           class="d-none text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                            <i class="fa-solid fa-eye w-[30px]  text-center leading-[30px]"></i>
                        </a>
                        <a href="{{ route('help-provided.edit', $help['id']) }}"
                           class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
                            <i class="fa-solid fa-pencil w-[30px] text-center leading-[30px]"></i>
                        </a>
                        <form class="d-none" method="post" action="{{ route('death.destroy', $member['id']) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-decoration-none text-dark bg-theme border-0 py-2 px-2 rounded text-xl flex flex-row gap-1 align-items-center">
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
