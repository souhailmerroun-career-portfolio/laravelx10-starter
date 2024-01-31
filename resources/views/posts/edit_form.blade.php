<form action="{{ route('posts.update', $post->id) }}" method="POST" class="mt-3">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title" class="form-label">Title:</label>
        <input type="text" name="title" id="title" value="{{ $post->title }}" required class="form-control">
    </div>

    <div class="form-group">
        <label for="content" class="form-label">Content:</label>
        <textarea name="content" id="content" required class="form-control">{{ $post->content }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update Post</button>
</form>
