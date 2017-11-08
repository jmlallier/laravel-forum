@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a New Thread</div>

                    <div class="panel-body">
                        <form method='POST' action='/threads'>
                            {{ csrf_field() }}
                            <div class='form-group'>
                                <label for='channel_id'>Choose a Channel</label>
                                <select name='channel_id' id='channel_id' class='form-control'>
                                    <option value='' disabled selected>Select One...</option>
                                    @foreach (App\Channel::all() as $channel)
                                        <option value='{{$channel->id}}'>{{$channel->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class='form-group'>
                                <label for='title'>Title</label>
                                <input type='text' class='form-control' name='title' id='title' value='{{old('title')}}'>
                            </div>
                            <div class='form-group'>
                                <label for='body'>Body</label>
                                <textarea name='body' id='body' rows='7' class='form-control'>{{old('body')}}</textarea>
                            </div>
                            <div class='form-group'>
                                <button class='btn btn-primary'>Publish</button>
                            </div>
                            <div class='form-group'>
                                @if (count($errors))
                                    <ul class='alert alert-danger'>
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
