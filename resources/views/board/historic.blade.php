<x-layout>
    <ul>
        @foreach ($historicData as $data)
            @if ($data->action == "completed")
            <li>"{{$data->task_name}}" has been modified by <u>{{$data->modified_by}}</u> at [{{ $data->modified_at }}] into the status : <b class="text-green-500">{{ $data->action }}</b></li>
            @else
            <li>"{{$data->task_name}}" has been modified by <u>{{$data->modified_by}}</u> at [{{ $data->modified_at }}] into the status : <b class="text-red-500">{{ $data->action }}</b></li>
            @endif
        @endforeach
    </ul>
</x-layout>