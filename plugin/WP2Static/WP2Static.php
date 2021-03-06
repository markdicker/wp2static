<?php

class WP2Static {

    public function loadSettings( $target_settings ) {
        $general_settings = array(
            'general',
        );

        $target_settings = array_merge(
            $general_settings,
            $target_settings
        );

        if ( isset( $_POST['selected_deployment_option'] ) ) {
            require_once dirname( __FILE__ ) .
                '/PostSettings.php';

            $this->settings = WPSHO_PostSettings::get( $target_settings );
        } else {
            require_once dirname( __FILE__ ) .
                '/DBSettings.php';

            $this->settings = WPSHO_DBSettings::get( $target_settings );
        }
    }

    // We need this is several of the Processors
    public function ruleSort( $str1, $str2 )
    {
        // we'll just invert the result of strcmp for now

        return 0 - strcmp( $str1, $str2 );
    }


}

