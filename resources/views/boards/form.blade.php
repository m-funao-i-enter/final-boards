    <div class="mt-4">
        <form method="POST" action="{{ route('boards.store') }}">
            @csrf
        
            <div class="form-control mt-4">
                <span class="label-text">投稿者名</span>
                <h1><?php $user = Auth::user(); ?>{{ $user->user_name }}</h1>
            </div>
            
            <div class="form-control mt-4">
                <span class="label-text">ひとことメッセージ</span>
                <textarea rows="1" name="message" class="input input-bordered w-full"></textarea>
            </div>
        
            <button type="submit" class="btn btn-primary btn-block normal-case">投稿する</button>
        </form>
    </div>
