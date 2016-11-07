<?php
/**
 * @file
 * site_discounts.features.inc
 */

/**
 * Implements hook_default_commerce_discount().
 */
function site_discounts_default_commerce_discount() {
  $items = array();
  $items['discount_industry_15'] = entity_import('commerce_discount', '{
    "name" : "discount_industry_15",
    "label" : "industry_15",
    "type" : "order_discount",
    "status" : "1",
    "component_title" : "Industry Discount 15%",
    "sort_order" : "10",
    "commerce_discount_offer" : {
      "type" : "percentage",
      "commerce_percentage" : { "und" : [ { "value" : "15.00" } ] },
      "rdf_mapping" : []
    },
    "commerce_compatibility_strategy" : { "und" : [ { "value" : "any" } ] },
    "commerce_compatibility_selection" : [],
    "commerce_discount_date" : [],
    "inline_conditions" : { "und" : [
        {
          "condition_name" : "commerce_order_compare_order_amount",
          "condition_settings" : {
            "line_item_types" : { "product" : "product", "shipping" : "shipping" },
            "operator" : "\\u003E=",
            "total" : { "amount" : 0, "currency_code" : "USD" },
            "condition_logic_operator" : null
          },
          "condition_negate" : 0
        }
      ]
    },
    "discount_usage_per_person" : [],
    "discount_usage_limit" : [],
    "rdf_mapping" : []
  }');
  return $items;
}
