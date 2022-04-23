<div>
    <div class="container admin-con pt-5">
        <!-- Add review -->
        <form wire:submit.prevent="addReview" class="w-full">
            <h5 id="add-review" class="mtext-108 cl2 p-b-7 mb-3">
                Add a review for
            </h5>

            <div class="flex-w flex-t">
                <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                    <img src="{{ asset('assets/images')}}/{{$orderItem->product->image}}" alt="A') }}VATAR">
                </div>

                <div class="size-207">
                    <div class="flex-w flex-sb-m p-b-17">
                        <span class="mtext-107 cl2 p-r-20">
                            {{ $orderItem->product->name }}
                        </span>
                    </div>

                    <p class="stext-102 cl6">
                        {{ $orderItem->product->short_description }}
                    </p>
                </div>
            </div>
        
            @if(Session::has('review_msg'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('review_msg')}}
                </div>
            @endif
            <div class="flex-w flex-m p-t-50 p-b-23">
                <span class="stext-102 cl3 m-r-16">
                    Your Rating
                </span>

                <p class="wrap-rating fs-18 cl11 pointer">
                    <label for="rated-1" class="item-rating pointer zmdi zmdi-star-outline"></label>
                    <input type="radio" style="display: none;" id="rated-1" value="1" wire:model="rating">
                    <label for="rated-2" class="item-rating pointer zmdi zmdi-star-outline"></label>
                    <input type="radio" style="display: none;" id="rated-2" value="2" wire:model="rating">
                    <label for="rated-3" class="item-rating pointer zmdi zmdi-star-outline"></label>
                    <input type="radio" style="display: none;" id="rated-3" value="3" wire:model="rating">
                    <label for="rated-4" class="item-rating pointer zmdi zmdi-star-outline"></label>
                    <input type="radio" style="display: none;" id="rated-4" value="4" wire:model="rating">
                    <label for="rated-5" class="item-rating pointer zmdi zmdi-star-outline"></label>
                    <input type="radio" style="display: none;" id="rated-5" value="5" wire:model="rating">
                </p>
                @error('rating')<p class="text-danger">{{$message}}</p>@enderror
            </div>

            <div class="row p-b-25">
                <div class="col-12 p-b-5">
                    <label class="stext-102 cl3" for="review">Your review</label>
                    <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review" wire:model="comment"></textarea>
                    @error('comment')<p class="text-danger">{{$message}}</p>@enderror
                </div>
            </div>

            <button type="submit" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                Submit
            </button>
        </form>
    </div>
</div>
