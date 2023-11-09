@extends('layout')

<title>ホーム</title>

@section('content')
<div class="container">
    <section class="section">
        <div class="column is-8 is-offset-2">
            @if (session('success'))
                <div class="notification is-success">
                    {{ session('success') }}
                </div>
            @endif
            @foreach($springs as $spring)
            <div class="box media">
                <figure class="media-content">
                    <i class="fa-solid fa-hot-tub-person"></i>
                </figure>
                <div class="media-content">
                    <div class="content">
                        <p>
                            <strong>{{ $spring->name }}</strong>
                        </p>
                        <p>
                            {{ $spring->address }}
                        </p>
                        <p>
                            {{ $spring->note }}
                        </p>
                        <p class="content-option-space">
                            {{ $spring->user->name }} / {{ $spring->created_at }}
                        </p>

                        @if ($spring->user_id === Auth::user()->id)
                            {!! Form::open(['route' => ['springs.edit', $spring->id], 'method' => 'get']) !!}
                                <button type="submit" class="button is-primary is-small">編集</button>
                            {!! Form::close() !!}
                            {!! Form::open(['route' => ['springs.destroy', $spring->id], 'method' => 'delete']) !!}
                                <button type="submit" class="button is-danger is-small">削除</button>
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
            @foreach($spring->comments as $comment)
            <div class="column is-8 is-offset-4">
                <div class="box media">
                    <figure class="media-left">
                        <i class="fas fa-grin-beam"></i>
                    </figure>
                    <div class="media-content">
                        <p>
                            {{ $comment->text }}
                        </p>
                        <p class="content-option-space">
                            {{ $comment->user->name }} / {{ $comment->created_at }}
                        </p>
                        @if ($comment->user_id === Auth::user()->id)
                            {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}
                                <button type="submit" class="button is-danger is-small">削除</button>
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            {!! Form::open(['url' => '/comments']) !!}
                {!! Form::hidden('spring_id', $spring->id) !!}
                <div class="column is-6 is-offset-6">
                    <div class="field">
                        <label for="label">
                            コメント：
                        </label>
                        <p class="control">
                            {!! Form::textarea('text', null, ['class' => 'input is-medium', 'style' => 'height: 100px;']) !!}
                        </p>
                    </div>
                    <div class="field">
                        <p class="control" style="text-align: right;">
                            {!! Form::submit('コメント投稿', ['class' => 'button is-primary is-medium']) !!}
                        </p>
                    </div>
                </div>
            {!! Form::close() !!}
            @endforeach
        </div>
    </section>
</div>
<script src="{{ mix('js/app.js') }}"></script>
@endsection


<template>
    <div class="modal" :class="{ 'is-active': showModal }">
        <div class="modal-background" @click="closeModal"></div>
        <div class="modal-content">
            <!-- EditFormコンポーネントを呼び出す -->
            <edit-form :spring="spring" @close="closeModal"></edit-form>
        </div>
        <button class="modal-close is-large" @click="closeModal" aria-label="close"></button>
    </div>
</template>

<script>
import EditForm from './EditForm.vue';

export default {
    data() {
        return {
            showModal: false,
            editedSpring: null,
        };
    },
    methods: {
        openModal(event, spring) {
            event.preventDefault();
            this.editedSpring = spring;
            this.showModal = true;
        },
        closeModal() {
            this.editedSpring = null;
            this.showModal = false;
        },
    },
    components: {
        EditForm,
    },
};
</script>