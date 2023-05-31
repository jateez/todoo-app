<h1>{{ $group->name }}</h1>
<p>{{ $group->description }}</p>

<form action="{{ route('groups.index') }}">
    <input type="submit" value="<-- Go Back" />
</form>

@if ($group->user_id === auth()->user()->id)
<form method="GET" action="{{ route('groups.edit', $group) }}" style="display: inline;">
    @csrf
    <button class="btn btn-light" type="submit">Edit</button>
</form>
@endif