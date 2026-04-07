<!-- <form method="POST" action="{{ route('admin.room.update', $request->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $request->room_number }}">
    </div>
    <div class="form-group">
        <label for="body">Body:</label>
        <textarea class="form-control" id="body" name="body">{{ $request->body }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update Post</button>
</form> -->