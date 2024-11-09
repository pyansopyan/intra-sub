<div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <label for="user_id" class="block text-sm mt-4 text-gray-700 dark:text-gray-400">Attach User</label>
    <select wire:model="users_id" id="users_id"
            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray text-black">
        <option value="">Choose User</option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    @error('user_id')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

    <button wire:click="store" class="btn btn-md btn-primary mt-2">Save</button>
</div>
