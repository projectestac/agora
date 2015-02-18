IWforums module
============
IWforums module 3.0.1 **for Zikula 1.3.x** from [Intraweb project](https://github.com/intraweb-modules13)

  - IWforums is a discussion forum module for the Zikula Application Framework

Install notes
-------------
  - You must isntall [IWmain module](https://github.com/intraweb-modules13/IWmain). This module has general API for IW modules. In the configuration of this module, you must specify the path of a writable folder to save data files.
  - You can install [IWusers module](https://github.com/intraweb-modules13/IWusers) (extends user functions) and then, forum module uses its profile information (name and surname)
  - You must copy the following vendors into **vendor** folder in Zikula root path.
    - Download [Bootstrap](http://getbootstrap.com/) into *Zk_root/vendor/bootstrat/*. It's tested with Bootstrap 3.1.1
	- Download [Font-awesome](https://fortawesome.github.io/Font-Awesome) into *Zk_root/vendor/font-awesome/*. It's tested with Font-awesome 4.3.0
	- Download [bootstrap-zikula.js](https://github.com/zikula/core/blob/1.4/src/javascript/helpers/bootstrap-zikula.js) into *Zk_root/vendor/zikula1.4/*. It's tested with 2014/06/21 version.

      * Note: You can use [this source](https://github.com/intraweb-catalog/catalogVendors) to download quickly tested repositories.
