@extends('layout.admin_main')

@section('content')

<a href="{{ route('instructions.create') }}" class="btn btn-primary mb-3">
    Add Instruction
</a>



<section id="keytable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- <div class="card-header">
                    <h4 class="card-title"></h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div> -->
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">

                        <table class="table table-striped table-bordered keytable-integration">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Level</th>
                                    <th>German</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach($instructions as $item)
                            <tbody>
                                <tr>

                                    <td>{{ $item->id }}</td>

                                    <td>{{ optional($item->level)->name }}</td>

                                    <td>{{ Str::limit($item->desc_de,60) }}</td>

                                    <td>

                                        <a href="{{ route('instructions.edit',$item->id) }}" class="btn btn-warning">
                                            Edit
                                        </a>

                                        <form action="{{ route('instructions.destroy',$item->id) }}" method="POST"
                                            style="display:inline;">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger" onclick="return confirm('Delete?')">

                                                Delete

                                            </button>

                                        </form>

                                    </td>

                                </tr>
                            </tbody>
                            @endforeach

                        </table>

                        {{ $instructions->links() }}


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>@endsection