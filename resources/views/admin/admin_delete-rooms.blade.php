<form action="{{ route('admin_delete-rooms.destroy', $room->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <p>Are you sure you want to delete this item?</p>
    <button type="submit" class="btn btn-danger">Delete Room</button>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</form>