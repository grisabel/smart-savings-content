<?php
if (!class_exists('NEWSSTORY_WELCOME')) :

    class NEWSSTORY_WELCOME {

        public $theme_name = ''; // For storing Theme Name
        public $theme_version = ''; // For Storing Theme Current Version Information

        /**
         * Constructor for the Welcome Screen
         */

        public function __construct() {

            /** Useful Variables */
            $theme = wp_get_theme();
            $this->theme_name = $theme->Name;
            $this->theme_version = $theme->Version;

            /* Enqueue Styles & Scripts for Welcome Page */
            add_action('admin_enqueue_scripts', array($this, 'welcome_styles_and_scripts'));

            /* Hide Notice */
            add_filter('wp_loaded', array($this, 'hide_admin_notice'), 10);

            /* Create a Welcome Page */
            add_action('wp_loaded', array($this, 'admin_notice'), 20);

            add_action('after_switch_theme', array($this, 'erase_hide_notice'));

        }

        /** Trigger Welcome Message Notification */
        public function admin_notice() {
            $hide_notice = get_option('newsstory_hide_notice2');
            if (!$hide_notice) {
                add_action('admin_notices', array($this, 'admin_notice_content'));
            }
        }

        /** Welcome Message Notification */
        public function admin_notice_content() {
            $screen = get_current_screen();

            if ('appearance_page_newsstory-welcome' === $screen->id || (isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) || 'theme-install' === $screen->id) {
                return;
            }

            ?>
            <div class="updated notice newsstory-welcome-notice">
                <div class="newsstory-welcome-notice-wrap">
                    <h2><?php esc_html_e('Congratulations!', 'newsstory'); ?></h2>
                    <p><?php printf(esc_html__('%1$s Theme is now installed and ready to use. You can create your dream website by using Epaper Theme. Now you are using free version of Epaper Theme. If you want a Elementor based Modern, Creative, Personal, Portfolio, Secure, Beautiful, Resume / CV, SEO friendly, Full functional Premium WordPress Blog Theme for your site. Build Your Dream Website With Pro Version of Epaper Theme.', 'newsstory'), $this->theme_name); ?></p>

                    <div class="newsstory-welcome-info">
                        <div class="newsstory-welcome-import">
                            <p><a class="button button-primary" target="_blank" href="<?php echo esc_url( __( 'https://wpashathemes.com/newsstory/', 'newsstory' ) ); ?>"><?php esc_html_e( 'View Demo', 'newsstory' ); ?></a></p>
                        </div>
                        <div class="newsstory-welcome-getting-started">
                            <p><a href="<?php echo esc_url( __( 'https://ashathemes.com/index.php/cart/?add-to-cart=1030', 'newsstory' ) ); ?>" class="button button-primary"><?php esc_html_e('Buy Pro', 'newsstory'); ?></a></p>
                        </div>
                    </div>

                    <a href="<?php echo wp_nonce_url(add_query_arg('newsstory_hide_notice2', 1), 'newsstory_hide_notice2_nonce', 'newsstory_notice_panel'); ?>" class="notice-close"><?php esc_html_e('Dismiss', 'newsstory'); ?></a>
                </div>

            </div>
            <?php
        }

        /** Hide Admin Notice */
        public function hide_admin_notice() {
            if (isset($_GET['newsstory_hide_notice2']) && isset($_GET['newsstory_notice_panel']) && current_user_can('manage_options')) {
                if (!wp_verify_nonce(wp_unslash($_GET['newsstory_notice_panel']), 'newsstory_hide_notice2_nonce')) {
                    wp_die(esc_html__('Action Failed. Something is Wrong.', 'newsstory'));
                }

                update_option('newsstory_hide_notice2', true);
            }
        }
        /** Enqueue Necessary Styles and Scripts for the Welcome Page */
        public function welcome_styles_and_scripts($hook) {
            if ('theme-install.php' !== $hook) {
                wp_enqueue_style('newsstory-welcome', get_template_directory_uri() . '/welcome/css/welcome.css', array(), $this->theme_version);
            }
        }

        public function erase_hide_notice() {
            delete_option('newsstory_hide_notice2');
        }
    }

    new NEWSSTORY_WELCOME();
    
endif;