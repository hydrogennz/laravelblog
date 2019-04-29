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
			
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Title</th>
			      <th scope="col">Author</th>
			      <th scope="col">Status</th>
			      <th scope="col">Publish Date</th>
			      <th scope="col"># Views</th>
			      <th scope="col">Actions</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@if(count($articles))
					@foreach ($articles as $article)
						<tr is="admin-article-table-item" :article='@json($article)'></tr>
					@endforeach
				@else
					<tr><td colspan="100%">There are no articles here yet</td></tr>
				@endif
			  </tbody>
			</table>
	    </div>

    </div>
</div>
@endsection