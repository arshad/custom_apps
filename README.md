# custom_apps

To customize the app listing, create a `app-listing.html.twig` template in your theme:

```twig
{#
/**
 * @file
 * Template for app listing.
 */
#}
<ul class="app_listing">
  {% for app in apps %}
    <li>{{ app.label }}</li>
  {% endfor %}
</ul>
```
