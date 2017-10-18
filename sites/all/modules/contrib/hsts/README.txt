This module is for users who either can't change the webserver configuration
to include the necessary headers to enable HSTS or only want those headers for
certain sites in a multi-site configuration. If you have the option to use
your web server to add and manage the HSTS header data I recommend you do so.
It'll save you a little extra PHP processing.

If not, then I hope this module helps you out.

For more information regarding HTTP Strict Transport Security see
http://en.wikipedia.org/wiki/HTTP_Strict_Transport_Security

## Installation

1. Download and enable the module.
2. Open the settings page of the module (admin/config/security/hsts).
3. Check on "Enable HTTP Strict Transport Security".
4. Set the max age and sub domain inclusion setting.
5. Save the configuration by clicking "Save configuration".
6. You can see the HSTS header is added in the HTTP header.

### Optional Configuration

If your server is behind an SSL terminated proxy you can set the HSTS headers to
be set on HTTP requests as well. Please be advised however that the HSTS specification
states that the STS headers should only be set on secured connections.

1. Uncheck "Restrict the HSTS header addition only for HTTPS (Exclude HTTP)".
  If your server can server serve pages in HTTP, this can be checked off.
