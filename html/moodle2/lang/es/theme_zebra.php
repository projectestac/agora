<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'theme_zebra', language 'es', branch 'MOODLE_25_STABLE'
 *
 * @package   theme_zebra
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['choosereadme'] = '<div class="clearfix"> <h1>Zebra</h1> <hr> <div style="float:right;margin-left:4px;"> <img src="zebra/pix/screenshot.jpg" /> </div> <div> <p><span class="warning">Advertencia:</span> Cebra (Zebra) 2.0+ depende fuertemente de CSS3 y <u>NO SE RECOMIENDA</u> PARA IE6 o inferiores; aunque tampoco Moodle 2.0+.</p> <br /> <h2>Acerca de</h2> <p>Zebra usa solicitudes de CSS3 <code>@media</code> para reformular dinámicamente el diseño de la página basado en el ancho de la pantalla. Este diseño personalizado 2-1-3 (enmedio, izq, derecho) puede mostrar 1, 2, o 3 columnas dependiendo del ancho de la pantalla. También es compatible con las clases de cuerpo <code>.side-pre-only</code>, <code>.side-post-only</code>, y <code>.content-only</code> en los tres diseños.</p> <br /> <p>Cebra también proporciona personalizaciones extensivas mediante su página de configuraciones, incluyendo colores, logos, configuraciones de reacomodo, configuraciones para móviles, y un campo para CSS personalizado.</p> <h2>Padres</h2> <p>Este tema está construído sobre Base y además integra las características de pagelayout y dock del tema Rebase.</p> <h2>Creditos</h2> <p>Cebra 2.0 está basado en el tema Aardvark 1.2 (1.9) por Shaun Daubney @ Newbury-College, Cebra 1.4 (1.9) por mí (Danny Wahl) @ iyWare, Aardvark_makeover (2.0) por Mary Evans @ Visible-Expressions, y los demás temas en que están basados estos temas.</p> <h2>Licencia</h2> <p>Este, y todos los temas incluidos en el núcleo de Moodle están licenciados bajo <a href="http://www.gnu.org/licenses/gpl.html">GNU General Public License</a>.</p> <br /> <p>El diseño subyacente de la página, diseñado en forma independiente de Moodle 2.0 por mí (Danny Wahl) @ iyWare, y capaz de ser empleado independientemente, tiene licencia de GNU General Public License.</p> <h2>Foro de Discusión del Tema:</h2> <p><a href="http://moodle.org/mod/forum/discuss.php?d=211918">http://moodle.org/mod/forum/discuss.php?d=211918</a></p> <h2>URL del plugin del Tema:</h2> <p><a href="http://moodle.org/plugins/view.php?plugin=theme_zebra">http://moodle.org/plugins/view.php?plugin=theme_zebra</a></p> <h2>Créditos del Tema</h2> <p><a href="http://iyware.com">Danny Wahl</a></p> <h2>¡No se olvide de personalizar sus configuraciones!</h2> <a href="../admin/settings.php?section=themesettingzebra">Configuraciones del Tema Cebra</a> </div> </div>';
$string['colorschemedesc'] = '<p>Gradientes y resaltados.</p><p>Nota: Safari 4 no acepta un gradiente de altura fija, por lo que siempre se mostrará como "Ninguno" o "Nada".</p>';
$string['columninfodesc'] = '<p>Cambiar las configuraciones para el diseño de la página. Para probar sus configuraciones, simplemente cambie el tamaño de su ventana del navegador o rote la orientación de su teléfono o tableta.</p><figure style="float: left;"><img src="../theme/image.php?theme=zebra&image=core/one_column&component=theme"/><figcaption><ul><li>arriba: <code>region-main</code></li><li>enmedio: <code>region-pre</code></li><li>fondo: <code>region-post</code></li></ul></figcaption></figure><figure style="float: left;"><img src="../theme/image.php?theme=zebra&image=core/two_columns&component=theme"/><figcaption><ul><li>ariba izq: <code>region-pre</code></li><li>fondo izq: <code>region-post</code></li><li>derecha: <code>region-main</code></li></ul></figcaption></figure><figure style="float: left;"><img src="../theme/image.php?theme=zebra&image=core/three_columns&component=theme"/><figcaption><ul><li>izquierda: <code>region-pre</code></li><li>centro: <code>region-main</code></li><li>derecha: <code>region-post</code></li></ul></figcaption></figure><br style="clear: left;" />';
$string['compatinfodesc'] = '<p>Configuraciones varias para intentar mejorar la compatibilidad del navegador con este tema gráfico, para una experiencia del usuario más consistente</p>';
$string['customcssdesc'] = '<p>Escriba su CSS personalizado aquí.</p><p>El CSS que escriba aquí es la última cosa llamada en la página y no deberá ser sobre-escrito por ninguna otra regla. Si sus reglas no se están mostrando, por favor intente lo siguiente:<ol><li>revise su sintaxis</li><li>añada <code> !important</code> a su regla</li><li>añada manualmente la regla a extra.css</li></ol></p>';
$string['footerbgcolordesc'] = '<p>Color de fondo de pie de página.</p><p>Usar <code>transparent</code> causará que el pie de página muestre el valor de <code>contentbgcolor</code> pero no el valor de <code>bodybgcolor</code>. Este color  debe configurarse al mismo valor que <code>bodybgcolor</code> para tener un efecto de transparencia.</p>';
$string['logourldesc'] = '<p>Escriba la URL hacia su logo. Déjela vacía para no poner imagen.</p><p>Esta URL puede ser de uno de los tres tipos de protocolo:<ul><li><p>Salida Moodle (relativa al tema):</p><p><code>logo/nuestrologo</code></p></li><li><p>Ruta completa:</p><p><code>http://dominio.com.mx/theme/image.php?theme=zebra&image=logo&rev=1&component=theme</code><br /><code>http://dominio.com.mx/ruta/ala/imagen.jpg</code></p></li><li><p>Ruta Relativa:</p><p><code>/ruta/al/archivode/logodenosotros.png</code></p></li></ul></p>';
$string['miscinfo'] = 'Configuraciones misceláneas';
$string['moodlecolorsinfodesc'] = '<p>Cambia colores específicos que están definidos en el núcleo de Moodle y están fuera de los colores generales definidos arriba. Estos incluyen cosas como <code>.notifysuccess</code> y colores para tipos de evento del calendario. Probablemente estos no necesitan ser ajustados a menos que Usted tuviera un conflicto específico con las configuraciones de colores generales de arriba.</p>';
$string['notesdesc'] = '<p>Para aplicar cualquier configuración simplemente presione "Guardar cambios" al fondo de la página.</p><p>Si no tiene habilitado el modo de Diseñador de Temas, Usted puede necesitar visitar la página de administración para <a href="purgecaches.php">Purgar todas las Cachés</a> y así forzar a que se refresque.</p>';
$string['okfontcolordesc'] = '<p>Configura el color de letra usado para cosas que trabajaban tales como guardar configuraciones.. Ejemplos específicos son <code>.green</code> andy <code>.notifysuccess</code>.</p>';
$string['schemeinfodesc'] = '<p>Cambia las configuraciones para el esquema de colores de la página. None= Ninguno, Dark=Oscuro, Light=Claro</p>';
