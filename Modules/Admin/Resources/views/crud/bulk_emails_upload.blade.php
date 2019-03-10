@extends('admin::index')

@section('panel_body')

    {{--<div align="center">--}}
    @if (Session::has('success'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif

    <form id="bulk_form" action="{{route('excelUpload')}}" method="post" enctype="multipart/form-data"
          class="align-left col-md-12">
        {{ csrf_field() }}
        <a class="btn btn-primary col-md-2" href='../../../emails.xlsx' target="_blank">Download Excel Format</a>

        <label class="col-md-6" style="display: inline"> Select Upload Excel Sheet Here :
            <input style="display: inline" name="import_file" type="file" value="Upload Excel">
        </label>

        <select class="col-md-2 dropdown-header" name="batch_id">
            <option value="0">Select Batch</option>
            @foreach($batch_names as $batch_name)
                <option class="dropdown-item" value="{{$batch_name->id}}">{{$batch_name->name}}</option>
            @endforeach
        </select>
        <span class="col-md-1"></span>
        <input class="btn btn-success btn-sm" type="submit" value="Upload">
        {{--<a class="btn btn-success col-md-1" href="{{route('add_batch_name')}}"> Add Batch</a>--}}
    </form>

    <br>
    <br>

    <h2 style="text-align: center">Current Emails</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Number</th>
            <th>Network ID</th>
            <th>Email</th>
            <th>Batch Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>

        @foreach($emails as $email)
            <tr>
                <td><label class="data_id">{{$email->id}}</label></td>
                <td><label class="data_name">{{$email->name}}</label></td>
                <td><label class="data_contact_number">{{$email->contact_number}}</label></td>
                <td><label class="data_network_id">{{$email->network_id}}</label></td>
                <td><label class="dara_email">{{$email->email}}</label></td>

                @foreach($batch_names as $batch_name)
                    @if($email->batch_id == $batch_name->id)
                        <td>
                            <label class="data_batch_name" data-id="{{$batch_name->id}}">{{$batch_name->name}}</label>
                        </td>
                    @endif
                @endforeach
                <td>
                    <form action="{{route('get_update_email')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$email->id}}">
                        <button type="submit" class="btn btn-info btn-sm edit_button">Edit</button>
                    </form>

                </td>
                <td>
                    <form action="{{route('delete_email')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$email->id}}">
                        <button type="submit" class="btn btn-danger btn-sm edit_button">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
    {{--</div>--}}

    <script>
        $('#bulk_form').submit(function () {

            var name = $(this).children('select').children("option:selected").val();

            if (name === "0") {
                alert('Please Select Batches.');
                return false;
            } else {
                return true;
            }
        });
    </script>
@endsection
