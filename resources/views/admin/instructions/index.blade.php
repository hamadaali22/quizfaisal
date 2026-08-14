@extends('layout.admin_main')

@section('content')

<a href="{{ route('instructions.create') }}" class="btn btn-primary mb-3">
    Add Instruction
</a>

<table class="table table-bordered">

    <tr>
        <th>ID</th>
        <th>Level</th>
        <th>German</th>
        <th>Action</th>
    </tr>

    @foreach($instructions as $item)

    <tr>

        <td>{{ $item->id }}</td>

        <td>{{ optional($item->level)->name }}</td>

        <td>{{ Str::limit($item->desc_de,60) }}</td>

        <td>

            <a href="{{ route('instructions.edit',$item->id) }}" class="btn btn-warning">
                Edit
            </a>

            <form action="{{ route('instructions.destroy',$item->id) }}" method="POST" style="display:inline;">

                @csrf
                @method('DELETE')

                <button class="btn btn-danger" onclick="return confirm('Delete?')">

                    Delete

                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>

{{ $instructions->links() }}

@endsection