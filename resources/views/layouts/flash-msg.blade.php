@if(session()->has('success'))
			<div class="alert alert-success" id="msg">
			{{ session()->get('success') }}
			</div>
@elseif(session()->has('error'))
			<div class="alert alert-warning" id="msg">
			{{ session()->get('error') }}
			</div>
@endif


