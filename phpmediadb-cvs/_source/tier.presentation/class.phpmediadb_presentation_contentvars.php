<?php
/**
 * $Id: class.phpmediadb_presentation_contentvars.php,v 1.11 2005/04/20 21:46:16 mblaschke Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        class.phpmediadb_presentation_contentvars.php
 * License:     GNU General Publice License
 *
 * This file is part of phpMediaDB.
 *
 * phpMediaDB is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Foobar is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Foobar; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * For questions, help, comments, discussion, etc., please join the
 * phpMediaDB mailing list. See phpMediaDB projectportal for more
 * information.
 *
 * @link        http://phpmediadb.berlios.de/
 * @copyright   2004-2005 &copy; Blaschke, Markus; Ruf, Boris
 * @license     http://opensource.org/licenses/gpl-license.php GNU General Public License
 * @author      Markus Blaschke <mblaschke@users.berlios.de>
 * @author      Boris Ruf <bruf@users.berlios.de>
 * @package		phpmediadb
 * @subpackage	presentation
 * @version     $Revision: 1.11 $
 */

/**
 * This is the class that manages all template/content-variables of the tier.presentation
 *
 * This class also manages the conversion to XML/XHTML style
 * 
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.11 $
 * @package		phpmediadb
 * @subpackage	presentation
 */
class phpmediadb_presentation_contentvars
{
	// --- ATTRIBUTES ---

	/**
	 * Reference to class phpmediadb
	 *
	 * @access protected
	 * @see phpmediadb
	 * @var phpmediadb
	 */
	protected $PHPMEDIADB = null;

	/**
	 * Reference to class phpmediadb_presentation
	 *
	 * @access protected
	 * @see phpmediadb_presentation
	 * @var phpmediadb_presentation
	 */
	protected $PRESENTATION = null;

	/**
	 * Contains all variables used by the template-engine
	 *
	 * @access private
	 * @var mixed
	 */
	private $nodeContainer = null;

