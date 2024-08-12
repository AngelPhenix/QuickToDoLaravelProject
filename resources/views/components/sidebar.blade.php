@props(['board', 'boardList'])

<div class="w-64 h-screen bg-[#424246] text-white p-4">
    @guest
    <nav class="flex flex-col gap-y-2">
        <a href="/">Home</a>
        <a href="/register">Register</a>
        <a href="/login">Login</a>
    </nav>
    @endguest
    
    @auth
        <div class="flex flex-col justify-between gap-y-2 h-full">
            <div class="flex flex-col gap-y-2">
                <p class="font-bold">Collaboration Boards</p>
                @if (isset($boardList))
                    @foreach ($boardList as $board)
                        @if (Auth::user()->id != $board->owner_id)
                        <a class="px-2 py-1 bg-[#473535] rounded hover:bg-[#17171a]" href="/board/{{$board->id}}"> {{$board->name}} </a>   
                        @endif
                    @endforeach
                @endif

                <p class="font-bold">My Boards</p>
                @if (isset($boardList))                        
                    @foreach ($boardList as $board)
                        @if (Auth::user()->id == $board->owner_id)
                        <a class="px-2 py-1 bg-[#313328] rounded hover:bg-[#17171a]" href="/board/{{$board->id}}"> {{$board->name}} </a>   
                        @endif
                    @endforeach
                @endif
                <a class="w-[32px] h-[32px] flex items-center justify-center rounded bg-[#202020] hover:bg-[#17171a]" href="/board_create">+</a>
            </div>
            <div class="flex flex-col gap-y-2">
                <a class="px-2 py-1 rounded hover:bg-[#17171a]" href="/profile">My Profile</a>
                <a class="px-2 py-1 rounded hover:bg-[#17171a]" href="/logout">Logout</a>
            </div>
        </div>
    @endauth
</div>