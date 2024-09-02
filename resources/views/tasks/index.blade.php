
@extends('base')

@section('content')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;0,800;0,900;1,700&display=swap" rel="stylesheet">

<body>
    <h1 style="font-weight: bold; padding-top: 40px; color: white">Your Tasks</h1>
    @foreach($tasks as $task)
        <div class="box">
            <p class="title">{{ $task->title }}</p>
            <div class="line"></div>
            <p class="description"> {{$task->description}}</p>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="delete-btn">Delete</button>
                <a class="view-more" href="{{ route('tasks.show', ['task' => $task->id]) }}">View Details</a>
            </form>
        </div>
    @endforeach
    <a href="{{ route('tasks.create') }}" class="add-task">Add Task</a>

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
            width: 250px;
            height: 200px;
            background-color: #e1ad00;
            display: inline-block;
            border-radius: 10%;
            padding: 10px;
            box-sizing: border-box;
        }

        .title {
            font-weight: bold;
            margin: 10px 0;
            text-transform: uppercase;
            font-size: 22px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .line {
            background-color: #2e3136;
            width: 100%;
            height: 1px;
        }

        .description {
            margin: 10px 0;
            font-size: 15px;
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .delete-btn {
            background-color: #ffffff;
            color: #000000;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.6s ease;
            border-radius: 14%;
            margin-top: 40px;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
        .view-more
        {
            background-color: white;
            color: #2e3136;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.6s ease, color 0.6s ease;
            border-radius: 10%;
            text-decoration: none;
            margin-left: 30px;
        }
        .view-more:hover
        {
            background-color: #2e3136;
            color: white;
        }
        .add-task {
            padding: 20px 30px;
            background-color: #e1ad00;
            display: inline-block;
            border-radius: 10%;
            text-decoration: none;
            color: #2e3136;
            position: absolute;
            top: 50px;
            left: 1350px;
            font-weight: bold;
            transition: background-color 0.6s ease, color 0.6s ease;
        }

        .add-task:hover {
            background-color: #2e3136;
            color: white;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const boxes = document.querySelectorAll('.box');

            boxes.forEach(function (box) {
                const minLength = 150;

                if (box.scrollWidth > minLength) {
                    box.style.width = box.scrollWidth + 'px';
                } else {
                    box.style.width = minLength + 'px';
                }
            });
        });
    </script>
    </body>
@endsection
