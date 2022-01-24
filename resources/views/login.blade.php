<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>ログイン</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>
body {
background-color : #D2DBDF;
}

.input-title {
    float:left;
    font-size:small;
}
.login-input {
    width : 260px;
    height : 40px;
}
.login-btn {
    width : 150px;
    height : 60px;
}
.navbar-brand a {
	text-decoration: none;
	font-size: 17px;
	font-weight: bold;
	color: #ffffff;
}
.errmsg {
    color:#ff0000;
    font-size:13px;
}
@media ( min-width : 1000px) {
	.hamburger-menu {
		display :none;
	}
	.contents-box {
	    width : 25%;
    	border: solid 2px #888888;
    	box-shadow:2px 2px 3px;
    	margin: auto;
    	border-radius: 10px;
        background-color : #ffffff;
    }
}
@media ( max-width : 1200px) {
    .contents-box {
        width : 50%;
    	border: solid 2px #888888;
    	box-shadow:2px 2px 3px;
    	margin: auto;
    	border-radius: 10px;
        background-color : #ffffff;
    }
	.system-name,.user-name{
		display : none;
	}
	
}
</style>
</head>
<body>
<div class="col-lg bg-dark mb-3">
		<nav class="navbar navbar-dark">
			<span class="col-lg-2 col-sm-3 navbar-brand">
				<img src="{{asset('images/logo_CQ.png')}}" class="w-100 mr-3">
				<span classs="sys-name">顧客アンケートDBシステム</span>	
			</span> 
		</nav>
	</div>
	<form action="/login" method="post">
		@csrf
		<div class="contents-box mt-5 p-5">
			<div class="row mb-3">
				<div class="col-lg-10 m-auto">
					<label class="input-title mr-3">ユーザーID</label> 
					<input type="text" name="login_user_id" placeholder="ユーザーID" class="form-control login-input" id="input_id"> 
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-lg-10 m-auto">
					<label class="input-title mr-3">パスワード</label> 
					<input type="password" name="password" placeholder="パスワード" class="form-control login-input" id="input_pass"> 
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<input class="btn btn-primary login-btn" type="submit" value="ログイン" on-click="submit"> 
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-lg-12 text-center">
					@foreach ($errors->all() as $error)
	                <p class="errmsg mt-3">{{ $error }}</p>
	            @endforeach
				@if(!empty($err))
        			<p class="errmsg mt-3">{{$err}}</p>
    			@endif
				</div>
			</div>
		</div>
	</form>
</body>
<script>
</script>
</html>
