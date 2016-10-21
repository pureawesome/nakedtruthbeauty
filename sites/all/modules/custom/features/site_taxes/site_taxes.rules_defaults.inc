<?php
/**
 * @file
 * site_taxes.rules_defaults.inc
 */

/**
 * Implements hook_default_rules_configuration().
 */
function site_taxes_default_rules_configuration() {
  $items = array();
  $items['commerce_tax_calculate_taxes_sales_tax_wa'] = entity_import('rules_config', '{ "commerce_tax_calculate_taxes_sales_tax_wa" : {
      "LABEL" : "Calculate taxes: Sales tax wa",
      "PLUGIN" : "reaction rule",
      "OWNER" : "rules",
      "TAGS" : [ "Commerce Tax" ],
      "REQUIRES" : [ "commerce_order", "commerce_tax", "commerce_product_reference" ],
      "ON" : { "commerce_product_calculate_sell_price" : [] },
      "IF" : [
        { "commerce_order_compare_address" : {
            "commerce_order" : [ "commerce-line-item:order" ],
            "address_field" : "commerce_customer_shipping|commerce_customer_address",
            "address_component" : "administrative_area",
            "value" : "WA"
          }
        }
      ],
      "DO" : [
        { "commerce_tax_calculate_by_type" : {
            "commerce_line_item" : [ "commerce-line-item" ],
            "tax_type_name" : "sales_tax"
          }
        }
      ]
    }
  }');
  return $items;
}
