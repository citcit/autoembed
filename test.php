<?php
/**
 * This file is part of AutoEmbed.
 *
 * AutoEmbed is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * AutoEmbed is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with AutoEmbed.  If not, see <http://www.gnu.org/licenses/>.
 */



error_reporting(E_ALL);

require_once 'AutoEmbed.class.php';

$site = new AutoEmbed('http://www.youtube.com/watch?v=NbwpgyRUv5g');

if ( $site->is_embedable() ) {
  print $site->to_embed();
}

?>