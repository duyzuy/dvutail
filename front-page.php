<?php get_header(); ?>
<div class="dvu__front-page-container">

	<?php get_template_part('templates/partials/partial', 'slider', array("mode" => 'video', 'class' => "")) ?>

	<?php get_template_part('templates/partials/home/hero', 'content', array(
		"title" => 'DIỄN ĐÀN CÔNG NGHỆ QUỐC TẾ UY TÍN, <span class="block">CHUYÊN NGHIỆP & LỚN NHẤT TẠI VIỆT NAM</span>',
		"description" => 'Diễn đàn Công nghệ Quốc tế - iTECH EXPO được tổ chức lần đầu tiên tại Việt Nam từ năm 1996 và trở thành sự kiện uy tín hàng đầu trong lĩnh vực công nghệ thông tin, nắm giữ tầm quan trọng trong việc thúc đẩy sự phát triển của toàn ngành. Nắm bắt xu hướng phát triển của thời đại, iTECH EXPO tiên phong bước sang kỷ nguyên mới, nơi chuyển giao từ CÔNG NGHỆ THÔNG TIN sang CÔNG NGHỆ THÔNG MINH mang đến những giá trị vượt bậc.'
	)) ?>

	<?php get_template_part('templates/partials/home/why-chose', 'us', array(
		'items'	=> array(
			[
				'number' 	=> 	"01",
				"content"	=>	'Gặp gỡ, giao lưu với các lãnh đạo, chuyên gia, doanh nghiệp hàng đầu trong lĩnh vực công nghệ; mở rộng mạng lưới đối tác đa quốc gia.',
				"color"		=>	'blue'
			],
			[
				'number' 	=> 	"02",
				"content"	=>	'Xây dựng chiến lược & định hướng phát triển mới trong kỷ nguyên mới.',
				"color"		=>	'blue'
			],
			[
				'number' 	=> 	"03",
				"content"	=>	'Quảng bá hình ảnh, nâng tầm thương hiệu, gia tăng uy tín và vị thế cạnh tranh.',
				"color"		=>	'blue'
			],
			[
				'number' 	=> 	"04",
				"content"	=>	'Cập nhật xu hướng, thị trường công nghệ mới nhất với các giải pháp, ứng dụng tân tiến, hiện đại.',
				"color"		=>	'orange'
			],
			[
				'number' 	=> 	"05",
				"content"	=>	'Cầu nối giao thương tạo cơ hội tiếp cận với nhóm khách hàng tiềm năng, tìm kiếm cơ hội hợp tác.',
				"color"		=>	'orange'
			]
		)
	)) ?>

	<?php get_template_part('templates/partials/home/counters', '', array(
		'items'	=> array(
			[
				'counter' 	=> 	"30+",
				"content"	=>	'Countries',
				"color"		=>	'blue'
			],
			[
				'counter' 	=> 	"300+",
				"content"	=>	'Exhibitors',
				"color"		=>	'blue'
			],
			[
				'counter' 	=> 	"50.000+",
				"content"	=>	'Visitors',
				"color"		=>	'blue'
			],
			[
				'counter' 	=> 	"10+",
				"content"	=>	'Forum Sessions',
				"color"		=>	'orange'
			],
			[
				'counter' 	=> 	"300+",
				"content"	=>	'Experts & Speakers',
				"color"		=>	'orange'
			],
			[
				'counter' 	=> 	"1.000+",
				"content"	=>	'Networkings',
				"color"		=>	'orange'
			]
		)
	)) ?>

	<?php get_template_part('templates/partials/home/articles', '', array(
		'items'	=> array(
			[
				'cat' 	=> 	"iTECH Expo",
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/thumbnail.png',
				'excerpt'	=>	'Sorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus.',
				"color"		=>	'orange'
			],
			[
				'cat' 	=> 	"iTECH Forum",
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/thumbnail.png',
				'excerpt'	=>	'Sorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus.',
				"color"		=>	'blue'
			],
			[
				'cat' 	=> 	"iTECH Activities",
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/thumbnail.png',
				'excerpt'	=>	'Sorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus.',
				"color"		=>	'orange'
			],
		)
	)) ?>

	<div class="register-section py-24 relative bg-[url(<?php echo get_template_directory_uri() . '/assets/images/bg-global-connect.png' ?>)]">
		<div class=" bg-orange-600/80 absolute left-0 right-0 top-0 bottom-0 z-10"></div>
		<div class="container mx-auto relative z-20 px-3 md:px-6 lg:px-8">
			<div class="hero-content text-center max-w-2xl mx-auto text-white">
				<div class="content mb-12">
					<p class="text-3xl font-bold">ĐĂNG KÝ THAM DỰ</p>
					<h3 class="lg:text-7xl text-3xl font-bold lg:mb-6 mb-3">iTECH EXPO</h3>
					<p class="lg:text-[16px] text-[14px] mb-3">Tham dự iTECH EXPO, quý quan khách sẽ được trải nghiệm, khám phá và cập nhật các xu hướng công nghệ mới nhẩt của thời đại kỷ nguyên số. Đây cũng là dip gặp gỡ, giao lưu, kết nối với các tổ chức, doanh nghiệp, chuyên gia hàng đầu trong lĩnh vực, đón nhận những chia sẻ hữu ích, giải pháp, chiến lược sáng tạo trong lĩnh vực công nghệ thông tin.</p>
				</div>
				<a href="" class="lg:text-4xl text-xl italic inline-block font-bold lg:px-24 px-12 py-4 lg:py-6 lg:border-4 border-2">ĐĂNG KÝ NGAY!</a>
			</div>
		</div>
	</div>

	<?php echo do_shortcode('[dvu_blog limit="4" blog_title="Tin tức"]') ?>
	<?php get_template_part('templates/partials/home/partner', '', array(
		"title"	=> 	"bảo trợ - bảo an/bộ",
		"sub_title"	=>	"đơn vị",
		'items'	=> array(
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-mobifone.png',
				"content"	=>	"MOBIFONE CORPORATION"
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-vnpt.png',
				"content"	=>	"VIETNAM POSTS AND TELECOMMUNICATIONS GROUP (VNPT)."
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-lux.png',
				"content"	=>	"CÔNG TY TNHH CÔNG NGHỆ VĨ LỰC (LUXMAGE)"
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-ocb.png',
				"content"	=>	"ORIENT COMMERCIAL JOINT STOCK BANK"
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-vnpt.png',
				"content"	=>	"VIETNAM POSTS AND TELECOMMUNICATIONS GROUP (VNPT)."
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-lux.png',
				"content"	=>	"CÔNG TY TNHH CÔNG NGHỆ VĨ LỰC (LUXMAGE)"
			],
		)
	)) ?>

	<?php get_template_part('templates/partials/home/partner', '', array(
		"sub_title"	=>	"đơn vị",
		"title"	=> 	"tổ chức",
		'items'	=> array(
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-mobifone.png',
				"content"	=>	"MOBIFONE CORPORATION"
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-vnpt.png',
				"content"	=>	"VIETNAM POSTS AND TELECOMMUNICATIONS GROUP (VNPT)."
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-lux.png',
				"content"	=>	"CÔNG TY TNHH CÔNG NGHỆ VĨ LỰC (LUXMAGE)"
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-ocb.png',
				"content"	=>	"ORIENT COMMERCIAL JOINT STOCK BANK"
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-vnpt.png',
				"content"	=>	"VIETNAM POSTS AND TELECOMMUNICATIONS GROUP (VNPT)."
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-lux.png',
				"content"	=>	"CÔNG TY TNHH CÔNG NGHỆ VĨ LỰC (LUXMAGE)"
			],
		)
	)) ?>


	<?php get_template_part('templates/partials/home/partner', '', array(
		"sub_title"	=>	"đơn vị",
		"title"	=> 	"đồng hành",
		'items'	=> array(
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-mobifone.png',
				"content"	=>	"MOBIFONE CORPORATION"
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-vnpt.png',
				"content"	=>	"VIETNAM POSTS AND TELECOMMUNICATIONS GROUP (VNPT)."
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-lux.png',
				"content"	=>	"CÔNG TY TNHH CÔNG NGHỆ VĨ LỰC (LUXMAGE)"
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-ocb.png',
				"content"	=>	"ORIENT COMMERCIAL JOINT STOCK BANK"
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-vnpt.png',
				"content"	=>	"VIETNAM POSTS AND TELECOMMUNICATIONS GROUP (VNPT)."
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-lux.png',
				"content"	=>	"CÔNG TY TNHH CÔNG NGHỆ VĨ LỰC (LUXMAGE)"
			],
		)
	)) ?>

	<?php get_template_part('templates/partials/home/partner', '', array(
		"sub_title"	=>	"đơn vị",
		"title"	=> 	"truyền thông",
		'items'	=> array(
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-mobifone.png',
				"content"	=>	"MOBIFONE CORPORATION"
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-vnpt.png',
				"content"	=>	"VIETNAM POSTS AND TELECOMMUNICATIONS GROUP (VNPT)."
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-lux.png',
				"content"	=>	"CÔNG TY TNHH CÔNG NGHỆ VĨ LỰC (LUXMAGE)"
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-ocb.png',
				"content"	=>	"ORIENT COMMERCIAL JOINT STOCK BANK"
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-vnpt.png',
				"content"	=>	"VIETNAM POSTS AND TELECOMMUNICATIONS GROUP (VNPT)."
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-lux.png',
				"content"	=>	"CÔNG TY TNHH CÔNG NGHỆ VĨ LỰC (LUXMAGE)"
			],
		)
	)) ?>

	<?php get_template_part('templates/partials/home/partner', '', array(
		"sub_title"	=>	"đơn vị",
		"title"	=> 	"tham gia",
		'items'	=> array(
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-mobifone.png',
				"content"	=>	"MOBIFONE CORPORATION"
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-vnpt.png',
				"content"	=>	"VIETNAM POSTS AND TELECOMMUNICATIONS GROUP (VNPT)."
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-lux.png',
				"content"	=>	"CÔNG TY TNHH CÔNG NGHỆ VĨ LỰC (LUXMAGE)"
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-ocb.png',
				"content"	=>	"ORIENT COMMERCIAL JOINT STOCK BANK"
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-vnpt.png',
				"content"	=>	"VIETNAM POSTS AND TELECOMMUNICATIONS GROUP (VNPT)."
			],
			[
				"thumbnail"	=>	get_template_directory_uri() . '/assets/images/logo-lux.png',
				"content"	=>	"CÔNG TY TNHH CÔNG NGHỆ VĨ LỰC (LUXMAGE)"
			],
		)
	)) ?>

</div>

<?php get_footer() ?>