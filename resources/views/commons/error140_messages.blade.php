@if (count($errors) > 0)

    @foreach ($errors->all() as $error)

    <div class="alert alert-error mb-4">

        <p>※140文字以内で入力してください</p>

    </div>

    @endforeach

@endif