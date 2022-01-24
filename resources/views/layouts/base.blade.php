<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>@yield('title')</title>
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
	
	.menu-btn {
		position: fixed;
		top: 0px;
		right: 10px;
		display: flex;
		height: 50px;
		width: 60px;
		justify-content: center;
		align-items: center;
		z-index: 2;
		background-color: rgba(52,58,64,0.5);
	}
	.menu-btn span, .menu-btn span:before, .menu-btn span:after {
		content: '';
		display: block;
		height: 3px;
		width: 25px;
		border-radius: 3px;
		background-color: #ffffff;
		position: absolute;
	}
	.menu-btn span:before {
		bottom: 8px;
	}
	.menu-btn span:after {
		top: 8px;
	}
	#menu-btn-check:checked ~ .menu-btn span {
		background-color: rgba(255, 255, 255, 0); /*メニューオープン時は真ん中の線を透明にする*/
	}
	#menu-btn-check:checked ~ .menu-btn span::before {
		bottom: 0;
		transform: rotate(45deg);
	}
	#menu-btn-check:checked ~ .menu-btn span::after {
		top: 0;
		transform: rotate(-45deg);
	}
	#menu-btn-check {
		display: none;
	}
	.menu-content {
		width: 100%;
		height: 100%;
		position: fixed;
		top: 0;
		left: 0;
		z-index: 1;
		background-color: rgba(52,58,64,0.5);
	}
	.menu-content ul {
		padding: 70px 10px 0;
	}
	.menu-content ul li {
		border-bottom: solid 1px #ffffff;
		list-style: none;
	}
	.menu-content ul li a {
		display: block;
		width: 100%;
		font-size: 15px;
		box-sizing: border-box;
		color: #ffffff;
		text-decoration: none;
		padding: 9px 15px 10px 0;
		position: relative;
	}
	.menu-content ul li a::before {
		content: "";
		width: 7px;
		height: 7px;
		border-top: solid 2px #ffffff;
		border-right: solid 2px #ffffff;
		transform: rotate(45deg);
		position: absolute;
		right: 11px;
		top: 16px;
	}
	.menu-content {
		width: 100%;
		height: 100%;
		position: fixed;
		top: 0;
		left: 100%; /*leftの値を変更してメニューを画面外へ*/
		z-index: 1;
		background-color: rgba(52,58,64,0.8);
		transition: all 0.5s; /*アニメーション設定*/
	}
	#menu-btn-check:checked ~ .menu-content {
		left: 0; /*メニューを画面内へ*/
	}
}
</style>
</head>
<body>
<div class="col-lg bg-dark mb-3">
	@yield('col-lg bg-dark mb-3')
		<nav class="navbar navbar-dark">
			<span class="col-lg-2 col-sm-3 navbar-brand">
				<img src="{{asset('images/logo.png')}}" class="w-100 mr-3">
				<span classs="sys-name">顧客アンケートDBシステム</span>	
			</span> 
		</nav>
</div>

</body>
<script>
</script>
</html>
