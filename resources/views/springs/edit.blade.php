@extends('layout')

<title>温泉編集</title>

@section('content')
    <div class="container">
        <section class="section">
            <div class="column is-8 is-offset-2">
                <!-- Edit form goes here -->
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('springs.update', $spring->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    {!! Form::open(['url' => '/springs']) !!}
                        <div class="box">
                            <div class="field">
                                <label for="label">
                                    温泉名：
                                </label>
                                <p class="control">
                                    {!! Form::text('name', $spring->name, ['class' => 'input is-medium']) !!}
                                </p>
                            </div>
                            <br>
                            <div class="field">
                                <label for="label">
                                    住所：
                                </label>
                                <p class="control">
                                    {!! Form::text('address', $spring->address, ['class' => 'input is-medium']) !!}
                                </p>
                            </div>
                            <br>
                            <div class="field">
                                <label for="label">
                                    メモ：
                                </label>
                                <p class="control">
                                    {!! Form::textarea('note', $spring->note, ['class' => 'input is-medium', 'style' => 'height: 100px;']) !!}
                                </p>
                            </div>
                            <br>
                            <div class="field">
                                <p class="control" style="width:100%">
                                    {!! Form::submit('編集', ['class' => 'button is-primary is-medium', 'style' => 'width:100%']) !!}
                                </p>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </form>
            </div>
        </section>
    </div>
@endsection