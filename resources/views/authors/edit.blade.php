@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Author
                </div>
                <div class="panel-body">
                @if($errors->count() > 0)
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}} </li>
                        @endforeach
                    </ul>
                @endif
                    <form action="{{route('authors.update',$author->id)}} " method="post">
                
                    <input type="hidden" name="_method" value="PUT">
                        {{csrf_field()}}
                        First Name <br>
                        <input type="text" name="first_name" value="{{$author->first_name}} ">
                        <br><br>
                        Last Name
                        <br>
                        <input type="text" name="last_name" value="{{$author->last_name}} ">
                        <br><br>
                        <input type="submit" value="Submit" class="btn btn-default">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection