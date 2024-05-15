<?php get_header(); ?>
<div class="dvu__front-page-container">
	<?php while (have_posts()) : the_post(); ?>
		<?php the_content() ?>
	<?php endwhile; ?>
	<?php
	/*
	get_template_part('templates/partials/partial', 'slider', array("mode" => 'video', 'class' => ""));

	get_template_part('templates/partials/home/hero', 'content', array(
		"title" => 'DIỄN ĐÀN CÔNG NGHỆ QUỐC TẾ UY TÍN, <span class="block">CHUYÊN NGHIỆP & LỚN NHẤT TẠI VIỆT NAM</span>',
		"description" => 'Diễn đàn Công nghệ Quốc tế - iTECH EXPO được tổ chức lần đầu tiên tại Việt Nam từ năm 1996 và trở thành sự kiện uy tín hàng đầu trong lĩnh vực công nghệ thông tin, nắm giữ tầm quan trọng trong việc thúc đẩy sự phát triển của toàn ngành. Nắm bắt xu hướng phát triển của thời đại, iTECH EXPO tiên phong bước sang kỷ nguyên mới, nơi chuyển giao từ CÔNG NGHỆ THÔNG TIN sang CÔNG NGHỆ THÔNG MINH mang đến những giá trị vượt bậc.'
	));

	get_template_part('templates/partials/home/why-chose', 'us', array(
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
	));

	get_template_part('templates/partials/home/counters', '', array(
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
	));	
	get_template_part('templates/partials/home/articles', '', array(
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
	));
 echo do_shortcode('[dvu_blog limit="4" blog_title="Tin tức"]') 
 
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
	)) 
	*/ ?>
</div>

<?php get_footer() ?>