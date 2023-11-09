@extends('layout')
<title>ログイン</title>
@section('content')
<div class="container">
    <section class="section">
        <div class="column is-4 is-offset-4">
            <h1 class="title is-2 has-text-centerd has-text-grey">ログイン</h1>
            {!! Form::open(['url' => '/login']) !!}
                <div class="box">
                    <div class="field">
                        <label for="label">
                            メールアドレス：
                            <p class="control">
                                {!! Form::email('email', old('email'), ['class' => 'input is-medium']) !!}
                            </p>
                        </label>
                    </div>

                    <div class="field">
                        <label for="label">
                            パスワード：
                            <p class="control">
                                {!! Form::password('password', ['class' => 'input is-medium']) !!}
                            </p>
                        </label>
                    </div>

                    <div class="field">
                        <p class="control">
                            {!! Form::submit('ログイン', ['class' => 'button is-primary is-medium', 'style' => 'width:100%']) !!}
                        </p>
                    </div>
                    <div>
                        <a href="users/create">ユーザー登録</a>    
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </section>
</div>
@endsection
