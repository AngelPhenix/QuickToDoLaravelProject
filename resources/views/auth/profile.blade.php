<x-layout :boardList='$boardList ?? null'>
    <div class="mx-auto max-w-2xl space-y-6">
        <div>
            <div class="ui-caption">Account</div>
            <h1 class="ui-h1">My profile</h1>
        </div>

        <div class="ui-card p-5">
            <div class="ui-h2">Friend list</div>
            <div class="ui-caption mt-1">People you can invite to boards.</div>

            <div class="mt-4 flex flex-wrap gap-2">
                @if (!$friends->isEmpty())
                    @foreach ($friends as $friend)
                        <span class="ui-chip">
                            <i class="fa-regular fa-user ui-muted"></i>
                            <span>{{ $friend->username }}</span>
                        </span>
                    @endforeach
                @else
                    <span class="ui-muted text-sm">Your friend list is empty.</span>
                @endif
            </div>

            <div class="ui-divider my-5"></div>

            <form method="post" action="/addfriend" class="flex flex-col gap-3 sm:flex-row sm:items-end">
                @csrf
                <div class="ui-field flex-1">
                    <label class="ui-label" for="email">Add a friend by email</label>
                    <input class="ui-input" type="email" name="email" id="email" autocomplete="email" />
                    <x-form-error fieldname="email"/>
                </div>
                <button class="ui-btn ui-btn-neon sm:shrink-0" type="submit">
                    <i class="fa-solid fa-user-plus"></i>
                    <span>Add</span>
                </button>
            </form>

            @if (session('error'))
                <div class="mt-3 ui-card-soft p-3 border border-red-500/30 text-red-300 text-sm">{{ session('error') }}</div>
            @elseif (session('success'))
                <div class="mt-3 ui-card-soft p-3 border border-green-500/30 text-green-200 text-sm">{{ session('success') }}</div>
            @endif
        </div>
    </div>
</x-layout>