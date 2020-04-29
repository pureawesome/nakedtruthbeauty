<?php
    global $base_url;

    // GET HEADER STYLE
    $headerStyle =  theme_get_setting('header_style', 'fali');
    if(isset($node->field_header_style['und'][0]['value']))
        $headerStyle = $node->field_header_style['und'][0]['value'];
    $headerHeadingClass = 'first-nav';
    $headerNavContainerClass = 'group';
    if($headerStyle==2){
        $headerHeadingClass = 'second-nav';
        $headerNavContainerClass = '';
    }
    elseif($headerStyle==3){
        $headerHeadingClass = 'third-nav';
    }
    elseif($headerStyle==4){
        $headerHeadingClass = 'four-nav';
    }
    elseif($headerStyle==5){
        $headerHeadingClass = 'fifth-nav';
    }

    // HEADER LOGO
    if(theme_get_setting('header_multilogo','fali') && theme_get_setting('header_logo_images_'.$headerStyle,'fali'))
        $logoImage = file_create_url(file_load(theme_get_setting('header_logo_images_'.$headerStyle,'fali'))->uri);
    else
        $logoImage = $logo;
    $headerLogo = '';
    if($logoImage){
        $headerLogo .= '<div class="logo-wrapper">';
        if($headerStyle==1 || $headerStyle==3)
            $headerLogo .= '<div class="container">';
        $headerLogo .= '<a href="'.$base_url.'" title="'.$site_name.'">';
        $headerLogo .= '<img alt="'.$site_name.'" src="'.$logoImage.'" />';
        $headerLogo .= '</a>';
        if($headerStyle==1 || $headerStyle==3)
            $headerLogo .= '</div>';
        $headerLogo .= '</div>';
    }

    // HEADER HELPER
    $headerNavHelper = '<div class="nav-helper"></div>';

    // HEADER SEARCH
    $headerSearch = '';
    if(isset($node->field_disable_header_search_form['und'][0]['value']))
        $nodeDisableHeaderSearch = $node->field_disable_header_search_form['und'][0]['value'];
    else
        $nodeDisableHeaderSearch = '';
    if($page['header_search'] && 
        ($nodeDisableHeaderSearch == '0' || ($nodeDisableHeaderSearch=='' && theme_get_setting('header_search', 'fali')))
    ){
        $headerSearch .= '<div class="nav-search"><i class="fa fa-search"></i><div class="searchbox">';
        $headerSearch .= render($page['header_search']);
        $headerSearch .= '</div></div>';
    }

    // HEADER SOCIALS
    $headerSocials = '';
    if(isset($node->field_disable_header_socials['und'][0]['value']))
        $nodeDisableSocials = $node->field_disable_header_socials['und'][0]['value'];
    else
        $nodeDisableSocials = '';
    if($page['header_search'] && 
        ($nodeDisableSocials == '0' || ($nodeDisableSocials=='' && theme_get_setting('header_socials', 'fali')))
    ){
        $headerSocials .= '<div class="nav-social">';
        $headerSocials .= render($page['header_socials']);
        $headerSocials .= '</div>';
    }

    // MOBILE NAVIGATION - MOBILE MENU - HEADER MAIN MENU
    $headerMobileNav = '';
    $headerMobileMenu = '';
    $headerMainMenu = '';
    if($page['main_menu']){
        
        $headerMobileNav .= '<div class="mobile-navigation"><i class="fa fa-bars"></i></div>';
        
        $headerMobileMenu .= '<div class="mobile-menu"></div>';
        
        $headerMainMenu .= render($page['main_menu']);
    }

    // HEADER BANNER
    $iklanHtml = '';
    $iklanHtml .= '<div class="container">';
    $iklanHtml .= $headerLogo;
    if(theme_get_setting('header_banner', 'fali')){
        $iklanHtml .= '<div class="iklan-wrapper"><a href="'.$base_url.'" title="'.$site_name.'">';
        if(theme_get_setting('header_banner_image', 'fali'))
            $iklanHtml .= '<img src="'.file_create_url(file_load(theme_get_setting('header_banner_image', 'fali'))->uri).'" alt="'.$site_name.'" />';
        else
            $iklanHtml .= '<img src="'.$base_url.'/'.path_to_theme().'/images/default-banner.png" alt="'.$site_name.'" />';
        $iklanHtml .= '</a></div></div>';
    }

    // HEADER NAV CONTAINER
    $headerNavContainer = '';
    if($headerStyle==4 || $headerStyle==3){
        $headerNavContainer .= '<div class="nav-wrapper">';
        if($headerStyle==4)
            $headerNavContainer .= $iklanHtml;
        else
            $headerNavContainer .= $headerLogo;
    }
    $headerNavContainer .= $headerNavHelper;
    $headerNavContainer .= '<div class="nav-container"><div class="nav-wrapper">';
    $headerNavContainer .= '<div class="container '.$headerNavContainerClass.'">';
    if($headerStyle==2)
        $headerNavContainer .= $headerLogo;
    $headerNavContainer .= $headerMobileNav;
    $headerNavContainer .= $headerMobileMenu;
    $headerNavContainer .= $headerSearch;
    $headerNavContainer .= $headerMainMenu;
    $headerNavContainer .= $headerSocials;
    $headerNavContainer .= '</div></div></div>';
    if($headerStyle==5)
        $headerNavContainer .= '<div class="top-wrapper">'.$iklanHtml.'</div>';
    if($headerStyle==1)
        $headerNavContainer .= $headerLogo;
    if($headerStyle==4 || $headerStyle==3)
        $headerNavContainer .= '</div>';  
?>

<div id="heading" class="<?php print $headerHeadingClass; ?>">
    <?php print $headerNavContainer; ?>
</div>
