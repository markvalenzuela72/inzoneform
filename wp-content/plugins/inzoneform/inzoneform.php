<?php
/*
    Plugin Name: Inzone Form Enquiry
    Plugin URI: http://www.wordpress.org
    Description: Create plugin
    Author: Mark
    Version: 1.0
    Author URI: http://www.xyz.com
    */

// enqueue scripts and styles
function themeslug_enqueue_script()
{
    wp_enqueue_style('semanticStyles',  plugin_dir_url(__FILE__) . 'semantic/dist/semantic.min.css"');
    wp_enqueue_style('customStyles',  plugin_dir_url(__FILE__) . 'style.css"');
    wp_enqueue_script('jquery');
    wp_enqueue_script('semanticScripts', plugin_dir_url(__FILE__) . 'semantic/dist/semantic.min.js');
    wp_enqueue_script('customScripts', plugin_dir_url(__FILE__) . 'custom.js');
}
add_action('wp_enqueue_scripts', 'themeslug_enqueue_script', 99999);

function inzone_form_shortcode()
{
    // form
    $html = '<script type="text/javascript">
     var onloadCallback = function() {
       grecaptcha.render("html_element", {
         "sitekey" : "6LcxzcAaAAAAAKvj9-twXBBuhfTzs0TECp6YH4LT"
       });
     };
   </script>'
        . $html = '<div class="wrap">
            <h2>Inzone Inquiry Form</h2>
            <div class="main-content">

                <form id="ajax-contact" method="post" class="ui form inquiry" action="' . plugin_dir_url(__FILE__) . 'mailer.php">
                <div class="field">
                        <label>Full Name</label>
                        <input type="text" name="name" placeholder="Your name">
                    </div>
                    <div class="field">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Your email">
                    </div>
                    <div class="field">
                        <label>Phone Number</label>
                        <input type="tel" name="phone" placeholder="971-50-123-4567">
                    </div>
                    <div class="field">
                    <label>Message</label>
                    <textarea rows="4" name="message" placeholder="Your Message"></textarea>
                </div>
                <div class="field">
                    <div id="html_element"></div>
                </div>
                    <button class="ui submit button" type="submit">Submit</button>
                    <div class="ui error message" id="error"></div>
                    <div class="ui success message" id="success"></div>
                    
                </form>
                <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>
            </div>
        </div>';

    return $html;
}

add_shortcode('inzone_form', 'inzone_form_shortcode');


// Admin
class InzoneForm
{

    private $my_plugin_screen_name;
    private static $instance;

    static function GetInstance()
    {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function PluginMenu()
    {
        $this->my_plugin_screen_name = add_menu_page(
            'Inzone Form',
            'Inzone Form',
            'manage_options',
            __FILE__,
            array($this, 'RenderPage'),
            plugins_url('inzoneform/inzone-icon.png', __DIR__)
        );
    }

    public function RenderPage()
    {
        wp_enqueue_style('semanticStyles',  plugin_dir_url(__FILE__) . 'semantic/dist/semantic.min.css"');
        wp_enqueue_style('customStyles',  plugin_dir_url(__FILE__) . 'style.css"');
        wp_enqueue_script('jquery');
        wp_enqueue_script('semanticScripts', plugin_dir_url(__FILE__) . 'semantic/dist/semantic.min.js');
        wp_enqueue_script('customScripts', plugin_dir_url(__FILE__) . 'custom.js');

?>
        <div class='wrap'>
            <h2 class="ui header">Inzone Form</h2>
            <div class="main-content">
                <form class="ui form mailform" method="post" id="ajax-contact" action="<?php echo plugin_dir_url(__FILE__) ?>/inzoneform-settings.php">
                    <div class="grouped fields">
                        <label for="mail">Select your mail settings:</label>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="mail" id="wordpressmail" value="wordpressmail">
                                <label>Wordpress Mail Function</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="mail" id="smtp" value="smtp">
                                <label>SMTP Function</label>
                            </div>
                        </div>
                        <div class="ui form" id="smtpform">
                            <div class="inline fields">
                                <div class="four wide field">
                                    <label>Host </label>
                                    <input type="text" placeholder="Host" name="host">
                                </div>
                                <div class="four wide field">
                                    <label>Username </label>
                                    <input type="text" placeholder="Username" name="username">
                                </div>
                                <div class=" four wide field">
                                    <label>Password </label>
                                    <input type="text" placeholder="Password" name="password">
                                </div>
                                <div class="two wide field">
                                    <label>Port </label>
                                    <input type="text" placeholder="Port" name="port">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="ui button" type="submit">Submit</button>
                    <div class="ui success message" id="success"></div>
                </form>

            </div>
        </div>
<?php
    }
    public function InitPlugin()
    {
        add_action('admin_menu', array($this, 'PluginMenu'));
    }
}

$InzoneForm = InzoneForm::GetInstance();
$InzoneForm->InitPlugin();
