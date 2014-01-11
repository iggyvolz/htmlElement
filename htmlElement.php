<?php

/*
  htmlElement, a simple class to integrate PHP into HTML
  Copyright (C) 2014  iggyvolz

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License along
  with this program; if not, write to the Free Software Foundation, Inc.,
  51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

class htmlElement
{

	public $running = FALSE;
	public $opentag;
	public $closetag;

	public function __construct($tagname, $atts = NULL)
	{
		$this->closetag = '</' . $tagname . '>';
		if ($atts === NULL)
		{
			$this->opentag = '<' . $tagname . '>';
		}
		else
		{
			$this->opentag = '<' . $tagname;
			foreach ($atts as $key => $value)
			{
				$this->opentag.=' ' . $key . '="' . $value . '"';
			}
			$this->opentag.='>';
		}
	}

	public function toggle()
	{
		if ($this->running)
		{
			return $this->turnoff();
		}
		else
		{
			return $this->turnon();
		}
	}

	public function turnon()
	{
		echo $this->opentag;
		$this->running = TRUE;
		return TRUE;
	}

	public function turnoff()
	{
		echo $this->closetag;
		$this->running = FALSE;
		return FALSE;
	}

}