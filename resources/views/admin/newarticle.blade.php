@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

		<div class="col-md-8">
			<a href="/admin/articles">Back</a>

    		<h3>New Article</h3>

	        <div class="card">
	        	<div class="card-body">
			    	<form action="/admin/articles" method="POST">
					    @csrf
					    
				        <div class="form-group">
				        	<label for="title">Title</label>
				        	<input type="text" class="form-control" id="title" name="title" />
				        </div>

				        <div class="form-group">
				        	<label for="content">Content</label>
				        	<textarea class="form-control" id="content" name="content" rows="10"></textarea>
				        </div>
						
						<div class="form-group">
				        	<label for="publish_state">Published?</label>
				        	<input type="checkbox" name="publish_state" checked />
				        </div>

				        <button class="btn btn-primary" type="submit">Save Article</button>
				    </form>
				</div>
			</div>
		</div>
    </div>
</div>
@endsection