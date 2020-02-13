@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center card-body">
        <div class="col-md-3 card m-1 p-1">
            <p class="card-header text-white bg-danger">Countries</p>

            <p class="card-body">Get a list of countries and states under them. Endpoints located on <a href="" target="_blank">Postman</a></p>
            <div class="card-footer"><a href="https://github.com/elvis-onobo/everyday-apis" target="_blank">Open to contributions</a></div>
        </div>

        <div class="col-md-3 card m-1 p-1">
            <p class="card-header text-white bg-danger">Hubs</p>

            <p class="card-body">Built based on <a href="https://github.com/unicodeveloper/tech-hubs" target="_blank">Prosper Otemuyiwa's</a> Hubs in Nigeria Github project.
                Here, I organised the Hubs into an API by their states and
                countries (for hubs from other countries).
            </p>
            <div class="card-footer"><a href="https://github.com/elvis-onobo/everyday-apis" target="_blank">Open to contributions</a></div>
        </div>

        <div class="col-md-3 card m-1 p-1">
            <p class="card-header text-white bg-danger">Email</p>
            <p class="card-body">Coming soon</p>

            <div class="card-footer"><a mailto="elvis.onobo at gmail dot com" target="_blank">Open to Suggestions</a></div>
        </div>
    </div>
</div>
@endsection
