<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_presentation_contentvars.php,v 1.5 2005/03/15 10:12:02 mblaschke Exp $ */

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
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param phpmediadb_presentation
	 */
	public function __construct( $sender )
	{
		/* assign parent */
		$this->PRESENTATION	= $sender;
		$this->PHPMEDIADB		= $sender->PHPMEDIADB;

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
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param String
	 * @param String
	 * @param Integer
	 * @return void
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
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns a complete node or only a value specified by
	 * the parameter
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param String
	 * @return String
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
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param String
	 * @return void
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
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param mixed
	 * @param String
	 * @param mixed
	 * @return mixed
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
			if( NULL == $nodeValue )
				//$nodeArray["$nodeCurrentIndex"] = $nodeValue;
				unset( $nodeArray["$nodeCurrentIndex"] );
			else
				$nodeArray["$nodeCurrentIndex"] = (string) $nodeValue;
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
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param mixed
	 * @param String
	 * @param mixed
	 * @return mixed
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
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param String
	 * @return boolean
	 */
	public function checkNodeString( $nodeName )
	{
		$returnValue = (bool) false;

		$checkRegEx = "^([_a-zA-Z0-9]+\.?)+[_a-zA-Z0-9]+$";
		$returnValue = ereg( $checkRegEx, $nodeName );
		
		/* return value */
		return (bool) $returnValue;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * Converts the nodeValue in the format of nodeFormat
	 *
	 * @access protected
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param String
	 * @return String
	 */
	protected function convertNodeValue( $nodeValue, $nodeFormat )
	{
		$returnValue = null;


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
		
		/* return value */
		return $returnValue;
	}

} /* end of class phpmediadb_presentation_contentvars */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>