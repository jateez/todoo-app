<form method="POST" action="{{ route('groups.update', $group) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="description">Group Description</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{ $group->description }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>