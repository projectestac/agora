{formsetinitialfocus inputId='url'}
<div class="z-formrow">
  {formlabel for='url' __text='URL of RSS feed (include http://)'}
  {formurlinput id='url' group='data'}
</div>

<div class="z-formrow">
  {formlabel for='includeContent' __text='Include feed text in addition to the title'}
  {formcheckbox id='includeContent' group='data'}
</div>

<div class="z-formrow">
  {formlabel for='refreshTime' __text='Refresh time (in minutes)'}
  {formintinput id='refreshTime' group='data'}
</div>

<div class="z-formrow">
  {formlabel for='maxNoOfItems' __text='Max. no. of items to display'}
  {formintinput id='maxNoOfItems' group='data'}
</div>

