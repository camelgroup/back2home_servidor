<?php
/** @package Petfinder::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("UsuarioMap.php");

/**
 * UsuarioDAO provides object-oriented access to the usuario table.  This
 * class is automatically generated by ClassBuilder.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the Model class which is extended from this DAO class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Petfinder::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class UsuarioDAO extends Phreezable
{
    /** @var int */
    public $Pkusuario;

    /** @var string */
    public $Nombre;

    /** @var string */
    public $IdFirebase;

    /** @var string */
    public $Email;

    /** @var string */
    public $Password;

    /** @var string */
    public $IdFacebook;

    /** @var string */
    public $IdGoogle;



}
?>