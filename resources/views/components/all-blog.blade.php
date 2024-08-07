<div class="px-8 mx-auto max-w-7xl">
    <div class="grid mt-10 grid-cols-1 md:grid-cols-3 mb-6">
        <form action="" method="get" class="flex  col-span-2 col-start-2   justify-between items-center gap-2">
            <label for=""></label>
            <input type="search" name="" id=""
                class="outline-none border  w-full px-5 py-2 rounded-full flex justify-center items-center "
                placeholder="Search">
            <button type="submit"
                class="bg-blue-300 rounded-full outline-none border-none px-4 py-2 flex justify-center items-center">search</button>
        </form>
    </div>
    <div class="grid grid-cols-1 gap-5 lg:px-14 md:grid-cols-3 lg:gap-6">
        
        @foreach ($data_blog as $item)
            <a href="{{ route('blog.show',['slug'=>$item->slug]) }}" class="flex flex-col bg-white shadow-sm rounded-xl">
                <img class="w-full lg:h-56 h-36 mx-auto rounded-t-xl"
                    src="{{ asset('/storage/'.$item->foto) }}"
                    alt="Card Image">
                <div class="p-4 md:p-5">
                    <h3 class="text-lg font-bold text-gray-800">
                        {{ $item->title }}
                    </h3>
                    <p class="mt-1 text-gray-500">
                      {!! Str::limit($item->content, 100) !!}
                    </p>
                    <div class="flex items-center text-base gap-3 pt-7">
                        <img class="inline-block lg:size-[46px] size-[38px] rounded-full"
                            src="{{  asset( '/storage/'.$item->Users->foto) }}"
                            alt="Avatar">
                        <span class="">{{ $item->Users->username }}</span>
                        <span class="">| {{ date('d F Y', strtotime($item->created_at)) }}</span>
                    </div>
                </div>
            </a>
        @endforeach

    </div>

</div>
