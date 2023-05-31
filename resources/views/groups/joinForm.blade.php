
<form action="{{ route('groups.join') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="joinCode">Join Code</label>
        <input type="text" name="joincode" id="joincode" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Join Group</button>
</form>