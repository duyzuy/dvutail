<div class="relative news-item group/item">
  <div class="flex items-center rounded-md cursor-pointer hover:bg-amber-500 px-3 py-2">
    <span class="icon mr-1">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-newspaper">
        <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2" />
        <path d="M18 14h-8" />
        <path d="M15 18h-5" />
        <path d="M10 6h8v4h-8V6Z" />
      </svg>
    </span>
    <span class="name">Khám phá</span>
  </div>
  <div class="dropdown absolute z-10 right-0 invisible group-hover/item:visible">
    <div class="dropdown-inner bg-white shadow-sm rounded-md w-44 p-3 overflow-hidden">
      <ul>
        <li class="hover:bg-slate-100 rounded-md"><a href="<?php echo home_url() . '/tin-tuc-su-kien'; ?>" class="block py-2 px-3"><span class="text-gray-800">Tin tức sự kiện</span></a></li>
        <li class="hover:bg-slate-100 rounded-md"><a href="<?php echo home_url() . '/kien-thuc-nha-bep'; ?>" class="block py-2 px-3"><span class="text-gray-800">Kinh nghiệm hay</a></li>
        <li class="hover:bg-slate-100 rounded-md"><a href="<?php echo home_url() . '/khuyen-mai'; ?>" class="block py-2 px-3"><span class="text-gray-800">Khuyến mại</span></a></li>
      </ul>
    </div>
  </div>
</div>