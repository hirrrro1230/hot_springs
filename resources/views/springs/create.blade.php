@extends('layout')
<title>新規登録</title>
@section('content')

<div class="container">
    <section class="section">
        <div class="column is-4 is-offset-4">
            <h1 class="title is-2 has-text-centered has-text-grey">新規登録</h1>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::open(['url' => '/springs']) !!}
                <div class="box">
                    <div class="field">
                        <label for="label">
                            温泉名：
                        </label>
                        <p class="control">
                            {!! Form::text('name', null, ['class' => 'input is-medium']) !!}
                        </p>
                    </div>
                    <br>
                    <div class="field">
                        <label for="label">
                            住所：
                        </label>
                        <p class="control">
                            {!! Form::text('address', null, ['class' => 'input is-medium']) !!}
                        </p>
                    </div>
                    <br>
                    <div class="field">
                        <label for="label">
                            メモ：
                        </label>
                        <p class="control">
                            {!! Form::textarea('note', null, ['class' => 'input is-medium', 'style' => 'height: 100px;']) !!}
                        </p>
                    </div>
                    <br>
                    <div class="field">
                        <p class="control" style="width:100%">
                            {!! Form::submit('投稿', ['class' => 'button is-primary is-medium', 'style' => 'width:100%']) !!}
                        </p>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </section>
</div>
@endsection