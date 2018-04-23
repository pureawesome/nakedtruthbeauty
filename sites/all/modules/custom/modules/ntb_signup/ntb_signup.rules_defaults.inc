<?php

/**
 * @file
 * ntb_signup.rules_defaults.inc
 */

/**
 * Implements hook_default_rules_configuration().
 */
function ntb_signup_default_rules_configuration() {
  $items = array();
  $items['rules_send_welcome_code_email'] = entity_import('rules_config', '{ "rules_send_welcome_code_email" : {
      "LABEL" : "Send welcome code email",
      "PLUGIN" : "reaction rule",
      "OWNER" : "rules",
      "REQUIRES" : [ "rules", "ntb_signup" ],
      "ON" : { "signup_event" : [] },
      "DO" : [
        { "mail" : {
            "to" : "[email:value]",
            "subject" : "naked truth beauty welcome code",
            "message" : "and add the code here",
            "language" : [ "" ]
          }
        }
      ]
    }
  }');
  return $items;
}
