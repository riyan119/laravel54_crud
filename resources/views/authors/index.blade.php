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
                @can('create',Author::class)
                <a href="{{route('authors.create')}} " class="btn btn-default">Add new author</a> <br><br>
                @endcan
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            @can('delete', Author::class)
                                <th>
                                    <input type="checkbox" class="checkbox_all">
                                </th>
                            @endcan
                                <th>First Name</th>
                                <th>Last Name</th>
                            @can('edit', Author::class)
                                <th>Actions</th>
                            @endcan
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($authors as $author)
                        <tr>
                        @can('delete',Author::class)
                            <td>
                            <input type="checkbox" class="checkbox_delete" name="entries_to_delete[]" value="{{$author->id}} ">
                            </td>
                        @endcan
                            <td>{{$author->first_name}} </td>
                            <td>{{$author->last_name}} </td>
                        @can('edit',Author::class)
                            <td>
                                <a href="{{route('authors.edit',$author->id) }} " class="btn btn-default">Edit</a>
                                @can('delete',Author::class)
                                <form action="{{route('authors.destroy',$author->id)}} " method="POST" style="display:inline" onsubmit="return confirm('are you sure?');">
                                    <input type="hidden" name="_method" value="Delete">
                                    {{csrf_field()}}
                                    <button class="btn btn-danger">DELETE</button>
                                </form>
                                @endcan
                            </td>
                        @endcan
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">No Entries Found.</td>
                        </tr>
                        @endforelse
                        </tbody>
                </table>
                @can('delete',Author::class)
                <form action="{{route('authors.mass_destroy')}} " method="post" onsubmit="return confirm('are you sure?')">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="ids" id="ids" value="">
                    <input type="submit" value="DELETE SELECTED" class="btn btn-danger">
                </form>
                @endcan
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

<!-- 

    php artisan vendor:publish --tag=lfm_config
php artisan vendor:publish --tag=lfm_public
 -->