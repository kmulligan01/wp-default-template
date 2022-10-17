<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields','icon_card' );
function icon_card() {
    Block::make( __( 'Icon Card' ) )
        ->add_fields( array(
            Field::make( 'image', 'image', 'Icon/Image' ),
            Field::make( 'text', 'heading',  'Title'  ),
            Field::make( 'textarea', 'content',  'Content'  ),
            Field::make( 'text', 'button_url',  'Button Link' ), 
            Field::make( 'text', 'button_text',  'Button Text' ),
            Field::make( 'icon', 'button_icon',  __( 'Button Icon', 'crb' ))
                ->add_fontawesome_options()
        ) )
        ->set_description(( 'Use this block for adding in icon images on top of text' ) )
        ->set_icon( 'format-image' )
        ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {        
            ?>
                <div class="section-block">
                    <div class="area">
                        <div class="flex flex-col items-center justify-center text-center inner-area align-center">
                            <?php echo wp_get_attachment_image( $fields['image'], 'full' ); ?>
                            <h3 class="block mt-4 font-bold font-black value-heading font-openSans"><?php echo esc_html( $fields['heading'] ); ?></h3>
                            <p class="block pt-4 font-light value-content font-helveticaNeue "> <?php echo esc_html($fields['content']) ; ?></p>
                            <a class="p-4 font-bold value-links text-primary font-helveticaNeue" href="<?php echo esc_url( $fields['button_url']) ?>">
                                <?php echo esc_html( $fields['button_text']) ?>
                                <i class="fa-solid fa-<?php print_r( $fields['button_icon']['value']) ?>"></i>

                            </a>
                        </div>
                    </div>
                </div>
            <?php
        } );
}