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
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        </label>
        <p>
            <span style="color: coral">⚠Conseil n°1 :</span> Si vous rencontrez des problèmes d'affichage, assurez vous que vos paragraphe soient encapsulé avec une balise &lt;p&gt; dans l'onglet texte. <br />
            Exemple : <br/>
            &lt;p&gt;Paragraphe 1&lt;/p&gt; <br />
            &lt;p&gt;Paragraphe 2&lt;/p&gt; <br />
            <br/>
            <span style="color: coral">⚠Conseil n°2 :</span> Lorsque vous faites des copiers-collers de texte depuis Google drive ou un autre éditeur de texte, des balises non désirées peuvent s'introduire dans votre texte.
            Pour éviter cette erreur, faites votre copier coller dans l'onglet "Texte" plutôt que dans l'onglet "Visuel".
        </p>
        <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>">
        <?php
        $settings = array(
            'wpautop' => 'false',
            'textarea_name' => $this->id,
            'media_buttons' => false,
            'drag_drop_upload' => false,
            'teeny' => true,
            'tinymce' => [
                'paste_remove_styles' => true
            ],
        );
        wp_editor($this->value(), $this->id, $settings );

        do_action('admin_footer');
        do_action('admin_print_footer_scripts');

        ?>

        <?php
    }
}