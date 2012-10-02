Slideshow module

james.barrett@cornwall.ac.uk

point it a a directory and it displays all the images therein as thumbnails and
one fullsize image. 

Installation:

1 - download slideshow.zip to your moodle/mod directory and unzip it there.
2 - go to http://yoursite.com/admin - all necessary tables will be created.
3 - the icon (icon.gif) should be copied to your moodle/theme/yourtheme/pix/mod/slideshow/

Click on a thumbnail to navigate, click on the image to progress. 

New updated version allows users (>= teacher) to choose 
                whether to display captions, titles and edit them
                position of thumbnails and caption text relative to main image
                various options for auto-progress of slides in new window

config edits -  size threshold for resizing (k)
                resize maximum dimensions (x and y pixels)
                whether resized originals are copied to /moddata/slideshow/[path]/img or deleted
                whether to include some javascript to disable right-clicking and remove the "image in new window" link

Thanks to everyone who has created language files, suggested tweaks and helped
track down problems

to do:
=======
fix unicode migration
