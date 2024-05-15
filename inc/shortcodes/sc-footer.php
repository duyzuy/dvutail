<?php
function create_sc_footer_column($atts, $content = null)
{

    $attr = shortcode_atts(array(
        'class' => '',
        'address' =>  'address',
        'logo_url'  => 'logo_url',
        'name'  =>  'name',
        'thumbnail'     =>  'thumbnail'
    ), $atts);


    ob_start();
?>


    <div class="logo h-20 flex items-center mb-2">
        <img src="<?php echo $attr['thumbnail'] ?>" alt="<?php echo $attr['name'] ?>" />
    </div>
    <p class="mb-3"><strong><?php esc_html_e('Address:', 'dvutheme') ?></strong> <?php echo $attr['address'] ?></p>
    <div class="contact">
        <p class="font-[500] mb-3"><?php esc_html_e('Contact information:', 'dvutheme') ?></p>
        <div class="flex gap-x-3 gap-y-3 flex-wrap -mx-3">
            <?php echo do_shortcode($content) ?>
        </div>
    </div>

<?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode('dvu_footer_column', 'create_sc_footer_column');


function create_sc_email($atts, $content = null)
{

    $attr = shortcode_atts(array(
        'class' => '',
        'email' =>  'email',
    ), $atts);


    ob_start();
?>
    <div class="flex items-center">
        <span class="icon mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 21 21" fill="none">
                <g clip-path="url(#clip0_12_4924)">
                    <path d="M3.46387 4.86377H18.4639V15.4888C18.4639 15.6545 18.398 15.8135 18.2808 15.9307C18.1636 16.0479 18.0046 16.1138 17.8389 16.1138H4.08887C3.92311 16.1138 3.76414 16.0479 3.64693 15.9307C3.52972 15.8135 3.46387 15.6545 3.46387 15.4888V4.86377Z" stroke="#F26D21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M18.4639 4.86377L10.9639 11.7388L3.46387 4.86377" stroke="#F26D21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </g>
                <defs>
                    <clipPath id="clip0_12_4924">
                        <rect width="20" height="20" fill="white" transform="translate(0.963867 0.48877)" />
                    </clipPath>
                </defs>
            </svg>
        </span>
        <span><?php echo $attr['email'] ?></span>
    </div>
<?php
    return ob_get_clean();
}
add_shortcode('dvu_contact_email', 'create_sc_email');


function create_sc_phone($atts, $content = null)
{

    $attr = shortcode_atts(array(
        'class' => '',
        'phone' =>  'phone',

    ), $atts);


    ob_start();
?>
    <div class="flex items-center">
        <span class="icon mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 21 21" fill="none">
                <g clip-path="url(#clip0_12_4930)">
                    <path d="M13.8068 11.8441C13.8934 11.7865 13.9929 11.7514 14.0965 11.742C14.2 11.7326 14.3043 11.7492 14.3998 11.7902L18.0842 13.441C18.2083 13.4941 18.312 13.5859 18.3796 13.7028C18.4472 13.8197 18.4751 13.9553 18.4592 14.0894C18.3378 14.9965 17.8911 15.8286 17.2022 16.431C16.5133 17.0334 15.629 17.3651 14.7139 17.3644C11.8959 17.3644 9.19343 16.245 7.20086 14.2524C5.20829 12.2599 4.08887 9.55735 4.08887 6.73942C4.08817 5.82427 4.41987 4.94001 5.02228 4.25109C5.62468 3.56217 6.4568 3.11549 7.36387 2.99411C7.49796 2.97818 7.6336 3.00611 7.75049 3.07371C7.86738 3.14131 7.95924 3.24495 8.01231 3.36911L9.66309 7.05661C9.70365 7.15132 9.72016 7.25459 9.71117 7.35723C9.70217 7.45986 9.66794 7.55868 9.61152 7.64489L7.94199 9.63005C7.88277 9.71941 7.84775 9.82261 7.84036 9.92956C7.83296 10.0365 7.85345 10.1435 7.89981 10.2402C8.5459 11.5629 9.91309 12.9136 11.2396 13.5535C11.3368 13.5996 11.4444 13.6197 11.5516 13.6116C11.6589 13.6035 11.7622 13.5676 11.8514 13.5074L13.8068 11.8441Z" stroke="#F26D21" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </g>
                <defs>
                    <clipPath id="clip0_12_4930">
                        <rect width="20" height="20" fill="white" transform="translate(0.963867 0.48877)" />
                    </clipPath>
                </defs>
            </svg>
        </span>
        <span><?php echo $attr['phone'] ?></span>
    </div>
<?php
    return ob_get_clean();
}
add_shortcode('dvu_contact_phone', 'create_sc_phone');



function create_sc_contact_name($atts, $content = null)
{

    $attr = shortcode_atts(array(
        'class' => '',
        'name' =>  'phone',

    ), $atts);


    ob_start();
?>
    <p>
        <span class="bg-gradient-to-tr from-[#CC2027] via-[#EB7121] to-[#F48820] inline-block text-transparent bg-clip-text uppercase font-bold">
            <?php echo $attr['name'] ?>
        </span>
    </p>
<?php
    return ob_get_clean();
}
add_shortcode('dvu_contact_name', 'create_sc_contact_name');
