<?php
$classes = isset($args['class']) ? " " . $args['class'] : "";


$items = [
	array(
		"name"	=>	"Cam kết hàng chính hãng.",
		"icon"	=>	'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check">
									<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
									<path d="m9 12 2 2 4-4" />
								</svg>'
	),
	array(
		"name"	=>	"Tận tâm hỗ trợ.",
		"icon"	=>	'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-headset">
									<path d="M3 11h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-5Zm0 0a9 9 0 1 1 18 0m0 0v5a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3Z" />
									<path d="M21 16v2a4 4 0 0 1-4 4h-5" />
								</svg>'
	),
	array(
		"name"	=>	"Giao hàng kịp thời hanh chóng.",
		"icon"	=>	'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-truck">
									<path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2" />
									<path d="M15 18H9" />
									<path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14" />
									<circle cx="17" cy="18" r="2" />
									<circle cx="7" cy="18" r="2" />
								</svg>'
	),
	array(
		"name"	=>	"Đổi trả nếu là hàng giả",
		"icon"	=>	'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package-2">
									<path d="M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z" />
									<path d="m3 9 2.45-4.9A2 2 0 0 1 7.24 3h9.52a2 2 0 0 1 1.8 1.1L21 9" />
									<path d="M12 3v6" />
								</svg>'
	),
]
?>
<div class="merque_wrapper py-2 px-3 bg-emerald-50 rounded-md text-sm relative <?php echo $classes; ?>">
	<div class="whitespace-nowrap overflow-hidden">
		<div class="merque-benefit flex justify-items-center w-[200%]">
			<div class="flex items-center animate-[moving-text_30s_linear_infinite_forwards]">
				<span class="group__title group__hover font-bold">saigonhomekitchen</span>
				<ul role="list" class="group__list flex justify-items-center m-0 p-0">
					<?php
					foreach ($items as $item) { ?>
						<li role="listitem" class="group__list-item mx-2">
							<div class="flex items-center gap-1">
								<span class="w-6 h-6 bg-emerald-600 text-white rounded-full p-1"><?php echo $item['icon']; ?></span>
								<span><?php echo $item['name']; ?></span>
							</div>
						</li>
					<?php 	}
					?>
				</ul>
			</div>
			<div class="flex items-center animate-[moving-text_30s_linear_infinite_forwards]">
				<span class="group__title group__hover font-bold">saigonhomekitchen</span>
				<ul role="list" class="group__list flex justify-items-center m-0 p-0">
					<?php
					foreach ($items as $item) { ?>
						<li role="listitem" class="group__list-item mx-2">
							<div class="flex items-center gap-1">
								<span class="w-6 h-6 bg-emerald-600 text-white rounded-full p-1"><?php echo $item['icon']; ?></span>
								<span><?php echo $item['name']; ?></span>
							</div>
						</li>
					<?php 	}
					?>
				</ul>
			</div>
		</div>
	</div>
	<span class="absolute right-0 top-0 bottom-0 flex items-center justify-end w-20 bg-gradient-to-tr from-transparent via-emerald-50/90 via-[60%] to-emerald-50">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right">
			<path d="m9 18 6-6-6-6" />
		</svg>
	</span>
</div>