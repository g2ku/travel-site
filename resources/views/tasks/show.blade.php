@extends('base')

@section('content')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;0,800;0,900;1,700&display=swap" rel="stylesheet">

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
        .box {
            width: 450px;
            height: 500px;
            background-color: #e1ad00;
            display: inline-block;
            border-radius: 10%;
            padding: 10px;
            box-sizing: border-box;
        }

        .title {
            font-weight: bold;
            width: 400px;
            word-wrap: break-word;
            margin: 10px 20px;
            font-size: 35px;
        }

        .line {
            background-color: #2e3136;
            width: 100%;
            height: 1px;
        }

        .description {
            width: 400px;
            font-size: 17px;
            word-wrap: break-word;
            margin-left: 20px;
        }
        .delete-btn {
            background-color: #ffffff;
            color: #000000;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.6s ease;
            border-radius: 14%;
            position: absolute;
            top: 537px;
            left: 150px;
            font-weight: bold;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
        .back
        {
            position: absolute;
            top: 537px;
            left: 400px;
            padding: 10px 10px;
            display: inline-block;
            border-radius: 10%;
            border: 0;
            text-decoration: none;
            background-color: white;
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

    <body>
    <h1 style="font-weight: bold; padding-top: 40px; color: white">Task Details</h1>
    <div class="box">
        <p class="title">{{ $task->title }}</p>
        <div class="line"></div>
        <p class="description">{{ $task->description }}</p>
        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="delete-btn">Delete</button>
            <a href="{{ route('tasks.index') }}" class="back">Back to Tasks</a>
        </form>
    </div>
    </body>
@endsection
