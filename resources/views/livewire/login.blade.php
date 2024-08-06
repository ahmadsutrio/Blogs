<div class="w-full bg-white h-screen flex justify-center items-center">
    <form action="" wire:submit.prevent="login" method="POST"
        class="flex flex-col gap-2 border shadow-lg py-10 px-8 w-full mx-8 md:w-96 rounded-lg ">
        @csrf
        <span class="text-2xl text-center font-bold mb-4">Login</span>
        <label for="" class="">Email</label>
        <input type="email" name="email" wire:model.live="email" id=""
            class="outline-none rounded-lg border border-blue-100 focus:ring-2 focus:ring-opacity-30 focus:ring-blue-300 py-2 px-4 "
            required autocomplete="off" placeholder="Input email">
        <label for="" class="">Password</label>
        <div
            class="flex border-blue-100 focus-within:ring-2 focus-within:ring-opacity-30 focus-within:ring-blue-300 border rounded-lg overflow-clip">
            <input type="password" wire:model.live="password" name="password" id="" class="outline-none w-full py-2 px-4" required
                autocomplete="off" placeholder="Input password">
            <div class="flex justify-center items-center px-2 border">
                <img src="{{ asset('assets/icons/eye.svg') }}" alt="" class="size-8">
            </div>
        </div>

        <button type="submit" class="outline-none border bg-blue-500 py-2 mt-3 rounded-lg text-white">Register</button>
    </form>
</div>
