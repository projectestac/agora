moodle-tool_uploadcoursecategory
================================

Is a Moodle admin/tools plugin for uploading course categories
in much the same way that admin/tools/uploaduser works for users.
These plugins became available from Moodle 2.2x and onwards, as
this is when the admin/tools framework first appeared.

https://gitorious.org/moodle-tool_uploadcoursecategory

There is also a bulk course upload function available at https://gitorious.org/moodle-tool_uploadcourse

This takes CSV files as input and enables override or augmentation
with default parameter values.

All the usual add,updated,rename, and delete functions.

General installation proceedures are here:
http://docs.moodle.org/20/en/Installing_contributed_modules_or_plugins

The basic process is:
Download https://gitorious.org/moodle-tool_uploadcoursecategory/moodle-tool_uploadcoursecategory/archive-tarball/master
unpack the file (probably called master) with tar -xzvf master
This will give you a directory called moodle-tool_uploadcoursecategory-moodle-tool_uploadcoursecategory
Move this directory and rename it into it's final position:
mv moodle-tool_uploadcoursecategory-moodle-tool_uploadcoursecategory <Moodle dirroot>/admin/tool/uploadcoursecategory

Alternatively you can use git:
cd <Moodle dirroot>/admin/tool
git clone git@gitorious.org:moodle-tool_uploadcoursecategory/moodle-tool_uploadcoursecategory.git uploadcoursecategory

Be careful about leaving the .git directory in your live environment.

Point your browser at Moodle, and login as admin.  This should kick off
the upgrade so that Moodle can now recognise the new plugin.

CSV File format
===============

Possible column names are:
'name', 'description', 'idnumber', 'theme', 'visible',
deleted,     // 1 means delete course
oldname      // for renaming

An example file for additions is:
name,idnumber,description
EveryThing,EveryThing,EveryThing
EveryThing/Board_of_Trustees,Board_of_Trustees,Board_of_Trustees
EveryThing /Teachers,Teachers,Teachers
EveryThing/Teachers/TeachingStaff,TeachingStaff,TeachingStaff
EveryThing/Teachers/NonTeachingStaff,NonTeachingStaff,NonTeachingStaff

Example delete is:
name,deleted
EveryThing,1

Be extremely careful with deletion - it deletes everything including any courses under the categories!!!!

Category names
==============
For category you must supply the category name as it is in Moodle and this
field is case sensitive.  If Sub Categories are involved then the full
category hierarchy needs to be specified as a '/' delimited string eg:
'Miscellaneous / Sub Cat / Sub Sub Cat'.



This was inspired in part by a need for a complimentary function for uploading
courses (as for users) for the the NZ MLE tools for Identity and 
Access Managment (synchronising users with the School SMS):
https://gitorious.org/pla-udi
and
https://gitorious.org/pla-udi/mle_ide_tools


Copyright (C) Piers Harding 2012 and beyond, All rights reserved

moodle-tool_uploadcoursecategory free software; you can redistribute it and/or
modify it under the terms of the GNU Lesser General Public
License as published by the Free Software Foundation; either
version 2 of the License, or (at your option) any later version.

This library is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
Lesser General Public License for more details.

