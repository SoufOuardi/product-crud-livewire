<div id="readProductModal" tabindex="-1" aria-hidden="true" class="{{ $isPreviewBtn ? 'flex' : 'hidden'}} overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
         @if($product)
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                <div class="text-gray-900 md:text-xl dark:text-white">
                    <label class="mb-2 font-semibold leading-none text-gray-900 dark:text-white" for="">Product Name</label>
                    <p class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{$product->name}}”</p>
                    <label class="mb-2 font-semibold leading-none text-gray-900 dark:text-white" for="">Selling Price</label>
                    <p class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">${{$product->price}}</p>
                </div>
                <div>
                    <button wire:click="close" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="readProductModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
            </div>
            <dl><dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Details</dt><dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{$product->description}}</dd><dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Category</dt><dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{$product->category->name}}</dd></dl>
            
        </div>
        @endif
    </div>
</div>