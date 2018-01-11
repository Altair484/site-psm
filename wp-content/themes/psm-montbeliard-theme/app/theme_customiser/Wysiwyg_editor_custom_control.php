<?php
/**
 * Created by IntelliJ IDEA.
 * User: jeffj
 * Date: 04/12/2017
 * Time: 23:38
 */

namespace App\theme_customiser;

use WP_Customize_Control;

//Protect the file to direct Access wia url
if ( ! defined( 'ABSPATH' )) {
    header('Location: http://tinyurl.com/ydek4vj2');
    exit; // Exit if accessed directly
}

class Wysiwyg_editor_custom_control extends WP_Customize_Control
{
    /**
     * Render the content on the theme customizer page
     */
    public function render_content()
    {
        ?>
        <label>
            <span class="customize-text_editor"><?php echo esc_html( $this->label ); ?></span>
            <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>">
            <?php
            $settings = array(
                'textarea_name' => $this->id,
                'media_buttons' => false,
                'drag_drop_upload' => false,
                'teeny' => true
            );
            wp_editor($this->value(), $this->id, $settings );

            do_action('admin_footer');
            do_action('admin_print_footer_scripts');

            ?>
        </label>
        <?php
    }
}