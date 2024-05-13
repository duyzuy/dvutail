<?php



class Dv_Nav_Walker extends Walker_Nav_Menu

{



    public function check_current($classes)

    {

        return preg_match('/(current[-_])|active|dropdown/', $classes);
    }

    public function start_lvl(&$output, $depth = 0, $args = array())

    {

        $output .= ($depth == 0) ? "\n<ul class=\"absolute group/edit invisible group-hover/item:visible left-0 z-10 w-52 origin-top-right rounded-xs bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none\">\n " : "\n<ul class=\"dv-sub-ul dv-ul\">\n";
    }

    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)

    {

        global $wp_query;


        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $class_names = "";
        $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));

        preg_match("/icsgsv[^\s]*|icsgsv/", $class_names, $icons);


        $class_names = preg_replace("/icsgsv[^\s]*|icsgsv/", "", $class_names);

        $class_names = ' class="' . esc_attr($class_names) . " relative" . '"';

        $output .= $indent . '<li' . $value . $class_names . '>';

        $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';

        if ($icons) {
            $prepend = '<i class="icsgsv ' . $icons[0] . '"/></i>';
        } else {
            $prepend = '';
        }


        $append = '';
        $description  = !empty($item->description) ? '<span class="nav-menu-description">' . esc_attr($item->description) . '</span>' : '';

        if ($depth != 0) {
            $description = $append = $prepend = "";
        }

        $item_output = $args->before;
        if ($item->is_dropdown && ($depth === 0)) {
            $item_output .= '<a' . $attributes . ' class="nav-link dropdown-button inline-flex items-center">';
        } else if ($depth === 1) {
            $item_output .= '<a' . $attributes . ' class="nav-link px-3 py-2 hover:text-sky-700">';
        } else {
            $item_output .= '<a' . $attributes . ' class="nav-link">';
        }
        $item_output .= $args->link_before . $prepend . apply_filters('the_title', $item->title, $item->ID) . $append;
        $item_output .= $description . $args->link_after;
        //         if ($item->is_dropdown && ($depth >= 0)) {
        //             $item_output .= '<span class="dvu-icon ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-[12px]" viewBox="0 0 16 16">
        //   <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
        // </svg></span></a>';
        //         } else {
        //             $item_output .= '</a>';
        //         }
        $item_output .= '</a>';
        $item_output .= $args->after;


        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        if ($item->menu_order == 1) {
            $classes[] = 'first';
        }
    }

    public function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)

    {

        $element->is_dropdown = ((!empty($children_elements[$element->ID]) && (($depth + 1) < $max_depth || ($max_depth === 0))));

        if ($element->is_dropdown) {

            $element->classes[] = 'group/item';
        }

        if ($element && ($depth === 1)) {

            $element->classes[] = 'dv-nav-dept-1';
        }

        if ($element && ($depth === 2)) {

            $element->classes[] = 'dv-nav-dept-2';
        }

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

    public function end_lvl(&$output, $depth = 0, $args = array())

    {

        $output .= ($depth == 0) ? "\n</ul>\n" : "\n</ul>\n";
    }
}







class Dv_Nav_Mobile_Walker extends Walker_Nav_Menu

{



    public function check_current($classes)

    {

        return preg_match('/(current[-_])|active|dropdown/', $classes);
    }

    public function start_lvl(&$output, $depth = 0, $args = array())

