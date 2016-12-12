<?php
/** @package    Petfinder::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * UsuarioMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the UsuarioDAO to the usuario datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Petfinder::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class UsuarioMap implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
            self::$FM = Array();
            self::$FM["Pkusuario"] = new FieldMap("Pkusuario","usuario","pkusuario",true,FM_TYPE_INT,11,null,true);
            self::$FM["Nombre"] = new FieldMap("Nombre","usuario","nombre",false,FM_TYPE_VARCHAR,30,null,false);
            self::$FM["IdFirebase"] = new FieldMap("IdFirebase","usuario","id_firebase",false,FM_TYPE_VARCHAR,100,null,false);
            self::$FM["Email"] = new FieldMap("Email","usuario","email",false,FM_TYPE_VARCHAR,200,null,false);
            self::$FM["Password"] = new FieldMap("Password","usuario","password",false,FM_TYPE_VARCHAR,30,null,false);
            self::$FM["IdFacebook"] = new FieldMap("IdFacebook","usuario","id_facebook",false,FM_TYPE_VARCHAR,100,null,false);
            self::$FM["IdGoogle"] = new FieldMap("IdGoogle","usuario","id_google",false,FM_TYPE_VARCHAR,100,null,false);
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
		}
		return self::$KM;
	}

}

?>