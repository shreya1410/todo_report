@extends('layouts/app')
@section('content')
    <div  class="w-100 h-100 d-flex justify-content-center align-items-center">
        <div class="text-center" style="width: 40%">
            <h1 class="display-2 text-white"> Todo App</h1>
            <h3 class="text-white pt-5"> What Next? Add something to list</h3>
            <form action="{{route('todo.store')}}" method="POST">
                @csrf
                <div class="input-group mb-3 w-100">
                    <input type="text" class="form-control form-control-lg" name="text" placeholder="Task title"
                           aria-label="Recipient's username" aria-describedby="button-addon2">
                </div>
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit" id="button-addon2">Add to the list</button>
                </div>
            </form>

            <h2 class="text-white pt-2"> My Todo List : </h2>
            <div class="bg-white w-100">
                @forelse($todos as $todo)
                    <div class="w-100 d-flex align-items-center justify-content-between">
                        <div class="p-4">
                            @if($todo->completed == 0)
                                <i class="bi bi-chevron-right" style="font-size: 2rem;"></i>

                            @else
                                <i class="bi bi-check" style="font-size: 2rem;"></i>
                            @endif
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$todo->id}}" aria-expanded="true" aria-controls="collapse{{$todo->id}}">
                                {{$todo->text}}
                            </button>
                        </div>


                        <div class="mr-4 d-flex align-items-center">
                            @if($todo->completed ==0)
                                <form action="{{route('todo.update',['id'=>$todo->id])}}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input type="text"  name="completed" value="1" hidden>
                                    <button class="btn btn-success"> Mark it as Completed</button>
                                </form>
                            @else
                                <form action="{{route('todo.update',['id'=>$todo->id])}}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input type="text"  name="completed" value="0" hidden>
                                    <button class="btn btn-warning"> Mark it as UnCompleted</button>
                                </form>
                            @endif
                            <a class="inline-block" href="{{route('todo.edit',['id'=>$todo])}}">
                                <i class="bi bi-pencil" style="font-size: 2rem;"></i>
                            </a>

                        <form action="{{route('todo.destroy',['id'=>$todo->id])}}" method="POST">
                            @csrf
                            <button class="border-0 bg-transparent ml-2">
                                <i class="bi bi-trash" style="font-size: 2rem;"></i>
                            </button>
                        </form>
                        </div>
                    </div>

                @empty
                    <p class="orm-control form-control-lg"> Sorry , nothing to do right now</p>
                @endforelse
            </div>
        </div>
    </div>

@endsection