    {

        $output .= ($depth == 0) ? "\n<ul class=\"dv-top-ul-mb\">\n" : "\n<ul class=\"dv-sub-ul-mb dv-ul\">\n";
    }

    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)

    {

        $item_html = '';

        parent::start_el($item_html, $item, $depth, $args);

        if ($item->is_dropdown && ($depth === 0)) {

            $item_html = str_replace('<a', '<a class="nav-top-link" data-activates="dv-top-ul" ', $item_html);

            $item_html = str_replace('</a>', '</a> <span class="dvu-icon size-8 ms-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
</svg></span>', $item_html);
        } elseif (stristr($item_html, 'li class="divider')) {

            $item_html = preg_replace('/<a[^>]*>.*?<\/a>/iU', '', $item_html);
        } elseif (stristr($item_html, 'li class="dropdown-header')) {

            $item_html = preg_replace('/<a[^>]*>(.*)<\/a>/iU', '$1', $item_html);
        } elseif ($item->is_dropdown && ($depth >= 0)) {

            $item_html = str_replace('<a', '<a class="nav-sub-link" style="font-weight: bold" ', $item_html);

            $item_html = str_replace('</a>', '</a>', $item_html);
        }



        $item_html = apply_filters('roots_wp_nav_menu_item', $item_html);

        $output .= $item_html;
    }

    public function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)

    {

        $element->is_dropdown = ((!empty($children_elements[$element->ID]) && (($depth + 1) < $max_depth || ($max_depth === 0))));

        if ($element->is_dropdown) {

            $element->classes[] = 'dv-nav-mobile';
        }

        if ($element && ($depth === 1)) {

            $element->classes[] = 'dv-nav-dept-1';
        }

        if ($element && ($depth === 2)) {

            $element->classes[] = 'dv-nav-dept-2';
        }

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

    public function end_lvl(&$output, $depth = 0, $args = array())

    {

        $output .= ($depth == 0) ? "\n</ul>\n" : "\n</ul>\n";
    }
}




class Dv_Nav_Vertical_Walker extends Walker_Nav_Menu

{



    public function check_current($classes)

    {

        return preg_match('/(current[-_])|active|dropdown/', $classes);
    }

    public function start_lvl(&$output, $depth = 0, $args = array())

    {

        $output .= ($depth == 0) ? "\n<ul class=\"dv-top-ul dropdown-content\">\n " : "\n<ul class=\"dv-sub-ul dv-ul\">\n";
    }

    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)

    {
        global $wp_query;


        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));

        preg_match("/icsgsv[^\s]*|icsgsv/", $class_names, $icons);


        $class_names = preg_replace("/icsgsv[^\s]*|icsgsv/", "", $class_names);

        $class_names = ' class="' . esc_attr($class_names) . '"';

        $output .= $indent . '<li' . $value . $class_names . '>';

        $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';
        if ($icons) {
            $prepend = '<i class="icsgsv ' . $icons[0] . '"/></i>';
        } else {
            $prepend = '';
        }


        $append = '';
        $description  = !empty($item->description) ? '<span class="nav-menu-description">' . esc_attr($item->description) . '</span>' : '';

        if ($depth != 0) {
            $description = $append = $prepend = "";
        }

        $item_output = $args->before;
        if ($item->is_dropdown && ($depth === 0)) {
            $item_output .= '<a' . $attributes . ' class="nav-top-link dropdown-button inline-flex">';
        } else {
            $item_output .= '<a' . $attributes . '>';
        }
        $item_output .= $args->link_before . $prepend . apply_filters('the_title', $item->title, $item->ID) . $append;
        $item_output .= $description . $args->link_after;
        if ($item->is_dropdown && ($depth >= 0)) {
            $item_output .= '<span class="dvu-icon size-8 ms-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
</svg></span></a>';
        } else {
            $item_output .= '</a>';
        }
        $item_output .= $args->after;


        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        if ($item->menu_order == 1) {
            $classes[] = 'first';
        }
    }

    public function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)

    {

        $element->is_dropdown = ((!empty($children_elements[$element->ID]) && (($depth + 1) < $max_depth || ($max_depth === 0))));

        if ($element->is_dropdown) {

            $element->classes[] = 'dv-nav';
        }

        if ($element && ($depth === 1)) {

            $element->classes[] = 'dv-nav-dept-1';
        }

        if ($element && ($depth === 2)) {

            $element->classes[] = 'dv-nav-dept-2';
        }

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

    public function end_lvl(&$output, $depth = 0, $args = array())

    {

        $output .= ($depth == 0) ? "\n</ul>\n" : "\n</ul>\n";
    }
}
