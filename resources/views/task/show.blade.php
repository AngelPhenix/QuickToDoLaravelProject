<x-layout :boardList='$boardList ?? null' :board='$board ?? null'>

    <div class="flex flex-col items-center">
        @if ($errors->any())
        <div class="alert alert-danger pb-5 text-2xl">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="flex gap-x-5 pb-5">
            @can('delete', $board)
                <form method="post" action="/delete_board/{{$board->id}}" class="flex gap-x-3">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 px-4 rounded">Delete</button>
                </form>
            @endcan
            <h1 class="text-4xl">{{ $board->name }}</h1>
            @can('addFriend', $board)
                <form method="post" action="/board_addfriend/{{$board->id}}" class="flex gap-x-3">
                    @csrf
                    <input class="text-black pl-1" id="mail" name="mail" type="text" placeholder="User's mail"/>
                    <select name="mail" id="mail">
                        @foreach ($friends as $friend)
                            <option value="{{ $friend->email }}">{{ $friend->username }}</option>
                        @endforeach
                    </select>
                    <button class="bg-blue-500 px-4 rounded">Add Collaborator</button>
                </form>
            @endcan
        </div>
        <p class=" text-sm">Collaborators :</p>
        <ul class="text-sm pb-5">
            @foreach ($board->users as $user)
                @if ($user->username == $board->owner->username)
                    <li class="font-bold underline">{{ $user->username }}</li>
                @else
                    <li>{{ $user->username }}</li>    
                @endif
            @endforeach
        </ul>

        <form method="post" action="/post_task/{{$board->id}}" class="flex gap-x-3">
            @csrf

            <input class="text-black py-2 px-3" type="text" id="name" name="name"/>
            <button class="bg-slate-600 py-1 px-3">Add Task</button>
        </form>

        <div class="mt-10 w-[650px]">
            <p class="bg-cyan-950 text-center px-3 py-2 mb-3"> TASKS </p>
                <ul class="flex flex-col gap-y-1">
                @foreach ($tasks as $task)
                        <li class="w-full flex">

                            <form class="flex bg-slate-700 pl-2 {{$task->is_completed ? 'bg-slate-800' : ''}} " method="post" action="/task_completed/{{ $task->id }}">
                                @csrf
                                @method('PATCH')
                                <input type="checkbox" name="is_completed" id="is_completed" {{ $task->is_completed ? 'checked' : ''}} onchange="this.form.submit()">
                            </form>

                            <div class="flex flex-col flex-grow gap-y-0 content-start h-full">
                                <p class="pl-4 bg-slate-700 flex items-center text-left overflow-wrap:anywhere {{$task->is_completed ? 'line-through bg-slate-800' : ''}}"><b>{{ $task->name }}</b></p>
                                <div class="flex flex-wrap items-start text-sm bg-slate-700 pl-4 gap-y-1 pb-2 {{$task->is_completed ? 'bg-slate-800' : ''}}">
                                    @foreach ($task->labels as $label)
                                        {{-- <form method="post" action="/delete_label/{{ $label->id }}/from_task/{{ $task->id }}">
                                            @csrf
                                            @method('PATCH')
                                            <button class="bg-[{{$label->color}}]/50 text-white px-4 rounded mr-1 hover:line-through">{{$label->name}}</button>
                                        </form> --}}
                                        <span class="bg-[{{$label->color}}]/50 text-white px-4 rounded mr-1">{{$label->name}}</span>
                                    @endforeach
                                    <x-modal :task="$task" :labels="$labels" />
                                </div>
                            </div>

                            <form class="bg-slate-700 text-center flex items-center {{$task->is_completed ? 'bg-slate-800' : ''}}" method="post" action="/delete_task/{{ $task->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="px-4 items-center hover:bg-red-600">X</button>
                            </form>

                        </li>
                @endforeach
                </ul> 
        </div>
    </div>

</x-layout>