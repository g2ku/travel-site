
@extends('base')

@section('content')
    <h1 style="color: white; padding-top: 40px; padding-bottom: 20px" class="h1_create">Create Task</h1>
    <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        <div class="box">
            <label for="title" class="title">Title:</label>
            <input type="text" name="title" required>
            <br>
            <label for="description" class="description">Description:</label>
            <textarea name="description"></textarea>
            <br>
            <button type="submit" class="create">Create Task</button>
            <a href="{{ route('tasks.index') }}" class="back">Back to Tasks</a>
        </div>
    </form>


    <style>
        *
        {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }
        body
        {
            background-color: #2a2b2d;
        }
        .h1_create{
            font-weight: bold;
        }
        .box
        {
            width: 500px;
            height: 400px;
            background-color: #e1ad00;
            display: inline-block;
            border-radius: 10%;
        }
        .title
        {
            font-size: 20px;
            margin: 60px 30px 0;
            font-weight: bold;
        }
        input
        {
            padding: 5px;
            width: 300px;
            margin: 5px;
            border: 0;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="text"]:focus
        {
            outline: none;
        }
        .description
        {
            font-size: 20px;
            margin: 30px 30px 0;
            font-weight: bold;
        }
        textarea
        {
            padding: 8px;
            margin: 5px;
            border: 0;
            border-radius: 4px;
            box-sizing: border-box;
            resize: none;
            overflow-y: hidden;
            position: absolute;
            top: 270px;
            left: 150px;
            width: 385px;
        }
        textarea:focus
        {
            outline: none;
        }
        .create
        {
            margin-top: 130px;
            margin-left: 35px;
            padding: 20px 30px;
            background-color: white;
            display: inline-block;
            border-radius: 10%;
            border: 0;
            text-decoration: none;
            color: #2e3136;
            font-weight: bold;
            transition: background-color 0.6s ease, color 0.6s ease;
        }
        .create:hover
        {
            background-color: #2e3136;
            color: white;
        }
        .back
        {
            margin-left: 50px;
            padding: 20px 30px;
            background-color: white;
            display: inline-block;
            border-radius: 10%;
            border: 0;
            text-decoration: none;
            color: #2e3136;
            font-weight: bold;
            transition: background-color 0.6s ease, color 0.6s ease;
        }
        .back:hover
        {
            background-color: #2e3136;
            color: white;
        }
    </style>
@endsection
