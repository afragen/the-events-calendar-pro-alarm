=== The Events Calendar PRO Alarm ===
Contributors: afragen
Tags: events, ical feed, modern tribe, tribe
Requires at least: 5.2
Requires PHP: 7.0
Stable tag: 3.1.0
Tested up to: 6.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add alarm/alert to iCal feed created from The Events Calendar PRO plugin.

== Description ==

Are you using The Events Calendar PRO plugin? Do you wish that you could add an alarm or alert to any event?

Simple, just install The Events Calendar PRO Alarm and in the Settings page for The Events Calendar PRO add an Additional Field for Alarms.

Now when you download and install the events `.ics` file on your calendar an alert before the event will sound.

Development on [GitHub](https://github.com/afragen/the-events-calendar-pro-alarm). Pull requests are welcome.

== Installation ==

1. Upload the entire `/the-events-calendar-pro-alarm/` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin.
1. The plugin will automatically add the required Additional Field. If you wish to change or add additional time set points, just follow the usual instructions under Additional Fields.


== Frequently Asked Questions ==

= Does the plugin require the paid The Events Calendar PRO plugin? =

Yes. [Events Calendar PRO](https://theeventscalendar.com/products/wordpress-events-calendar/) is written by Modern Tribe, Inc.

It also requires [The Events Calendar plugin](http://wordpress.org/plugins/the-events-calendar/).

= Where can I report bugs? =

Add a new topic on the [WordPress Support Forum](http://wordpress.org/tags/the-events-calendar-pro-alarm).

== Screenshots ==

1. Additional Fields settings, generated automatically.

== Changelog ==

= 3.1.0 / 2021-07-07 =
* add @10up GitHub Actions for WordPress SVN

= 3.0.0 =
* update requirements, keep updated
* refactored
* ensure proper function with latest Events Calendar PRO

= 2.3.4 =
* switch to composer for autoloader

= 2.3.3 =
* added generic Autoloader
* added variable to PHP version error message

= 2.3.2 =
* use our own version checking

= 2.3.1 =
* fix plugin name in error notice

= 2.3.0 =
* updated WPUpdatePhp
* tested to WP 4.4
* updated for Events Calendar PRO 4.0

= 2.2.1 =
* tested to 4.3

= 2.2.0 =
* fix for _new_ `Tribe__Events__Pro__Main` class

= 2.1.0 =
* use WPUpdatePhp project for PHP version checking
* better strings for i18n
* updated .pot file

= 2.0.0 =
* added [class Autoloader](https://github.com/afragen/autoloader), requires PHP 5.3 or greater as autoloader class requires namespacing
* class aliases for users of ECP 3.9 or lower
* renamed directory and class names to allow for PSR 4 loading
* add .pot file for translations

= 1.7.1 =
* tested to 4.1

= 1.7.0 =
* code cleanup

= 1.6.0 =
* Tested with WP 4.0
* Update for WP Coding Guidelines - again
* Fix some links, etc.
* Moved `add_filter` to class constructor

= 1.5.1 =
* Tested for WP 3.8, works great!

= 1.5 =
* update for WP coding guidelines

= 1.4 =
* converted to class structure

= 1.3.3 =
* Fix to be backwards compatible.

= 1.3.2 =
* Fix for ECP 2.0.9 automatically adding 'None' option to dropdown.

= 1.3.1 =
* Bug fix, put (working only with class TribeEventsPro) out of fail function.

= 1.3 =
* Automatically add required Additional Field, thanks to Barry Hughes (@barrykenobi)
* fail message to admin_notices

= 1.2.3 =
* Fixed to work only with class TribeEventsPro
* continuity with fail message

= 1.2.2 =
* changed deactivate to warning

= 1.2.1 =
* bump

= 1.2 =
* fix typos

= 1.1 =
* Check for ECP

= 1.0 =
* Initial release.
* Thanks to Joey Kudish of tri.be for the add_filter code.

== Upgrade Notice ==
Please stay current with your WordPress installation, your active theme, and your plugins and especially _The Events Calendar_ and _The Events Calendar PRO_ plugins.
