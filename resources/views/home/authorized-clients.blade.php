@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            authorized
            <passport-authorized-clients></passport-authorized-clients>
        </div>
    </div>
</div>
@endsection
