@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

		<div class="col-md-8">
			<a href="/">Back</a>
    		<article-view :article='@json($article)'></article-view>
	    </div>

    </div>
</div>
@endsection