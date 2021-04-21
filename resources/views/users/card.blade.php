<div class="card">
    <div class="card-body">
        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
        <img class="rounded-circle img-fluid" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
    </div>
    <div class="card-footer">{{ $user->name }}</div>
</div>
{{-- フォロー／アンフォローボタン --}}
@include('user_follow.follow_button')