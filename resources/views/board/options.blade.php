<x-layout :boardList='$boardList ?? null'>
    <div class="flex flex-col items-center">
        <h1 class="text-2xl mb-10"><b>{{ $board->name }}'s</b> Settings</h1>

        @can('addFriend', $board)
            <form method="post" action="/board_addfriend/{{$board->id}}" class="flex gap-x-3">
                @csrf
                <select class="text-black" name="mail" id="mail">
                    @foreach ($friends as $friend)
                        <option value="{{ $friend->email }}">{{ $friend->username }}</option>
                    @endforeach
                </select>
                <button class="bg-blue-500 px-4 rounded">Add Collaborator</button>
            </form>
        @endcan

        @can('delete', $board)
        <div class="fixed bottom-10 right-10">
            <form method="post" action="/delete_board/{{$board->id}}" class="flex gap-x-3">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 px-2 rounded">Delete this board</button>
            </form>
        </div>
        @endcan
    </div>
</x-layout>