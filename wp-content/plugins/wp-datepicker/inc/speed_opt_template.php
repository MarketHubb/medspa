<?php



    if(isset($_POST['wpdp_enqueue_url'])){

        if (
            ! isset( $_POST['wpdp_nonce_speed_opt_field'] )
            || ! wp_verify_nonce( $_POST['wpdp_nonce_speed_opt_field'], 'wpdp_speed_opt_nonce_action' )
        ) {

            _e('Sorry, Your nonce did not verified.', 'wp-datepicker');

            exit;


        }else{

            $wpdp_enqueue_url = nl2br($_POST['wpdp_enqueue_url']);
            $wpdp_enqueue_url = explode('<br />', $wpdp_enqueue_url);
            $wpdp_enqueue_url = sanitize_wpdp_data($wpdp_enqueue_url);
            $wpdp_enqueue_url = array_map('trim',$wpdp_enqueue_url);
            $wpdp_enqueue_url = array_filter($wpdp_enqueue_url);

            update_option('wpdp_enqueue_url', $wpdp_enqueue_url);

        }

    }



    $wpdp_enqueue_url_get = get_option('wpdp_enqueue_url', array());
    $wpdp_enqueue_url_get = implode("\n", $wpdp_enqueue_url_get);


?>

<div class="alert alert-info" style="margin-top: 1rem;">
    <?php _e('You can boost your page loading speed by using this option. If you understand this feature, simply copy/paste one URL per line to allow scripts and styles by this plugin on specific pages. It will make your web pages load faster. You may demand same features from other plugin developers as well, together we can improve the quality of work. Code is poetry.', 'wp-datepicker') ?>
</div>

<form method="post">

    <?php wp_nonce_field( 'wpdp_speed_opt_nonce_action', 'wpdp_nonce_speed_opt_field' ); ?>


    <label for="wpdp_enqueue_url" class="wpdp_speed_opt_label"><?php _e('Leave empty to allow scripts on all pages. One URL per line to use ALLOW ONLY feature.', 'wp-datepicker') ?></label>
    <textarea class="wpdp_speed_opt_text" id="wpdp_enqueue_url" name="wpdp_enqueue_url" placeholder="<?php echo home_url() ?>/postname"><?php echo $wpdp_enqueue_url_get ?></textarea>

    <button type="submit" class="button button-primary" style="margin-top: 20px;"><?php _e('Save Changes', 'wp-datepicker') ?></button>

</form>


<div class="alert alert-warning" style="margin-top: 1rem;">
    <?php _e("By default, WordPress does not handle the scripts like this. I appreciate my team and the plugin users which continuously are contributing to this plugin with new ideas. So, in case you don't get this feature in other plugins or themes, do not blame anybody. As speed optimization should be the last step after development phase. So here we are. In case you need this feature or any other plugin or your existing websites, let us know.", 'wp-datepicker') ?>
</div>
