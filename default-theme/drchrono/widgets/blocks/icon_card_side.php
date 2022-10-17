<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields','icon_card_side' );
function icon_card_side() {
    Block::make( __( 'Icon Card - Side' ) )
        ->add_fields( array(
            Field::make( 'image', 'side_icon', 'Icon/Image' ),
            Field::make( 'text', 'side_heading',  'Title'  ),
            Field::make( 'textarea', 'side_content',  'Content'  ),
            Field::make( 'text', 'side_button_url',  'Button Link' ), 
            Field::make( 'text', 'side_button_text',  'Button Text' ),
            Field::make( 'icon', 'side_button_icon',  __( 'Button Icon', 'crb' ))
                ->add_fontawesome_options()
        ) )
        ->set_description(( 'Use this block for adding in icon images to the side of text' ) )
        ->set_icon( 'format-image' )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {        
            ?>
                <div class="section-block">
                    <div class="area">
                        <div class="flex flex-row items-center justify-center text-center inner-area align-center">
                            <?php echo wp_get_attachment_image( $fields['side_icon'], 'full' ); ?>
                            <h3 class="block mt-4 font-bold font-black value-heading font-openSans"><?php echo esc_html( $fields['side_heading'] ); ?></h3>
                            <p class="block pt-4 font-light value-content font-helveticaNeue "> <?php echo esc_html($fields['side_content']) ; ?></p>
                            <a class="p-4 font-bold value-links text-primary font-helveticaNeue" href="<?php echo esc_url( $fields['side_button_url']) ?>">
                                <?php echo esc_html( $fields['side_button_text']) ?>
                                <i class="fa-solid fa-<?php print_r( $fields['side_button_icon']['value']) ?>"></i>

                            </a>
                        </div>
                    </div>
                </div>
            <?php
        } );
}