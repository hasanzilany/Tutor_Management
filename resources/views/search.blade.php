@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <form class="search">
                      <input class="searchTerm" placeholder="Enter your search term ..." /><input class="searchButton" type="submit" />
                    </form>                    
                </div>

                <div class="panel-body">
                    <form class="searchitems">
                      
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection