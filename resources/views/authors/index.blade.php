@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Authors
                </div>
                <div class="panel-body">
                @if(session('message'))
                    <div class="alert alert-info">{{session('message')}} </div>
                @endif
                <a href="{{route('authors.create')}} ">Add new author</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($authors as $author)
                        <tr>
                            <td>{{$author->first_name}} </td>
                            <td>{{$author->last_name}} </td>
                            <td>
                                <a href="{{route('authors.edit',$author->id) }} " class="btn btn-default">Edit</a>
                                <form action="{{route('authors.destroy',$author->id)}} " method="POST" style="display:inline" onsubmit="return confirm('are you sure?');">
                                    <input type="hidden" name="_method" value="Delete">
                                    {{csrf_field()}}
                                    
                                    <button class="btn btn-danger">DELETE</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">No Entries Found.</td>
                        </tr>
                        @endforelse
                        </tbody>
                </table>
                {{$authors->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection