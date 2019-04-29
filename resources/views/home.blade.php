@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-md-10">
	    	<div class="jumbotron bg-dark text-white">
				<h1 class="display-4">Laravel Blog Example</h1>

				<p class="lead">This is a basic blog designed to demonstrate a few aspects of Laravel, VueJS and a MongoDB backend.</p>
				
				<hr class="my-4">
				
				<p>
					It uses the built in Laravel Auth with MySQL and uses a MongoDB collection for storing the articles.
					<br /> I have chosen to use Laravel blades for the back end CRUD views and used Vue JS components for displaying public views.
					<br /> I have used an API resource controller for fetching the data below that is rendered in Vue JS.
					<br /> For the back end views I am simply passing through the resources into the blade views.
				</p>
			</div>

	    	<article-list></article-list>
	    </div>
    </div>
</div>
@endsection