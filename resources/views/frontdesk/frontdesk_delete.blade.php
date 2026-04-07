<form action="{{ route('frontdesk.reservation.destroy', $index->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="button"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#" style="position: relative; top: 36px; left: -55px;" ><i class="fa-solid fa-eye"></i></button><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#" style="position: relative; top: 36px; left: -50px; width: 30px;" ><i class="fa-solid fa-xmark"></i></button>
</form>