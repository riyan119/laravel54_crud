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
                                <th>
                                    <input type="checkbox" class="checkbox_all">
                                </th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($authors as $author)
                        <tr>
                            <td>
                            <input type="checkbox" class="checkbox_delete" name="entries_to_delete[]" value="{{$author->id}} ">
                            </td>
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
                <form action="{{route('authors.mass_destroy')}} " method="post" onsubmit="return confirm('are you sure?')">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="ids" id="ids" value="">
                    <input type="submit" value="DELETE SELECTED" class="btn btn-danger">
                </form>
                <!-- {{$authors->links()}} -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function getIDs()
    {
        var ids = []
        $('.checkbox_delete').each(function(){
            if($(this).is(":checked")){
                ids.push($(this).val())
            }
        })
        $('#ids').val(ids.join())
    }
    $(".checkbox_all").click(function(){
        $('input.checkbox_delete').prop('checked',this.checked)
        getIDs()
    })

    $('.checbox_delete').change(function(){
        getIDs()
    })

</script>
@endsection 