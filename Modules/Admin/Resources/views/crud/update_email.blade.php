@extends('admin::index')

@section('panel_body')

    @if (Session::has('success'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif

    <form action="{{route('update_email')}}" method="post" enctype="multipart/form-data" class="align-left">
        {{ csrf_field() }}

        <label> Name :</label>
        <input type="text" name="name" class="input-group" value="{{$update_email->name}}">

        <label > Contact Number :</label>
        <input type="number" name="contact_number" class="input-group" value="{{$update_email->contact_number}}">

        <label> Network ID :</label>
        <input type="text" name="network_id" class="input-group" value="{{$update_email->network_id}}">

        <label > Email :</label>
        <input type="email" name="email" class="input-group" value="{{$update_email->email}}">

        <label > Batch Name :</label>

        <select class="dropdown-header" name="batch_id">
            @foreach($batch_names as $batch_name)
                <option {{ $update_email->batch_id == $batch_name->id ? "selected" : "" }} class="dropdown-item" value="{{$batch_name->id}}">{{$batch_name->name}}</option>
            @endforeach
        </select>

        <br>
        <input type="hidden" name="id" class="input-group" value="{{$update_email->id}}">

        <input class="btn btn-success" type="submit" value="Update">
    </form>


@endsection

