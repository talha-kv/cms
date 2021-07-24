@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{route('tags.create')}}" class="btn btn-success">Add tag</a>
</div>
<div class="card card-default">
    <div class="card-header">
        Tags
    </div>
    <div class="card-body">
        @if($tags->count() > 0)
        <table class="table">
            <thead>
            <th>
                Name
            </th>
            <th>
                Post Count
            </th>
            <th></th>
        </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <td>
                        {{$tag->name}}
                    </td>
                    <td>
                        {{$tag->posts->count()}}
                    </td>
                    <td>
                        <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-primary btn-sm"> Edit </a>
                        <button class="btn btn-danger btn-sm" onclick="handleDelete({{$tag->id}})"> Delete </button>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
        <!-- Modal -->
        
            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <form action="" method="POST" id="deletetagform">
                    @csrf
                    @method('DELETE')
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <div class="text-center text-bold">
                        Are you sure ypu want to delete this tag?
                    </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </div>
                </div>
            </form>
        </div>
        @else
           <h3 class="text-center">No tag Found</h3> 
        @endif
    </div>
</div>

@endsection

@section('scripts')

<script>
    function handleDelete(id)
    {
        var form = document.getElementById('deletetagform')
        form.action = 'tags/'+id
        $('#deletemodal').modal('show')
    }
</script>

@endsection