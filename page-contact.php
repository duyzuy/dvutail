<?php

/*
* Template Name: page contact
*
*
*/
get_header() ?>
<main id="main">
    <div class="page__wrapper">
        <?php while (have_posts()) : the_post(); ?>
            <?php
            $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');

            if (empty($thumbnail)) : ?>
                <div class="hero bg-gradient-to-t py-12 lg:py-24 px-3 lg:px-0 relative overflow-hidden from-[#3B5AA7] via-[#3D85C5] to-[#3FA9DF]">
                    <div class="pattern absolute w-[16vw] h-[16vw] -top-[6vw] -right-[6vw] bg-no-repeat bg-cover bg-[url(http://localhost/itechexpo/wp-content/themes/itech/assets/images/pattern-tr.svg)]"></div>
                    <div class="pattern absolute w-[16vw] h-[16vw] -bottom-[6vw] -left-[6vw] bg-no-repeat bg-cover bg-[url(http://localhost/itechexpo/wp-content/themes/itech/assets/images/pattern-bl.svg)]"></div>
                    <div class="container mx-auto text-white mb-3 text-center max-w-5xl">
                        <h1 class="entry-title text-white font-bold text-2xl lg:text-4xl 2xl:text-6xl"><?php the_title(); ?></h1>
                    </div>
                </div>
            <?php else : ?>
                <header class="page__wrapper-head bg-[url(<?php echo $thumbnail; ?>)] bg-center bg-cover md:h-[250px] lg:h-[350px] 2xl:h-[500px] flex items-center">
                    <div class="container mx-auto lg:py-6 px-0 md:px-6 lg:px-8">
                        <div class="flex items-center">
                            <div class="page__title bg-gradient-to-r from-[#CC2027]/80 via-[#E15723]/80 to-transparent pl-4 pr-16 py-6 md:py-3 lg:pl-12 lg:py-8 lg:pr-16 xl:pl-12 xl:py-8 2xl:pr-24 w-fit uppercase">
                                <?php the_title('<h1 class="entry-title text-white font-bold text-2xl lg:text-4xl 2xl:text-6xl">', '</h1>'); ?>
                            </div>
                        </div>
                    </div>
                </header>
            <?php endif; ?>
            <div class="page__wrapper-body relative">
                <div class="bg-[url(<?php echo get_template_directory_uri() . '/assets/images/global-left.svg' ?>)] w-[150px] h-[150px] xl:w-[300px] xl:h-[300px] bg-cover absolute -right-[80px] xl:-right-[150px] top-[10%]"></div>
                <div class="bg-[url(<?php echo get_template_directory_uri() . '/assets/images/global-right.svg' ?>)] w-[150px] h-[150px] xl:w-[300px] xl:h-[300px] bg-cover absolute -left-[80px] xl:-left-[150px] top-[60%]"></div>
                <div class="container px-3 md:px-6 lg:px-8 relative z-10">
                    <?php the_content() ?>
                    <div class="content py-12 text-center">
                        <span class="bg-gradient-to-r bg-clip-text from-orange-600 to-orange-400 uppercase text-transparent font-bold text-xl lg:text-3xl">SKY EXPO</span>
                        <p><strong>Địa chỉ:</strong> Công Viên Phần Mềm Quang Trung, Đ. Số 1, Tân Hưng Thuận, Quận 12, Thành phố Hồ Chí Minh</p>
                    </div>
                    <div class="flex flex-wrap -mx-3 py-12 gap-y-6">
                        <div class="item w-full gap-y-6 flex flex-col lg:w-1/3 px-3">
                            <div class="h-60 overflow-hidden">
                                <img src="http://localhost/itechexpo/wp-content/uploads/2024/05/img-1.jpg" alt="img-1" class="w-full h-full object-cover" />
                            </div>
                            <div class="h-60 overflow-hidden">
                                <img src="http://localhost/itechexpo/wp-content/uploads/2024/05/img-2.jpg" alt="img-2" class="w-full h-full object-cover" />
                            </div>
                        </div>
                        <div class="item w-full lg:w-2/3 relative px-3 min-h-60">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.9409359781002!2d106.66155687753009!3d10.815832089335313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529111aa89f9d%3A0xd8f09cc0aa1b27f3!2zQ-G6o25nIGjDoG5nIGtow7RuZyBxdeG7kWMgdOG6vyBUw6JuIFPGoW4gTmjhuqV0!5e0!3m2!1svi!2s!4v1715612068913!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="contact__info mb-12">
                        <div class="mb-12">
                            <p class="font-bold text-2xl text-center">Thông tin liên hệ</p>
                        </div>
                        <div class="flex flex-wrap -mx-3 justify-center gap-y-6">
                            <div class="w-full lg:w-1/2 px-3 max-w-[560px]">
                                <div class="bg-gradient-to-t from-[#E15723] via-[#EB7121] via-35% to-[#F48820] p-[2px] h-full">
                                    <div class="bg-white h-full px-8 py-6">
                                        <div class="logo h-20 flex items-center mb-2">
                                            <img src="http://localhost/itechexpo/wp-content/themes/itech/assets/images/logo-hca.svg" alt="HCA LOGO" class="mx-auto">
                                        </div>
                                        <p class="mb-3 text-center"><strong>Địa chỉ:</strong> Số 224 Điện Biên Phủ, Phường Võ Thị Sáu,<br /> Quận 3, TP. HCM, Việt Nam</p>
                                        <div class="contact">
                                            <div class="flex gap-x-3 gap-y-3 flex-wrap">
                                                <ul class="contact-item gap-y-1 flex flex-col flex-1">
                                                    <li> <span class="bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] inline-block text-transparent bg-clip-text uppercase font-bold">Ms. Vy Nguyễn</span></li>
                                                    <li class="flex items-center">
                                                        <span class="icon mr-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                                                <g clip-path="url(#clip0_12_4924)">
                                                                    <path d="M3.46387 4.86377H18.4639V15.4888C18.4639 15.6545 18.398 15.8135 18.2808 15.9307C18.1636 16.0479 18.0046 16.1138 17.8389 16.1138H4.08887C3.92311 16.1138 3.76414 16.0479 3.64693 15.9307C3.52972 15.8135 3.46387 15.6545 3.46387 15.4888V4.86377Z" stroke="#F26D21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M18.4639 4.86377L10.9639 11.7388L3.46387 4.86377" stroke="#F26D21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_12_4924">
                                                                        <rect width="20" height="20" fill="white" transform="translate(0.963867 0.48877)"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </span>
                                                        <span>vynht@hca.org.vn</span>
                                                    </li>
                                                    <li class="flex">
                                                        <span class="icon mr-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                                                <g clip-path="url(#clip0_12_4930)">
                                                                    <path d="M13.8068 11.8441C13.8934 11.7865 13.9929 11.7514 14.0965 11.742C14.2 11.7326 14.3043 11.7492 14.3998 11.7902L18.0842 13.441C18.2083 13.4941 18.312 13.5859 18.3796 13.7028C18.4472 13.8197 18.4751 13.9553 18.4592 14.0894C18.3378 14.9965 17.8911 15.8286 17.2022 16.431C16.5133 17.0334 15.629 17.3651 14.7139 17.3644C11.8959 17.3644 9.19343 16.245 7.20086 14.2524C5.20829 12.2599 4.08887 9.55735 4.08887 6.73942C4.08817 5.82427 4.41987 4.94001 5.02228 4.25109C5.62468 3.56217 6.4568 3.11549 7.36387 2.99411C7.49796 2.97818 7.6336 3.00611 7.75049 3.07371C7.86738 3.14131 7.95924 3.24495 8.01231 3.36911L9.66309 7.05661C9.70365 7.15132 9.72016 7.25459 9.71117 7.35723C9.70217 7.45986 9.66794 7.55868 9.61152 7.64489L7.94199 9.63005C7.88277 9.71941 7.84775 9.82261 7.84036 9.92956C7.83296 10.0365 7.85345 10.1435 7.89981 10.2402C8.5459 11.5629 9.91309 12.9136 11.2396 13.5535C11.3368 13.5996 11.4444 13.6197 11.5516 13.6116C11.6589 13.6035 11.7622 13.5676 11.8514 13.5074L13.8068 11.8441Z" stroke="#F26D21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_12_4930">
                                                                        <rect width="20" height="20" fill="white" transform="translate(0.963867 0.48877)"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg></span>
                                                        <span>(+84) 77 6988 049</span>
                                                    </li>
                                                </ul>
                                                <ul class="contact-item gap-y-1 flex flex-col flex-1">
                                                    <li>
                                                        <span class="bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] inline-block text-transparent bg-clip-text uppercase font-bold">
                                                            Ms. Hồng Nguyễn
                                                        </span>
                                                    </li>
                                                    <li class="flex items-center">
                                                        <span class="icon mr-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                                                <g clip-path="url(#clip0_12_4924)">
                                                                    <path d="M3.46387 4.86377H18.4639V15.4888C18.4639 15.6545 18.398 15.8135 18.2808 15.9307C18.1636 16.0479 18.0046 16.1138 17.8389 16.1138H4.08887C3.92311 16.1138 3.76414 16.0479 3.64693 15.9307C3.52972 15.8135 3.46387 15.6545 3.46387 15.4888V4.86377Z" stroke="#F26D21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M18.4639 4.86377L10.9639 11.7388L3.46387 4.86377" stroke="#F26D21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_12_4924">
                                                                        <rect width="20" height="20" fill="white" transform="translate(0.963867 0.48877)"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </span>
                                                        <span>hongnguyen@hca.org.vn</span>
                                                    </li>
                                                    <li class="flex">
                                                        <span class="icon mr-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                                                <g clip-path="url(#clip0_12_4930)">
                                                                    <path d="M13.8068 11.8441C13.8934 11.7865 13.9929 11.7514 14.0965 11.742C14.2 11.7326 14.3043 11.7492 14.3998 11.7902L18.0842 13.441C18.2083 13.4941 18.312 13.5859 18.3796 13.7028C18.4472 13.8197 18.4751 13.9553 18.4592 14.0894C18.3378 14.9965 17.8911 15.8286 17.2022 16.431C16.5133 17.0334 15.629 17.3651 14.7139 17.3644C11.8959 17.3644 9.19343 16.245 7.20086 14.2524C5.20829 12.2599 4.08887 9.55735 4.08887 6.73942C4.08817 5.82427 4.41987 4.94001 5.02228 4.25109C5.62468 3.56217 6.4568 3.11549 7.36387 2.99411C7.49796 2.97818 7.6336 3.00611 7.75049 3.07371C7.86738 3.14131 7.95924 3.24495 8.01231 3.36911L9.66309 7.05661C9.70365 7.15132 9.72016 7.25459 9.71117 7.35723C9.70217 7.45986 9.66794 7.55868 9.61152 7.64489L7.94199 9.63005C7.88277 9.71941 7.84775 9.82261 7.84036 9.92956C7.83296 10.0365 7.85345 10.1435 7.89981 10.2402C8.5459 11.5629 9.91309 12.9136 11.2396 13.5535C11.3368 13.5996 11.4444 13.6197 11.5516 13.6116C11.6589 13.6035 11.7622 13.5676 11.8514 13.5074L13.8068 11.8441Z" stroke="#F26D21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_12_4930">
                                                                        <rect width="20" height="20" fill="white" transform="translate(0.963867 0.48877)"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg></span>
                                                        <span>(+84) 792 944 989</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full lg:w-1/2 px-3 max-w-[560px]">
                                <div class="bg-gradient-to-t from-[#3B5AA7] via-[#3D85C5] via-35% to-[#3FA9DF] p-[2px] h-full">
                                    <div class="bg-white h-full px-8 py-6">
                                        <div class="logo h-20 flex items-center  mb-2">
                                            <img src="http://localhost/itechexpo/wp-content/themes/itech/assets/images/logo-viet-build.svg" alt="VIET BUILD LOGO" class="mx-auto">
                                        </div>
                                        <p class="mb-3 text-center"><strong>Địa chỉ:</strong> Số 307/17 nguyễn văn trỗi, phường 1, <br /> quận tân bình, TP. HCM, Việt Nam</p>
                                        <div class="contact">
                                            <div class="flex gap-x-3 gap-y-3 flex-wrap">
                                                <ul class="contact-item gap-y-1 flex flex-col  flex-1">
                                                    <li>
                                                        <span class="bg-gradient-to-tr from-[#3B5AA7] via-[#3D85C5] via-35% to-[#3FA9DF] inline-block text-transparent bg-clip-text uppercase font-bold">
                                                            Ms. Trúc đinh
                                                        </span>
                                                    </li>
                                                    <li class="flex items-center">
                                                        <span class="icon mr-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                                                <g clip-path="url(#clip0_12_4924)">
                                                                    <path d="M3.46387 4.86377H18.4639V15.4888C18.4639 15.6545 18.398 15.8135 18.2808 15.9307C18.1636 16.0479 18.0046 16.1138 17.8389 16.1138H4.08887C3.92311 16.1138 3.76414 16.0479 3.64693 15.9307C3.52972 15.8135 3.46387 15.6545 3.46387 15.4888V4.86377Z" stroke="#3D85C5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M18.4639 4.86377L10.9639 11.7388L3.46387 4.86377" stroke="#3D85C5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_12_4924">
                                                                        <rect width="20" height="20" fill="white" transform="translate(0.963867 0.48877)"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </span>
                                                        <span>trucvietbuild@gmail.com</span>
                                                    </li>
                                                    <li class="flex">
                                                        <span class="icon mr-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                                                <g clip-path="url(#clip0_12_4930)">
                                                                    <path d="M13.8068 11.8441C13.8934 11.7865 13.9929 11.7514 14.0965 11.742C14.2 11.7326 14.3043 11.7492 14.3998 11.7902L18.0842 13.441C18.2083 13.4941 18.312 13.5859 18.3796 13.7028C18.4472 13.8197 18.4751 13.9553 18.4592 14.0894C18.3378 14.9965 17.8911 15.8286 17.2022 16.431C16.5133 17.0334 15.629 17.3651 14.7139 17.3644C11.8959 17.3644 9.19343 16.245 7.20086 14.2524C5.20829 12.2599 4.08887 9.55735 4.08887 6.73942C4.08817 5.82427 4.41987 4.94001 5.02228 4.25109C5.62468 3.56217 6.4568 3.11549 7.36387 2.99411C7.49796 2.97818 7.6336 3.00611 7.75049 3.07371C7.86738 3.14131 7.95924 3.24495 8.01231 3.36911L9.66309 7.05661C9.70365 7.15132 9.72016 7.25459 9.71117 7.35723C9.70217 7.45986 9.66794 7.55868 9.61152 7.64489L7.94199 9.63005C7.88277 9.71941 7.84775 9.82261 7.84036 9.92956C7.83296 10.0365 7.85345 10.1435 7.89981 10.2402C8.5459 11.5629 9.91309 12.9136 11.2396 13.5535C11.3368 13.5996 11.4444 13.6197 11.5516 13.6116C11.6589 13.6035 11.7622 13.5676 11.8514 13.5074L13.8068 11.8441Z" stroke="#3D85C5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_12_4930">
                                                                        <rect width="20" height="20" fill="white" transform="translate(0.963867 0.48877)"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg></span>
                                                        <span>(+84) 936 030 325</span>
                                                    </li>
                                                </ul>
                                                <ul class="contact-item gap-y-1 flex flex-col flex-1">
                                                    <li>
                                                        <span class="bg-gradient-to-tr from-[#3B5AA7] via-[#3D85C5] via-35% to-[#3FA9DF] inline-block text-transparent bg-clip-text uppercase font-bold">
                                                            Ms. Trâm lê
                                                        </span>
                                                    </li>
                                                    <li class="flex items-center">
                                                        <span class="icon mr-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                                                <g clip-path="url(#clip0_12_4924)">
                                                                    <path d="M3.46387 4.86377H18.4639V15.4888C18.4639 15.6545 18.398 15.8135 18.2808 15.9307C18.1636 16.0479 18.0046 16.1138 17.8389 16.1138H4.08887C3.92311 16.1138 3.76414 16.0479 3.64693 15.9307C3.52972 15.8135 3.46387 15.6545 3.46387 15.4888V4.86377Z" stroke="#3D85C5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M18.4639 4.86377L10.9639 11.7388L3.46387 4.86377" stroke="#3D85C5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_12_4924">
                                                                        <rect width="20" height="20" fill="white" transform="translate(0.963867 0.48877)"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </span>
                                                        <span>ltngoctram.vietbuild@gmail.com</span>
                                                    </li>
                                                    <li class="flex">
                                                        <span class="icon mr-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                                                <g clip-path="url(#clip0_12_4930)">
                                                                    <path d="M13.8068 11.8441C13.8934 11.7865 13.9929 11.7514 14.0965 11.742C14.2 11.7326 14.3043 11.7492 14.3998 11.7902L18.0842 13.441C18.2083 13.4941 18.312 13.5859 18.3796 13.7028C18.4472 13.8197 18.4751 13.9553 18.4592 14.0894C18.3378 14.9965 17.8911 15.8286 17.2022 16.431C16.5133 17.0334 15.629 17.3651 14.7139 17.3644C11.8959 17.3644 9.19343 16.245 7.20086 14.2524C5.20829 12.2599 4.08887 9.55735 4.08887 6.73942C4.08817 5.82427 4.41987 4.94001 5.02228 4.25109C5.62468 3.56217 6.4568 3.11549 7.36387 2.99411C7.49796 2.97818 7.6336 3.00611 7.75049 3.07371C7.86738 3.14131 7.95924 3.24495 8.01231 3.36911L9.66309 7.05661C9.70365 7.15132 9.72016 7.25459 9.71117 7.35723C9.70217 7.45986 9.66794 7.55868 9.61152 7.64489L7.94199 9.63005C7.88277 9.71941 7.84775 9.82261 7.84036 9.92956C7.83296 10.0365 7.85345 10.1435 7.89981 10.2402C8.5459 11.5629 9.91309 12.9136 11.2396 13.5535C11.3368 13.5996 11.4444 13.6197 11.5516 13.6116C11.6589 13.6035 11.7622 13.5676 11.8514 13.5074L13.8068 11.8441Z" stroke="#3D85C5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_12_4930">
                                                                        <rect width="20" height="20" fill="white" transform="translate(0.963867 0.48877)"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg></span>
                                                        <span>(+84) 918 431 409</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>

    </div>
</main>
<?php get_footer() ?>