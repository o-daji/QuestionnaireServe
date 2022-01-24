<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>アンケート一覧</title>

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
			padding: 35px;

		}

		/*　スクロールバーの実装 */
		.table_sticky {
			display: block;
			overflow-y: scroll;
			height: calc(100vh - 100px);
			border: 1px solid;
			border-collapse: collapse;
		}

		.table_sticky thead th {
			position: sticky;
			top: 0;
			z-index: 1;

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
	<div id="app">
		<div class="col-lg bg-dark mb-3">
			<nav class="navbar navbar-dark">
				<span class="col-lg-2 col-sm-3 navbar-brand">
					<img src="{{asset('images/logo_CQ.png')}}" class="w-100 mr-3">
					<span classs="sys-name">アンケートDBシステム</span>
				</span>
			</nav>
		</div>
		<div class="search-conditions-box">
			<div class="mt-5 px-4 py-0">
				<table class="w-full border shadow my-6">
					<tbody>
						<tr>
							<th class="px-3 py-3 text-center border" bgcolor="#D2B48C">アンケートID</th>
							<td class="px-3 py-3 border">{{ $cqdetail->cqid }}</td>
						</tr>
						<tr>
							<th class="px-3 py-3 text-center border" bgcolor="#D2B48C">顧客名</th>
							<td class="px-3 py-3 border">{{ $cqdetail->customer_name }}</td>
						</tr>
						<tr>
							<th class="px-3 py-3 text-center border" bgcolor="#D2B48C">工事番号</th>
							<td class="px-3 py-3 border">{{ $cqdetail->construction_no }}</td>
						</tr>
						<tr>
							<th class="px-3 py-3 text-center border" bgcolor="#D2B48C">竣工開始&nbsp;～&nbsp;竣工終了</th>
							<td class="px-3 py-3 border">{{ $cqdetail->operating_date_st }}&nbsp;～&nbsp;{{ $cqdetail->operating_date_ed }}</td>
						</tr>
						<tr>
							<th class="px-3 py-3 text-center border" bgcolor="#D2B48C">実施工程</th>
							<td class="px-3 py-3 border">{{ $cqdetail->operating_schedule_sales }}</td>
						</tr>
						<tr>
							<th class="px-3 py-3 text-center border" bgcolor="#D2B48C">掲載許可</th>
							@if($cqdetail->adv_permission =="1")
							<td class="px-3 py-3 border">許可</td>
							@else
							<td class="px-3 py-3 border">不許可</td>
							@endif
						</tr>
						<tr>
							<th class="px-3 py-3 text-center border" bgcolor="#D2B48C">1.工程・工期について</th>
							<td class="px-3 py-3 border">{{ $cqdetail->answer1 }}</td>
						</tr>
						<tr>
							<th class="px-3 py-3 text-center border" bgcolor="#D2B48C">2.金額の納得度</th>
							<td class="px-3 py-3 border">{{ $cqdetail->answer2 }}</td>
						</tr>
						<tr>
							<th class="px-3 py-3 text-center border" bgcolor="#D2B48C">3.設計への評価</th>
							<td class="px-3 py-3 border">{{ $cqdetail->answer3 }}</td>
						</tr>
						<tr>
							<th class="px-3 py-3 text-center border" bgcolor="#D2B48C">4.施工の仕上がり</th>
							<td class="px-3 py-3 border">{{ $cqdetail->answer4 }}</td>
						</tr>
						<tr>
							<th class="px-3 py-3 text-center border" bgcolor="#D2B48C">5.弊社営業担当の対応について</th>
							<td class="px-3 py-3 border">{{ $cqdetail->answer5 }}</td>
						</tr>
						<tr>
							<th class="px-3 py-3 text-center border" bgcolor="#D2B48C">6.弊社設計担当の対応について</th>
							<td class="px-3 py-3 border">{{ $cqdetail->answer6 }}</td>
						</tr>
						<tr>
							<th class="px-3 py-3 text-center border" bgcolor="#D2B48C">7.弊社施工担当の対応について</th>
							<td class="px-3 py-3 border">{{ $cqdetail->answer7 }}</td>
						</tr>
						<tr>
							<th class="px-3 py-3 text-center border" bgcolor="#D2B48C">自由記入欄</th>
							<td class="px-3 py-3 border">{{ $cqdetail->answer_freetext }}</td>
						</tr>
					</tbody>
				</table>
				<button class="btn btn-secondary button-Rotate" type="button" onClick="history.back()">戻る</button>
			</div>
		</div>
	</div>
	<!-- Scripts -->
	<script></script>
</body>

</html>