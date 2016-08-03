# Silverstripe-ClientSlider
A Client Slider module for silverstripe that implements the backend on any pagetype via an extension but does not dictate the frontend!
Best used with a owl-carousel plugin
## How to use

### Install through composer
```bash
composer require tcfxgt4age/silverstripe-clientslider
```

### Apply to any pagetype you want the "ClientSlider" tab to appear on
(Can be applied to multiple page types, just change 'Page' to whatever page you want Services on)
```yaml
Page:
  extensions:
    - ClientSliderExtension
```

### Use on the frontend

(Customize this with classes, etc to add better frontend viewing)

```
<% if $ClientSliders.exists %>
    <h1>{$SliderTitle}</h1>
        <% loop $ClientSliders %>
         {$Image.URL}
        <% end_loop %>
<% end_if %>
```
