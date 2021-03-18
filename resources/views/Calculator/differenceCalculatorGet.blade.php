@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')

<div class="container">
    <h1>Difference Calculator</h1>
    <form action="/differenceCalculatorPost" method="POST">
        @csrf
        <div class="form-group">
            <label>Earlier Date:</label>
            <input type="dateTime-local" name="earlierDate" class="form-control">
        </div>
        <div class="form-group">
            <label>Later Date:</label>
            <input type="dateTime-local" name="laterDate" class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-success btn-submit">Submit</button>
        </div>
    </form>
</div>
@endsection
<script type="text/javascript">
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".btn-submit").click(function(e){
        e.preventDefault();
        var earlierDate = $("input[name=earlierDate]").val();
        var laterDate = $("input[name=laterDate]").val();
        $.ajax({
           type:'POST',
           url:'{{url("/differenceCalculatorPost")}}'
           data:{earlierDate:earlierDate, laterDate:laterDate},
           success:function(data){
              alert(data.success);
           }
        });
    });
</script>