#!/bin/bash

# Actualitzacio de quotes del portal
# S’executa una vegada al dia des d'un dels frontals, a les 7:30.

# DEV
portaldir="/dades/agora/html/portal"

# CMO INT
#portaldir="/dades/agora/html/portal"

# CMO ACC - CMO FRM
#portaldir="/dades/agora-moodle/html/portal"

# CMO PRO
#portaldir="/dades/html/portal"

cd $portaldir
php index.php --module=Agoraportal --type=admin --func=updateDiskUse
