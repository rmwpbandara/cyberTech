@extends('admin::index')

@section('panel_body')

    @if (Session::has('success'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif

    <form action="{{route('add_batches')}}" method="post" enctype="multipart/form-data" class="align-left">
        {{ csrf_field() }}
        <label>Batch Name : </label>
        <input name="batch_name" type="text">
        <input class="btn btn-success" type="submit" value="Add">
    </form>


    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Batch Name</th>
        </tr>
        </thead>
        <tbody>

        @foreach($batch_names as $batch_name)
        <tr>
            <td>{{$batch_name->id}}</td>
            <td>{{$batch_name->name}}</td>
        </tr>
        @endforeach

        </tbody>
    </table>


@endsection
