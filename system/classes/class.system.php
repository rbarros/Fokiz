<?php

/*
 * This file is part of the Fokiz Content Management System 
 * <http://www.fokiz.com>
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

class System {

    //////////////////////////////////////////////////////////////////
    // PROPERTIES
    //////////////////////////////////////////////////////////////////
  
    public $title         = "";
    public $description   = "";
    public $keywords      = "";
    public $default_page  = "";    
    
    //////////////////////////////////////////////////////////////////
    // METHODS
    //////////////////////////////////////////////////////////////////
    
    // ------------------------------------------------------------ //
    
    //////////////////////////////////////////////////////////////////
    // LOAD
    //////////////////////////////////////////////////////////////////
    
    public function Load(){
        $rs = mysql_query("SELECT * FROM cms_system");
        $row = mysql_fetch_array($rs);
        $this->title = stripslashes($row['sys_title']);
        $this->description = stripslashes($row['sys_description']);
        $this->keywords = stripslashes($row['sys_keywords']);
        $this->default_page = $row['sys_default_page'];
    }
    
    //////////////////////////////////////////////////////////////////
    // SAVE
    //////////////////////////////////////////////////////////////////
    
    public function Save(){
        $rs = mysql_query("UPDATE cms_system SET sys_title='" . scrub($this->title) . "', sys_description='" 
            . scrub($this->description) . "', sys_keywords='" . scrub($this->keywords) . "', sys_default_page=" . $this->default_page 
            . " WHERE sys_id=1");
    }
    
}

?>