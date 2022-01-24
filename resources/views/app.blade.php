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
	<style>
		body {
			background-color: #D2DBDF;
			/* overflow: hidden; */
			overflow: scroll;
			font-family: ヒラギノ角ゴ;
		}

		.container {
			margin: 10px 10px;
			padding: 10px;

		}

		.search-conditions-box {
			padding: 5px 15px 25px 25px;
			margin-bottom: 10px;
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
	</style>
</head>

<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<div id="app">
		<div class="col-lg bg-dark mb-3">
			<nav class="navbar navbar-dark">
				<span class="col-lg-2 col-sm-3 navbar-brand">
					<img src="{{asset('images/logo_CQ.png')}}" class="w-100 mr-3">
					<span classs="sys-name">顧客アンケートDBシステム</span>
				</span>
			</nav>
		</div>
		@if (session('statusmessage'))
		<div class="alert alert-success mt-4 mb-4">
			{{ session('statusmessage') }}
		</div>
		@endif
		<div class="container">
			<div class="search-conditions-box">
				<form action="/top/select" method="get">
					<div class="row">
						<div class="form-group col-sm-3">
							<label for="construction_no">工事番号</label>
							<input type="text" class="form-control" name="construction_no" id="construction_no" placeholder="工事番号">
						</div>
						<div class="form-group col-sm-3">
							<label for="customer_name">顧客名</label>
							<input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="顧客名">
						</div>
						<div class="form-group col-sm-3">
							<label for="operating_date_st">竣工開始</label>
							<input type="text" class="form-control" name="operating_date_st" id="operating_date_st" placeholder="竣工開始">
						</div>
						<div class="form-group col-sm-3">
							<label for="operating_date_ed">竣工終了</label>
							<input type="text" class="form-control" name="operating_date_ed" id="operating_date_ed" placeholder="竣工終了">
						</div>
					</div>
					<div class="row" id="operating_date_check">
						<label for="operating_date_check">実施工程</label>
						<div class="form-check form-check-inline col-sm-1">
							<input type="hidden" name="o_s_sales" value="0">
							<input class="form-check-input" type="checkbox" name="o_s_sales" id="o_s_sales" value="1">
							<label class="form-check-label" for="o_s_sales">営業</label>
						</div>
						<div class="form-check form-check-inline col-sm-1">
							<input type="hidden" name="o_s_design" value="0">
							<input class="form-check-input" type="checkbox" name="o_s_design" id="o_s_design" value="1">
							<label class="form-check-label" for="o_s_design">設計</label>
						</div>
						<div class="form-check form-check-inline col-sm-1">
							<input type="hidden" name="o_s_construction" value="0">
							<input class="form-check-input" type="checkbox" name="o_s_construction" id="o_s_construction" value="1">
							<label class="form-check-label" for="o_s_construction">施工</label>
						</div>
						<div class="row" id="adv_perm">
							<label for="adv_perm">社内報・SNSへの掲載許可</label>
							<div class="form-check form-check-inline col-sm-1">
								<input class="form-check-input" type="checkbox" name="adv_perm_yes" id="adv_perm_yes" value="1">
								<label class="form-check-label" for="adv_perm_yes">有</label>
							</div>
							<div class="form-check form-check-inline col-sm-1">
								<input class="form-check-input" type="checkbox" name="adv_perm_no" id="adv_perm_no" value="1">
								<label class="form-check-label" for="adv_perm_no">無</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 text-left">
							<input class="btn btn-secondary" type="submit" value="検索" on-click="submit">
						</div>
					</div>
			</div>
			</form>
		</div>
		<div class="col-lg-5 text-left mx-2 my-2">
			<form action="/store" method="get">
				<input class="btn btn-primary" type="submit" value="新規登録" on-click="submit">
			</form>
		</div>
		<table class="table table-dark table-striped text-nowrap">
			<thead>
				<tr>
					<th>ID</th>
					<th>工事番号</th>
					<th>顧客名</th>
					<th>営業</th>
					<th>設計</th>
					<th>施工</th>
					<th>竣工開始</th>
					<th>竣工終了</th>
					<th>掲載許可</th>
					<th>回答1</th>
					<th>回答2</th>
					<th>回答3</th>
					<th>回答4</th>
					<th>回答5</th>
					<th>回答6</th>
					<th>回答7</th>
					<th> </th>
					<th colspan="2"></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($cqresults as $cqresult)
				<tr class="table-light">
					<td>{{ $cqresult->cqid }}</td>
					<td>{{ $cqresult->construction_no }}</td>
					<td>{{ $cqresult->customer_name }}</td>
					@if($cqresult->operating_schedule_sales =="1")
					<td class="px-3 py-2">〇</td>
					@else
					<td class="px-3 py-2">✕</td>
					@endif
					@if($cqresult->operating_schedule_design =="1")
					<td class="px-3 py-2">〇</td>
					@else
					<td class="px-3 py-2">✕</td>
					@endif
					@if($cqresult->operating_schedule_Construction =="1")
					<td class="px-3 py-2">〇</td>
					@else
					<td class="px-3 py-2">✕</td>
					@endif
					<td>{{ $cqresult->operating_date_st }}</td>
					<td>{{ $cqresult->operating_date_ed }}</td>
					@if($cqresult->adv_permission =="1")
					<td class="px-3 py-2">有</td>
					@else
					<td class="px-3 py-2">無</td>
					@endif
					<td>{{ $cqresult->answer1 }}</td>
					<td>{{ $cqresult->answer2 }}</td>
					<td>{{ $cqresult->answer3 }}</td>
					<td>{{ $cqresult->answer4 }}</td>
					<td>{{ $cqresult->answer5 }}</td>
					<td>{{ $cqresult->answer6 }}</td>
					<td>{{ $cqresult->answer7 }}</td>
					<td class="text-nowrap py-3">
						<p><a href="{{ route('detail', ['cqid'=>$cqresult->cqid]) }}" class="btn btn-info btn-sm">詳細</a></p>
					</td>
					<td class="text-nowrap py-3">
						<p><a href="{{ route('edit', ['cqid'=>$cqresult->cqid]) }}" class="btn btn-primary btn-sm">編集</a></p>
					</td>
					<td class="text-nowrap py-0">
						<p>
						<form method="POST" action="{{ route('delete', $cqresult->cqid) }}">
							@csrf
							<button type="submit" class="btn btn-danger btn-sm btn-dell">削除</button>
						</form>
						</p>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="d-flex justify-content-center mb-5">
		{{$cqresults->appends(request()->input())->links()}}
	</div>
	<!-- Scripts -->
	<script>
		//削除ボタン ダイアログ
		$(function() {
			$(".btn-dell").click(function() {
				if (confirm("本当に削除しますか？")) {
					//そのままsubmit（削除）
				} else {
					//cancel
					return false;
				}
			});
		});
	</script>
</body>

</html>