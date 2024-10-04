<?php
$menu_vertical = dvutail_get_menu_items(75);
function render_vertical_menu_items($items, $depth = 0)
{
    if ($depth <= 1) :
?>
        <ul class="menu-item <?php echo 'menu-items-depth-' . $depth ?> <?php echo  $depth === 0 ? 'grid grid-cols-4 gap-4' : '' ?>">
            <?php foreach ($items as $key => $item) :
                $href = "";
                if ($item['object'] === "product_cat" && $item['type'] === 'taxonomy') {
                    $href = get_home_url() . '/' . 'danh-muc/' . $item['object_slug'];
                }
                if ($item['object'] === "custom" && $item['type'] === 'custom') {
                    $href = $item['object_slug'];
                }
            ?>
                <li class="py-[6px] <?php echo $depth === 0 ? "w-full" : 'w-full'; ?>">
                    <h4 class="<?php echo $depth === 0 ? "font-bold mb-2" : "" ?>">
                        <a href="<?php echo $href; ?>"><?php echo $item['title'] ?></a>
                    </h4>
                    <?php if (count($item['child_items'])) :  ?>

                        <?php render_vertical_menu_items($item['child_items'], $depth + 1) ?>

                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
<?php
    endif;
}
?>

<div class="header__bottom hidden lg:block">
    <div class="mx-auto container px-3 md:px-6 lg:px-8">
        <div class="relative flex h-[60px] items-center justify-between gap-x-6">
            <div class="header__bottom-menu-cat w-fit">
                <div class="flex items-center hover:bg-amber-400 cursor-pointer px-3 py-2 rounded-md js__menu-vertical-button whitespace-nowrap">
                    <span class="w-8 h-8 inline-flex items-center justify-center">
                        <span class="icon mr-2 w-5 h-5 overflow-hidden">
                            <span class="flex flex-col transition-icons">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-list-filter">
                                    <path d="M3 6h18" />
                                    <path d="M7 12h10" />
                                    <path d="M10 18h4" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                                    <path d="M18 6 6 18" />
                                    <path d="m6 6 12 12" />
                                </svg>
                            </span>
                        </span>
                    </span>
                    <span>Danh mục</span>
                </div>
                <div class="vertical__menulist-wrapper fixed left-0 right-0 h-[100vh] z-90 js__menu-vertical-list">
                    <div class="overlay bg-white/60 absolute left-0 right-0 top-0 bottom-0"></div>
                    <div class="vertical__menulist-inner h-[550px] overflow-hidden relative container mx-auto px-2 md:px-6 lg:px-8 pt-4">
                        <div class="vertical__menulist-items flex bg-white rounded-lg lg:p-6 p-2 h-full">
                            <div class="vertical__menulist-tabs gap-y-2 w-28 lg:w-40 h-full overflow-y-auto pr-3">
                                <?php
                                $count = 0;
                                foreach ($menu_vertical as $key => $menu_item) : ?>
                                    <div class="menu__tab-item px-3 py-3 flex items-center hover:bg-slate-100 cursor-pointer rounded-lg <?php echo $count === 0 ? 'active bg-slate-100' : 'mt-2' ?>" data-tab-id="<?php echo $menu_item['id']; ?>">
                                        <span class="menu__item--thumbnail w-8 h-8 block mr-2">
                                            <img src="<?php echo  $menu_item['menu_thumbnail']; ?>" class="w-full" alt="<?php echo $menu_item['title']; ?>" />
                                        </span>
                                        <span class="text-sm"><?php echo $menu_item['title']; ?></span>
                                    </div>
                                <?php $count++;
                                endforeach; ?>
                            </div>
                            <div class="vertical__menulist-panels flex-1 pl-2 h-full rounded-lg pr-2">
                                <div class="vertical__menulist-panels-inner bg-slate-50 p-4 rounded-lg h-full overflow-y-auto">
                                    <?php
                                    $list_count = 0;
                                    foreach ($menu_vertical as $key => $menu_item) :  ?>
                                        <div class="vertical__panel-item <?php echo $list_count === 0 ? 'active' : '' ?>" data-panel-id="<?php echo $menu_item['id']; ?>">
                                            <div class="vertical__menuitem-head py-2 mb-2">
                                                <h3 class="text-xl font-semibold"><?php echo $menu_item['title'] ?></h3>
                                            </div>
                                            <div class="vertical__menuitem-childs">
                                                <?php render_vertical_menu_items($menu_item['child_items'], 0) ?>
                                            </div>
                                        </div>
                                    <?php $list_count++;
                                    endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="primary-menu w-full overflow-hidden">
                <?php get_template_part('templates/header/elements/element', 'primary-menu', array(
                    "class" => "flex space-x-6 items-center menu-primary-desktop h-full"
                )) ?>
            </div>
        </div>
    </div>
</div>