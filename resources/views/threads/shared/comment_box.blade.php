<div class="mt-5">
    <form action="{{ route("threads.comments.store", $thread->id) }}" method="POST" class="mb-6">
        @csrf
        <div class="mb-3">
            <label for="content" class="block text-xl font-semibold text-gray-700 mb-3 mt-3">Comment</label>
            <textarea name="content" id="content" class="form-control border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-md py-2 px-3 h-20 resize-none" placeholder="Write your comment here..." required></textarea>
        </div>
        <div>
            <button type="submit" class="block w-full px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-md transition duration-300">Post Comment</button>
        </div>
    </form>
    <hr class="my-6">
    @foreach ($thread->comments->sortByDesc('created_at') as $comment)
    <div class="flex items-start mt-6">
        <img class="w-12 h-12 rounded-full" src="{{ $comment->user->getImageURL() }}" alt="{{ $comment->user->name }}">
        <div class="ml-4 w-full">
            <div class="flex justify-between">
                <h6 class="text-lg font-semibold">{{$comment->user->name}}</h6>
                <small class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</small>
            </div>
            <p class="mt-3 text-sm text-gray-600" id="comment-content">
                <?php
                $content = $comment->content;
                $wrappedContent = wordwrap($content, 65, "\n", true);
                echo htmlentities($wrappedContent);
                ?>
            </p>            
        </div>
    </div>    
    <hr class="my-6">
    @endforeach
</div>
