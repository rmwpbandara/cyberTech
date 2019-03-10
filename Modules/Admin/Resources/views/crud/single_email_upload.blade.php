@extends('admin::index')

@section('panel_body')

    @if (Session::has('success'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif

    <br>
    <br>

    <form action="{{route('singleUpload')}}" method="post" enctype="multipart/form-data" class="align-left">
    {{ csrf_field() }}

        <label> Name :</label>
        <input type="text" name="name" class="input-group">

        <label > Contact Number :</label>
        <input type="number" name="contact_number" class="input-group">

        <label> Network ID :</label>
        <input type="text" name="network_id" class="input-group">

        <label > Email :</label>
        <input type="email" name="email" class="input-group">

        <label > Batch Name :</label>

        <select class="dropdown-header" name="batch_id">
            @foreach($batch_names as $batch_name)
                <option class="dropdown-item" value="{{$batch_name->id}}">{{$batch_name->name}}</option>
            @endforeach
        </select>

        <br>
        <br>
        <input class="btn btn-danger" type="button" value="cancel">
        <input class="btn btn-success" type="submit" value="Submit">


    </form>


@endsection
