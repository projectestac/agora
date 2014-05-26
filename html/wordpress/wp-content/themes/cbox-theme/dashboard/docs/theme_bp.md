## BuddyPress Support

We've been big fans of BuddyPress since the project started, and have build up a lot
of experience over the years working with it. Through BP-Tricks.com (Bowe) and as a
Core Contributor (Marshall) we've been involved with the community for quite some time,
and have done numerous projects built around BuddyPress.

### Built-In Support

Infinity has support for BuddyPress **in the core package.**

#### Why?

We realize that a lot of projects want to incorporate social networking functionality
in to their projects, and this is why we spent so much time on getting BuddyPress right.
We really believe that Infinity brings out the best in BuddyPress and we're very proud
of that.

#### From The Ground Up

Infinity has been developed with BuddyPress in mind from the start and we have been using
it internally for several big BuddyPress/MultiSite projects with great results.
Offering full support has been quite a challenge because we strongly believe that offering
BuddyPress compatibility should go further then a lot of others themes do.

### BuddyPress Goals

We set some seemingly impossible goals for BuddyPress support, but somehow we did it!

##### 1. Full compatibility with 3rd party BuddyPress plugins

The Base Templates are structured in such a way that they are 100% compatible with all
of the great 3rd party BuddyPress plugins out there. If the plugin works with the BP-Default
theme it works with Infinity. Awesome right?

##### 2. Adding no overhead to the Base Theme

BuddyPress support is optional and does not cause any overhead to the Base theme.
All of the BuddyPress functionality is only being loaded when BuddyPress is active.

##### 3. Keeping it upgrade safe

BuddyPress is in active development. Stuff changes all the time, and that is a good thing,
but we wanted Infinity to always be ready for BuddyPress changes and updates without you
(and us) go through a complicated upgrade process. The solution for this problem was
found in the official BP-Template Pack plugin, which is maintained by the BuddyPress
Core Contributors and works perfectly in combination with Infinity.

##### 4. Make it look awesome
  
We spent a lot of time creating a custom UI and design for the BuddyPress pages that
fits perfectly with the Base Theme. Custom buttons, notification boxes, icons and a
huge set of options to customize the BuddyPress pages are all included.

##### 5. Make creating BuddyPress Themes easy!

Infinity makes it easy.. very easy! Check out the BuddyPress Theming section
for a complete guide!

## Installation
<br>
<iframe width="560" height="315" src="http://www.youtube.com/embed/bOyT3OXZt-M?rel=0&amp;hd=1" frameborder="0" allowfullscreen></iframe>
<br>


Adding BuddyPress compatibility is a matter of following a few easy steps. 

#### Step 1:

Activate your Infinity Child BuddyPress Theme that is included with
your Infinity download

#### Step 2:

Install the <a target="_blank" href="http://wordpress.org/extend/plugins/bp-template-pack/">BP-Template pack plugin</a>

#### Step 3:

Go through the Template Pack setup as described below.

> This setup screen is found under **Appearance > BP Compatibility** in your WordPress Dashboard

**1. Click on Move Template files**   ![BuddyPress example 1](infinity://admin:image/docs/bp-setup-1.png)

**2.Click on Move to Step Three**

**3. Skip to the bottom and click Finish!**

**4. Make sure to tick the box next to "Disable Template Pack CSS"**
   ![BuddyPress Example](infinity://admin:image/docs/bp-setup-2.png)

###You're done! That's all there is to it.

## Upgrades

When the BP-Template pack plugin is updated it means that your BuddyPress templates
need to be updated. Here's what you need to do:

#### Step 1:

Backup your BuddyPress template folders from your Child Theme (activity, members,
groups, registration, forum, blogs)  

#### Step 2:

Go to the Template Pack setup (found under Appearance > BP Compatibility

#### Step 3:

Press the Reset button under the Reset Setup section at the bottom right of the page.
  
![BuddyPress Example](infinity://admin:image/docs/bp-setup-3.jpg)  

#### Step 4:

Repeat the setup steps described at installation (start at Step Three)  

You're done!

## BuddyPress Theming

We'd love to see more BuddyPress compatible themes appear, and we're happy to say
that all of the Child Themes based on Infinity Base work 100% with BuddyPress!

When BuddyPress is active Infinity will automatically load the BuddyPress.css file. If you want to roll a completely custom BuddyPress stylesheet you can disable the BuddyPress feature by adding:

	infinity-bp-support = off

to your Child Themes infinity.ini configuration file.

> Do not modify the standard `buddypress.css` file included with Infinity. Instead add
your custom BuddyPress CSS to the `style.css` of your Child Theme. This ensures that your
changes will not get lost when Infinity is updated.

### Custom BuddyPress Templates

If you're making custom templates please also take a look at the CSS and HTML section. Have fun!