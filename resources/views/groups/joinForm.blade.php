<h2>Join a Group</h2>
<form action="{{ route('groups.join') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="joincode">Enter Join Code:</label>
        <input type="text" name="joincode" id="joincode" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Join</button>
</form>