@extends('layout.front_main')
@section('content')
<global-home></global-home>


<script>
    window.processedData = @json($data);
    // console.log(window.processedData, "✅ Google data from Bladeccccc");
    // console.log($data, "✅ Google data from Bladeccccc");
</script>

@endsection