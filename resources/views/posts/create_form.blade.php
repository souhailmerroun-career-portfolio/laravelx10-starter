<form action="{{ route('posts.store') }}" method="POST" class="mt-3">
    @csrf

    <div class="form-group">
        <label for="title" class="form-label">Title:</label>
        <input type="text" name="title" id="title" required class="form-control">
    </div>

    <div class="form-group">
        <label for="content" class="form-label">Content:</label>
        <textarea name="content" id="content" required class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Create Post</button>
</form>
