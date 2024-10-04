<?php

$menu_primary = dvutail_get_menu_items(730);

if (count($menu_primary)) :

?>
	<div class="primary__menu-wrapper flex items-center justify-center">
		<div class="primary__menu-swiper swiper flex items-center ml-0" style="width: calc(100% - 90px)">
			<div class="primary-menu-wrapper swiper-wrapper">
				<?php foreach ($menu_primary as $key => $menu_item) :

					$href = "/";
					if ($menu_item['object'] === "product_cat" && $menu_item['type'] === 'taxonomy') {
						$href = get_home_url() . '/' . 'danh-muc/' . $menu_item['object_slug'];
					}

					if ($menu_item['object'] === "custom" && $menu_item['type'] === 'custom') {
						$href = $menu_item['object_slug'];
					}

				?>
					<div class="swiper-slide" style="width: fit-content;">
						<div class="menu-item hover:bg-amber-400 px-2 py-2 rounded-md">
							<a href="<?php echo $href; ?>" class="flex items-center justify-center leading-tight">
								<span class="thumbnail text-xs italic mr-2 rounded-full p-1 bg-white w-8 h-8 inline-block overflow-hidden">
									<img src="<?php echo $menu_item['object_src']; ?>" alt="<?php echo $menu_item['title']; ?>" width="30px" height="30px" />
								</span>
								<span class="name flex-1 text-gray-800 max-w-[100px] line-clamp-2 text-sm leading-4"><?php echo $menu_item['title']; ?></span>
							</a>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
		<div class="flex relative items-center justify-between gap-x-1">
			<div class="header-swiper-button-prev w-8 h-8 rounded-full text-gray-600 hover:bg-amber-400 flex items-center justify-center top-0 relative mt-auto left-0">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left">
					<path d="m15 18-6-6 6-6" />
				</svg>
			</div>
			<div class="header-swiper-button-next w-8 h-8 rounded-full text-gray-600 hover:bg-amber-400 flex items-center justify-center top-0 relative mt-auto right-0">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right">
					<path d="m9 18 6-6-6-6" />
				</svg>
			</div>
		</div>
	</div>
<?php endif; ?>