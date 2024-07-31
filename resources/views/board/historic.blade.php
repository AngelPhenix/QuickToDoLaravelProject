<x-layout>
    <ul>
        @foreach ($historicData as $data)
        @if ($data->board_id == $board->id)
            @if ($data->action == "done")
            <li class="text-green-500"><b>{{$data->modified_by}}</b> has done <u>{{$data->task_name}}</u> the [{{ $data->modified_at }}]</b></li>
            @elseif ($data->action == "undone")
            <li class="text-blue-500"><b>{{$data->modified_by}}</b> has done <u>{{$data->task_name}}</u> the [{{ $data->modified_at }}]</b></li>
            @else
            <li class="text-red-500"><b>{{$data->modified_by}}</b> has deleted <u>{{$data->task_name}}</u> the [{{ $data->modified_at }}]</b></li>
            @endif
        @endif
        @endforeach
    </ul>
</x-layout>