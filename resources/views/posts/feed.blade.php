<div>
    @foreach ($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $post->user->name }}</h6>
                <p class="card-text">{{ $post->content }}</p>

                <div class="btn-group" role="group" aria-label="Post actions">
                    @can('view', $post)
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-info">View</a>
                    @endcan
                    @can('update', $post)
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    @endcan
                    @can('delete', $post)
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    @endforeach

    {{ $posts->links() }}
</div>
