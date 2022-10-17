<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_filter( 'carbon_fields_theme_options_container_admin_only_access', '__return_false' );

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );

function crb_attach_theme_options() {
// Default options page
$basic_options_container = Container::make( 'theme_options', __( 'Theme Options' ) )
    ->add_fields( array(
        Field::make( 'color', 'primary-color', 'Primary' )
            ->set_palette( array( '#3C86FD' ) )
            ->set_default_value( '#3C86FD' )
            ->set_width(50),
        Field::make( 'color', 'secondary-color', 'Secondary' )
            ->set_palette( array( '#EBF2FE' ) )
            ->set_default_value( '#EBF2FE' )
            ->set_width(50),
        Field::make( 'image', 'header_logo', __( 'Logo' ) )
    ) );

// Header Info 
Container::make( 'theme_options', __( 'Header Info' ) )
->set_page_parent( $basic_options_container ) // reference to a top level container
->add_fields( array(
    Field::make( 'text', 'header_phone', __( 'Contact Phone Number' ) ),
    Field::make( 'separator', 'login_separator', __( 'Login Link Info' ) ),
    Field::make( 'text', 'login_text', __( 'Login Text' ) )
        ->set_width(50),
    Field::make( 'text', 'login_link', __( 'Login Link' ) )
        ->set_width(50),
    Field::make( 'separator', 'demo_separator', __( 'Get Demo Button' ) ),
    Field::make( 'text', 'demo_text', __( 'Get Demo Button Text' ) )
        ->set_width(50),
    Field::make( 'text', 'demo_link', __( 'Get Demo Button Link' ) )
        ->set_width(50)
) );

// Add header/footer scripts (GA, Marketo, etc)
Container::make( 'theme_options', __( 'Theme Scripts' ) )
->set_page_parent( $basic_options_container ) // reference to a top level container
->add_fields( array(
    Field::make( 'header_scripts', 'header_scripts', __( 'Header Scripts' ) ),
    Field::make( 'footer_scripts', 'footer_scripts', __( 'Footer Scripts' ) ),
    Field::make( 'text', 'marketo_scripts', __( 'Marketo Scripts' ) ),
) );

// Social links and icons
Container::make( 'theme_options', __( 'Social Links' ) )
    ->set_page_parent( $basic_options_container ) // reference to a top level container
    ->add_fields( array(
        Field::make( 'icon', 'fb_icon',  __( 'Facebook Icon' ))
            ->add_fontawesome_options()
            ->set_width(50),
        Field::make( 'text', 'facebook_link', __( 'Facebook Link' ) )
            ->set_width(50),
        Field::make( 'icon', 'twitter_icon',  __( 'Twitter Icon' ))
            ->add_fontawesome_options()
            ->set_width(50),
        Field::make( 'text', 'twitter_link', __( 'Twitter Link' ) )
            ->set_width(50),
        Field::make( 'icon', 'yt_icon',  __( 'YouTube Icon' ))
            ->add_fontawesome_options()
            ->set_width(50),
        Field::make( 'text', 'yt_link', __( 'YouTube Link' ) )
            ->set_width(50),
        Field::make( 'icon', 'ig_icon',  __( 'Instagram Icon' ))
            ->add_fontawesome_options()
            ->set_width(50),
        Field::make( 'text', 'ig_link', __( 'IG Link' ) )
            ->set_width(50),
    ) );

// Footer Info 
Container::make( 'theme_options', __( 'Footer Info' ) )
->set_page_parent( $basic_options_container ) // reference to a top level container
->add_fields( array(
    Field::make( 'text', 'add_line1', __( 'Address Line 1' ) )
        ->set_width(50),
    Field::make( 'text', 'add_line2', __( 'Address Line 2' ) )
        ->set_width(50),
    Field::make( 'text', 'city', __( 'City' ) )
        ->set_width(33),
    Field::make( 'text', 'state', __( 'State' ) )
        ->set_width(33),
    Field::make( 'text', 'zip', __( 'Zip Code' ) )
        ->set_width(33),
    Field::make( 'image', 'footer_logo', __( 'Footer Logo' ) )
) );

// Edit site background to color, image, or both - find this option page under "Appearance"
Container::make( 'theme_options', __( 'Background Options' ) )
    ->set_page_parent( 'themes.php' ) // identificator of the "Appearance" admin section
    ->add_fields( array(
        Field::make( 'color', 'background_color', __( 'Background Color' ) ),
        Field::make( 'image', 'background_image', __( 'Background Image' ) ),
    ) );
    }
?>