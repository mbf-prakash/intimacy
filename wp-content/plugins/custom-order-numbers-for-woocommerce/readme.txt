=== Custom Order Numbers for WooCommerce ===
Contributors: tychesoftwares
Tags: woocommerce, custom order numbers, woo commerce
Requires at least: 4.4
Tested up to: 5.2.2
Stable tag: 1.2.7
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Custom order numbers for WooCommerce.

== Description ==

Plugin lets you set custom order numbers in WooCommerce.

= Main Features =
* WooCommerce order numbers can be **sequential**, **random** or by **order ID**.
* Sequential counter can be set to **automatically reset** on daily, monthly or yearly basis.
* Custom numbers will be assigned to **new orders** automatically.
* There is also a tool to **renumerate** (i.e. recount) existing orders.
* Optionally you can add **prefix** to order number.
* You can also enable **order tracking** by custom number.
* Optionally you can enable **admin order search** by custom number.

= Premium Version =
* Order number **template**.
* Order number **date prefix**.
* Order number **width**.
* Order number custom **suffix**.
* Order number **date suffix**.
* **Manual** order number counter.

= Feedback =
* We are open to your suggestions and feedback.
* Thank you for using or trying out one of our plugins!
* Please visit the [plugin page](https://www.tychesoftwares.com/store/premium-plugins/custom-order-numbers-woocommerce/?utm_source=wprepo&utm_medium=link&utm_campaign=CustomNumbers).

== Installation ==

1. Upload the entire 'custom-order-numbers-for-woocommerce' folder to the '/wp-content/plugins/' directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Start by visiting plugin settings at WooCommerce > Settings > Custom Order Numbers.

== Changelog ==

= 1.2.7 - 04/07/2019 =
* The orders were not being tracked when 'Enable order tracking by custom number' is enabled.
* When the order was placed manually, the 'Sequential: Next order number' was being reset.

= 1.2.6 - 28/03/2019 =
* Added uninstall.php to ensure the plugin settings are removed from the DB when the plugin is deleted.
* Fixed an issue where renewal orders generated by WooCommerce Subscriptions have the same custom order number as the parent order.

= 1.2.5 - 16/11/2018 =
* Author name and URL updated due to handover of the plugins

= 1.2.4 - 31/10/2018 =
* Compatibility with WooCommerce 3.5.0 tested.

= 1.2.3 - 05/08/2018 =
* Feature - "Order number template" option added.

= 1.2.2 - 05/08/2018 =
* Feature - Sequential: Reset counter - "Reset counter value" option added.
* Feature - Hide "Renumerate Orders" admin menu for roles option added.
* Feature - Hide "Custom Order Numbers" admin settings tab for roles option added.
* Dev - Admin settings - Restyling.

= 1.2.1 - 30/07/2018 =
* Fix - `%d` replaced with `%s` in `sprintf()`, so numbers exceeding max integer would be handled correctly (for "Pseudorandom - crc32 Hash (max 10 digits)" option).

= 1.2.0 - 24/06/2018 =
* Feature - Order numbers counter - "Pseudorandom - crc32 Hash (max 10 digits)" option added.
* Fix - Unnecessary counter increase on non-sequential number counters fixed.
* Dev - "Reset section settings" option added.
* Dev - "Use MySQL transaction" option removed (now always set to `yes`).
* Dev - Settings saved as main class property.
* Dev - Admin settings descriptions updated.
* Dev - Plugin URI updated to wpfactory.com.
* Dev - Minor code refactoring.
* Dev - readme.txt updated.

= 1.1.2 - 09/03/2018 =
* Feature - "Sequential: Reset Counter" option added.

= 1.1.1 - 13/01/2018 =
* Feature - "Manual Order Number" option added.
* Dev - Confirmation (JavaScript) added for Renumerate Orders tool.
* Dev - "WC tested up to" added to plugin header.

= 1.1.0 - 24/07/2017 =
* Dev - WooCommerce v3 compatibility - Order ID and Date.
* Dev - Link updated from http://coder.fm to https://wpcodefactory.com.
* Dev - Plugin header ("Text Domain" etc.) updated.

= 1.0.1 - 06/01/2017 =
* Fix - Translation domain fixed.
* Dev - Language (POT) file uploaded.

= 1.0.0 - 02/01/2017 =
* Initial Release.

== Upgrade Notice ==

= 1.0.0 =
This is the first release of the plugin.
