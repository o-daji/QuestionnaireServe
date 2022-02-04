<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>顧客アンケート一覧</title>

	<!-- Styles -->
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<script src="{{ asset('js/app.js') }}"></script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" />
	<style>
		body {
			background-color: #D2DBDF;
			/* overflow: hidden; */
			overflow: scroll;
			font-family: ヒラギノ角ゴ;
		}

		.container {
			margin: 10px 10px;
			padding: 35px;

		}

		.search-conditions-box {
			padding: 5px 15px 25px 25px;
			margin-bottom: 20px;
			border-radius: 10px;
			background-color: #eeeeee;
			display: inline-block;
			max-width: 1600px;
		}

		#overlay {
			/*　要素を重ねた時の順番　*/
			z-index: 1;

			/*　画面全体を覆う設定　*/
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.5);

			/*　画面の中央に要素を表示させる設定　*/
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.button-Rotate {
			margin: 5% 0px;
		}
	</style>
</head>

<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/ja.min.js" integrity="sha512-rElveAU5iG1CzHqi7KbG1T4DQIUCqhitISZ9nqJ2Z4TP0z4Aba64xYhwcBhHQMddRq27/OKbzEFZLOJarNStLg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"></script>
	<div id="app">
		<div class="col-lg bg-dark mb-3">
			<nav class="navbar navbar-dark">
				<span class="col-lg-2 col-sm-3 navbar-brand">
					<img src="{{asset('images/logo_CQ.png')}}" class="w-100 mr-3">
					<span classs="sys-name">顧客アンケートDBシステム</span>
				</span>
			</nav>
		</div>
		<div class="search-conditions-box mx-3">
			<div class="mt-5 px-4 py-0">
				@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				<form method="POST" action="/store" class="row g-3">
					@csrf
					<div class="col-md-3 mb-1">
						<label for="construction_no">工事番号</label>
						<input type="tel" class="form-control" size="8" maxlength="8" name="construction_no" id="construction_no" placeholder="工事番号">
					</div>
					<div class="col-md-3 mb-1">
						<label for="customer_name">顧客名</label>
						<input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="株式会社〇〇">
					</div>
					<div class="col-md-3 mb-1">
						<label for="operating_date_st">竣工開始</label>
						<input type="text" class="form-control datetimepicker-input datetimepicker" name="operating_date_st" id="operating_date_st" data-toggle="datetimepicker" data-target="#operating_date_st">
					</div>
					<div class="col-md-3 mb-1">
						<label for="operating_date_st">竣工終了</label>
						<input type="text" class="form-control datetimepicker-input datetimepicker" name="operating_date_ed" id="operating_date_ed" data-toggle="datetimepicker" data-target="#operating_date_ed">
					</div>
					<div id="operating_date_check">
						<label for="operating_date_check">実施工程</label>
						<div class="col-md-6 mb-1">
							<div class="form-check form-check-inline">
								<input type="hidden" name="o_s_sales" value="0">
								<input class="form-check-input" type="checkbox" name="o_s_sales" id="o_s_sales" value="1">
								<label class="form-check-label" for="o_s_sales">営業</label>
							</div>
							<div class="form-check form-check-inline">
								<input type="hidden" name="o_s_design" value="0">
								<input class="form-check-input" type="checkbox" name="o_s_design" id="o_s_design" value="1">
								<label class="form-check-label" for="o_s_design">設計</label>
							</div>
							<div class="form-check form-check-inline">
								<input type="hidden" name="o_s_construction" value="0">
								<input class="form-check-input" type="checkbox" name="o_s_construction" id="o_s_construction" value="1">
								<label class="form-check-label" for="o_s_construction">施工</label>
							</div>
						</div>
					</div>
					<div class="form-group row" name='advperm' id="advperm">
						<label for="adv_perm">社内報・SNSへの掲載許可</label>
						<div class="col-md-6 mb-1">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="advpermGrp1" id="adv_perm_yes" value="1">
								<label class="form-check-label" for="advpermGrp1">
									許可
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="advpermGrp1" id="adv_perm_no" value="0">
								<label class="form-check-label" for="advpermGrp1">
									不許可
								</label>
							</div>
						</div>
					</div>
					<div class="form-group row" name='cqanswer1' id="cqanswer1">
						<label for="cqanswer1">1.工程・工期について</label>
						<div class="col-md-6">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp1" id="answer1-1" value="1">
								<label class="form-check-label" for="answerGrp1">
									1
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp1" id="answer1-2" value="2">
								<label class="form-check-label" for="answerGrp1">
									2
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp1" id="answer1-3" value="3">
								<label class="form-check-label" for="answerGrp1">
									3
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp1" id="answer1-4" value="4">
								<label class="form-check-label" for="answerGrp1">
									4
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp1" id="answer1-5" value="5">
								<label class="form-check-label" for="answerGrp1">
									5
								</label>
							</div>
						</div>
					</div>
					<div class="form-group row" name='cqanswer2' id="cqanswer2">
						<label for="cqanswer2">2.金額の納得度</label>
						<div class="col-md-6">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp2" id="ansewer2_1" value="1">
								<label class="form-check-label" for="answerGrp2">
									1
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp2" id="ansewer2_2" value="2">
								<label class="form-check-label" for="answerGrp2">
									2
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp2" id="ansewer2_3" value="3">
								<label class="form-check-label" for="answerGrp2">
									3
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp2" id="ansewer2_4" value="4">
								<label class="form-check-label" for="answerGrp2">
									4
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp2" id="ansewer2_5" value="5">
								<label class="form-check-label" for="answerGrp2">
									5
								</label>
							</div>
						</div>
					</div>
					<div class="form-group row" name='cqanswer3' id="cqanswer3">
						<label for="cqanswer3">3.設計への評価</label>
						<div class="col-md-6">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp3" id="ansewer3_1" value="1">
								<label class="form-check-label" for="answerGrp3">
									1
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp3" id="ansewer3_2" value="2">
								<label class="form-check-label" for="answerGrp3">
									2
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp3" id="ansewer3_3" value="3">
								<label class="form-check-label" for="answerGrp3">
									3
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp3" id="ansewer3_4" value="4">
								<label class="form-check-label" for="answerGrp3">
									4
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp3" id="ansewer3_5" value="5">
								<label class="form-check-label" for="answerGrp3">
									5
								</label>
							</div>
						</div>
					</div>
					<div class="form-group row" name='cqanswer4' id="cqanswer4">
						<label for="cqanswer4">4.施工の仕上がり</label>
						<div class="col-md-6">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp4" id="ansewer4_1" value="1">
								<label class="form-check-label" for="answerGrp4">
									1
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp4" id="ansewer4_2" value="2">
								<label class="form-check-label" for="answerGrp4">
									2
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp4" id="ansewer4_3" value="3">
								<label class="form-check-label" for="answerGrp4">
									3
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp4" id="ansewer4_4" value="4">
								<label class="form-check-label" for="answerGrp4">
									4
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp4" id="ansewer4_5" value="5">
								<label class="form-check-label" for="answerGrp4">
									5
								</label>
							</div>
						</div>
					</div>
					<div class="form-group row" name='cqanswer5' id="cqanswer5">
						<label for="cqanswer5">5.弊社営業担当の対応について </label>
						<div class="col-md-6">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp5" id="ansewer5_1" value="1">
								<label class="form-check-label" for="answerGrp5">
									1
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp5" id="ansewer5_2" value="2">
								<label class="form-check-label" for="answerGrp5">
									2
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp5" id="ansewer5_3" value="3">
								<label class="form-check-label" for="answerGrp5">
									3
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp5" id="ansewer5_4" value="4">
								<label class="form-check-label" for="answerGrp5">
									4
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp5" id="ansewer5_5" value="5">
								<label class="form-check-label" for="answerGrp5">
									5
								</label>
							</div>
						</div>
					</div>
					<div class="form-group row" name='cqanswer6' id="cqanswer6">
						<label for="cqanswer6">6.弊社設計担当の対応について </label>
						<div class="col-md-6">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp6" id="ansewer6_1" value="1">
								<label class="form-check-label" for="answerGrp6">
									1
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp6" id="ansewer6_2" value="2">
								<label class="form-check-label" for="answerGrp6">
									2
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp6" id="ansewer6_3" value="3">
								<label class="form-check-label" for="ansewer6_3">
									3
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp6" id="ansewer6_4" value="4">
								<label class="form-check-label" for="answerGrp6">
									4
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp6" id="ansewer6_5" value="5">
								<label class="form-check-label" for="answerGrp6">
									5
								</label>
							</div>
						</div>
					</div>
					<div class="form-group row" name='cqanswer7' id="cqanswer7">
						<label for="cqanswer7">7.弊社施工担当の対応について </label>
						<div class="col-md-6">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp7" id="ansewer7_1" value="1">
								<label class="form-check-label" for="answerGrp7">
									1
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp7" id="ansewer7_2" value="2">
								<label class="form-check-label" for="answerGrp7">
									2
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp7" id="ansewer7_3" value="3">
								<label class="form-check-label" for="answerGrp7">
									3
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp7" id="ansewer7_4" value="4">
								<label class="form-check-label" for="answerGrp7">
									4
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="answerGrp7" id="ansewer7_5" value="5">
								<label class="form-check-label" for="answerGrp7">
									5
								</label>
							</div>
						</div>
					</div>
					<div id="answer_f">
						<label for="answer_f">自由記入欄</label>
						<div class="col-xl-6 mb-3">
							<textarea class="form-control" id="answer_freetext" name="answer_freetext" placeholder="〈自由記入欄>" cols="50" rows="10"></textarea>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12 text-left">
							<input class="btn btn-primary" type="submit" value="登録" on-click="submit">
						</div>
					</div>
				</form>
			</div>
			<button class="btn btn-secondary button-Rotate" type="button" onClick="history.back()">戻る</button>
		</div>
	</div>
	<!-- Scripts -->
	<script>
		$(function() {

			$('.datetimepicker').datetimepicker({
				format: "YYYY-MM-DD",
				locale: 'ja',
				sideBySide: true,
			});

		});

		$(function() {
			$('#construction_no').on('input', function(e) {
				let value = $(e.currentTarget).val();
				value = value
					.replace(/[０-９]/g, function(s) {
						return String.fromCharCode(s.charCodeAt(0) - 65248);
					})
					.replace(/[^0-9]/g, '');
				$(e.currentTarget).val(value);
			});
		});
	</script>
</body>

</html>