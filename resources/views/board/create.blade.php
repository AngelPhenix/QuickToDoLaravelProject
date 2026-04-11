<x-layout :boardList='$boardList ?? null'>
    <div class="mx-auto max-w-lg space-y-6">
        <div>
            <div class="ui-caption">Boards</div>
            <h1 class="ui-h1">Create a new board</h1>
        </div>

        <div class="ui-card p-5">
            <form class="space-y-4" method="post" action="/board">
                @csrf
                <div class="ui-field">
                    <label class="ui-label" for="name">Board name</label>
                    <input class="ui-input" type="text" name="name" id="name" placeholder="e.g. Sprint Planning" autocomplete="off" />
                    <x-form-error fieldname='name'/>
                </div>

                <button class="ui-btn ui-btn-neon w-full" type="submit">
                    <i class="fa-solid fa-plus"></i>
                    <span>Create</span>
                </button>
            </form>
        </div>
    </div>
</x-layout>