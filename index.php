<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'];
$protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
$baseURL 	= $protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']);
$currentDir = __DIR__;
?>

<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Clock</title>
	<link rel="stylesheet" href="assets/fonts/inter-v18-latin/inter.css" />
	<link rel="stylesheet" href="assets/fonts/share-tech-v21-latin/share-tech.css" />
	<link rel="stylesheet" href="css/style.min.css" />
</head>

<body>
<div class="app flex flex-col w-full justify-center">

	<main class="container__wrapper h-full select-none divide-y divide-opacity-10">
		<div class="container__inner flex flex-col w-full h-screen">

			<div class="title flex justify-center">
				<h1>Clock</h1>
			</div>

			<div class="clock flex flex-col flex-1 h-full justify-center">

				<div class="time flex w-full">
					<div class="hours flex w-full justify-center">hh</div>
					<div class="minutes flex w-full justify-center">mm</div>
					<div class="seconds flex w-full justify-center">ss</div>
				</div>

				<div class="binary-digits flex w-full">

					<div class="binary-digit hours flex w-full justify-center gap-4 lg:py-8">
						<div class="hours-digit first flex flex-col justify-end gap-1">
							<span class="tick bit-6"></span>
							<span class="tick bit-5"></span>
						</div>
						<div class="hours-digit second flex flex-col justify-end gap-1">
							<span class="tick bit-4"></span>
							<span class="tick bit-3"></span>
							<span class="tick bit-2"></span>
							<span class="tick bit-1"></span>
						</div>
					</div>

					<div class="binary-digit minutes flex w-full justify-center gap-4 lg:py-8">
						<div class="minutes-digit first flex flex-col justify-end gap-1">
							<span class="tick bit-8"></span>
							<span class="tick bit-7"></span>
							<span class="tick bit-6"></span>
							<span class="tick bit-5"></span>
						</div>
						<div class="minutes-digit second flex flex-col justify-end gap-1">
							<span class="tick bit-4"></span>
							<span class="tick bit-3"></span>
							<span class="tick bit-2"></span>
							<span class="tick bit-1"></span>
						</div>
					</div>

					<div class="binary-digit seconds flex w-full justify-center gap-4 lg:py-8">
						<div class="seconds-digit first flex flex-col justify-end gap-1">
							<span class="tick bit-8"></span>
							<span class="tick bit-7"></span>
							<span class="tick bit-6"></span>
							<span class="tick bit-5"></span>
						</div>
						<div class="seconds-digit second flex flex-col justify-end gap-1">
							<span class="tick bit-4"></span>
							<span class="tick bit-3"></span>
							<span class="tick bit-2"></span>
							<span class="tick bit-1"></span>
						</div>

					</div>
				</div>
			</div>

			<div class="date-times flex">
				<div class="container world-times w-1/3 flex py-4 items-center justify-center">
					<div class="w-times">
						<ul class="world-times-list flex flex-col gap-y-4">
							<li class="grid grid-cols-2 gap-x-4">
								<span class="city font-bold text-2xl">London</span>
								<span class="time london text-2xl">20:04 Uhr</span>
								<span class="date london col-span-2">09 Februar, 2025</span>
							</li>
							<li class="grid grid-cols-2 gap-x-4">
								<span class="city font-bold text-2xl">New York</span>
								<span class="time new-york text-2xl">20:04</span>
								<span class="date new-york col-span-2">09 Februar, 2025</span>
							</li>
							<li class="grid grid-cols-2 gap-x-4">
								<span class="city font-bold text-2xl">Tokyo</span>
								<span class="time tokyo text-2xl">20:04</span>
								<span class="date tokyo col-span-2">09 Februar</span>
							</li>
						</ul>
					</div>
				</div>

				<div class="date flex flex-1 py-4 items-center justify-center">
					<div class="container day flex py-4 items-center justify-center lg:py-16">
						<span class="day number">day</span>
						<sup class="day name uppercase">name</sup>
					</div>
					<div class="container month flex py-4 items-center justify-center lg:py-16">
						<span class="month number">month</span>
						<sup class="mont name uppercase">name</sup>
					</div>
					<div class="container year flex py-4 items-center justify-center lg:py-16">
						<span class="year number">year</span>
						<sup class="year suf uppercase">a.d.</sup>
					</div>
				</div>
			</div>
   
		</div>
	</main>
 
</div>

<script src="<?php echo $baseURL; ?>/js/libs/jquery-3.6.0.min.js"></script>
<script src="<?php echo $baseURL; ?>/js/libs/moment-with-locales.min.js"></script>
<script src="<?php echo $baseURL; ?>/js/libs/moment-timezone-with-data.min.js"></script>
<script src="<?php echo $baseURL; ?>/js/init.min.js"></script>
</body>
</html>
