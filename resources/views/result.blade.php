<!DOCTYPE html>
<html lang="en">
<head>
	<title>Текстовый анализатор </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('form/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('form/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('form/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('form/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('form/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('form/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('form/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('form/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('form/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('form/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('form/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('form/css/main.css')}}">
<!--===============================================================================================-->
</head >
<body style="background: #1b1e21;">

{{--<p style="color: white; margin-top: 20px; text-align: center;">
	Текст источника <br>
		<pre style="color: white;">
					@php  print_r($data['repWord']) @endphp
				</pre>
</p>--}}

	<div class="container-contact100" >

		@if(!empty($data))
			<div class="chart" style=" height: auto; width:60%; position: absolute; left: 33%; transform: translate(-50%, 10%); ">
				<div id="chartContainer" style="height: 370px; width: 100%;   "></div>


                <p style=" margin-top: 30px; text-align: center; background: white; color: black; border-radius: 5px;
                        width: 150px; height: 30px; font-size: 1.2rem; position: relative; left: 50%; top: 10px; transform: translateX(-50%)">
                    Текст источника </p>
                <p style="color: white; margin-top: 0px; text-align: center; border: 1px solid gray; border-radius: 5px; padding: 10px; padding-top: 20px; margin-bottom: 20px;">
					{{{$data['text']}}}
				</p>

			</div>


		@else

			<label class="contact100-more" for="file">
				<i class="zmdi zmdi-file"></i>
				Загрузите тесктовый файл
			</label>

		@endif







				<script>
					window.onload = function() {

						var chart = new CanvasJS.Chart("chartContainer", {
							animationEnabled: true,
							theme: "light2",
							title:{
								text: "Повторения слов"
							},
							axisY: {
								title: " раз"
							},
							data: [{
								type: "column",
								yValueFormatString: "# раз",
								dataPoints: <?php echo json_encode($data['canvas'], JSON_NUMERIC_CHECK); ?>
							}]
						});
						chart.render();

					}
				</script>

		<div class="wrap-contact100" >
			<form class="contact100-form validate-form" action="/insert">
				@csrf
				<span class="contact100-form-title">
					Текстовый анализатор
				</span>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Ваше имя</span>
					<input class="input100" type="text" name="username" placeholder="Введите ваше имя...">
					<span class="focus-input100"></span>
				</div>

				<input type="file" id="file" style="display: none;" accept=".txt, .db ">

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Ваш текст </span>

					<textarea class="input100" name="text" placeholder="Введите текст..." rows="15" ></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn" type="submit">
							Анализировать
						</button>
					</div>
				</div>
			</form>
            <div class="wrap-contact100-form-btn" style="background: #98e1b7">
                <div class="contact100-form-bgbtn"></div>
                <a href="/" class="contact100-form-btn" type="submit" style="color: black">
                 <-   Главный
                </a>
            </div>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="{{asset('form/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('form/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('form/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('form/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('form/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('form/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('form/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('form/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="{{asset('form/js/map-custom.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('form/js/main.js')}}"></script>

	<script src="{{asset('form/js/jquery.canvasjs.min.js')}}"></script>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<script src="{{asset('form/js/canvasjs.react.js')}}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>

	<style>
		.contact100-more {
			transition: background 1s;
		}
		.contact100-more:hover {
			background: #1b8a0f;
		}
		.container-contact100 {
			margin-bottom: 50px;
			padding-bottom: 50px;
		}

		.wrap-contact100 {
			max-height: 100% !important;
			height:  100% !important;
		}
	</style>
</body>
</html>
