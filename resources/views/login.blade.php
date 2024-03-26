@extends('layouts.app')

@section('content')

<section class="my-4">
	<h1 class="text-center">Логин </h1>
	<div class="row justify-content-center my-4">
		<div class="col-12 col-md-6">
			<form action="{{ route('store') }}" method="post">
                @csrf
				<div class="form-group">
					<label for="exampleInputEmail1">Имя пользователя</label>
					<input value="{{ old('username') }}" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите имя пользователя">
					@error('username')
                    <div class="text-danger">{{ $message }}</div><br>
                    @enderror
                    
				</div>
				<div class="form-group " id="show_hide_password">
					<label for="exampleInputPassword1">Пароль</label>
					<div class="input-group">
						<input value="{{ old('password') }}" name="password" type="password" class="form-control" placeholder="Введите пароль">
						<span class="input-group-text" id="basic-addon2"><a href=""><i class="bi bi-eye-fill" aria-hidden="true"></i></a></span>
					</div>
                    @error('password')
                    <div class="text-danger">{{$message}}</div><br>    
                    @enderror
					
				</div>
				<br>
				<div class="d-flex justify-content-between align-items-end">
					<button type="submit" class="btn btn-primary d-block w-100">Вход</button>
				</div>
			</form>
		</div>
	</div>

</section>
<script>
	$(document).ready(function() {
		$("#show_hide_password a").on('click', function(event) {
			event.preventDefault();
			if ($('#show_hide_password input').attr("type") == "text") {
				$('#show_hide_password input').attr('type', 'password');
				$('#show_hide_password i').addClass("bi bi-eye-fill ");
				$('#show_hide_password i').removeClass("bi bi-eye-slash");
			} else if ($('#show_hide_password input').attr("type") == "password") {
				$('#show_hide_password input').attr('type', 'text');
				$('#show_hide_password i').removeClass("bi bi-eye-fill ");
				$('#show_hide_password i').addClass("bi bi-eye-slash");
			}
		});
	});
</script>
@endsection