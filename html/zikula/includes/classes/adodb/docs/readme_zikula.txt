>> ADODB Library for PHP4

(c) 2000-2008 John Lim (jlim#natsoft.com)

Released under both BSD and GNU Lesser GPL library license.
This means you can use it in proprietary products.


>> Changes in the Zikula Edition

drivers/adodb-mysqli.inc.php
39c39
<   var $hasGenID = true;
---
>   var $hasGenID = false;  // Fix for Zikula Pablo Roca / larsneo / Neo
270c270,272
<       if (!$this->hasGenID) return false;
---
>       // if (!$this->hasGenID) return false;
>       // temporal fix proca
>       if (!$this->hasGenID) return 0;

drivers/adodb-mysql.inc.php
31c31
<   var $hasGenID = true;
---
>   var $hasGenID = false;  // Fix for Zikula Pablo Roca / larsneo / Neo
207c207,209
<       if (!$this->hasGenID) return false;
---
>       // if (!$this->hasGenID) return false;
>       // temporal fix proca
>       if (!$this->hasGenID) return 0;

drivers/adodb-postgres64.inc.php
160c160,161
<       return empty($table) || empty($column) ? $oid : $this->GetOne("SELECT $column FROM $table WHERE oid=".(int)$oid);
---
>       //return empty($table) || empty($column) ? $oid : $this->GetOne("SELECT $column FROM $table WHERE oid=".(int)$oid);
>       return empty($table) || empty($column) ? $oid : $this->pg_insert_id($table, $column);

adodb-datadict.inc.php
line 988: replace "#" by "//" to comment the echo:
    //echo "<h3>$this->alterCol cannot be changed to $flds currently</h3>";