	// --- OPERATIONS ---
	
//-----------------------------------------------------------------------------
	/**
	 * The constructor __construct initalizes the Class.
	 *
	 * @access public
	 * @param phpmediadb_presentation $sender Refernece to parentclass
	 */
	public function __construct( $sender )
	{
		/* assign parent */
		$this->PRESENTATION	= $sender;
		$this->PHPMEDIADB	= $sender->PHPMEDIADB;

		/* initalize */
		$this->nodeContainer = array();
  }
  
//-----------------------------------------------------------------------------
	/**
	 * The destructor __destruct is responsible for closing all open files,
	 * etc.
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 */
	public function __destruct()
	{
		/* nothing to do yet */
	}

//-----------------------------------------------------------------------------
	/**
	 * This function adds a new node to the nodecontainer. The nodepoint is
	 * by the dottet-format nodeName with the value of NodeValue and a
	 * of Nodeformat.
	 *
	 * @access public
	 * @param String $nodeName Name of node (dooted format)
	 * @param Mixed $nodeValue Value of node
	 * @param Integer $nodeFormat Format of node, $nodeValue will be converted into this format
	 * @return bool success of nodeintegration
	 */
	public function addNode( $nodeName, $nodeValue, $nodeFormat = PHPMEDIADB_NODEFORMAT_TEXT )
	{
		/* check */
		if( $this->checkNodeString( $nodeName ) == FALSE )
			return false;

		/* convert */
		$nodeValue = $this->convertNodeValue( $nodeValue, $nodeFormat );

		/* delegate */
		$this->recursiveInsertNodeIntoContainer( $nodeName, $nodeValue, $this->nodeContainer );
		
		return true;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns a complete node or only a value specified by
	 * the parameter
	 *
	 * @access public
	 * @param String $nodeName Name of node (dotted-format)
	 * @return mixed Array or string of nodes
	 */
	public function getNode( $nodeName = NULL )
	{
		if( NULL == $nodeName )
		{
			/* return complete array */
			$returnValue = $this->nodeContainer;
		}
		else
		{
			/* check */
			if( $this->checkNodeString( $nodeName ) == FALSE )
				return false;
			
			/* delegate */
			$returnValue = $this->recursiveReadNodeFromContainer( $nodeName, $this->nodeContainer );
		}
		
		/* return mixed */
		return $returnValue;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function deletes a nodevalue or a compelte nodetree from the
	 * container
	 *
	 * @access public
	 * @param String $nodeName Name of node (dotted format)
	 * @return bool ssuccess of nodedeletion
	 */
	public function DeleteNode( $nodeName )
	{
		/* check */
		if( $this->checkNodeString( $nodeName ) == FALSE )
			return false;

		/* delegate */
		$this->recursiveInsertNodeIntoContainer( $nodeName, NULL, $this->nodeContainer );
		return true;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This internal function recursivlys insert a node into the
	 * container
	 *
	 * @access protected
	 * @param mixed $nodeName Name of node (dotted format)
	 * @param String $nodeValue Value of node
	 * @param mixed $nodeArray Reference of a nodecontainer
	 * @return mixed Nodecontainer
	 */
	protected function recursiveInsertNodeIntoContainer( $nodeName, $nodeValue = null, &$nodeArray )
	{
		/* init */
		$nodeIndexArray		= null;
		$nodeCurrentIndex	= null;
		$nodeNextIndex		= null;

		/* split nodename to the indexes */
		$nodeIndexArray	= explode( '.', $nodeName );

		/* get current index and convert it to upper-chars */
		$nodeCurrentIndex		= strtoupper( $nodeIndexArray[0] );

		/* check if it is the last item */
		if( count( $nodeIndexArray ) == 1 )
		{
			/* ok, it is the last item.. generate one more array and stop recursive call */
			if( NULL === $nodeValue )
				unset( $nodeArray["$nodeCurrentIndex"] );
			else
				$nodeArray["$nodeCurrentIndex"] = $nodeValue;
		}
		else
		{
			/* ok, more levels to go, first generate the new index */
			for( $i=1; $i < count( $nodeIndexArray ); $i++ )
			{
				if( $i < count( $nodeIndexArray) - 1 )
					$nodeNextIndex .= $nodeIndexArray[$i] . ".";
				else
					$nodeNextIndex .= $nodeIndexArray[$i];
			}

			/* check if key exists and add array if not */
			if( !key_exists( $nodeCurrentIndex, $nodeArray ) )
				$nodeArray["$nodeCurrentIndex"] = array ();

			/* check if key is array and add array if not */
			if( !is_array( $nodeArray["$nodeCurrentIndex"] ) )
				$nodeArray["$nodeCurrentIndex"] = array();
			$this->recursiveInsertNodeIntoContainer( $nodeNextIndex, $nodeValue, $nodeArray["$nodeCurrentIndex"] );

		}

		/* return array */
		return $nodeArray;
	}
//-----------------------------------------------------------------------------
	/**
	 * This internal function recursivly reads a node from the container
	 *
	 * @access protected
	 * @param String $nodeName Name of node (dotted format)
	 * @param mixed $nodeArray Reference of a nodecontainer
	 * @return mixed Nodecontainer
	 */
	protected function recursiveReadNodeFromContainer( $nodeName, &$nodeArray )
	{
		/* init */
		$nodeIndexArray		= null;
		$nodeCurrentIndex	= null;
		$nodeNextIndex		= null;

		/* convert to upperchars */
		$nodeName = strtoupper( $nodeName );
		/* split nodename to the indexes */
		$nodeIndexArray	= explode( '.', $nodeName );

		/* get current index and convert it to upper-chars */
		$nodeCurrentIndex		= strtoupper( $nodeIndexArray[0] );

		/* check if it is the last item */
		if( count( $nodeIndexArray ) == 1 )
		{
			/* check if arrayitem exsits */
			if( !key_exists( $nodeCurrentIndex, $nodeArray ) )
				return NULL;			
			
			/* ok, it is the last item.. return value */
				return $nodeArray["$nodeCurrentIndex"];
		}
		else
		{
			/* ok, more levels to go, first generate the new index */
			for( $i=1; $i < count( $nodeIndexArray ); $i++ )
			{
				if( $i < count( $nodeIndexArray) - 1 )
					$nodeNextIndex .= $nodeIndexArray[$i] . ".";
				else
					$nodeNextIndex .= $nodeIndexArray[$i];
			}

			/* check if key exists and add array if not */
			if( !key_exists( $nodeCurrentIndex, $nodeArray ) )
				return NULL;

			/* check if key is array and add array if not */
			if( !is_array( $nodeArray["$nodeCurrentIndex"] ) )
			  return $nodeArray["$nodeCurrentIndex"];

			return $this->recursiveReadNodeFromContainer( $nodeNextIndex, $nodeArray[$nodeCurrentIndex] );

		}
	}
		
//-----------------------------------------------------------------------------
	/**
	 * Checks the validity of nodeName and returns the status
	 * (TRUE=ok, FALSE=check failed)
	 *
	 * @access public
	 * @param String $nodeName Name of node (dotted format)
	 * @return boolean boolean value specifies if nodename is valid
	 */
	public function checkNodeString( $nodeName )
	{
		/* init */
		$returnValue	= (bool) false;
		$checkRegEx		= "^([_a-zA-Z0-9]+\.?)+[_a-zA-Z0-9]+$";
		$returnValue	= ereg( $checkRegEx, $nodeName );
		
		/* return value */
		return (bool) $returnValue;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * Converts the nodeValue in the format of nodeFormat
	 *
	 * @access protected
	 * @param String $nodeValue Name of node
	 * @param String $nodeFormat Format of node (conversion)
	 * @return String Name of node (dotted format)
	 */
	protected function convertNodeValue( $nodeValue, $nodeFormat )
	{
		$returnValue = null;

		switch( gettype( $nodeValue ) )
		{
			case 'array';
				foreach( $nodeValue as $key => $value )
				{
					/* recursive call */
					$returnValue[$key] = $this->convertNodeValue( $nodeValue[$key], $nodeFormat );
				}
			break;	
			
			case 'NULL':
				/* fixed bug - NULL should be stay NULL! */
				$returnValue = $nodeValue;
			break;
			
			/* let's convert */
			default:
				switch( $nodeFormat )
				{
					/* plaintext content */
					case(PHPMEDIADB_NODEFORMAT_TEXT):
						$returnValue = htmlentities( $nodeValue );
					break;
								
					/* html content */
			 		case(PHPMEDIADB_NODEFORMAT_HTML):
						$returnValue = $nodeValue;
					break;
								
					/* not supported format */
					default:
						$returnValue = $nodeValue;
					break;			
				}
			break;
		}
	
		/* return value */
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
} /* end of class phpmediadb_presentation_contentvars */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>