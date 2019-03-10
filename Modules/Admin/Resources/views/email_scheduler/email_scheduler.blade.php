@extends('admin::index')

@section('panel_body')

    {{--<div align="center">--}}
    @if (Session::has('success'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">X</a>
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif

    <form class="" action="{{route('schedule_email_save')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="sel1">To :</label>
            <select class="form-control" id="batch" name="batch_id">
                <option value="0">Select Batch</option>
                @foreach($batch_names as $batch_name)
                    <option value="{{$batch_name->id}}">{{$batch_name->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="subject">Subject :</label>
            <input type="text" class="form-control" name="email_subject">
        </div>

        <div class="form-group">
            <label for="email_body_type">Email Body Type :</label>
            <select class="form-control" name="email_body_type">
                <option>Text</option>
                <option>Html</option>
            </select>
        </div>

        <div class="form-group">
            <label for="email_body">Email Body:</label>
            <textarea class="form-control" name="email_body" rows="5" id="email_body" onkeyup="countChar(this)"></textarea>
            <label for="email_body">Remaining Character : <span id="character_cnt"></span></label>
        </div>

        <div class="form-group">
            <label for="email_date">Sending Date :</label>
            <input type="date" class="form-control" name="email_date">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>

    <script>
        function countChar(val) {
            var len = val.value.length;
            if (len >= 500) {
                val.value = val.value.substring(0, 500);
            } else {
                $('#character_cnt').text(500 - len);
            }
        }
    </script>

@endsection
