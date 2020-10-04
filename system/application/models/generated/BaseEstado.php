<?php
// Connection Component Binding

/**
 * BaseDistribuidor
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $direccion
 * @property string $ciudad
 * @property string $estado
 * @property integer $cp
 * @property string $telefono1
 * @property string $telefono2
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEstado extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('estado');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('estado', 'string', 55, array(
             'type' => 'string',
             'length' => 55,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
		 $this->hasColumn('id_pais', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));	 
    }

    public function setUp()
    {
        parent::setUp();
		$this->hasOne('Pais', array(
             'local' => 'id_pais',
             'foreign' => 'id'));
        
    }
}