@extends('layout.front_main')
@section('content')
<global-home></global-home>


<script>
    window.processedData = @json($data);
    // console.log(window.processedData);
</script>
@endsection