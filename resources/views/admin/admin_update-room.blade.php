<!-- <form method="POST" action="{{ route('admin_update-room.update', $room->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="updatedValue" name="title" value="{{ $room->room_number }}">
    </div>
    <div class="form-group">
        <label for="body">Body:</label>
        <textarea class="form-control" id="room_description" name="">{{ $request->room_description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update Post</button>
</form> -->