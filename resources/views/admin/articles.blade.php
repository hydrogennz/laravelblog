@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-12">

			@if (session('success'))
			    <div class="alert alert-success">
			        {{ session('success') }}
			    </div>
			@endif
			
			<a class="btn btn-primary float-right" href="/admin/articles/create">New Article</a>

			<h2>Articles</h2>
			<admin-article-table></admin-article-table>
	    </div>

    </div>
</div>
@endsection