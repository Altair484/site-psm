<?php
if ( !current_user_can( 'administrator' ) ) {
    add_action( 'show_user_profile', 'extra_user_profile_fields' );
}
    add_action('edit_user_profile', 'extra_user_profile_fields');

function extra_user_profile_fields($user)
{ ?>
        <h3><?php _e("Informations supplémentaires", "blank"); ?></h3>

        <table class="form-table">
            <tr>
                <th><label for="formation">Formation actuelle</label></th>
                <td>
                    <?php $formation_post_value = esc_attr(get_the_author_meta('user_formation', $user->ID));?>
                    <select id="formation" name="user_formation" required=""
                        <?php for ($i = -1; $i < count(\App\Inscription::get_formation_names()); $i++) {
                            $formation_name = \App\Inscription::get_formation_names()[$i]->name; ?>
                            <option
                                value="<?php _e(\App\Inscription::get_formation_names()[$i]->name) ?>" <?php $formation_post_value == $formation_name ? _e('selected') : null ?>>
                                <?php _e(\App\Inscription::get_formation_names()[$i]->name) ?>
                            </option>
                        <?php } ?>
                            <option <?php get_the_author_meta('user_formation', $user->ID) == 'Ancien étudiant' ? _e('selected') : null ?> value="Ancien étudiant">Ancien étudiant</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="studies_period">Période de formation</label></th>
                <td>
                    <select id="studies_period" name="user_studies_period" required="">
                        <?php for ($i = -5; $i < 0; $i++) {
                            $date_value = date('Y') + $i;
                            $date_value_plus_one = $date_value + 1;
                            $dates_to_string = $date_value . "/" . $date_value_plus_one;
                            $studies_period_post_value = esc_attr(get_the_author_meta('user_studies_period', $user->ID)); ?>
                            <option
                                value="<?php _e($date_value) ?>/<?php _e($date_value_plus_one) ?>" <?php $studies_period_post_value == $dates_to_string ? _e('selected') : null ?>>
                                <?php _e('Promo - ' . $date_value) ?>/<?php _e($date_value_plus_one) ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
        </table>
<?php }

add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }
    update_user_meta( $user_id, 'user_formation', $_POST['user_formation'] );
    update_user_meta( $user_id, 'user_studies_period', $_POST['user_studies_period'] );
}