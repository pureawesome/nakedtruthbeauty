<?php

/**
 * @file
 * Default theme implementation to format an HTML mail.
 *
 * Copy this file in your default theme folder to create a custom themed mail.
 * Rename it to mimemail-message--[module]--[key].tpl.php to override it for a
 * specific mail.
 *
 * Available variables:
 * - $recipient: The recipient of the message
 * - $subject: The message subject
 * - $body: The message body
 * - $css: Internal style sheets
 * - $module: The sending module
 * - $key: The message identifier
 *
 * @see template_preprocess_mimemail_message()
 */
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php if ($css): ?>
    <style type="text/css">
      <!--
      <?php print $css ?>
      -->
    </style>
    <?php endif; ?>
  </head>
  <body id="mimemail-body" <?php if ($module && $key): print 'class="' . $module . '-' . $key . '"'; endif; ?>>
    <table id="table" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td>
          <div id="logo">
            <div id="logo-inner">
              <img src="/sites/all/themes/ntb/logo.png" />
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div id="center">
            <div id="main">
              <?php print $body ?>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div id="footer">
            © 2017 Naked Truth Beauty | <a href="http://facebook.com/ntbeauty">Facebook</a> | <a href="http://twitter.com/nkdtruthbeauty">Twitter</a> | <a href="http://instagram.com/nakedtruthbeauty">Instagram</a>
          </div>
        </td>
      </tr>
    </table>
  </body>
</html>
