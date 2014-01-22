<?php
class CreateStartupsTable extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = 'Creates the Startups table';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'startups' => array(
					'id' => array(
						'type' => 'integer',
						'null' => false,
						'length' => 11,
						'key' => 'primary'
					),
					'edition_id' => array(
						'type' => 'integer',
						'null' => false,
						'length' => 11,
					),
					'name' => array(
						'type' => 'string',
						'null' => false,
						'length' => '255'
					),
					'description' => array(
						'null' => false,
						'type' => 'text'
					),
					'contacts' => array(
						'null' => false,
						'type' => 'text'
					),
					'created' => array(
						'null' => false,
						'type' => 'datetime'
					),
					'modified' => array(
						'null' => false,
						'type' => 'datetime'
					),
					'indexes' => array(
						'PRIMARY' => array(
							'column' => 'id',
							'unique' => 1
						),
					),
				),
			),
		),
		'down' => array(),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		if ($direction == 'up') { 
			/* Après la création/mise a jour de la base (up) */
			/* On ajoute des données d'exemple */
			$Startup = ClassRegistry::init('Startup');
			$Startups = array(
				array(
					'id' => '1',
					'edition_id' => '1',
					'name' => 'Startup A',
					'description' => 'Description de la startup A',
					'contacts' => 'contactA contactB',
					'created' => '2014-01-20 00:00:00.000000',
					'modified' => '2014-01-20 00:00:00.000000'
				),
				array(
					'id' => '2',
					'edition_id' => '1',
					'name' => 'Startup B',
					'description' => 'Description de la startup B',
					'contacts' => 'contactA contactB',
					'created' => '2014-01-20 00:00:00.000000',
					'modified' => '2014-01-20 00:00:00.000000'
				)
			);
			if ($Startup->saveAll($Startups)){
				echo "Données ajoutées\n";
			} else {
				echo "Les données n'ont pas été ajoutées\n";
			}
		} else if ($direction == 'down') {
			/* Rien a faire dans ce cas */
		}
		return true;
	}

}
