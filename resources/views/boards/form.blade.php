    <div class="mt-4">
        <form method="POST" action="{{ route('boards.store') }}">
            @csrf
        
            <div class="form-control mt-4">
                <span class="label-text">投稿者名</span>
                <h1 style="font-weight: bold; font-size: 20px;"><?php $user = Auth::user(); ?>{{ $user->user_name }}</h1>
            </div>
            
            <div class="form-control mt-4">
                <span class="label-text">ひとことメッセージ</span>
                <textarea rows="1" name="message" style=" border:solid 1px #000; border-radius: 10px; padding: 10px; margin-bottom: 20px;  background-color: #fff;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);min-height: 80px"></textarea>
            </div>
        
            <button type="submit" class="btn btn-info normal-case" style="width: 15%; text-align: right; margin-top: 10px; margin-left: 700px;">投稿する</button>
        </form>
    </div>
