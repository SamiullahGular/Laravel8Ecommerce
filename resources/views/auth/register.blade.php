<x-base-layout>
	<!-- Content page -->
	<section class="bg0 p-t-92 pb-3">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <x-jet-validation-errors class="mb-4" />
					<form name="frm-login" method="POST" action="{{ route('register') }}" id="log-form">
                        @csrf
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Register here
						</h4>

                        <div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="name" placeholder="Your Name" :value="name" required autofocus autocomplete="name">
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Your Email Address" :value="email" required>
							<!-- <img class="how-pos4 pointer-none" src="{{ asset('assets/images/icons/icon-email.png') }}" alt="ICON"> -->
						</div>

                        <div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="New Password" required autocomplete="new-password">
						</div>

                        <div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password_confirmation" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
						</div>

						<button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Register
						</button>
					</form>
				</div>

				@livewire('auth-pages-component')
				
</x-base-layout>