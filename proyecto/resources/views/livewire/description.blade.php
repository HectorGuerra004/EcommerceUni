<div>
    <div class="flex justify-center flex-col md:flex-row md:px-[200px] md:py-[100px] relative">
        <div class=" md:flex md:flex-col md:justify-between">
            <div class="hidden md:block large-image">
                <img class="object-cover rounded-xl w-[400px] h-[400px]" src="storage/img/consolas2.jpg"
                    alt="snekers-photo" />
            </div>
            <div class="md:hidden large-image">
                <img class="w-[100%] h-[300px] object-cover" src="storage/img/consolas2.jpg"
                    alt="snekers-photo" />
            </div>

            <div class="small-images hidden md:flex mt-7 justify-between w-[400px]">
                <div class="single-image">
                    <img class="w-[80px] rounded-xl transition-all hover:opacity-25 hover:border-[3px] border-orange"
                        src="storage/img/consolas2.jpg" alt="product-photo" />
                </div>
                <div class="single-image">
                    <img class="w-[80px] rounded-xl transition-all hover:opacity-25 hover:border-[3px] border-orange"
                        src="storage/img/consolas2.jpg" alt="product-photo" />
                </div>
                <div class="single-image">
                    <img class="w-[80px] rounded-xl transition-all hover:opacity-25 hover:border-[3px] border-orange"
                        src="storage/img/consolas2.jpg" alt="product-photo" />
                </div>
                <div class="single-image">
                    <img class="w-[80px] rounded-xl transition-all hover:opacity-25 hover:border-[3px] border-orange"
                        src="storage/img/consolas2.jpg" alt="product-photo" />
                </div>
            </div>
        </div>

        <div class="description max-w-[80vh] p-6 md:py-[40px]">
            <p class="text-orange text-[14px] tracking-widest uppercase font-[700] mb-6">
                {{ $producto->nombre }}
            </p>

            <p class="description-text my-10 leading-7 overflow-hidden break-words" id="descriptionText">
                {{ $shortDescription }}
                <span id="dots" style="display: {{ $showFullDescription || !$showMoreButton ? 'none' : 'inline' }};">...</span>
                <span id="more" style="display: {{ $showFullDescription ? 'inline' : 'none' }};">
                    {{ $remainingDescription }}
                </span>
        
                @if ($showMoreButton)
                    <button wire:click="toggleDescription" id="myBtn" class="ver-mas">
                        {{ $showFullDescription ? 'Ver menos' : 'Ver más' }}
                    </button>
                @endif
            </p>


            <div class="price flex items-center">
                <span class="text-3xl font-[700] mr-4">$125</span> <span
                    class="bg-paleOrange text-orange font-[700] py-1 px-2 rounded-lg">
                    50%
                </span>
                <p class="md:hidden line-through text-grayishBlue font-[700] translate-x-[100px] mb-2">
                    $250.00
                </p>
            </div>
            <p class="hidden md:block line-through text-grayishBlue font-[700] mt-2">
                $250.00
            </p>

            <div class="buttons-container flex flex-col md:flex-row mt-8">
                <div
                    class="state w-[100%] flex justify-around md:justify-center items-center space-x-10 bg-lightGrayishBlue rounded-lg p-3 md:p-2 md:mr-4 md:w-[150px]">
                    <button
                        class="minus text-[24px] md:text-[20px] font-[700] text-orange transition-all hover:opacity-50">
                        -
                    </button>
                    <p class="md:text-[14px] font-bold">1</p> <button
                        class="plus text-[24px] md:text-[20px] font-[700] text-orange transition-all hover:opacity-50">
                        +
                    </button>
                </div>
                <button
                    class="add-btn border-none bg-orange rounded-lg text-white font-[700] px-[70px] py-[18px] mt-4 md:mt-0 md:py-0 md:text-[14px] transition-all btn-shadow hover:opacity-50">
                    <span class="inline-block -translate-x-2 -translate-y-[2px] h-[15px]"></span> &nbsp;Add to
                    cart
                </button>
            </div>
        </div>
    </div>
</div>