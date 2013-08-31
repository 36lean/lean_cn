<?php
/**
 * StatusConstant For CI AR returns;
 *
 * This class cannot be instantiated.
 *
 * @author mot <seekmas@msn.cn>
 */

final class Status {
	private function __construct() {}

	//for model return value
	const NOTHING = FALSE;
	const RECORD_EXIST = 'MOT01';
	const RECORD_NOT_EXIST = 'MOT02';
	const INSERT_SUCCESS = 'MOT03';
	const INSERT_FAIL = 'MOT04';
	const USER_NOT_FOUND = 'MOT05';
	const USER_INSERT_SUCCESS = 'MOT06';
	const NO_ACTION = 'MOT07';
	const DELETE_SUCCESS = 'MOT08';
	const DELETE_FAIL = 'MOT09';
	const UPDATE_SUCCESS = 'MOT10';
	const UPDATE_FAIL = 'MOT11';
	const FINISH = 'MOT12';
	const FAIL = 'MOT13';
}